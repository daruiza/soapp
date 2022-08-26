<?php
/**
 * @OA\Schema(
 *      title="User",
 *      description="User body data",
 *      type="object"
 * )
 */
class User {
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
}