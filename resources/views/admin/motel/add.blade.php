@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Loại nhà trọ
		<small>Thêm mới</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Loại nhà trọ</a></li>
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
		</div>
	</div>
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Thêm</h3>
		</div>
		<div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data" >
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Chọn Loại nhà trọ</label>
							<select name="district" class="form-control select2" style="width: 100%;">
								@foreach ($theloais as $theloai)
								<option value="{{$theloai->id}}">{{$theloai->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="usr">Tên nhà trọ</label>
							<input type="text" class="form-control" name="txttitle">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Địa chỉ:</label> Bạn có thể nhập hoặc chọn ví trí trên bản đồ
					<input type="text" id="location-text-box" name="txtaddress" class="form-control" value="" />
					<div style="margin-top: 10px" class="alert alert-info">
						<p><i class="fa fa-bolt"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
					</div>
					<input type="hidden" id="txtaddress" name="txtaddress" value=""  class="form-control"  />
					<input type="hidden" id="txtlat" value="" name="txtlat"  class="form-control"  />
					<input type="hidden" id="txtlng"  value="" name="txtlng" class="form-control" />
				</div>
				<div id="map-canvas" style="width: auto; height: 400px;"></div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Chọn Quận/Huyện</label>
							<select name="district" class="form-control select2" style="width: 100%;">
								@foreach ($quans as $quan)
								<option value="{{$quan->id}}">{{$quan->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Chọn Xã/Khóm/Phường</label>
							<select name="district" class="form-control select2" style="width: 100%;">
								@foreach ($phuongs as $phuong)
								<option value="{{$phuong->id}}">{{$phuong->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="usr">Giá</label>
							<input type="number" class="form-control" name="txttitle">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="usr">Số Phòng</label>
							<input type="number" class="form-control" name="txttitle">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Chủ nhà trọ</label>
							<select name="district" class="form-control select2" style="width: 100%;">
								@foreach ($chutros as $chutro)
								<option value="{{$chutro->id}}">{{$chutro->fullname}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="usr">Diện tích</label>
							<input type="number" class="form-control" name="txttitle" step=0.01>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Tiện nghi nhà trọ</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
								@foreach ($tiennghis as $tiennghi)
								<option value="{{$tiennghi->id}}">{{$tiennghi->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="usr">Số điện Thoại</label>
							<input type="text" class="form-control" name="txttitle">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Tiện nghi trong phòng</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
								@foreach ($tiennghiphongs as $tiennghiphong)
								<option value="{{$tiennghiphong->id}}">{{$tiennghiphong->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Gần với</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
								@foreach ($diadiems as $diadiem)
								<option value="{{$diadiem->id}}">{{$diadiem->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="usr">Giới thiệu</label>
					<textarea id="editor1" name="editor1" rows="10" cols="80">
					</textarea>
				</div>

				<div style="margin-top: 10px" class="form-group">
					<label for="comment">Thêm hình ảnh:</label>
					<div class="file-loading">
						<input id="file-5" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#">
					</div>
				</div>
				<button class="btn btn-primary">Thêm</button>
			</form>
		</div>
	</div>
</section>
@endsection