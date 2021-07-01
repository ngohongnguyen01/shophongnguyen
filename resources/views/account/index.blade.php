@extends('layout_admin.index')
@section('title')
    <title>Danh sách tài khoản</title>
    @endsection
@section('content-main')
<div class="container">
    <h2>DataTable</h2>
    @if(isset($msg))
    <span style="color:red">{{$msg}}</span>
    @endif
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>UserName</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Địa chỉ</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Phân quyền</th>
                <th>Ngày Tạo</th>
                <th>Action</th>
                <th><a href="{{route('acc.create')}}" class="btn btn-primary" title="Add New">Add</a></th>
            </tr>
        </thead>

</div>
@endsection
@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route("acc.index") !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'ho_ten',
                    name: 'ho_ten'
                },
                {
                    data: 'email',
                    name: 'email'
                },

                {
                    data: 'birthday',
                    name: 'birthday',
                },
                {
                    data: 'phone',
                    name: 'phone'
                },

                {
                    data: 'dia_chi',
                    name: 'dia_chi',
                },
                {
                    data: 'image',
                    name: 'image',
                    "render": function(data, type, full, meta) {
                        return "<img src=\"" + data + "\" height=\"50\"/>";
                    },

                },
                {
                    data: 'trang_thai',
                    name: 'trang_thai',
                    "render": function(data, type, full, meta) {
                        return data == 1 ? "Hoạt động" : "Không hoạt động";
                    }
                },
                {
                    data: 'phan_quyen',
                    name: 'phan_quyen',
                    "render": function(data, type, full, meta) {
                        return data == "admin" ? "Admin" : "Nhân Viên";
                    }
                },
                {
                    data: 'ngay_tao',
                    name: 'ngay_tao'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    });
</script>

@endpush