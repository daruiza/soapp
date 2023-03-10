<?php

/**
 * @OA\Schema(
 *      title="EmployeeIndex",
 *      description="Employee body data Index",
 *      type="object"
 * )
 */
class EmployeeIndex
{

    /**
     * @OA\Property(
     *      title="employee_state",
     *      description="employee_state of the Employee",
     *      example="[10,23,45]"
     * )
     *
     * @var object
     */
    public $employee_state;

    
}
