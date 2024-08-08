<?php

/**
 * @OA\Schema(
 *      title="EmployeeDocumentation",
 *      description="EmployeeDocumentation body data",
 *      type="object"
 * )
 */
class EmployeeDocumentation
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the EmployeeDocumentation",
     *      example="FileName"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="file",
     *      description="File of the EmployeeDocumentation",
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
     *      description="approved of the EmployeeDocumentation",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="employee_id",
     *      description="employee_id of the EmployeeDocumentation",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $employee_id;

}