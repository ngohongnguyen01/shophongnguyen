@extends('layout_admin.index')
@section('title')
    <title>Danh sách danh mục</title>
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
                <th>Ngày Tạo</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th ><a href="{{route('cate.create')}}" class="btn btn-primary" title="Add New">Add</a></th>
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
            ajax: '{!! route("cate.index") !!}',
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
                    data: 'ngay_tao',
                    name: 'ngay_tao'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
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