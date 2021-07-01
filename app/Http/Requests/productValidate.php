<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productValidate extends FormRequest
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
            'name' => 'bail|required|min:5|max:225|unique:products,name',
            'slug' => 'bail|required|min:5|max:225|unique:products,slug',
            'mo_ta' => 'bail|required|min:5|max:225',
            'ngay_nhap' => 'bail|required|date|before:today',
            'mo_ta_detail' => 'bail|required|min:5',
            'image'=>'bail|required|file|filled|image',
            'gia_nhap'=>'bail|required|integer|min:1',
            'gia_ban'=>'bail|required|integer|min:1',
            'giam_gia'=>'bail|required|integer|min:0',
            'don_vi'=>'bail|required|min:0',
            'trang_thai'=> 'bail|required|boolean',
            'noi_bat'=> 'bail|required|boolean',
            'cate_id'=>'bail|required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống !',
            'name.min' => 'Tên sản phẩm không được dưới 5 ký tự !',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự !',
            'name.unique' => 'Tên sản phẩm đã được tồn tại !',
            'slug.required' => 'Slug không được để trống !',
            'slug.min' => 'Slug không được dưới 5 ký tự !',
            'slug.max' => 'Slug không được quá 255 ký tự !',
            'slug.unique' => 'Slug đã được tồn tại !',
            'mo_ta.required' => 'Mô tả không được để trống !',
            'mo_ta.min' => 'Mô tả không được dưới 5 ký tự !',
            'mo_ta.max' => 'Mô tả không được quá 255 ký tự !',
            'ngay_nhap.required' => 'Xin mời bạn nhập ngày !',
            'ngay_nhap.date' => 'Xin nhập đúng định dạng ngày tháng !',
            'ngay_nhap.before' => 'Xin mời bạn nhập ngày tháng trước hoặc bằng ngày tháng đã cho !',
            'mo_ta_detail.required' => 'Mô tả không được để trống !',
            'mo_ta_detail.min' => 'Mô tả không được dưới 5 ký tự !',
            'image.required' => 'Xin mời bạn nhập ảnh !',
            'image.file'=>'Ảnh nhập vào phải là 1 file tải dữ  liệu lên thành công !',
            'image.filled'=>'Xin mời bạn nhập ảnh !',
            'image.image'=>'Xin mười bạn nhập đúng định dạng ảnh !',
            'gia_nhap.required' =>"Xin mời bạn nhập giá nhập sản phẩm !",
            'gia_nhap.integer' =>"Xin mời bạn nhập giá nhập phải là số !",
            'gia_nhap.min'=>"Xin mời bạn nhập giá nhập phải lớn hơn 0 !",
            'gia_ban.required' =>"Xin mời bạn nhập giá bán sản phẩm !",
            'gia_ban.integer' =>"Xin mời bạn nhập giá bán sản phẩm phải là số !",
            'gia_ban.min'=>"Xin mời bạn nhập giá phỉa lớn hơn 0 !",
            'giam_gia.required' =>"Xin mời bạn nhập giảm  giá sản phẩm !",
            'giam_gia.integer' =>"Xin mời bạn nhập giảm giá phải là số !",
            'giam_gia.min'=>"Xin mời bạn nhập giảm giá phỉa lớn hơn 0 !",
            'don_vi.required' => 'Đơn vị không được để trống !',
            'don_vi.min' => 'Đơn vị không được dưới 5 ký tự !',
            'trang_thai.required' => 'Xin mời bạn nhập trạng thái !',
            'trang_thai.boolean'=>"Xin mời bạn nhập giá trị 0 hoặc 1 !",
            'noi_bat.required' => 'Xin mời bạn nhập giá trị !',
            'noi_bat.boolean'=>"Xin mời bạn nhập giá trị 0 hoặc 1 !",
            'cate_id.required' => 'Xin mời bạn nhập gái trị  !',
        ];
    }
}
