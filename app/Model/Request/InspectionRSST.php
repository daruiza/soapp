<?php

/**
 * @OA\Schema(
 *      title="InspectionRSST",
 *      description="InspectionRSST body data",
 *      type="object"
 * )
 */
class InspectionRSST
{
    /**
     * @OA\Property(
     *      title="work",
     *      description="Obra/Frente/Area de Inspección",
     *      example="Administración"
     * )
     *
     * @var string
     */
    public $work;

    /**
     * @OA\Property(
     *      title="machines",
     *      description="Maquinas y Equió de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $machines;

    /**
     * @OA\Property(
     *      title="vehicles",
     *      description="Vehiculos de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $vehicles;

    /**
     * @OA\Property(
     *      title="tools",
     *      description="Herramientas de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $tools;

    /**
     * @OA\Property(
     *      title="epp",
     *      description="EPP de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $epp;

    /**
     * @OA\Property(
     *      title="cleanliness",
     *      description="Orden y Aseo de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $cleanliness;

    /**
     * @OA\Property(
     *      title="chemicals",
     *      description="Sustancias Quimicas de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $chemicals;

    /**
     * @OA\Property(
     *      title="risk_work",
     *      description="Trabajos de Ato Riesgo de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $risk_work;

    /**
     * @OA\Property(
     *      title="emergency_item",
     *      description="Elementos de emergencia de la Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $emergency_item;

    /**
     * @OA\Property(
     *      title="other",
     *      description="Otra Inspección",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $other;
    

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
