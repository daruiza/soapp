<?php

/**
 * @OA\Schema(
 *      title="SupportGroupActivityEvidence",
 *      description="SupportGroupActivityEvidence body data",
 *      type="object"
 * )
 */
class SupportGroupActivityEvidence
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
     *      title="support_group_id",
     *      description="support_group_id of the SupportGroup",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $support_group_id;

}