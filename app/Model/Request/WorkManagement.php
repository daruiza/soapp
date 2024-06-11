<?php

/**
 * @OA\Schema(
 *      title="WorkManagement",
 *      description="WorkManagement body data",
 *      type="object"
 * )
 */
class WorkManagement
{
    /**
     * @OA\Property(
     *      title="activity",
     *      description="Activity",
     *      example="En Alturas"
     * )
     *
     * @var string
     */
    public $activity;

    /**
     * @OA\Property(
     *      title="work_type",
     *      description="Tipos de Trabajo",
     *      example="Work"
     * )
     *
     * @var string
     */
    public $work_type;

    /**
     * @OA\Property(
     *      title="workers_activity",
     *      description="# trabajadores en la actividad",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $workers_activity;

    /**
     * @OA\Property(
     *      title="workers_trained",
     *      description="# trabajadores capacitados",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $workers_trained;
    
    /**
     * @OA\Property(
     *      title="permissions",
     *      description="Permisos",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $permissions;

    /**
     * @OA\Property(
     *      title="observations",
     *      description="Observaciones",
     *      example="OBS"
     * )
     *
     * @var string
     */
    public $observations;

    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the evidence",
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
