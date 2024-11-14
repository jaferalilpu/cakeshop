<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cakeUpdateRequest extends FormRequest
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
            'name' =>'required|string|min:3|max:40',
            'description' =>'required|string|min:3|max:400',
            'price' =>'required|string|min:1|max:5000',
            // 'image' =>'required|image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
