<?php

/**
 * @OA\Schema(
 *      title="EmployeeUpdate",
 *      description="EmployeeUpdate body data",
 *      type="object"
 * )
 */
class EmployeeUpdate
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Employee",
     *      example="David"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="lastname",
     *      description="Lastname of the Employee",
     *      example="Ruiz"
     * )
     *
     * @var string
     */
    public $lastname;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the Employee",
     *      example="super@yopmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="birth_date",
     *      description="Birth_Date of the Employee",
     *      example="2022-01-01"
     * )
     *
     * @var date
     */
    public $birth_date;

    /**
     * @OA\Property(
     *      title="adress",
     *      description="adress of the Employee",
     *      example="Cll 60 # 75 - 150"
     * )
     *
     * @var string
     */
    public $adress;

    /**
     * @OA\Property(
     *      title="phone",
     *      description="phone of the Employee",
     *      example=3194062550
     * )
     *
     * @var numeric
     */
    public $phone;

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
}
