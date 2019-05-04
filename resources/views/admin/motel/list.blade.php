@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Nhà Trọ
		<small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Nhà Trọ</a></li>
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
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Chờ phê duyệt</h3>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Nhà Trọ</th>
						<th>Số ĐT</th>
						<th>Địa Chỉ</th>
						<th>Loại</th>
						<th>Chủ</th>
						<th width="140px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($motels as $motel)
					@if($motel->status ==2)
					<tr>
						<td>{{ $motel->id }}</td>
						<td>{{ $motel->name }}</td>
						<td>{{ $motel->phone }}</td>
						<td>{{ $motel->address }}</td>
						<td>{{ $motel->category->name }}</td>
						<td>{{ $motel->user->fullname}}</td>
						<td>
							<a class="btn btn-warning" href="admin/motel/enable/{{ $motel->id }}">kích hoạt</a>
							<a class="btn btn-danger" href="admin/motel/delete/{{ $motel->id }}">Xóa</a>
							<a class="btn btn-info" href="danh-muc/{{$motel->category->slug}}/{{ $motel->slug }}/index.html">Xem</a>

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
			<h3 class="box-title">Đang hoạt động</h3>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Nhà Trọ</th>
						<th>Số ĐT</th>
						<th>Địa Chỉ</th>
						<th>Loại</th>
						<th>Chủ</th>
						<th width="140px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($motels as $motel)
					@if($motel->status ==1)
					<tr>
						<td>{{ $motel->id }}</td>
						<td>{{ $motel->name }}</td>
						<td>{{ $motel->phone }}</td>
						<td>{{ $motel->address }}</td>
						<td>{{ $motel->category->name }}</td>
						<td>{{ $motel->user->fullname}}</td>
						<td>
							<a class="btn btn-warning" href="admin/motel/disable/{{ $motel->id }}">khóa</a>
							<a class="btn btn-info" href="danh-muc/{{$motel->category->slug}}/{{ $motel->slug }}/index.html">Xem</a>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Tạm ngưng hoạt động</h3>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Tên Nhà Trọ</th>
						<th>Số ĐT</th>
						<th>Địa Chỉ</th>
						<th>Loại</th>
						<th>Chủ</th>
						<th width="140px">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($motels as $motel)
					@if($motel->status == 3)
					<tr>
						<td>{{ $motel->id }}</td>
						<td>{{ $motel->name }}</td>
						<td>{{ $motel->phone }}</td>
						<td>{{ $motel->address }}</td>
						<td>{{ $motel->category->name }}</td>
						<td>{{ $motel->user->fullname}}</td>
						<td>
							<a class="btn btn-warning" href="admin/motel/enable/{{ $motel->id }}">kích hoạt</a>
							<a class="btn btn-danger" href="admin/motel/delete/{{ $motel->id }}">Xóa</a>
							<a class="btn btn-info" href="danh-muc/{{$motel->category->slug}}/{{ $motel->slug }}/index.html">Xem</a>

						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection