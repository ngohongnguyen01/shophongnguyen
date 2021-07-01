<h1>Đăng nhập !!!</h1>
<form action="{{route('cate.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="usernane" placeholder="email or username">
    <input type="password" name="password" placeholder="password">

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="usernane" placeholder="email or username" class="form-control">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="password" class="form-control">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-gruop">
        <button class="btn btn-primary">Gửi</button>
    </div>
</form>