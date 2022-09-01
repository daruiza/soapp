<?php
/**
 * @OA\Schema(
 *      title="Employee",
 *      description="Employee body data",
 *      type="object"
 * )
 */
class Employee {
    /**
     * @OA\Property(
     *      title="user_id",
     *      description="user_id of the Employee",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $user_id;


    /**
     * @OA\Property(
     *      title="nit",
     *      description="commerce_id of the Employee",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $commerce_id;

}

