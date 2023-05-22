<?php

/**
 * @OA\Schema(
 *      title="Evidence",
 *      description="Evidence body data",
 *      type="object"
 * )
 */
class Evidence
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the evidence",
     *      example="FileName"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="file",
     *      description="File of the evidence",
     *      example="FileHostingName"
     * )
     *
     * @var string
     */
    public $file;


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
     *      title="employee_report_id",
     *      description="employee_report_id of the Evidence",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $employee_report_id;

}