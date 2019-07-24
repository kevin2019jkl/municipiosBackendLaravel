<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\MessageBag;

class municipioRequest extends FormRequest
{
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
                'name'=>'required | max:20',
                'codigo_depto'=>'required | max:2'
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'el nombre es hobligatorio.',
        'name.max' => 'el nombre no debe tener mas de 20 caracteres.',
        'codigo_depto.required' => 'el codigo_depto es hobligatorio',
        'codigo_depto.max' => 'el codigo de departamento no debe tener mas de 2 caracteres.',
    ];
}
protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json($validator->errors(), 422));
}
}
