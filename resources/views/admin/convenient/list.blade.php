@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tiện nghi
		<small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Tiện nghi</a></li>
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
			<h3 class="box-title">Tiện nghi </h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên tiện nghi</th>
						<th>Tên không dấu</th>
						<th>Loại</th>
						<th class="text-center" width="100px"><button class="btn btn-success pull-right" data-toggle="modal" data-target="#create-item""> Thêm mới</button></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($convenients as $convenient)
					@if($convenient->kind <=4)
					<tr>
						<td>{{ $convenient->id }}</td>
						<td>{{ $convenient->name }}</td>
						<td>{{ $convenient->slug }}</td>
						<td class="text-center">
							@if($convenient->kind == 1)
							<span class="label label-info">Loại nhà trọ</span>
							@elseif($convenient->kind == 2)
							<span class="label label-success">Loại phòng</span>
							@elseif($convenient->kind == 3)
							<span class="label label-primary">Dành cho người khuyết tật</span>
							@else
							<span class="label label-warning">Loại khác</span>
							@endif
						</td>
						<td class="text-center">
							<a class="btn btn-warning" href="admin/convenient/edit/{{ $convenient->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/convenient/disable/{{ $convenient->id }}">Khóa</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!-- Tiện nghi disable -->
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Tiện nghi tạm dừng</h3>
		</div>
		<div class="box-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên tiện nghi</th>
						<th>Tên không dấu</th>
						<th>Loại</th>
						<th class="text-center" width="100px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($convenients as $convenient)
					@if($convenient->kind > 4)
					<tr>
						<td>{{ $convenient->id }}</td>
						<td>{{ $convenient->name }}</td>
						<td>{{ $convenient->slug }}</td>
						<td class="text-center">
							@if($convenient->kind == 11)
							<span class="label label-info">Loại nhà trọ</span>
							@elseif($convenient->kind == 12)
							<span class="label label-success">Loại phòng</span>
							@elseif($convenient->kind == 13)
							<span class="label label-primary">Dành cho người khuyết tật</span>
							@else
							<span class="label label-warning">Loại khác</span>
							@endif
						</td>
						<td>
							<a class="btn btn-success" href="admin/convenient/enable/{{ $convenient->id }}">Mở</a>
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
				<h4 class="modal-title">Thêm Tiện nghi</h4>
			</div>
			<div class="modal-body">
				<form action="admin/convenient/add" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label>Chọn loại Tiện nghi</label>
						<select name="kind" class="form-control" style="width: 100%">
							<option value="1">Loại nhà trọ</option>
							<option value="2">Loại phòng trọ</option>
							<option value="3">Loại dành cho người khuyết tật</option>
							<option value="4">Loại khác</option>
						</select>
					</div>
					<div class="form-group">
						<label>Nhập tên loại</label>
						<input class="form-control" name="name" placeholder="Tên loại Tiện nghi" required/>
					</div>
					<button type="submit" class="btn btn-success">Thêm</button>
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection