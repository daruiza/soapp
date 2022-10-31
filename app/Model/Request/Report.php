<?php

/**
 * @OA\Schema(
 *      title="Report",
 *      description="Report body data",
 *      type="object"
 * )
 */
class Report
{
     /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Report",
     *      example="primer reporte"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *      title="project",
     *      description="project of the Report",
     *      example="Caida"
     * )
     *
     * @var string
     */
    public $project;


    /**
     * @OA\Property(
     *      title="responsible",
     *      description="Responsible of the Report",
     *      example="David"
     * )
     *
     * @var string
     */
    public $responsible;

    /**
     * @OA\Property(
     *      title="email_responsible",
     *      description="email_responsible of the Report",
     *      example="david@gmail.com"
     * )
     *
     * @var string
     */
    public $email_responsible;

    /**
     * @OA\Property(
     *      title="phone_responsible",
     *      description="phone_responsible of the Report",
     *      example="123456789"
     * )
     *
     * @var string
     */
    public $phone_responsible;

    /**
     * @OA\Property(
     *      title="date",
     *      description="date of the Report",
     *      example="2020-01-01"
     * )
     *
     * @var date
     */
    public $date;

    /**
     * @OA\Property(
     *      title="commerce_id",
     *      description="commerce_id of the Report",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $commerce_id;
}
