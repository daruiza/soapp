<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IEquipementMaintenanceQuery;
use Illuminate\Http\Request;

class EquipementMaintenanceController extends Controller
{
    private $EquipementMaintenanceQuery;

    public function __construct(IEquipementMaintenanceQuery $EquipementMaintenanceQuery)
    {
        $this->EquipementMaintenanceQuery = $EquipementMaintenanceQuery;
    }

    /**
     * @OA\Get(
     *      path="/equipementmaintenance/index",
     *      operationId="getEquipementMaintenance",
     *      tags={"EquipementMaintenance"},
     *      summary="Get All Equipement Maintenance",
     *      description="Return Equipement Maintenance",
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
        return $this->EquipementMaintenanceQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/equipementmaintenance/store",
     *      operationId="StoreEquipementMaintenance",
     *      tags={"EquipementMaintenance"},
     *      summary="Store A Equipement Maintenance",
     *      description="Store Equipement Maintenance",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EquipementMaintenance")
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
    public function store(Request $request)
    {
        return $this->EquipementMaintenanceQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/equipementmaintenance/update/{id}",
     *      operationId="getUpdateEquipementMaintenanceById",
     *      tags={"EquipementMaintenance"},
     *      summary="Update One Equipement Maintenance By one Id",
     *      description="Update One Equipement Maintenance",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Equipement Maintenance Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EquipementMaintenance")
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
        return $this->EquipementMaintenanceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/equipementmaintenance/destroy/{id}",
     *      operationId="getDestroyCorrectveById",
     *      tags={"EquipementMaintenance"},
     *      summary="Delete One Equipement Maintenance By one Id",
     *      description="Delete One Equipement Maintenance",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Equipement Maintenance Id",
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
        return $this->EquipementMaintenanceQuery->destroy($id);
    }

    /**
     * @OA\Get(
     *      path="/equipementmaintenance/showbyreportid/{id}",
     *      operationId="getEquipementMaintenanceById",
     *      tags={"EquipementMaintenance"},
     *      summary="Get One Equipement Maintenance By one Id",
     *      description="Return One Equipement Maintenance",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Report Id",
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
    public function showByReportId(Request $request, $id)
    {
        return $this->EquipementMaintenanceQuery->showByReportId($request, $id);
    }
}
