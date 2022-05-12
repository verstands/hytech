<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devise extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_devise','type_d'];
}
