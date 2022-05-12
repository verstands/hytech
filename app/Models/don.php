<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class don extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_off ','type_off', 'id_eg'];
}
