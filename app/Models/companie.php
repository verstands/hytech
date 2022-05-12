<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companie extends Model
{
    use HasFactory;
    public $timestamps=false;
	public $fillable=['id_eg ','nom', 'logo', 'active', 'lien', 'des', 'tel'];
}
