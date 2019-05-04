@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Danh Mục
		<small>Thêm mới</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Danh Mục</a></li>
		<li class="active">Thêm mới</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-lg-6">
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
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm</h3>
				</div>
				<div class="box-body">
					<form action="admin/category/add" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Nhập tên Danh Mục</label>
							<input class="form-control" name="name" placeholder="Tên Danh Mục" />
						</div>
						<button type="submit" class="btn btn-success">Thêm</button>
						<a class="btn btn-primary" href="admin/category/list"> Quay về danh sách</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection