@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Quận/Huyện
		<small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Quận/Huyện</a></li>
		<li class="active">Dach sách</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	@if(session('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
	@endif
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách</h3>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Quận/Huyện</th>
						<th>Tên không dấu</th>
						<th width="200px"><a class="btn btn-success" href="admin/district/add"> Thêm mới</a></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($districts as $district)
					<tr>
						<td>{{ $district->id }}</td>
						<td>{{ $district->name }}</td>
						<td>{{ $district->slug }}</td>
						<td>
							<a class="btn btn-warning" href="admin/district/edit/{{ $district->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/district/delete/{{ $district->id }}">Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection