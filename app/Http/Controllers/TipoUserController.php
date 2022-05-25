<?php

namespace App\Http\Controllers;

use App\Models\TipoUser;
use Illuminate\Http\Request;
use App\Http\Requests\TipoUserRequest;
use App\Http\Controllers\ApiController;

class TipoUserController extends ApiController
{
     public function index()
    {
        $tipousers = TipoUser::all();
        return $this->showAll($tipousers);

    }
    
     public function store(TipoUserRequest $request)
    {
    	$campos = $request->all();

        $tipoUser = TipoUser::create($campos);

        return $this->showOne($tipoUser, 201);
    }


   
}