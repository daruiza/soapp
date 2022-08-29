<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['name','description','label','active'];

	//un rol lo pueden tener muchos usuarios
	public function users(){
		//no usa el namespace
        return $this->hasMany('App\User');
    }

    public function options(){
    	//reutiliza el namespace
        return $this->belongsToMany(Option::class);
    }

}
