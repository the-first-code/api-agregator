<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiProvider extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'base_url',
    	'status',
    	'credentials',
    ];
}
