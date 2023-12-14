<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            
            'name'          => 'required|min:3',
            'email'         => 'required|email',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'image'         => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'class_name'    => 'required',
            'roll_no'       => 'required',
            'reg_no'        => 'required',
            'result'        => 'nullable'
        ];
    }
}
