<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        switch (request()->method()) {
            case 'PATCH':
                return [
                    'title_ar' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'    => 'nullable|image|mimes:png,jpg,jpeg'
                ];
                break;

            default:
                return [
                    'title_ar' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'desc_ar'  => 'required|string',
                    'desc_en'  => 'required|string',
                    'image'    => 'required|image|mimes:png,jpg,jpeg'
                ];
                break;
        }
    }
}
