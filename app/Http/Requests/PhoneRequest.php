<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
        $method = $this->method();         
        $rules = [
            'contact_id' => 'required|integer|exists:contacts,id',
            'number' => 'required|numeric|unique:phones,number'
        ];
        if($method === 'PUT'){
            $rules['number'].= ','.$this->get('id');
        }
        return $rules;
    }
}
