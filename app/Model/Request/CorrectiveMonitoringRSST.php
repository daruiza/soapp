<?php

/**
 * @OA\Schema(
 *      title="CorrectiveMonitoringRSST",
 *      description="CorrectiveMonitoringRSST body data",
 *      type="object"
 * )
 */
class CorrectiveMonitoringRSST
{
    /**
     * @OA\Property(
     *      title="work",
     *      description="Obra/Frente/Area de Corrective",
     *      example="Administración"
     * )
     *
     * @var string
     */
    public $work;

    /**
     * @OA\Property(
     *      title="corrective_action",
     *      description="corrective_action de la Corrective",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $corrective_action;

    /**
     * @OA\Property(
     *      title="date",
     *      description="Propused Date de la Corrective",
     *      example="2023-09-01"
     * )
     *
     * @var date
     */
    public $date;

    /**
     * @OA\Property(
     *      title="executed",
     *      description="Ejecutada",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $executed;

    /**
     * @OA\Property(
     *      title="observations",
     *      description="Observaciones de las Corrective",
     *      example="Observaciones"
     * )
     *
     * @var string
     */
    public $observations;    

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the Inspection SST",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
