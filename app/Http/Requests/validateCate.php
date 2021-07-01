<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCate extends FormRequest
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
            'name' => 'required|min:3|max:255',  
            'slug' => 'required|min:5|max:255',  
            'ngay_tao' => 'required|date|before:today',

        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên danh mục không được để trống !',
            'name.min' => 'Tên danh mục có ít nhất 3 ký tự !',
            'name.max' => 'Tên danh mục không quá 225 ký tự !',
            'slug.required' =>"Xin mời bạn nhập slug !",
            'slug.min' =>"Slug có ít nhất 3 ký tự !",
            'slug.max' =>"Slug không quá 225 ký tự !",
            'ngay_tao.required' =>"Xin mời bạn nhập ngày tháng tạo !",
            'ngay_tao.date'=>"Xin mời nhập ngày tháng đúng định dạng !",
            'ngay_tao.before'=>"Xin mời nhập ngày tháng đúng  !",

        ];
    }
}
