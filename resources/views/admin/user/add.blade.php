@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Người dùng
		<small>Thêm mới</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Người dùng</a></li>
		<li class="active">Thêm mới</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-lg-6">
		@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
		<form action="admin/nguoidung/them" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label>Nhập tài khoản</label>
				<input class="form-control" name="name" placeholder="Tên Người dùng" />
			</div>
			<div class="form-group">
				<label>Nhập mật khẩu</label>
				<input class="form-control" name="name" placeholder="Tên Người dùng" />
			</div>

			<div class="form-group">
				<label>Nhập họ tên</label>
				<input class="form-control" name="name" placeholder="Tên Người dùng" />
			</div>
			<div class="form-group">
				<label>Nhập email</label>
				<input class="form-control" name="name" placeholder="Tên Người dùng" />
			</div>
			<div class="form-group">
				<label>Nhập số điện thoại</label>
				<input class="form-control" name="name" placeholder="Tên Người dùng" />
			</div>
			<button type="submit" class="btn btn-success">Thêm</button>
			<a class="btn btn-primary" href="admin/nguoidung/danhsach"> Quay về danh sách</a>
			<form>
			</div>

	</section>
@endsection