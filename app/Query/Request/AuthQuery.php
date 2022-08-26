<?php

namespace App\Query\Request;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Query\Abstraction\IAuthQuery;
use Illuminate\Support\Facades\Auth;

class AuthQuery implements IAuthQuery
{

    private $name = 'name';
    private $email = 'email';
    private $password = 'password';

    public function login(Request $request)
    {

        $request->validate([
            $this->email       => 'required|string|email',
            $this->password    => 'required|string',
        ]);

        $credentials = request([$this->email, $this->password]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales no autorizadas'], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken(env('APP_NAME'));
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addDays(1);
        // $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),

        ]);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        // $usrAuxi = User::findOrFail($request->user()->id);
        // $permits = $usrAuxi->userPermitsApi($request->user()->id);
        // $user->permits = $permits;
        // $user->rol = $usrAuxi->rol;
        // $user->acount = $usrAuxi->acount;
        // $user->commerce = $usrAuxi->commerce;
        return response()->json($user);
    }

    public function signup(Request $request)
    {
        try {
            $request->validate([
                $this->name     => 'required|string',
                $this->email    => 'required|string|email|unique:users',
                $this->password => 'required|string|confirmed',
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }

        $user = new User([
            $this->name     => $request->name,
            $this->email    => $request->email,
            $this->password => bcrypt($request->password),
        ]);

        $user->save();
        return response()->json(['message' => 'Usuario creado correctamente!'], 201);
    }
}
