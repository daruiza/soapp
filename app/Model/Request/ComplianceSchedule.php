<?php

/**
 * @OA\Schema(
 *      title="ComplianceSchedule",
 *      description="ComplianceSchedule body data",
 *      type="object"
 * )
 */
class ComplianceSchedule
{
    /**
     * @OA\Property(
     *      title="company",
     *      description="Company of the ComplianceSchedule",
     *      example="Cliente"
     * )
     *
     * @var string
     */
    public $company;

    /**
     * @OA\Property(
     *      title="planned_activities",
     *      description="planned_activities ComplianceSchedule",
     *      example="0"
     * )
     *
     * @var numeric
     */
    public $planned_activities;

    /**
     * @OA\Property(
     *      title="executed_activities",
     *      description="executed_activities ComplianceSchedule",
     *      example="0"
     * )
     *
     * @var numeric
     */
    public $executed_activities;

    /**
     * @OA\Property(
     *      title="compliance",
     *      description="compliance ComplianceSchedule",
     *      example="0"
     * )
     *
     * @var numeric
     */
    public $compliance;  
    
    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved",
     *      example="0"
     * )
     *
     * @var boolean
     */
    public $approved;

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the ComplianceSchedule",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
