<?php

/**
 * @OA\Schema(
 *      title="Trainingsst",
 *      description="Training body data",
 *      type="object"
 * )
 */
class Trainingsst
{
    /**
     * @OA\Property(
     *      title="topic",
     *      description="Topic of the Training SST",
     *      example="Educación Organizacional"
     * )
     *
     * @var string
     */
    public $topic;

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
     *      title="hours",
     *      description="how long was the Training SST",
     *      example="0"
     * )
     *
     * @var number
     */
    public $hours;

    /**
     * @OA\Property(
     *      title="assistants",
     *      description="how many was in the Training SST",
     *      example="0"
     * )
     *
     * @var numeric
     */
    public $assistants;

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
