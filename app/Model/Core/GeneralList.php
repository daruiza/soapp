<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class GeneralList extends Model
{
    protected $table = 'general_lists';
    protected $fillable =
    [
        'id',
        'name',
        'value',
    ];

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', $id);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE',  $name);
    }
}
