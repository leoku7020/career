<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            //
            'name' => 'required|max:30|min:2',
            'file' => 'required|max:5120|mimes:jpeg,png',
            'status' => 'required',
            'start_time' => 'required_if:status,2|after:now',
            'end_time' => 'nullable|after:now',
        ];
    }
}
