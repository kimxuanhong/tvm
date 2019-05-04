@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Loại nhà Trọ
		<small>{{$theloai->name}}</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Loại nhà trọ</a></li>
		<li class="active">{{$theloai->name}}</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-lg-6">
			@if ($errors->any())
			<div class="alert alert-danger">
				<strong>Whoops!</strong> Có một vài lỗi xảy ra.<br><br>
				<ol>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ol>
			</div>
			@endif

			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Sửa</h3>
				</div>
				<div class="box-body">
					<form action="admin/loainhatro/sua/{{$theloai->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Nhập tên loại nhà trọ</label>
							<input class="form-control" name="name" placeholder="Tên loại nhà trọ" value="{{$theloai->name}}" />
						</div>
						<button type="submit" class="btn btn-success">Thêm</button>
						<a class="btn btn-primary" href="admin/loainhatro/danhsach"> Quay về danh sách</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection