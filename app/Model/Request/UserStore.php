<?php

/**
 * @OA\Schema(
 *      title="UserStore",
 *      description="User body data",
 *      type="object"
 * )
 */
class UserStore
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
     *      title="password",
     *      description="Password of the user",
     *      example="0000"
     * )
     *
     * @var string
     */
    public $password;

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
     *      example=100394
     * )
     *
     * @var string
     */
    public $phone;

    

}