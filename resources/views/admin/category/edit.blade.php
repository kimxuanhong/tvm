@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Loại phòng trọ
		<small>Thêm mới</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Loại phòng trọ</a></li>
		<li class="active">Thêm mới</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
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
					<form action="admin/category/edit/{{$category->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Chọn loại danh mục</label>
							<select name="category" class="form-control select2" style="width: 100%">
								<option @if($category->kind == 1) selected @endif value="1">Loại địa điểm</option>
								<option @if($category->kind == 2) selected @endif value="2">Loại nhà trọ</option>
								<option @if($category->kind == 3) selected @endif value="3">Loại phòng trọ</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nhập tên loại phòng trọ</label>
							<input class="form-control" name="name" placeholder="Tên loại phòng trọ" value="{{$category->name}}" />
						</div>
						<button type="submit" class="btn btn-success">Lưu</button>
						<a class="btn btn-primary" href="admin/category/list"> Quay về danh sách</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection