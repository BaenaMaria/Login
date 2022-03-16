<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\LoginUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('id', 'desc')->paginate();
        return view('listaUsuario', compact('users'));
    }

    public function store(LoginUser $request){
        $user = User::create($request->all());
    }

    public function update(UpdateUser $request, User $user){

        $user->update($request->all());
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('listaUsuario', $user);
    }
}
