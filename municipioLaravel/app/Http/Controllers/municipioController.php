<?php

namespace App\Http\Controllers;


use App\Municipio;
use App\Http\Requests\municipioRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Http\Request;

class municipioController extends Controller
{
      //devuelve todos los municipios
      public function getAll(){
        $municipio=Municipio::select('id', 'name')->get();
        return $municipio;
    }

    //agrega un nuevo municipio
    public function add(municipioRequest $request){
         $municipio=Municipio::create($request->all());
         return $municipio;
    }

    //devuelve un municipio segun el codigo depto especificado
    public function get($codigo_depto){
         $municipio=Municipio::where("codigo_depto","=",$codigo_depto)->get(array('id', 'name'))->toArray();
        return $municipio;
    }
}
