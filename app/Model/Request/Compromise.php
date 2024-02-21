<?php

/**
 * @OA\Schema(
 *      title="Compromise",
 *      description="Compromise body data",
 *      type="object"
 * )
 */
class Compromise
{
    /**
     * @OA\Property(
     *      title="item",
     *      description="Item de Compromiso",
     *      example="4.15"
     * )
     *
     * @var string
     */
    public $item;

    /**
     * @OA\Property(
     *      title="rule",
     *      description="Norma de Compromiso",
     *      example="SGI"
     * )
     *
     * @var string
     */
    public $rule;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Nombre de Compromiso",
     *      example="Responsable de SGT"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="detail",
     *      description="Detalle de Compromiso",
     *      example="ACTAS DE CONTROL INTERNO"
     * )
     *
     * @var string
     */
    public $detail;

    /**
     * @OA\Property(
     *      title="canon",
     *      description="Criterio de Compromiso",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $canon;

    /**
     * @OA\Property(
     *      title="approved",
     *      description="approvedg Compromise SST",
     *      example=0
     * )
     *
     * @var boolean
     */
    public $approved;

    /**
     * @OA\Property(
     *      title="dateinit",
     *      description="Fecha de apertura",
     *      example="2023-09-01"
     * )
     *
     * @var date
     */
    public $dateinit;


    /**
     * @OA\Property(
     *      title="dateclose",
     *      description="Fecha de cierre",
     *      example="2023-09-30"
     * )
     *
     * @var date
     */
    public $dateclose;
    

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the Compromisw SST",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
