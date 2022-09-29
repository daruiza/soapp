<?php

namespace App\Query\Request;

use App\User;
use App\Model\Admin\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Query\Abstraction\IUserQuery;

class UserQuery implements IUserQuery
{
    private $name = 'name';
    private $lastname = 'lastname';
    private $phone = 'phone';
    private $email = 'email';
    private $password = 'password';
    private $theme = 'theme';
    private $photo = 'photo';
    private $rol_id = 'rol_id';

    public function index()
    {
        $user = User::query()
            ->select(['id', 'name', 'lastname', 'phone', 'email', 'photo', 'theme', 'rol_id'])
            ->with(['rol:id,name,description,active'])
            ->get();
        return response()->json(['User' => $user], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                $this->name     => 'required|string|min:5|max:128',
                $this->email    => 'required|string|max:128|email|unique:users',
                $this->password => 'required|string',
                $this->phone    => 'min:7|max:10',
                $this->rol_id   => 'required|numeric',
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }

        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($request->rol_id <= 1) {
                return response()->json(['message' => 'no tiene permiso para crear rol super-admin!'], 403);
            } else {
                try {
                    $user = new User([
                        $this->name     => $request->name,
                        $this->lastname => $request->lastname ?? '',
                        $this->phone    => $request->phone ?? 0,
                        $this->email    => $request->email,
                        $this->password => bcrypt($request->password),
                        $this->theme    => $request->theme ?? 'skyblue',
                        $this->photo    => $request->photo ?? '',
                        $this->rol_id   => $request->rol_id,
                    ]);
                    $user->save();
                    return response()->json([
                        'data' => [
                            'user' => $user,
                        ],
                        'message' => 'Usuario creado correctamente!'
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 403);
                }
            }
        } elseif (auth()->check() && auth()->user()->rol_id == 3) {

            try {
                $user = new User([
                    $this->name     => $request->name,
                    $this->lastname => $request->lastname ?? '',
                    $this->phone    => $request->phone ?? 0,
                    $this->email    => $request->email,
                    $this->password => bcrypt($request->password),
                    $this->theme    => $request->theme ?? 'dark',
                    $this->photo    => $request->photo ?? '',
                    $this->rol_id   => $request->rol_id = 2,
                ]);
                $user->save();
                return response()->json([
                    'data' => [
                        'user' => $user,
                    ],
                    'message' => 'Usurio creado con Rol cliente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'No tiene permiso para crear usuarios!'], 403);
        }
    }

    // Actualizacion Myself de usuario
    public function update(Request $request, Int $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user) {
                $request->validate([
                    $this->name     => 'required|string|min:5|max:128|',
                    $this->email    => 'required|string|max:128|email|', Rule::unique('users')->ignore($user->id),
                    $this->phone    => 'max:10|'
                ]);
                $user->name     = $request->name;
                $user->lastname = $request->lastname ?? '';
                $user->phone    = $request->phone ?? 0;
                $user->email    = $request->email;
                $user->theme    = $request->theme ?? '';
                $user->photo    = $request->photo ?? '';
                $user->save();
                return response()->json([
                    'data' => [
                        'user' => $user,
                    ],
                    'message' => 'Usuario actualizado con éxito!'
                ], 201);
            } else {
                return response()->json(['message' => 'Usuario no existe!'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 403);
        }
    }

    public function showByUserId(Request $request, $id)
    {
        if ($id) {
            try {
                $user = User::findOrFail($id);
                $user->rol;
                return response()->json([
                    'data' => [
                        'user' => $user,
                    ],
                    'message' => 'Datos de Usuario Consultados Correctamente!!'
                ], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByRolId(Request $request, $id)
    {
        try {
            $role = Rol::findOrFail($id);
            if ($role) {
                $rol = DB::table('rols')
                    ->join('users', 'rols.id', '=', 'users.rol_id')
                    ->select(['users.name as user_name', 'users.lastname as user_lastname', 'users.phone as user_phone', 'users.email as user_email', 'rols.id as rol_id', 'rols.name as rol_name', 'rols.description as rol_description'])
                    ->where('rols.id', '=', $id)
                    ->get();
                return response()->json([
                    'data' => [
                        'users' => $rol,
                    ],
                    'message' => 'Datos de Usuario Consultados Correctamente!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 402);
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $user = User::findOrFail($id);
                    $user->delete();
                    return response()->json([
                        'data' => [
                            'user' => $user,
                        ],
                        'message' => 'Usuario eliminado con éxito!'
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Usuario no existe!', 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
}
