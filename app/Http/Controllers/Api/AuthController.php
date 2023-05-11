<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IAuthQuery;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $AuthQuery;

    public function __construct(IAuthQuery $AuthQuery)
    {
        $this->AuthQuery = $AuthQuery;
    }

    /**
     * @OA\Post(
     *      path="/auth/login",
     *      operationId="getToken",
     *      tags={"Auth"},
     *      summary="Get User Token",
     *      description="Return Token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
     */
    public function login(Request $request)
    {
        return $this->AuthQuery->login($request);
    }

    /**
     * @OA\Get(
     *      path="/auth/logout",
     *      tags={"Auth"},
     *      summary="GetOut",
     *      description="Close session",
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Sección finalizada']);
    }

    /**
     * @OA\Get(
     *      path="/auth/user",
     *      operationId="getUser",
     *      tags={"Auth"},
     *      summary="Get User Auth",
     *      description="Return User",
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function user(Request $request)
    {
        return $this->AuthQuery->user($request);
    }
}
