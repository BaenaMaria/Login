<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmpresa extends FormRequest
{


    protected $fillable = ['name'];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name' => 'numeric|required|unique:plataformas',
            'name'=>[Rule::unique('users')->ignore($this->plataforma)],
        ];
    }
}
