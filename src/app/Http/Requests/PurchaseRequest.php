<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'recipient' =>'required|string|max:255',
            //'product_id' =>'required|exists:products,id',
        ];
    }

    public function messages()
    {
        return[
            'recipient.required' => 'お届け先を入力してください',
            'recipient.string'   => 'お届け先を文字列で入力してください',
            'recipient.max'  => 'お届け先を255文字以下で入力してください',
        ];
    }
}
