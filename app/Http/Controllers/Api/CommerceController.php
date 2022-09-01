<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;

class CommerceController extends Controller
{

    private $CommerceQuery;

    public function __construct(ICommerceQuery $CommerceQuery)
    {
        $this->CommerceQuery = $CommerceQuery;
    }

    /**
     * @OA\Get(
     *      path="/commerce/index",
     *      operationId="getAllCommerces",
     *      tags={"Commerce"},
     *      summary="Get All Commerces",
     *      description="Return Commerces",
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
    public function index()
    {
        return $this->CommerceQuery->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '';
    }

    /**
     * @OA\Post(
     *      path="/commerce/store",
     *      operationId="storeCommerce",
     *      tags={"Commerce"},
     *      summary="Store Commerce",
     *      description="Store Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Commerce")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function store(Request $request)
    {
        return $this->CommerceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/commerce/display/{id}",
     *      operationId="getNameCommerce",
     *      tags={"Commerce"},
     *      summary="Get One NameCommerce",
     *      description="Return Commerces",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
    public function display(Request $request, $id)
    {
        return $this->CommerceQuery->display($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/commerce/showByCommerceId/{id}",
     *      operationId="getCommerceByUserId",
     *      tags={"Commerce"},
     *      summary="Get One Commerce By one UserId",
     *      description="Return One Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
    public function showByCommerceId(Request $request, $id)
    {
        return $this->CommerceQuery->showByCommerceId($request, $id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return '';
    }

    /**
     * @OA\Delete(
     *      path="/commerce/destroy/{id}",
     *      operationId="getCommerceByUserId",
     *      tags={"Commerce"},
     *      summary="Delete One Commerce By one Id",
     *      description="Delete One Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="User Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
    public function destroy($id)
    {
        return $this->CommerceQuery->destroy($id);
    }
}
