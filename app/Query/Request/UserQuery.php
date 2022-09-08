<?php

namespace App\Query\Request;

use App\User;

use Illuminate\Http\Request;
use App\Query\Abstraction\IUserQuery;

class UserQuery implements IUserQuery
{
    private $name = 'name';
    private $lastname = 'lastname';
    private $phone = 'phone';
    private $email = 'email';
    private $password = 'password';

    public function index()
    {
        $user = User::query()
            ->select(['id', 'name', 'lastname', 'phone', 'email', 'rol_id'])
            ->with(['rol:id,name,description,active'])
            ->get();
        return response()->json(['User' => $user], 200);
    }

    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {
            try {
                $request->validate([
                    $this->name     => 'required|string',
                    $this->lastname     => 'required|string',
                    $this->phone     => 'required|numeric',
                    $this->email    => 'required|string|email|unique:users',
                    $this->password => 'required|string',
                ]);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 402);
            }

            $user = new User([
                $this->name     => $request->name,
                $this->lastname     => $request->lastname,
                $this->phone     => $request->phone,
                $this->email    => $request->email,
                $this->password => bcrypt($request->password),
            ]);

            $user->save();
            return response()->json(['message' => 'Usuario creado correctamente!'], 201);
        } elseif (auth()->check() && auth()->user()->rol_id == 2) {
            return response()->json(['message' => 'Soy el rol cliente, no puedo hacer ni puta mierda!'], 201);
        } elseif (auth()->check() && auth()->user()->rol_id == 3) {
            return response()->json(['message' => 'Soy el rol Responsable, solo puedo crear clientes!'], 201);
        } else {
            return response()->json(['message' => 'No tiene permiso para crear usuarios!'], 403);
        }
    }

    /*  public function show(Request $request)
    {
       //
    }

    public function display(Request $request, String $id)
    {
       //
    }

    public function showByUser(Request $request)
    {
       //
    } */

    public function showByUserId(Request $request, $id)
    {
        if ($id) {
            $user = User::findOrFail($id);
            $user->rol;
            return response()->json(['User' => $user], 200);
        }
        return response()->json(['message' => 'User no exist!'], 404);
    }

    public function update(Request $request, Int $id)
    {
        if ($id > 0) {
            $user = User::findOrFail($id);
            if (is_null($user)) {
                return response()->json(['message' => 'User no exist!'], 404);
            } else {
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                return response()->json(['message' => 'User update!'], 201);
            }
        } else {
            return response()->json(['message' => 'El id debe ser positivo!'], 404);
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {
            if ($id) {
                $user = User::findOrFail($id);
                $user->delete();
                return response()->json(['message' => 'User destroy!'], 201);
            } else {
                return response()->json(['message' => 'User no exist!'], 404);
            }
        } else {
            return response()->json(['message' => 'No tiene permiso para Eliminar usuarios!'], 403);
        }
    }
}
