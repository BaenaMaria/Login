@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('You are logged in!') }}




                    @if (Auth::user()->role =="administrador" || Auth::user()->role =="superAdministrador")


                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('register') }}" >Registro de usuarios</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('plataforma.reg') }}">Registro de plataforma</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('listaUsuario') }}" >Lista de usuarios</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('listaPlataforma') }}">Lista de plataformas</a></div>

                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
