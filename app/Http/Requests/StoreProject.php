<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'start' => 'required|before:end',
            'end' => 'required|after:start',
            'user_id' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es requerido',
            'description.required'  => 'El proyecto tiene que tener una descripción',
            'start.required' => 'Tiene que tener una fecha de inicio',
            'end.required' => 'Tiene que tener una fecha de fin',
            'user_id.required' => 'required',
            'start.before:end' => 'La fecha de inicio tiene que ser antes que la de fin',
            'end.after:start' => 'La fecha de fin tiene que ser despues que la de inicio'
        ];
    }
}