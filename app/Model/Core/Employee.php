<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

//use App\Model\Core\Invoice;
use App\Model\Core\Commerce;
use App\User;

class Employee extends Model
{
    protected $table = 'customers';
    protected $fillable =
    [
        'id',
        'user_id',
        'commerce_id',
    ];

    /*un customer puede estar en muchas invoices
	public function invoices(){
        return $this->hasMany(Invoice::class);
    }*/

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function commerce()
    {
        return $this->hasOne(Commerce::class, 'id', 'commerce_id');
    }
}
