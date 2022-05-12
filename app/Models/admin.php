<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_admin ','login', 'type_admin','password', 'email', 'active', 'id_eg'];
}
