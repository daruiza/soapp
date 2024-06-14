<?php

/**
 * @OA\Schema(
 *      title="EmployeeEvidence",
 *      description="EmployeeEvidence body data",
 *      type="object"
 * )
 */
class EmployeeEvidence
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the EmployeeEvidence",
     *      example="FileName"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="file",
     *      description="File of the EmployeeEvidence",
     *      example="FileHostingName"
     * )
     *
     * @var string
     */
    public $file;

    /**
     * @OA\Property(
     *      title="type",
     *      description="Type File",
     *      example="image/jpeg"
     * )
     *
     * @var string
     */
    public $type;


    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the EmployeeEvidence",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="employee_report_id",
     *      description="employee_report_id of the EmployeeEvidence",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $employee_report_id;

}