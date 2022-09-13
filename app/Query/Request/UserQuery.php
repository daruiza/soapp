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
    private $rol_id = 'rol_id';

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
                    $this->rol_id => 'required|numeric',
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
                $this->rol_id => $request->rol_id,
            ]);

            $user->save();
            return response()->json(['message' => 'Usuario creado correctamente!', 'user' => $user], 201);
        } elseif (auth()->check() && auth()->user()->rol_id == 3) {
            $user = new User([
                $this->name     => $request->name,
                $this->lastname     => $request->lastname,
                $this->phone     => $request->phone,
                $this->email    => $request->email,
                $this->password => bcrypt($request->password),
                $this->rol_id => $request->rol_id = 2,
            ]);

            $user->save();
            return response()->json(['message' => 'Usurio creado con Rol cliente!'], 201);
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
            try {
                $user = User::findOrFail($id);
                $user->rol;
                return response()->json(['User' => $user], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function update(Request $request, Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $user = User::findOrFail($id);
                    $user->name = $request->name;
                    $user->lastname = $request->lastname;
                    $user->phone = $request->phone;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->rol_id = $request->rol_id;
                    $user->save();
                    return response()->json(['message' => 'Usuario actualizado con éxito!'], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
                }
            }
        } elseif (auth()->check() && auth()->user()->rol_id == 3) {
            try {
                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->rol_id = $request->rol_id = 2;
                $user->save();
                return response()->json(['message' => 'Usuario actualizado con éxito!'], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $user = User::findOrFail($id);
                    $user->delete();
                    return response()->json(['message' => 'Usuario eliminado con éxito!'], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
}
