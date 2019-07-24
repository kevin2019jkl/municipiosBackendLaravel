<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Http\Requests\departamentoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class departamentoController extends Controller
{
     //devuelve todos los municipios
     public function getAll(){
        $departamento=Departamento::select('id', 'name')->get();
        return $departamento;
    }

    //agrega un nuevo municipio
    public function add(departamentoRequest $request){
         $departamento=Departamento::create($request->all());
         return $departamento;
    }

    //devuelve un municipio segun el codigo depto especificado
    public function get($codigo_depto){
         $departamento=Departamento::find($codigo_depto)->get(array('id', 'name'))->toArray();
        return $departamento;
    }
}
