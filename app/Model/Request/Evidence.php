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
     *      description="Name of the Evidence",
     *      example="FileName"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="file",
     *      description="File of the Evidence",
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
     *      description="approved of the Evidence",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="report_id",
     *      description="report_id of the Evidence",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $report_id;

}