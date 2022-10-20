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
     *      path="/generallist/showbyname/{name}",
     *      operationId="get General List By Name",
     *      tags={"generallist"},
     *      summary="Get General List By Name",
     *      description="Return General List",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="name",
     *          description="General List Name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="strig"
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
    public function showByName(Request $request, $name)
    {
        return $this->GeneralListQuery->showByName($request, $name);
    }
}
