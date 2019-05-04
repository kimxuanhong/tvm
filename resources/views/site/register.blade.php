@extends('site.layout.master')
@section('content')
<!-- Page Content -->
<div class="container">
	<div><h1>Đăng ký tài khoản</h1>
	</div>
	@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Có một số lối phát sinh.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	@if(session('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
	@endif
	<hr>
	<form action="user/register" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-6" style="border-right: 1px #e0dede solid;">
				<p>Điền đầy đủ thông tin.</p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" name="fullname" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tài khoản</label>
							<input type="text" name="username" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" name="phone" class="form-control">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" name="password" class="form-control">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Nhập lại mật khẩu</label>
							<input type="password" name="repassword" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Địa chỉ nhà</label>
					<input type="text" name="address" class="form-control">
				</div>
				<button type="submit" class="btn btn-success form-control">Đăng ký</button>
				<a href="">Xem điều khoản</a>
			</div>
			<div class="col-md-4">
				<p>Đăng nhập bằng google+</p>
				<hr>
				<a class="btn btn-danger form-control" href="{{ URL::to('auth/google') }}">Đăng nhập bằng Google
				</a>
			</div>
		</div>
	</form>
	<hr>
	<div class="row text-center">
		<p>Bạn đã có tài khoản? <a href="user/login">Đăng nhập ngay</a></p>
	</div>
</div>
<!-- end Page Content -->
@endsection