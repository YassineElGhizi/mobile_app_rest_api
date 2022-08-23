<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'type' => 'required|integer',
            'images' => 'required',
            'city_id' => 'required|integer',
            'module_id' => 'required|integer',
            'user_id' => 'required|integer',
            'state' => 'required|integer',
            'price' => 'required|numeric'
        ];
    }
}

