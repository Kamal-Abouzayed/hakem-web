<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
                    'name_ar'   => 'required|string|max:255',
                    'name_en'   => 'required|string|max:255',
                    'desc_ar'   => 'required|string',
                    'desc_en'   => 'required|string',
                    'img'       => 'nullable',
                    'parent_id' => 'required',
                ];
                break;

            default:
                return [
                    'name_ar'   => 'required|string|max:255',
                    'name_en'   => 'required|string|max:255',
                    'desc_ar'   => 'required|string',
                    'desc_en'   => 'required|string',
                    'img'       => 'required',
                    'parent_id' => 'required',

                ];
                break;
        }
    }
}
