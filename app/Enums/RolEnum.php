<?php

namespace App\Enums;

/* NO funciono, posible versión PHP
enum RolEnum {
    case SUPERADMIN = '1';
    case CLIENTE = '2';
    case AGENTE = '3';    
}
*/

class RolEnum
{
    private static $ROL = array(
        'SUPERADMIN' => 1,
        'CLIENTE' => 2,
        'AGENTE' => 3,
    );

    public static function rol(string $rol){
        return self::$ROL[$rol];        
    }    
    
}



