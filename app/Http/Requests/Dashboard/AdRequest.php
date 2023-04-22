<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
                    'btn_text_ar' => 'required|string|max:255',
                    'btn_text_en' => 'required|string|max:255',
                    'desc_ar'     => 'required|string',
                    'desc_en'     => 'required|string',
                    'img'         => 'nullable',
                    'link'        => 'required|url',
                ];
                break;

            default:
                return [
                    'btn_text_ar' => 'required|string|max:255',
                    'btn_text_en' => 'required|string|max:255',
                    'desc_ar'     => 'required|string',
                    'desc_en'     => 'required|string',
                    'img'         => 'required',
                    'link'        => 'required|url',
                ];
                break;
        }
    }
}
