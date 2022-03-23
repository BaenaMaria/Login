@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>


                <div class="card-body">
                    <form method="POST" name='form' id='form'>
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="name" value="{{ old('name') }}" {{--required autocomplete="name" --}}autofocus>


                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input   id="phone" type="tel" class="form-control  value="{{ old('phone') }}" {{--required autocomplete="phone"--}}  autofocus>


                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="DNI" class="col-md-4 col-form-label text-md-end" >DNI</label>

                            <div class="col-md-6">
                                <input id="DNI" type="text" class="form-control" name="DNI" value="{{ old('DNI') }}" {{--required autocomplete="DNI"--}} autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control  {{--@error('email') is-invalid @enderror" --}}name="email" value="{{ old('email') }}" {{--required autocomplete="email"--}}>

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"{{--@error('password') is-invalid @enderror"--}} name="password"  {{--required autocomplete="new-password"--}}>

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{--required autocomplete="new-password"--}}>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-select" {{--required--}}>

                                    <option value="usuario">usuario</option>
                                    <option value="administrador">administrador</option>

                                </select>

                                {{-- @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            </div>
                        </div>


                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
    var phone = document.getElementById('phone').value;
    var dni = document.getElementById('DNI').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password-confirm').value;
    var role = document.getElementById('role').value;


    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    var expresion = /\w+@\w+\.+[a-z]/;
    var alfan = /^[a-zA-Z0-9]$/

    msg.innerText = '';
    dni = dni.toUpperCase();


    function manejadorValidacion(e) {
                e.preventDefault();
        if (name.length == 0) {
            console.log('El nombre está vacío');
            msg.innerText = 'El nombre no puede ir vacío';
            return false;
                    }
        if (!/^([1-9])+$/i.test(name)) {
            console.log('Nombre mal escrito');
            msg.innerText = 'El nombre solo debe contener letras';
            return false;
        }

        if (phone.length != 9) {
            console.log('El phone no es válido');
            msg.innerText = 'Debes escribir un phone válido de 9 dígitos';
            return false;
        }
        if (isNaN(phone)) {
            console.log('El phone no es válido');
            msg.innerText = 'El phone debe estar compuesto dígitos';
            return false;

        }
        if (dni!=""|| expresion_regular_dni.test(dni) === true) {
            numero = dni.substr(0, dni.length - 1);
            numero = numero.replace('X', 0);
            numero = numero.replace('Y', 1);
            numero = numero.replace('Z', 2);

            let = dni.substr(dni.length - 1, 1);

            numero = numero % 23;

            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero + 1);

            if (letra != let) {
                console.log('El DNI no es válido');
                msg.innerText = 'El DNI no es válido';
            }
            else {

            }

        } else {
            console.log('El DNI no es válido');
                msg.innerText = 'El DNI no es válido ';
        }
        if (email.length == 0) {
                    console.log('El email no es válido');
                    msg.innerText = 'Debes escribir un email válido';
                    return false;
                }

        if (!expresion.test(email)) {
            console.log('Formato de email no valido');
            msg.innerText = "El correo no es valido";
            return false;
        }
        if (password.length < 8) {
                    console.log('El formato de password no es válido');
                    msg.innerText = 'Debes escribir un contraseña mayor 8 letras y/o números';
                    return false;
        }
        if (password2.length < 8) {
            console.log('El formato de password no es válido');
            msg.innerText = 'Debes escribir un contraseña mayor 8 letras y/o números';
            return false;
        }
        if (password!=password2) {
            console.log('El formato de password no es válido');
            msg.innerText = 'La contraseña y la confirmación de la contraseña no coinciden';
            return false;
        }
        if (!alfan.test(password)) {
            console.log('El formato de password no es válido');
            msg.innerText = 'La contraseña debe contener al menos un dígito, al menos una letra en mayúsculas y al menos una letra en minúsculas';
            return false;
        }
        if (role == "") {
            console.log('El role no es válido');
            msg.innerText = 'Debes seleccionar un rol';
            return false;
        }



       msg.innerText = 'Todo los datos introducidos son correctos';
    }
    this.submit();

</script>

@endsection
