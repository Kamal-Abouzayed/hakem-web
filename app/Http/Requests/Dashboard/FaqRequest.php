<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
                    'question_ar' => 'required|string|max:255',
                    'question_en' => 'required|string|max:255',
                    'answer_ar'   => 'required|string',
                    'answer_en'   => 'required|string',
                ];
                break;

            default:
                return [
                    'question_ar' => 'required|string|max:255',
                    'question_en' => 'required|string|max:255',
                    'answer_ar'   => 'required|string',
                    'answer_en'   => 'required|string',
                ];
                break;
        }
    }
}
