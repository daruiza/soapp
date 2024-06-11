<?php

/**
 * @OA\Schema(
 *      title="Activity",
 *      description="Training body data",
 *      type="object"
 * )
 */
class Activity
{
    /**
     * @OA\Property(
     *      title="activity",
     *      description="Activity",
     *      example="Otra Actividad"
     * )
     *
     * @var string
     */
    public $activity;

    /**
     * @OA\Property(
     *      title="date",
     *      description="date of the Training SST",
     *      example="2023-09-01"
     * )
     *
     * @var date
     */
    public $date;

    
    /**
     * @OA\Property(
     *      title="approved",
     *      description="approvedg Training SST",
     *      example=0
     * )
     *
     * @var boolean
     */
    public $approved;

    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the Training SST",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;


}
