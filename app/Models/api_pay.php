<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api_pay extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $fillable=['id_pay','phone', 'reference', 'status', 'date_pay'];
}
