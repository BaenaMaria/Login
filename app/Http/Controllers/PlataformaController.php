<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginEmpresa;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlataformaController extends Controller
{

    protected function index()
    {
        $plataformas = Plataforma::all();

    }

    protected function register()
    {
        return view('plataforma');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:255',],


        ]);
    }
    protected function create(LoginEmpresa $request)
    {
        $plataforma= Plataforma::create($request->all());
        return view ('welcome');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

}