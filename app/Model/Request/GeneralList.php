<?php

/**
 * @OA\Schema(
 *      title="GeneralList",
 *      description="GeneralList body data",
 *      type="object"
 * )
 */
class GeneralList
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the General List",
     *      example="Sexo"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="value",
     *      description="value of the General List",
     *      example="Femenino"
     * )
     *
     * @var string
     */
    public $value;


}
