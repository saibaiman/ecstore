<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdress extends FormRequest
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
			'zipcode' => 'required|numeric|digits_between:0,7',
			'prefecture' => 'required|max:100',
			'city' => 'required|max:100',
			'detail_adress' => 'required|max:100',
			'tel' => 'required|numeric|digits_between:0,15'
		];
	}

	public function attributes()
	{
		return [
			'zipcode' => '郵便番号',
			'prefecture' => '都道府県',
			'city' => '市町村',
			'detail_adress' => 'それ以下の住所',
			'tel' => '電話番号'
		];
	}

	public function messages()
	{
		return [
			'zipcode.required' => ':attributeを入力してください',
			'zipcode.numeric' => ':attributeは数字で入力して下さい',
			'zipcode.digits_between' => ':attributeは7文字以内で入力して下さい',
			'prefecture.required' => ':attributeを入力してください',
			'prefecture.max' => ':attributeは100文字以内で入力して下さい',
			'city.required' => ':attributeを入力してください',
			'city.max' => ':attributeは100文字以内で入力して下さい',
			'detail_adress.required' => ':attributeを入力してください',
			'detail_adress.max' => ':attributeは100文字以内で入力して下さい',
			'tel.required' => ':attributeを入力してください',
			'tel.numeric' => ':attributeは数字で入力して下さい',
			'tel.digits_between' => ':attributeは15文字以内で入力して下さい',
		];
	}

}
