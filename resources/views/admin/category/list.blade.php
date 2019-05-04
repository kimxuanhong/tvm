@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Danh Mục
		<small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Danh Mục</a></li>
		<li class="active">Dach sách</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
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

	<!-- Danh sách nhà trọ -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Danh mục loại nhà trọ</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Danh Mục</th>
						<th>Tên không dấu</th>
						<th class="text-center" width="100px"><button class="btn btn-success pull-right" data-toggle="modal" data-target="#create-item""> Thêm mới</button></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categorys as $category)
					@if($category->kind ==2)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td class="text-center">

							<a class="btn btn-warning" href="admin/category/edit/{{ $category->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/category/disable/{{ $category->id }}">Khóa</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!-- Danh sách phòng trọ -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Danh mục phòng trọ</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Danh Mục</th>
						<th>Tên không dấu</th>
						<th class="text-center" width="100px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categorys as $category)
					@if($category->kind ==3)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td class="text-center">

							<a class="btn btn-warning" href="admin/category/edit/{{ $category->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/category/disable/{{ $category->id }}">Khóa</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Danh mục loại địa điểm</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Danh Mục</th>
						<th>Tên không dấu</th>
						<th class="text-center" width="100px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categorys as $category)
					@if($category->kind ==1)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td class="text-center">

							<a class="btn btn-warning" href="admin/category/edit/{{ $category->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/category/disable/{{ $category->id }}">Khóa</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


	<!-- Danh mục disable -->
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Danh mục tạm dừng</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Danh Mục</th>
						<th>Tên không dấu</th>
						<th>Thể loại</th>
						<th class="text-center" width="100px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categorys as $category)
					@if($category->kind>3)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td class="text-center">
							@if($category->kind == 11)
							<span class="label label-info">Loại địa điểm</span>
							@elseif($category->kind == 12)
							<span class="label label-success">Loại nhà trọ</span>
							@else
							<span class="label label-warning">Loại phòng trọ</span>
							@endif
						</td>
						<td>
							<a class="btn btn-success" href="admin/category/enable/{{ $category->id }}">Mở</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- Create Item Modal -->
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Thêm danh mục</h4>
			</div>
			<div class="modal-body">
				<form action="admin/category/add" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label>Chọn loại danh mục</label>
						<select name="category" class="form-control select2" style="width: 100%">
							<option value="1">Loại địa điểm</option>
							<option value="2">Loại nhà trọ</option>
							<option value="3">Loại phòng trọ</option>
						</select>
					</div>
					<div class="form-group">
						<label>Nhập tên loại danh mục</label>
						<input class="form-control" name="name" placeholder="Tên loại danh mục" required/>
					</div>
					<button type="submit" class="btn btn-success">Thêm</button>
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection