<?php

namespace App\Http\Controllers;

use App\Http\Requests\productValidate;
use App\Http\Requests\editProductValidate;
use App\Models\products;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = products::join('categories', 'products.cate_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as cate_name')
            ->get();;
            return DataTables::of($data)
            
                ->addColumn('action', function ($data) {
                    $button = '<a  href="http://ngohongnguyen.com/hongnguyenshop/public/products/show/' . $data->id . '"  id="sua" onclick="return confirm("Ban cos muon sua k")"  class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="http://ngohongnguyen.com/hongnguyenshop/public/products/destroy/' . $data->id . '"  class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action',])
                ->make(true);
        }
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('products.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productValidate $request)
    {
        $image = $request->image;
        $path = "";
        if ($image != "") {
            $path = 'image-products/' . time() . '-' . $image->getClientOriginalName();
            $file_name = time() . '-' . $image->getClientOriginalName();
            $url_image = public_path('/image-products');
            $image->move($url_image, $file_name);
        }
        $product = new products();
        $product->name = $request->name;
        $product->ngay_nhap = $request->ngay_nhap;
        $product->slug = $request->slug;
        $product->mo_ta = $request->mo_ta;
        $product->mo_ta_chi_tiet = $request->mo_ta_detail;
        $product->image = $path;
        $product->tong_so_luong = 0;
        $product->gia_nhap = $request->gia_nhap;
        $product->gia_ban = $request->gia_ban;
        $product->giam_gia = $request->giam_gia;
        $product->don_vi_tinh = $request->don_vi;
        $product->luot_xem = 0;
        $product->trang_thai = $request->trang_thai;
        $product->noi_bat = $request->noi_bat;
        $product->cate_id = $request->cate_id;

        $product->save();
        return redirect()->route('pro.index', ['msg' => 'Sản phẩm thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        $data = Category::all();

        $productId = products::find($products);
        if (!$productId) {
            return redirect()->route('pro.index', ['msg' => 'Sản phẩm này không tồn tại !']);

        }
        
        return view('products.edit', ['value' => $productId, 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(editProductValidate $request,  $products)
    {
        $productId = products::find($products);    
        if (!$productId) {
            return redirect()->route('pro.index', ['msg' => 'Sản phẩm này không tồn tại !']);

        }
        $image = $request->image;
        $path = "";     
        if ($image != "") {
            $path = 'image-products/' . time() . '-' . $image->getClientOriginalName();
            $file_name = time() . '-' . $image->getClientOriginalName();
            $url_image = public_path('/image-products');
            $image->move($url_image, $file_name);
            echo $path;
        }else{
            $path = $productId->image;
        }
        $productId->name = $request->name;
        $productId->ngay_nhap = $request->ngay_nhap;
        $productId->slug = $request->slug;
        $productId->mo_ta = $request->mo_ta;
        $productId->mo_ta_chi_tiet = $request->mo_ta_detail;
        $productId->image = $path;
        $productId->gia_nhap = $request->gia_nhap;
        $productId->gia_ban = $request->gia_ban;
        $productId->giam_gia = $request->giam_gia;
        $productId->don_vi_tinh = $request->don_vi;
        $productId->trang_thai = $request->trang_thai;
        $productId->noi_bat = $request->noi_bat;
        $productId->cate_id = $request->cate_id;
        $productId->save();
        // return view('products.index', ['msg' => 'Cập nhập sản phẩm thành công !']);
        // điều hướng k k hiện ảnh
        return redirect()->route('pro.index', ['msg' => 'Cập nhập sản phẩm thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($products)
    {
        products::destroy($products);
        return redirect()->route('pro.index', ['msg' => 'Cập nhập sản phẩm thành công !']);
    }
}
