<?php

/**
 * @OA\Schema(
 *      title="UserUpdate",
 *      description="UserUpdate body data",
 *      type="object"
 * )
 */
class UserUpdate
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the user",
     *      example="super"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="super@yopmail.com"
     * )
     *
     * @var string
     */
    public $email;


    /**
     * @OA\Property(
     *      title="lastname",
     *      description="Lastname of the user",
     *      example="LastName"
     * )
     *
     * @var string
     */
    public $lastname;

    /**
     * @OA\Property(
     *      title="phone",
     *      description="phone of the user",
     *      example=3194062550
     * )
     *
     * @var numeric
     */
    public $phone;

     /**
     * @OA\Property(
     *      title="theme",
     *      description="theme of the user",
     *      example="blue"
     * )
     *
     * @var string
     */
    public $theme;

    /**
     * @OA\Property(
     *      title="photo",
     *      description="photo of the user",
     *      example="avatar"
     * )
     *
     * @var string
     */
    public $photo;

    /**
     * @OA\Property(
     *      title="rol_id",
     *      description="rol_id of the user",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $rol_id;

}
