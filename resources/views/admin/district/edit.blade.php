@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Quận/Huyện
		<small>Thêm mới</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Quận/Huyện</a></li>
		<li class="active">Thêm mới</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-lg-12">
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
					<form action="" method="POST" enctype="multipart/form-data" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label>Chọn Tỉnh/Thành Phố</label>
							<select name="province" class="form-control select2">
								@foreach ($provinces as $province)
								<option @if($province->id== $district->province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Tên Quận/Huyện</label>
							<input type="text" class="form-control" name="name" value="{{$district->name}}">
						</div>
						<button class="btn btn-primary">Lưu</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection