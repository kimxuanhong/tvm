@extends('site.layout.layout')
@section('content2')
<section class="content container">
	<div class="row">
		<div class="col-lg-12">
			@if ($errors->any())
			<div class="alert alert-danger">
				<strong>Whoops!</strong> Có một số lỗi xảy ra.<br><br>
				<ol>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ol>
			</div>
			@endif
			@if(session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
			@endif
		</div>
	</div>
	<h1>Đăng tin nhà trọ</h1>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<form id="form" action="user/motel/add" method="POST" enctype="multipart/form-data" >
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label>Danh mục nhà trọ</label>
							<select name="category" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
								@foreach ($categorys as $category)
								@if($category->kind==2)
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label >Tên nhà trọ</label>
							<input type="text" class="form-control" name="name">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Tên người liên hệ</label>
							<input type="text" class="form-control" name="owner" value="{{Auth::user()->fullname}}">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Số điện Thoại</label>
							<input type="text" class="form-control" name="phone">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label >Giá</label>
							<input type="number" class="form-control" name="price">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label >Diện tích</label>
							<input type="number" class="form-control" name="acreage" step=0.01>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label >Số Phòng</label>
							<input type="number" class="form-control" name="room">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Chọn tiện nghi</label>
							<select name="convenient[]" class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-show-subtext="true" data-live-search="true"  data-actions-box="true">
								<optgroup label="Tiện nghi nhà trọ">
									@foreach ($convenients as $convenient)
									@if($convenient->kind ==1)
									<option value="{{$convenient->id}}">{{$convenient->name}}</option>
									@endif
									@endforeach
								</optgroup>
								<optgroup label="Tiện nghi phòng trọ">
									@foreach ($convenients as $convenient)
									@if($convenient->kind ==2)
									<option value="{{$convenient->id}}">{{$convenient->name}}</option>
									@endif
									@endforeach
								</optgroup>
							</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Chọn quận/huyện</label>
							<select name="district" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
								@foreach ($districts as $district)
								<option value="{{$district->id}}">{{$district->name}} - {{$district->province->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label>Địa chỉ:</label> Bạn có thể nhập hoặc chọn ví trí trên bản đồ
							<input type="text" id="location-text-box" name="address" class="form-control" value="" />
						</div>
					</div>
					<input type="hidden" id="txtaddress" name="location" value=""  class="form-control"  />
					<input type="hidden" id="txtlat" value="" name="lat"  class="form-control"  />
					<input type="hidden" id="txtlng"  value="" name="lng" class="form-control" />
				</div>
				<div style="margin-top: 10px" class="alert alert-danger">
					<p><i class="fa fa-bolt"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
				</div>
				<div id="map-canvas" style="width: auto; height: 400px;margin-bottom: 20px"></div>
				<div class="form-group">
					<label >Giới thiệu</label>
					<textarea id="editor1" name="description" rows="10" cols="80">
					</textarea>
				</div>
				<div style="margin-top: 10px" class="form-group">
					<label >Thêm hình ảnh:</label>
					<div class="file-loading">
						<input id="file-5" type="file" class="file" name="image[]" multiple data-preview-file-type="any" data-upload-url="#">
					</div>
				</div>
				<input id="btndangtin" type="submit" name="hong" value="Đăng" class="btn btn-success btn-block">
			</form>
		</div>
	</div>
	<hr>
</section>
@include('admin.layout.map')
<script type="text/javascript" src="assets/js/myjs.js"></script>
@endsection