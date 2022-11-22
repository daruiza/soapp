<?php

namespace App\Query\Request;

use App\User;
use App\Model\Admin\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Query\Abstraction\IUserQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function index(Request $request)
    {
        $user = User::query()
            ->select(['id', 'name', 'lastname', 'phone', 'email', 'photo', 'theme', 'rol_id'])
            ->where('rol_id', '!=', 1)
            ->where('id', '!=', $request->user()->id)
            ->with(['rol:id,name,description,active'])
            ->with(['commerce:id,name,nit,user_id'])
            ->name($request->name)
            ->lastname($request->lastname)
            ->phone($request->phone)
            ->email($request->email)
            ->rol_id($request->rol_id)
            ->responsible_id($request->user()->rol_id)
            ->orderBy('id', $request->sort ?? 'DESC')
            ->paginate($request->limit ?? 8, ['*'], '', $request->page ?? 1);

        return response()->json([
            'data' => [
                'users' => $user,                
            ],
            'message' => 'Usuarios consultados correctamente!'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->name     => 'required|string|min:1|max:128',
            $this->email    => 'required|string|max:128|email|unique:users',
            // $this->password => 'required|string',
            $this->phone    => 'numeric|digits_between:7,10',
            $this->rol_id   => 'required|numeric',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }

        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($request->rol_id <= 1) {
                return response()->json(['message' => 'no tiene permiso para crear rol super-admin!'], 403);
            } else {
                try {

                    $user = new User([
                        $this->name     => $request->name,
                        $this->email    => $request->email,
                        $this->lastname => $request->lastname ?? '',
                        $this->phone    => $request->phone ?? 0,
                        $this->password => bcrypt($request->password ?? '0000'),
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
                    return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
                }
            }
        } elseif (auth()->check() && auth()->user()->rol_id == 3) {

            if ($request->rol_id <= 1) {
                return response()->json(['message' => 'no tiene permiso para crear rol super-admin!'], 403);
            } else {
                try {
                    $user = new User([
                        $this->name     => $request->name,
                        $this->email    => $request->email,
                        $this->lastname => $request->lastname ?? '',
                        $this->phone    => $request->phone ?? 0,
                        $this->password => bcrypt($request->password ?? '0000'),
                        $this->theme    => $request->theme ?? 'skyblue',
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
                    return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
                }
            }
        } else {
            return response()->json(['message' => 'No tiene permiso para crear usuarios!'], 403);
        }
    }

    // Actualizacion Myself de usuario

    public function update(Request $request)
    {
        if ($request->id) {
            try {
                $user = User::findOrFail($request->id);
                $rules = [
                    $this->name     => 'required|string|min:1|max:128',
                    $this->email    => 'required|string|max:128|email|', Rule::unique('users')->ignore($user->id),
                    $this->phone    => 'numeric|digits_between:7,10|'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $user->name     = $request->name ?? $user->name;
                $user->lastname = $request->lastname ?? $user->lastname;
                $user->phone    = $request->phone ?? $user->phone;
                $user->email    = $request->email ?? $user->email;
                $user->theme    = $request->theme ?? $user->theme;
                $user->photo    = $request->photo ?? $user->photo;
                $user->save();
                return response()->json([
                    'data' => [
                        'user' => $user,
                    ],
                    'message' => 'Usuario actualizado con éxito!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 404);
            }
        }
    }

    public function updateById(Request $request, Int $id)
    {
        if ($id) {
            try {
                $user = User::findOrFail($id);
                $rules = [
                    $this->name     => 'required|string|min:1|max:128',
                    $this->email    => 'required|string|max:128|email|', Rule::unique('users')->ignore($user->id),
                    $this->phone    => 'numeric|digits_between:7,10|'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $user->name         = $request->name ?? $user->name;
                $user->lastname     = $request->lastname ?? $user->lastname;
                $user->phone        = $request->phone ?? $user->phone;
                $user->email        = $request->email ?? $user->email;
                $user->password     = $request->password ? bcrypt($request->password) : $user->password;
                $user->theme        = $request->theme ?? $user->theme;
                $user->rol_id       = $request->rol_id ?? $user->rol_id;
                $user->save();
                return response()->json([
                    'data' => [
                        'user' => $user,
                    ],
                    'message' => 'Usuario actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Usuario con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 404);
            }
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
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Usuario con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByRolId(Request $request, $id)
    {
        try {
            $role = Rol::findOrFail($id);
            if ($role) {
                $users = User::query()
                ->select(['id', 'name', 'lastname', 'phone', 'email', 'photo', 'theme', 'rol_id'])
                ->where('rol_id', '!=', 1)
                ->where('rol_id', '=', $id)
                ->with(['rol:id,name,description,active'])
                ->get();
                return response()->json([
                    'data' => [
                        'users' => $users,
                    ],
                    'message' => 'Datos de Usuario Consultados Correctamente!'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Usuario con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    public function destroy($id)
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
                } catch (ModelNotFoundException $e) {
                    return response()->json(['message' => "Usuario con id {$id} no existe!", 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
}
