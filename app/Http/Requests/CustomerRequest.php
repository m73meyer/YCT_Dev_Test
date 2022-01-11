<?php

namespace App\Http\Requests;

use App\Utils\AppStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'name'     => 'max:255|required',
            'document' => 'min:6|max:12|required',
            'status'   => Rule::in(AppStatus::getCustomerStatus()),
        ];
    }
}
