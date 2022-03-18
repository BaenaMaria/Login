<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = ['name','phone', 'email', 'password', 'DNI','role'];
    public function authorize()

    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'numeric|required|unique:users',
            'phone' => 'required|digits:9|numeric',
            'email' => 'required| email:rfc,dns' ,
            'password' => 'required',
            'DNI' => 'required |max:9 |min:9 | unique:users',
            'role' => 'required|in:usuario,administrador,superAdministrador',


        ];
    }
}
