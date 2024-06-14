<?php

/**
 * @OA\Schema(
 *      title="SupportGroupActivity",
 *      description="SupportGroupActivity body data",
 *      type="object"
 * )
 */
class SupportGroupActivity
{
    /**
     * @OA\Property(
     *      title="support_group",
     *      description="Grupo de Apoyo",
     *      example="COPASST"
     * )
     *
     * @var string
     */
    public $support_group;

    /**
     * @OA\Property(
     *      title="date_meet",
     *      description="Fecha de Reunión",
     *      example="2023-09-01"
     * )
     *
     * @var date
     */
    public $date_meet;

    /**
     * @OA\Property(
     *      title="responsible",
     *      description="Responsable",
     *      example="Cliente001"
     * )
     *
     * @var string
     */
    public $responsible;

    /**
     * @OA\Property(
     *      title="tasks_copasst",
     *      description="Tareas de COPASST",
     *      example="Tarea01,tarea02"
     * )
     *
     * @var string
     */
    public $tasks_copasst;

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
