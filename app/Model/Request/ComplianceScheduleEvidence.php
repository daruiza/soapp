<?php

/**
 * @OA\Schema(
 *      title="ComplianceScheduleEvidence",
 *      description="ComplianceScheduleEvidence body data",
 *      type="object"
 * )
 */
class ComplianceScheduleEvidence
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
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="compliance_schedule_id",
     *      description="compliance_schedule_id of the Compliance",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $compliance_schedule_id;

}