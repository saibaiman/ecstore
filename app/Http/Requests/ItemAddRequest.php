<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAddRequest extends FormRequest
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
			'name' => 'required|max:50',
			'info' => 'required|max:255',
			'price' => 'required|integer|min:0',
			'stocks' => 'required|integer|min:0',
			'img' => 'file|image|mimes:jpeg,jpg,png,gif|max:5120'
		];
	}

	public function attributes()
	{
		return [
			'name' => '商品名',
			'info' => '商品情報',
			'price' => '値段',
			'stocks' => '在庫',
			'img' => '画像',
		];
	}

	public function messages()
	{
		return [
			'name.required' => ':attributeを入力してください',
			'name.max' => ':attributeは50文字以内で入力してください',
			'info.required' => ':attributeを入力してください',
			'info.max' => ':attributeは255文字以内で入力して下さい',
			'price.required' => ':attributeを入力してください',
			'price.integer' => ':attributeは数字で入力してください',
			'price.min:0' => ':attributeは0以上で入力してください',
			'stocks.required' => ':attributeを入力してください',
			'stocks.integer' => ':attributeは数字で入力してください',
			'stocks.min:0' => ':attributeは0以上で入力してください',
			'img.file' => ':attributeはファイル形式のモノを入力してください',
			'img.image' => ':attributeは画像ファイルを入力してください',
			'img.mimes' => ':attributeはjpeg,jpg,png,gif形式のファイルを入力してください',
			'img.max' => '5M以内に抑えてください',
		];
	}
}
