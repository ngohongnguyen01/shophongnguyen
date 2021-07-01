@extends('layout_admin.index')
@section('title')
    <title>Sửa danh mục</title>
    @endsection
@section('content-main')
<div class="container">
    <form action="{{asset('')}}category/edit/{{$data->id}}" method="POST">
        <div class="row">
            <div class="col-12">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" value="{{$data->name}}" name="name" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" value="{{$data->slug}}" name="slug" class="form-control">
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Ngày Tạo</label>
                    <input type="date" value="{{$data->ngay_tao}}" name="ngay_tao" class="form-control">
                    @error('ngay_tao')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Gửi</button>
        <a href="{{route('cate.index')}}" class="btn btn-primary">Quay Lại</a>
    </form>
</div>
@endsection