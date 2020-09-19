<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'sirname',
        'dob',
        'company',
        'position',
        'email',
        'number'
    ];
}
