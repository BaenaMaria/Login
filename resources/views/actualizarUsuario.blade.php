@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuario') }}</div>

                <div class="card-body">
                    <form action = "{{route('usuario.update', $user)}}" method="POST" name='form'>
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="name"  value="{{$user->id}}"class="col-md-4 col-form-label text-md-end">{{ __('Id')}} </label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{$user->id}}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="phone" autofocus value="{{$user->phone}}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="DNI" class="col-md-4 col-form-label text-md-end">DNI</label>

                            <div class="col-md-6">
                                <input id="DNI" type="text" class="form-control" name="DNI"  value="{{$user->DNI}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-select">
                                    <option selected disable hidden value="{{$user->role}}">{{$user->role}}</option>
                                    <option value="administrador">administrador</option>
                                    <option value="usuario">usuario</option>

                                </select>


                            </div>
                        </div>


                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar usuario') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
