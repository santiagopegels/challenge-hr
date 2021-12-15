<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRequest;
use Illuminate\Foundation\Http\FormRequest;

class TradeCreateRequest extends FormRequest
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
            'type' => 'required | string',
            'user_id' => 'required | integer',
            'symbol' => 'required | string',
            'shares' => 'required | integer | between:10,31',
            'price' => 'required | integer',
            'timestamp' => 'required | integer',
        ];
    }
}
