<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fname'      => 'required|string|max:255',
            'lname'      => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'nullable|digits_between:9,14|unique:users,phone',
            'country_id' => 'required',
            'password'   => 'required|min:8|confirmed',
            'birthday'   => 'nullable|date|date_format:Y-m-d',
            'gender'     => 'nullable|in:male,female',
            'check'      => 'required',
        ];
    }
}
