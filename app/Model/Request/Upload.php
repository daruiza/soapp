<?php

/**
 * @OA\Schema(
 *      title="Upload",
 *      description="Upload body data",
 *      type="object"
 * )
 */
class Upload
{
    /**
     * @OA\Property(
     *      title="folder",
     *      description="Ubication Image",
     *      example=""
     * )
     *
     * @var string
     */
    public $folder;

    /**
     * @OA\Property(
     *      title="file",
     *      property="file",
     *      description="File to Upload",
     *      type="file",
     *     
     * )
     *
     * @var string
     */
    public $file;
}
