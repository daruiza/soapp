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
     *      title="id",
     *      description="Id of the Report",
     *      example="1"
     * )
     *
     * @var string
     */
    public $id;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Report",
     *      example="jajfja jajajaj"
     * )
     *
     * @var string
     */
    public $name;
}
