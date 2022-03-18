<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $fillable = ['name', 'email', 'password', 'DNI','role'];
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
            'name'=>[Rule::unique('users')->ignore($this->user)],
            'phone' => 'required|digits:9|numeric',
            'email' => 'required ',
            'role' => 'required|in:usuario,administrador,superAdministrador',
            'DNI' => 'required |max:9 |min:9',
            'DNI'=>[Rule::unique('users')->ignore($this->user)]
        ];
    }
 }

