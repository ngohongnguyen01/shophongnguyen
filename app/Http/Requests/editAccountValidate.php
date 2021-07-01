<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editAccountValidate extends FormRequest
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
            'password' => 'bail|min:7|regex:/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{7,25}$/i',
            'confirm_password' => 'bail|min:7|same:password',
            'ho_ten' => 'bail|required|min:5|max:255|regex:/^[a-zA-Z]/i',
            'email' => 'bail|required|min:7|max:255|email|unique:accounts,email,'.$this->id.'',
            'ngay_sinh' => 'bail|required|date|before:today',
            'phone' => 'bail|required|min:9|numeric|unique:accounts,phone,'.$this->id.'',
            'dia_chi' => 'bail|required|min:5|max:255',
            'ngay_tao' => 'bail|required|date|before_or_equal:today',
            'phan_quyen' => 'bail|required|alpha',
            'image'=>'bail|file|filled|image',

        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Password không được để trống !',
            'password.min' => 'Password không được dưới 7 ký tự !',
            'password.regex' => 'Password có ít nhất 2 chữ cái in hoa , 1 ký tự đặc biệt , 2 chữ số và 3 chữ cái in thường!',
            'confirm_password.required' => 'Confirm Password không được để trống !',
            'confirm_password.min' => 'Confirm Password không được dưới 7 ký tự !',
            'confirm_password.same' => 'Confirm Password không trùng khớp với Password !',
            'ho_ten.required' => 'Họ Tên không được để trống !',
            'ho_ten.min' => 'Họ Tên không được dưới 5 ký tự !',
            'ho_ten.max' => 'Họ Tên không quá 255 ký tự !',
            'ho_ten.regex' => 'Họ Tên chỉ gồm ký tự chữ cái !',
            'email.required' => 'Email không được để trống !',
            'email.min' => 'Email không được dưới 5 ký tự !',
            'email.max' => 'Email không quá 255 ký tự !',
            'email.email' => 'Email sai định dạng !',
            'email.unique' => 'Email này đã tồn tại !',
            'ngay_sinh.required' => 'Xin mời bạn nhập ngày !',
            'ngay_sinh.date' => 'Xin nhập đúng định dạng ngày tháng !',
            'ngay_sinh.before' => 'Xin mời bạn nhập ngày tháng trước ngày tháng đã cho !',
            'ngay_tao.required' => 'Xin mời bạn nhập ngày !',
            'ngay_tao.date' => 'Xin nhập đúng định dạng ngày tháng !',
            'ngay_tao.before_or_equal' => 'Xin mời bạn nhập ngày tháng trước hoặc bằng ngày tháng đã cho !',
            'phone.required' => 'Xin mời bạn nhập số điện thoại !',
            'phone.min' => 'Xin nhập số điện thoại ít nhất 9 số !',
            'phone.max' => 'Xin nhập số điện thoại nhiều nhất 12 số !',
            'phone.numeric' => 'Xin mời bạn nhập số điện thoại chỉ gồm các số !',
            'phone.unique' => 'Số điện thoại này đã tồn tại !',
            'dia_chi.required' => 'Xin mời bạn nhập địa chỉ !',
            'dia_chi.min' => 'Xin nhập địa chỉ ít nhất 5 ký tự !',
            'dia_chi.max' => 'Xin nhập địa chỉ nhiều nhất 225 ký tự !',
            'dia_chi.alpha_dash' => 'Dữ liệu nhập phải là chữ hoặc số, bao gồm dấu gạch ngang "-" và gạch dưới "_" !',
            'phan_quyen.required' => 'Xin mời bạn chọn chức vụ !',
            'phan_quyen.alpha' => 'Dữ liệu nhập phải là các ký tự',
            'image.required' => 'Xin mời bạn nhập ảnh !',
            'image.file'=>'Ảnh nhập vào phải là 1 file tải dữ  liệu lên thành công !',
            'image.filled'=>'Xin mời bạn nhập ảnh !',
            'image.image'=>'Xin mười bạn nhập đúng định dạng ảnh !',
        ];
    }
}
