<?php

/**
 * @OA\Schema(
 *      title="EvidenceUpdate",
 *      description="EvidenceUpdate body data",
 *      type="object"
 * )
 */
class EvidenceUpdate
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
     *      description="approved of the evidence",
     *      example=1
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