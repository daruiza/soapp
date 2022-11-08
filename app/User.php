<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'theme',
        'photo',
        'lastname',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeLastname($query, $lastname)
    {
        return is_null($lastname) ?  $query : $query->where('lastname', 'LIKE', '%' . $lastname . '%');
    }

    public function scopePhone($query, $phone)
    {
        return is_null($phone) ?  $query : $query->where('phone', 'LIKE', '%' . $phone . '%');
    }

    public function scopeEmail($query, $email)
    {
        return is_null($email) ?  $query : $query->where('email', 'LIKE', '%' . $email . '%');
    }

    public function scopeRol_id($query, $rolid)
    {
        return is_null($rolid) ?  $query : $query->where('rol_id', $rolid);
    }

    //un usuario posee/pertenece un rol
    public function rol()
    {
        return $this->belongsTo(Model\Admin\Rol::class);
    }

    //a user may belongs a commerce or is owner to commerce
    public function commerce()
    {
        return $this->hasOne(Model\Core\Commerce::class);
    }
}
