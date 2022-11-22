<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntregasController extends Controller
{
    function rotas(Request $request, $id){
        return $id;
    }
}
