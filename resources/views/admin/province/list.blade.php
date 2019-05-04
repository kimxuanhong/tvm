@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tỉnh/Thành Phố
		<small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Tỉnh/Thành Phố</a></li>
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
						<th>Tên Tỉnh/Thành Phố</th>
						<th>Tên không dấu</th>
						<th width="200px"><a class="btn btn-success" href="admin/province/add"> Thêm mới</a></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($provinces as $province)
					<tr>
						<td>{{ $province->id }}</td>
						<td>{{ $province->name }}</td>
						<td>{{ $province->slug }}</td>
						<td>
							<a class="btn btn-warning" href="admin/province/edit/{{ $province->id }}">Sửa</a>
							<a class="btn btn-danger" href="admin/province/delete/{{ $province->id }}">Xóa</a>
							<a class="btn btn-info" href="admin/province/view/{{ $province->id }}">Xem</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection