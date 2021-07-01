<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\addAcountValidate;
use App\Http\Requests\editAccountValidate;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Account::select()->get();;
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a  href="http://ngohongnguyen.com/hongnguyenshop/public/account/show/' . $data->id . '"  id="sua" onclick="return confirm("Ban cos muon sua k")"  class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="http://ngohongnguyen.com/hongnguyenshop/public/account/destroy/' . $data->id . '"  class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action',])
                ->make(true);
        }
        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addAcountValidate $request)
    {
        $pass = Hash::make($request->password);
        $account = new Account();
        $image = $request->image;
        $path = "";
        if ($image != "") {
            $path = 'image-account/' . time() . '-' . $image->getClientOriginalName();
            $file_name = time() . '-' . $image->getClientOriginalName();
            $url_image = public_path('/image-account');
            $image->move($url_image, $file_name);
        }
        $account->username = $request->user_name;
        $account->password = $pass;
        $account->ho_ten = $request->ho_ten;
        $account->email = $request->email;
        $account->birthday = $request->ngay_sinh;
        $account->phone = $request->phone;
        $account->dia_chi = $request->dia_chi;
        $account->trang_thai = $request->trang_thai;
        $account->image = $path;
        $account->phan_quyen = $request->phan_quyen;
        $account->ngay_tao = $request->ngay_tao;
        $account->save();
        return redirect()->route('acc.index', ['msg' => 'Thêm Account thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($account)
    {
        $data = Account::find($account);
        if (!$data) {
            return redirect()->route('acc.index', ['msg' => 'Tài khoản này không tồn tại!']);
        }
        return view('account.edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(editAccountValidate $request,  $account)
    {
        $data = Account::find($account);
        if (!$data) {
            return redirect()->route('acc.index', ['msg' => 'Tài khoản này không tồn tại!']);
        }
        $image = $request->image;
        $path = "";
        if ($image != "") {
            $path = 'image-account/' . time() . '-' . $image->getClientOriginalName();
            $file_name = time() . '-' . $image->getClientOriginalName();
            $url_image = public_path('/image-account');
            $image->move($url_image, $file_name);
            echo $path;
        }
        $pass = Hash::make($request->password);
        $data->password = $pass;
        $data->ho_ten = $request->ho_ten;
        $data->email = $request->email;
        $data->birthday = $request->ngay_sinh;
        $data->phone = $request->phone;
        $data->dia_chi = $request->dia_chi;
        $data->image = $path;
        $data->trang_thai = $request->trang_thai;
        $data->phan_quyen = $request->phan_quyen;
        $data->ngay_tao = $request->ngay_tao;
        $data->save();
        return redirect()->route('acc.index', ['msg' => 'Thêm Account thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($account)
    {
        $data = Account::find($account);
        if (!$data) {
            return redirect()->route('acc.index', ['msg' => 'Tài khoản này không tồn tại!']);
        }
        Account::destroy($account);
        return redirect()->route('acc.index', ['msg' => 'Xoá tài khoản thành công !']);
    }
}
