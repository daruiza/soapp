<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{

    public function index()
    {
        $commerces = Commerce::where('active', 1)->get();
        return $commerces ?
            response()->json($commerces, 200) :
            response()->json(['message' => 'No Commerces!'], 404);
    }

    public function show(Request $request)
    {

        $object = new Commerce();
        $object->id = $request->input('id');
        $object->name = trim($request->input('name'));
        $object->description = trim($request->input('name'));
        $object->active = $request->input('active') ? $request->input('active') : 1;

        $limit = $request->input('limit') ? $request->input('limit') : 3;
        $sort = $request->input('sort') ? $request->input('sort') : 'ASC';
        $page = $request->input('page') ? $request->input('page') : 1;

        $commerce =  Commerce::select();

        $commerce = $object->id ? $commerce->where('id', $object->id) : $commerce;
        $commerce = $object->name && !$commerce ?
            $commerce->where('name', 'LIKE', '%' . $object->name . '%') :
            $commerce;

        $commerce = $commerce
            ->active($object->active)
            ->orderBy('id',  $sort)
            ->paginate($limit, ['*'], '', $page);


        return $commerce ?
            response()->json($commerce, 200) :
            response()->json(['message' => 'Commerce no exist!'], 404);
    }

    public function store(Request $request)
    {
        if (Commerce::where('name', $request->input('name'))->first()) {
            return response()->json(['message' => 'Commerce exist!'], 400);
        }

        // Creamos el nuevo comercio
        $commerce = new Commerce();
        $request->request->add(['active' => 1]);
        $newCommerce = $commerce->create($request->input());

        return response()->json(['id' => $newCommerce->id], 201);
    }

    public function display(Request $request, String $id)
    {
        $commerce = Commerce::where('name', 'LIKE', $id)->first();
        return $commerce ?
            response()->json($commerce, 200) :
            response()->json(['message' => 'Commerce no exist!'], 404);
    }

    public function update(Request $request, Int $id)
    {
        return response()->json(['message' => 'Commerce update!'], 201);
    }

    public function destroy(Int $id)
    {
        return response()->json(['message' => 'Commerce destroy!'], 201);
    }
}
