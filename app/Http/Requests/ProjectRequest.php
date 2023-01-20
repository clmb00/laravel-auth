<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'client_name' => 'required|max:255|min:3',
            'summary' => 'required|min:3',
            'cover_image' => 'required|max:255|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il name è un campo obbligatorio',
            'name.max' => 'Il name deve avere al massimo :max caratteri',
            'name.min' => 'Il name deve avere almeno :min caratteri',
            'client_name.required' => 'Il client_name è un campo obbligatorio',
            'client_name.max' => 'Il client_name deve avere al massimo :max caratteri',
            'client_name.min' => 'Il client_name deve avere almeno :min caratteri',
            'cover_image.required' => 'La cover_image è un campo obbligatorio',
            'cover_image.max' => 'La cover_image deve avere al massimo :max caratteri',
            'cover_image.min' => 'La cover_image deve avere almeno :min caratteri',
            'summary.required' => 'Il summary è un campo obbligatorio',
            'summary.min' => 'Il summary deve avere almeno :min caratteri'
        ];
    }
}
