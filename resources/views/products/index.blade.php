@extends('layout_admin.index')
@section('title')
    <title>Danh sách sản phẩm</title>
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
                <th>Name</th>
                <th>slug</th>
                <th>Danh Mục</th>
                <th>Image</th>
                <th>Số lượng</th>
                <th>Giá Nhập</th>
                <th>Giá bán</th>
                <th>Trạng thái</th>
                <th>Nổi Bật</th>
                <th>Ngày Tạo</th>
                <th>Action</th>
                <th><a href="{{route('pro.create')}}" class="btn btn-primary" title="Add New">Add</a></th>
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
            ajax: '{!! route("pro.index") !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'cate_name',
                    name: 'cate_name'
                },

                {
                    data: 'image',
                    name: 'image',
                    "render": function(data, type, full, meta) {
                        return "<img src=\"" + data + "\" height=\"50\"/>";
                    },

                },
                {
                    data: 'tong_so_luong',
                    name: 'tong_so_luong'
                },
                {
                    data: 'gia_nhap',
                    name: 'gia_nhap',
                    render: function(data, type, row, meta) {
                        return meta.settings.fnFormatNumber(data)+"vnđ";
                    }
                },
                {
                    data: 'gia_ban',
                    name: 'gia_ban',
                    render: function(data, type, row, meta) {
                        return meta.settings.fnFormatNumber(data) + "vnđ";
                    }
                },
                {
                    data: 'trang_thai',
                    name: 'trang_thai',
                    "render": function(data, type, full, meta) {
                        return data == 1 ? "Hoạt động" : "Không hoạt động";
                    }
                },
                {
                    data: 'noi_bat',
                    name: 'noi_bat',
                    "render": function(data, type, full, meta) {
                        return data == 1 ? "Nổi bật" : "Bình thường";
                    }
                },
                {
                    data: 'ngay_nhap',
                    name: 'ngay_nhap'
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
<script>
    console.log("nguyen");
</script>
@endpush