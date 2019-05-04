<div class="banner">
	<div class="container-fluid">
		<div class="topnav">
			<a href="https://www.tvu.edu.vn/">Trang Chủ TVU</a>
			<a href="https://ktcn.tvu.edu.vn/">Khoa Kỹ thuật & Công nghệ</a>
			<a href="http://sit.tvu.edu.vn/">Bộ môn Công nghệ Thông Tin</a>
			<a href="http://ttsv.tvu.edu.vn/">Trang thông tin sinh viên</a>
		</div>
	</div>
</div>

<div class="header">
	<div class="container-fluid">
		<img class="img_banner" src="images/bg.png">
	</div>

</div>


<nav id="navbar" class="navbar navbar-inverse" role="navigation">
	<div class="container" >
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="trang-chu.html">Trang chủ</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@foreach ($categorys as $category)
				@if($category->kind == 2)
				<li>
					<a href="{{$category->slug}}.html">{{$category->name}}</a>
				</li>
				@endif
				@endforeach
				<li>
					<a href="tim-quanh-day.html">Tìm quanh đây</a>
				</li>
			</ul>

			@if(Auth::user() && Auth::user()->level<=2 )
			<ul class="nav navbar-nav navbar-right">
				<li><a class="btn-dangtin" href="user/motel/add"><i class="fas fa-edit"></i> Đăng tin ngay</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i> {{Auth::user()->fullname}} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="user/profile">Thông tin chi tiết</a></li>
						<li><a href="user/motel/add">Đăng tin</a></li>
						<li><a href="user/logout">Thoát</a></li>
					</ul>
				</li>
				<li><a href="user/logout"><i class="fas fa-sign-in-alt"></i> Đăng xuất</a></li>
			</ul>
			@else
			<ul class="nav navbar-nav navbar-right">
				<li><a class="btn-dangtin" href="user/motel/add"><i class="fas fa-edit"></i> Đăng tin ngay</a></li>
				<!-- <li><a href="user/login"><i class="fas fa-user-circle"></i> Đăng nhập / Đăng ký</a></li> -->
				<li><a href="{{ URL::to('auth/google') }}"><i class="fas fa-user-circle"></i> Đăng nhập / Đăng ký</a></li>
			</ul>
			@endif
		</div>
	</div>
</nav>


<div id="dailogfind" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tìm kiếm</h4>
			</div>
			<div class="modal-body">
				<form onsubmit="return false">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input id="vcategory" type="hidden" name="category" value="{{$category->id}}">
					<div class="form-group">
						<label class="dk">Chọn danh mục</label>
						<select id="category" name="category" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
							<!-- <option value="0">Chọn tất cả</option> -->
							@foreach ($categorys as $category)
							<option @if($category->id==1) selected @endif value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="dk">Chọn tỉnh</label>
						<select onchange="provinceChange(this.value)" id="province" name="province" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
							<option value="0">Chọn tất cả</option>
							@foreach ($provinces as $province)
							<option @if($province->id==1) selected @endif value="{{$province->id}}">{{$province->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="dk">Chọn quận/huyện</label>
						<select onchange="districtChange(this.value)" id="district" name="district" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
							<option value="0">Chọn tất cả</option>
							@foreach ($districts as $district)
							<option @if($district->id==1) selected @endif  value="{{$district->id}}">{{$district->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="dk">Chọn khoản giá</label>
						<select id="price" name="price" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
							<option min="0" max="10000000">Chọn tất cả</option>
							<option min="0" max="600000">Từ 400.000 - 600.000 vnđ</option>
							<option min="600000" max="800000">Từ 600.000 - 800.000 vnđ</option>
							<option min="800000" max="1000000">Từ 800.000 - 1.000.000 vnđ</option>
							<option min="1000000" max="1200000">Từ 1.000.000 - 1200.000 vnđ</option>
							<option min="1200000" max="1400000">Từ 1.200.000 - 1.400.000 vnđ</option>
							<option min="1400000" max="10000000">Từ 1.400.000 - 10.000.000 vnđ</option>
						</select>
					</div>
					<div class="form-group">
						<label class="dk">Chọn diện tích</label>
						<select id="acreage" name="acreage" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
							<option min="0" max="100">Chọn tất cả</option>
							<option min="10" max="20">Từ 10 20 m2</option>
							<option min="20" max="25">Từ 20 - 25 m2</option>
							<option min="25" max="30">Từ 25 - 30 m2</option>
							<option min="30" max="35">Từ 30 -35 m2</option>
							<option min="35" max="40">Từ 35 - 40 m2</option>
							<option min="40" max="45">Từ 40 - 45 m2</option>
							<option min="45" max="100">Từ 45 - 100 m2</option>
						</select>
					</div>
					<div class="form-group">
						<label class="dk">Tiện nghi</label>
						<select id="convenient" name="convenient[]" class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-show-subtext="true" data-live-search="true"  data-actions-box="true">
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
					<div class="form-group">
						<label class="dk">Tìm theo tên</label>
						<input id="name" type="text" name="name" class="form-control">
					</div>
					<button class="btn btn-success form-control" onclick="searchMotelajax()">Tìm kiếm</button>
				</form>
			</div>
		</div>

	</div>
</div>


<div id="menu-category" class="menu-category">
	@foreach ($categorys as $category)
	@if($category->kind == 2)
	<a href="{{$category->slug}}.html">{{$category->name}}</a>
	@endif
	@endforeach
</div>

<div class="navbar-fixed-bottom navbar-default" role="navigation">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li><a  id="menu"><span class="glyphicon glyphicon-align-justify"></span></a></li>
			<li><a href="trang-chu.html"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="user/motel/add"><span class="fas fa-edit"></span></a></li>
			<li><a href="user/profile"><span class="glyphicon glyphicon-user"></span></a></li>
			<li><a data-toggle="modal" data-target="#dailogfind"><span class="glyphicon glyphicon-search"></span></a></li>
		</ul>
	</div>
</div>

