<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' =>  ['required', 'min:3'],
            'isAvailable' =>  ['nullable'],
            'description' =>  ['required'],
            'adress' =>  ['required'],
            'images' =>  ['nullable'],
            'slug' =>  ['nullable'],
            'city' =>  ['required'],
            'size' =>  ['required'],
            'price' =>  ['required'],
            'zipcode' =>  ['required'],
            'room' =>  ['required'],
            'part' =>  ['required'],
            'floor' =>  ['required'],
            'name' =>  ['required'],

           
           
        ];
    }
}
