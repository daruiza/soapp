<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;


class DocumentType extends Model
{
    protected $table = 'document_type';
    protected $fillable = 
    [
        'id',
        'iso',
        'description',
    ];

    

}
