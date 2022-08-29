<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['name','description'];

	//un rol lo pueden tener muchos usuarios
	public function users(){
		//no usa el namespace
        return $this->hasMany('App\User');
    }    

}
