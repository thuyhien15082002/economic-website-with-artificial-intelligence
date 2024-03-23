<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:product',
            'file_upload' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'prioty' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không để trống',
            'prioty.required' => 'Thứ tự ưu tiên không để trống',
            'name.unique' => 'Sản phẩm đã có trong CSDL',
            'file_upload.required' => 'Hình ảnh không để trống',
            'category_id.required' => 'Chọn danh mục',
            'price.required' => 'Giá không để trống'
        ];
    }
}
