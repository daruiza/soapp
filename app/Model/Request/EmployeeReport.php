<?php

/**
 * @OA\Schema(
 *      title="EmployeeReport",
 *      description="EmployeeReport body data",
 *      type="object"
 * )
 */
class EmployeeReport
{


    /**
     * @OA\Property(
     *      title="object",
     *      description="Object of the EmployeeReport",
     *      example="{}"
     * )
     *
     * @var string
     */
    public $object;

    /**
     * @OA\Property(
     *      title="employee_state",
     *      description="employee_state of the Employee",
     *      example="Pendiente"
     * )
     *
     * @var string
     */
    public $employee_state;

    /**
     * @OA\Property(
     *      title="employee_id",
     *      description="employee_id of the Employee",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $employee_id;

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the Report",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
