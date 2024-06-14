<?php

/**
 * @OA\Schema(
 *      title="EquipementMaintenance",
 *      description="EquipementMaintenance body data",
 *      type="object"
 * )
 */
class EquipementMaintenance
{

    /**
     * @OA\Property(
     *      title="buildings",
     *      description="buildings of the equipement maintenence",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $buildings;

    /**
     * @OA\Property(
     *      title="tools",
     *      description="tools of the equipement maintenence",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $tools;

    /**
     * @OA\Property(
     *      title="teams",
     *      description="teams of the equipement maintenence",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $teams;

    /**
     * @OA\Property(
     *      title="date",
     *      description="Fecha Ejecución",
     *      example="2023-09-01"
     * )
     *
     * @var date
     */
    public $date;

    /**
     * @OA\Property(
     *      title="observations",
     *      description="Observaciones",
     *      example="Obsvaciones"
     * )
     *
     * @var string
     */
    public $observations;

    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the equipement maintenence",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;
        

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the SupporteGroup",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
