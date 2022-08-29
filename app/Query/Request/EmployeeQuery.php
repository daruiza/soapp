<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;

use App\User;
use App\Model\Core\Employee;
use App\Model\Core\DocumentType;
use App\Model\Core\PersonType;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeQuery;

use App\Query\Request\EpaycoPaymentQuery;

class EmployeeQuery implements IEmployeeQuery
{
    public function index()
    {
        return response()->json(['message' => 'Customer Index!'], 201);
    }

    public function show(Request $request)
    {
        $userObject = new User();
        $userObject->identification = $request->input('identification');

        $user =  User::select();
        $user = $userObject->identification ? $user->where('identification', $userObject->identification) : $user;
        $user = $user->get()->first();

        $commerce = $user->commerce()->first();

        return $user ?
            response()->json([
                'user' => $user,
                'commerce' => $commerce
            ], 200) :
            response()->json();
    }

    // Consulta las Facturas pendientes por pagar
    // Pero tambien se actualiza el estado de las
    // transacciónes (pendientes) y las mismas facturas relacionadas
    public function showByCommerce(Request $request)
    {
        // Esto es interesante pero no necesario, el Front debe ser el unico encargado de Actualizar
        // Las trasacciones en estado de PENDIENTE, de lo contrario se pierde las notificaciones

        // try {
        //     $epaycoPaymentQuery = new EpaycoPaymentQuery();
        //     $request->request->add(['CustomerIdentification' => $request->input('identification')]);
        //     $request->request->add(['Estado' => 'Pendiente']);
        //     $epaycoPaymentQuery->update($request, $request->input('commerce_id'))->original;
        // } catch (\Exception $e) {
        //     return response()->json(['message' => $e->getMessage()], 400);
        // }

        $userObject = new User();
        $userObject->identification = $request->input('identification');
        $userObject->active = $request->input('active') ? $request->input('active') : 1;

        $customerObject = new Employee();
        $customerObject->commerce_id = +$request->input('commerce_id');
        $customerObject->invoices_status_id = +$request->input('invoices_status_id');

        $limit = $request->input('limit') ? $request->input('limit') : 3;
        $sort = $request->input('sort') ? $request->input('sort') : 'asc';
        $page = $request->input('page') ? $request->input('page') : 1;

        $user =  User::select();
        $user = $userObject->identification ? $user->where('identification', $userObject->identification) : $user;
        $user = $user->get()->first();

        $customer =  Employee::select();
        $customer = $customerObject->commerce_id ? $customer->where('commerce_id', $customerObject->commerce_id) : $customer;
        $customer = $customer->get()->first();

        // Se asigna el dato taltante de $Customer a $User
        $user->document_type = $customer->document_type;

        $action = '!Advertencia';

        if (!$user) {
            return response()->json([
                'message' => 'Verifica la Identificación diligenciada',
                'action' => $action
            ], 404);
        }

        if (!$customer) {
            return response()->json([
                'message' => 'Verifica el Comercio diligenciado',
                'action' => $action
            ], 404);
        }

        if ($user->id !== $customer->user->id) {
            return response()->json([
                'message' => 'El cliente no pertenece al commercio seleccionado',
                'action' => $action
            ], 404);
        }

        $invoices_status_production = $customerObject->invoices_status_id ? $customerObject->invoices_status_id : 2;

        $invoicesid = 'invoices.id';
        $invoicescustomer_id = 'invoices.customer_id';

        return response()->json([
            'user' => $user,
            'invoices' =>
            Employee::select(
                $invoicesid,
                'invoices.name',
                'invoices.number',
                'invoices.description',
                'invoices.dateStart',
                'invoices.dateEnd',
                'invoices.loop',
                'invoices.loopDate',
                'invoices.loopDay',
                'invoices.invoices_status_id',
                $invoicescustomer_id,
                DB::raw('SUM(price * volume) as total_price')
            )->leftJoin('invoices', 'customers.id', '=', 'invoices.customer_id')
                ->leftJoin('invoices_detail', 'invoices.id', '=', 'invoices_detail.invoice_id')
                ->where('user_id', $user->id)
                ->where('commerce_id', $customerObject->commerce_id)
                ->where(function ($q) use ($invoices_status_production) {
                    $q->where('invoices_status_id', $invoices_status_production)
                        ->orWhere('invoices_status_id', 1)
                        ->orWhere('invoices_status_id', 3)
                        ->orWhere('invoices_status_id', 4)
                        ->orWhere('invoices_status_id', 5)
                        ->orWhere('invoices_status_id', 7);
                })
                // ->where('invoices_status_id', $invoices_status_production)
                ->orderBy('customers.id',  $sort)
                ->groupBy(
                    $invoicesid,
                    'invoices.name',
                    'invoices.number',
                    'invoices.description',
                    'invoices.dateStart',
                    'invoices.dateEnd',
                    'invoices.loop',
                    'invoices.loopDate',
                    'invoices.loopDay',
                    'invoices.invoices_status_id',
                    $invoicescustomer_id,
                    'invoices_detail.invoice_id'
                )
                ->paginate($limit, ['*'], '', $page)
        ], 200);

        // return response()->json([
        //     'user' => $user,
        //     'invoices' => $customer->invoices->where('invoices_status_id', $invoices_status_production)
        // ], 200);
    }

    public function documentTypes(Request $request)
    {
        $documentType =  DocumentType::all();
        return response()->json($documentType, 201);
    }

    public function personTypes(Request $request)
    {
        $personType =  PersonType::all();
        return response()->json($personType, 201);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'Customer Store!'], 201);
    }
    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'Customer Update!'], 201);
    }
    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Customer Destroy!'], 201);
    }
}
