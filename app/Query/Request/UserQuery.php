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
        $user = User::all();
        return response()->json(['User' => $user], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                $this->name     => 'required|string',
                $this->lastname     => 'required|string',
                $this->phone     => 'required|integer',
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
            $this->password => $request->password,
        ]);

        $user->save();
        return response()->json(['message' => 'Usuario creado correctamente!'], 201);

        /*  if (User::where('name', $request->input('name'))->first()) {
            return response()->json(['message' => 'User exist!'], 400);
        }

        // Creamos el nuevo usuario
        $user = new User();
        $newUser = $user->create($request->input());

        return response()->json(['id' => $newUser->id], 201); */
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


    /*  public function update(Request $request, Int $id)
    {
        return response()->json(['message' => 'Commerce update!'], 201);
    }*/

    public function destroy(Int $id)
    {
        if ($id) {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'User destroy!'], 201);
        } else {
            return response()->json(['message' => 'User no exist!'], 404);
        }
    }
}
