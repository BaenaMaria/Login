<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginEmpresa;
use App\Http\Requests\UpdateEmpresa;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlataformaController extends Controller
{

    protected function index()
    {
        $plataformas = Plataforma::all();
        return view('listaPlataforma', compact('plataformas'));

    }

    protected function reg()
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
        return redirect()->route('listaPlataforma');
    }


    public function destroy(Plataforma $plataforma){
        $plataforma->delete();
        return redirect()->route('listaPlataforma', $plataforma);
    }
    public function update(UpdateEmpresa $request, Plataforma $plataforma){


        $plataforma->name= $request->name;
        $plataforma->save();

        return redirect()->route('listaPlataforma');

    }
    public function edit(Plataforma $plataforma)
    {
        return view('actualizarPlataforma', compact('plataforma'));

    }


    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

}
