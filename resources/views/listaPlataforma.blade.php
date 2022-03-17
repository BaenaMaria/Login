@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de plataformas</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($plataformas as $plataforma)
                            <li class="list-group-item">
                                <div>
                                    {{$plataforma->id}}-{{$plataforma->name}}
                                </div>
                               <div>
                                <form action="{{route('plataformaDestroy', $plataforma)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button  class="btn btn-danger" type="submit">Eliminar</button>

                                    <div
                                        <button type="button" class="btn btn-warning">Modificar</button>
                                    </div>
                                </form>
                               </div>



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
