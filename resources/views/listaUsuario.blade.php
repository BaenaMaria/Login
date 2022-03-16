@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de usuarios</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                {{$user->id}}-{{$user->name}}, {{$user->email}}, {{$user->DNI}}, {{$user->role}}
                                <form action="{{route('destroy', $user)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button  class="btn btn-danger" type="submit"><b>-</b>Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{route('welcome')}}" class="btn btn-primary" role="button">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
