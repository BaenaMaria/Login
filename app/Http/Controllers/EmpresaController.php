<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginEmpresa;
use App\Http\Requests\UpdateEmpresa;
use Illuminate\Http\Request;
use App\Models\Empresa;


class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::ordeby('id', 'desc')->paginate();
    }
    public function store(LoginEmpresa $request)
    {
        $empresa = Empresa::create($request->all());

    }
    public function update(UpdateEmpresa $request, Empresa $empresa)
    {
        $empresa->update($request->all());
    }


    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}
