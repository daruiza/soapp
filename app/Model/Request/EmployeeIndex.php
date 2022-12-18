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
     *      example="state"
     * )
     *
     * @var string
     */
    public $employee_state;

    
}
