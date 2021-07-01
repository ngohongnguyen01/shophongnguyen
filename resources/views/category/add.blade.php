@extends('layout_admin.index')
@section('title')
    <title>Thêm danh mục</title>
    @endsection
@section('content-main')
<div class="container">
    <form action="{{route('cate.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" placeholder="Name" name="name" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" placeholder="Slug" name="slug" class="form-control">
            @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Ngày Tạo</label>
            <input type="date" class="form-control" name="ngay_tao">
            @error('ngay_tao')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Gửi</button>
        <a href="{{route('cate.index')}}" class="btn btn-primary">Quay Lại</a>
    </form>
</div>
@endsection