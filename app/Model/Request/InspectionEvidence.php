<?php

/**
 * @OA\Schema(
 *      title="InspectionEvidence",
 *      description="InspectionEvidence body data",
 *      type="object"
 * )
 */
class InspectionEvidence
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
     *      title="inspection_id",
     *      description="inspection_id of the Evidence",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $inspection_id;

}