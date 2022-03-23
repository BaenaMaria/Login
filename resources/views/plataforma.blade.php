@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Plataforma</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('plataforma.create') }}" id ="form">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{-- @error('name') is-invalid @enderror"--}} name="name" value="{{ old('name') }}" {{--required --}} autocomplete="name" autofocus>

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Añadir Plataforma
                                </button>
                                <br>
                                <br>
                                <p id="msg"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
                document.getElementById('form').addEventListener('submit',
                    manejadorValidacion)
            });
    var msg = document.getElementById('msg');
    var name = document.getElementById('name').value;

    msg.innerText = '';

    if (name.length == 0) {
                    console.log('El nombre está vacío');
                    msg.innerText = 'Debes escribir un nombre';
                    return false;
                }
                if (!/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+$/i.test(name)) {
                    console.log('Nombre mal escrito');
                    msg.innerText = 'El nombre solo debe contener letras';
                    return false;
                }
                this.submit();

</script>

@endsection
