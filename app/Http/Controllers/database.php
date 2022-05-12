<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class database extends Controller
{
    public  function db(){
        $connect=Manager('root','localhost','company','');
    }
}
