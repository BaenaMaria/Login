@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Plataforma') }}</div>

                <div class="card-body">
                    <form action = "{{route('plataforma.update', $plataforma)}}" method="POST" name='form'>
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="name"  value="{{$plataforma->id}}"class="col-md-4 col-form-label text-md-end">{{ __('Id')}} </label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{$plataforma->id}}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$plataforma->name}}" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar plataforma') }}
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
