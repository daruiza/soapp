<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEquipementMaintenanceEvidenceQuery;

class EquipementMaintenanceEvidenceController extends Controller
{
    private $EquipementMaintenanceEvidenceQuery;

    public function __construct(IEquipementMaintenanceEvidenceQuery $EquipementMaintenanceEvidenceQuery)
    {
        $this->EquipementMaintenanceEvidenceQuery = $EquipementMaintenanceEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/equipementmaintenanceevidence/store",
     *      operationId="storeEvidence",
     *      tags={"EquipementMaintenanceEvidence"},
     *      summary="Store Equipement Maintenance Evidence Report",
     *      description="Store Equipement Maintenance Evidence Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EquipementMaintenanceEvidence")
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
        return $this->EquipementMaintenanceEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/equipementmaintenanceevidence/showbyequipementmaintenanceevidenceid/{id}",
     *      operationId="get Equipement Maintenance Evidence",
     *      tags={"EquipementMaintenanceEvidence"},
     *      summary="Get One Equipement Maintenance Evidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Equipement Maintenance Evidence evedence Id",
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
    public function showByEquipementMaintenanceEvidenceId(Request $request, $id)
    {
        return $this->EquipementMaintenanceEvidenceQuery->showByEquipementMaintenanceEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/equipementmaintenanceevidence/showbyequipementmaintenanceid/{id}",
     *      operationId="get SupportGroupEvidences",
     *      tags={"EquipementMaintenanceEvidence"},
     *      summary="Get One Equipement Maintenance Evidence",
     *      description="Return Equipement Maintenance Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="SupportGroupActivity Id",
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
    public function showByEquipementMaintenanceId(Request $request, $id)
    {
        return $this->EquipementMaintenanceEvidenceQuery->showByEquipementMaintenanceId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/equipementmaintenanceevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"EquipementMaintenanceEvidence"},
     *      summary="Update One Equipement Maintenance Evidence By one Id",
     *      description="Update One Equipement Maintenance Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Equipement Maintenance Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EquipementMaintenanceEvidence")
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
        return $this->EquipementMaintenanceEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/equipementmaintenanceevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"EquipementMaintenanceEvidence"},
     *      summary="Delete One Equipement Maintenance Evidence By one Id",
     *      description="Delete One Equipement Maintenance Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Equipement Maintenance Evidence Id",
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
        return $this->EquipementMaintenanceEvidenceQuery->destroy($id);
    }



}