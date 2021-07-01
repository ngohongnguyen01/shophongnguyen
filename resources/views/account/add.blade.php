@extends('layout_admin.index')
@section('title')
    <title>Thêm tài khoản</title>
    @endsection
@section('content-main')
<div class="container">
    <form action="{{route('acc.store')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                @csrf
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" placeholder="User Name" name="user_name" class="form-control">
                    @error('user_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" placeholder="Password" name="password" class="form-control">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control">
                    @error('confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Họ Tên</label>
                    <input type="text" class="form-control" placeholder="Họ Tên" name="ho_ten">
                    @error('ho_ten')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
            </div>
            <div class="col-6">
            <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            <div class="form-group">
                    <label for="">Ngày Sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh">
                    @error('ngay_sinh')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="dia_chi">
                    @error('dia_chi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Ngày tạo</label>
                    <input type="date" class="form-control" placeholder="Ngày tạo" name="ngay_tao">
                    @error('ngay_tao')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Trang thái</label>
                    <div class="form-control">
                        <input type="radio" value="1" name="trang_thai" checked> Hoạt Động
                        <input type="radio" value="0" name="trang_thai">Không Hoạt Động
                    </div>
                    @error('trang_thai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="phan_quyen" class="form-control" id="">
                        <option value="admin">Admin</option>
                        <option value="nhanvien">Nhân viên</option>
                    </select>
                    @error('phan_quyen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Gửi</button>
                <a href="{{route('acc.index')}}" class="btn btn-primary">Quay Lại</a>
            </div>
        </div>
    </form>
</div>
@endsection