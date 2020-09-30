<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'surname',
        'dob',
        'company',
        'position',
        'email',
        'number'
    ];
}
