<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\validateCate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // hiện thị tất cả thông tin
        // $data  = Category::all();
        // return view('category.index',['data' => $data]);
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a  href="http://ngohongnguyen.com/hongnguyenshop/public/category/show/' . $data->id . '"  id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="http://ngohongnguyen.com/hongnguyenshop/public/category/destroy/' . $data->id . '" onclick="return confirm(Bạn có muốn xóa danh mục này không ?)" class="delete btn btn-danger btn-sm">Delete</a>';
                    //{{asset('AdminLTE-master/dist/img/AdminLTELogo.png')}}
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('category.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validateCate $request)
    {
        //

        $objCate = new Category();
        $objCate->name = $request->name;
        $objCate->slug = $request->slug;
        $objCate->ngay_tao = $request->ngay_tao;
        $objCate->save();
        return redirect()->route('cate.index', ['msg' => 'Thêm Category thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
        $data = Category::find($category);
        if (!$data) {
            return redirect()->route('category.index', ['msg' => 'Danh mục không tồn tại !']);
        } else
            return view('category.edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(validateCate $request,  $category)
    {
        $cateid = Category::find($category);
        $cateid->name = $request->name;
        $cateid->slug = $request->slug;
        $cateid->ngay_tao = $request->ngay_tao;
        $cateid->save();
        return view('category.index', ['msg' => 'Cập nhập thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        Category::destroy($category);
        return view('category.index');
    }
}
