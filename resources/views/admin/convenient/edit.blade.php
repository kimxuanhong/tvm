@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tiện nghi
		<small>Chỉnh sửa</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Tiện nghi</a></li>
		<li class="active">Chỉnh sửa</li>
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
					<form action="admin/convenient/edit/{{$convenient->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Chọn loại danh mục</label>
							<select name="convenient" class="form-control select2" style="width: 100%">
								<option value="1" @if($convenient->kind == 1) selected @endif>Loại nhà trọ</option>
								<option value="2"@if($convenient->kind == 2) selected @endif>Loại phòng trọ</option>
								<option value="3"@if($convenient->kind == 3) selected @endif>Loại dành cho người khuyết tật</option>
								<option value="4" @if($convenient->kind == 4) selected @endif>Loại khác</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nhập tên tiện nghi</label>
							<input class="form-control" name="name" placeholder="Tên Tiện nghi" value="{{$convenient->name}}" />
						</div>
						<button type="submit" class="btn btn-success">Lưu</button>
						<a class="btn btn-primary" href="admin/convenient/list"> Quay về danh sách</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection