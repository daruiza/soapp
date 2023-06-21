<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IGeneralListQuery;
use Illuminate\Http\Request;

class GeneralListController extends Controller
{
    private $GeneralListQuery;

    public function __construct(IGeneralListQuery $GeneralListQuery)
    {
        $this->GeneralListQuery = $GeneralListQuery;
    }

    /**
     * @OA\Get(
     *      path="/generallist/index",
     *      operationId="getGenarallist",
     *      tags={"generallist"},
     *      summary="Get All General List",
     *      description="Return General List",
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
    public function index(Request $request)
    {
        return $this->GeneralListQuery->index($request);
    }

    /**
     * @OA\Get(
     *      path="/generallist/showbyid/{id}",
     *      operationId="get General List By Id",
     *      tags={"generallist"},
     *      summary="Get one General List By Id",
     *      description="Return one General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="General List Id",
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
    public function showById(Request $request, $id)
    {
        return $this->GeneralListQuery->showById($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/generallist/showbyname",
     *      operationId="get General List By Name",
     *      tags={"generallist"},
     *      summary="Get General List By Name",
     *      description="Return General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="name",
     *          description="General List Name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
    public function showByName(Request $request)
    {
        return $this->GeneralListQuery->showByName($request);
    }

    /**
     * @OA\Get(
     *      path="/generallist/showbynamelist",
     *      operationId="get General List By Name List",
     *      tags={"generallist"},
     *      summary="Get General List By Name",
     *      description="Return General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="name",
     *          description="General List Name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
    public function showByNameList(Request $request)
    {
        return $this->GeneralListQuery->showByNameList($request);
    }    

    /**
     * @OA\Post(
     *      path="/generallist/store",
     *      operationId="store General List",
     *      tags={"generallist"},
     *      summary="Store General List",
     *      description="Store General List",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/GeneralList")
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
        return $this->GeneralListQuery->store($request);
    }

     /**
     * @OA\Delete(
     *      path="/generallist/destroy/{id}",
     *      operationId="DestroyGeneralListById",
     *      tags={"generallist"},
     *      summary="Delete One General List By one Id",
     *      description="Delete One General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="General List Id",
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
        return $this->GeneralListQuery->destroy($id);
    }

    /**
     * @OA\Put(
     *      path="/generallist/update/{id}",
     *      operationId="UpdateGeneralListById",
     *      tags={"generallist"},
     *      summary="Update One General List By one Id",
     *      description="Update One General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="General List Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/GeneralList")
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
    public function update(Request $request, $id)
    {
        return $this->GeneralListQuery->update($request, $id);
    }
}
