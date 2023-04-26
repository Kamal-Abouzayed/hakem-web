<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdviceRequest extends FormRequest
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
                    'desc_ar' => 'required|string',
                    'desc_en' => 'required|string',
                ];
                break;

            default:
                return [
                    'desc_ar' => 'required|string',
                    'desc_en' => 'required|string',
                ];
                break;
        }
    }
}
