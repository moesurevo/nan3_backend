<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuiztitleRequest extends FormRequest
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
            'title_no' => 'required',
            'mm_title_no' => 'required',
            'titleeng' => 'required',
            'titlemm' => 'required',
            'promomm' => 'required',
            'promoeng' => 'required',
        ];
    }
}
