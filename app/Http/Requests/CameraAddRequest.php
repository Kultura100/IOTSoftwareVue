<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CameraAddRequest extends FormRequest
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
            'name' => ['required','string'],
            'port' => ['required','numeric'],
            'source' => ['required','string'],
            'login' => ['nullable'],
            'password' => ['nullable'],
            'protocol_id' => ['required','numeric']
        ];
    }
}
