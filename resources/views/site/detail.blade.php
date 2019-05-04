@extends('site.layout.master')
@section('content')
<div id="totop" class="container">
	<div id="content"></div>
	<div class="">
		<ul class="breadcrumb">
			<li><a href="trang-chu.html">Trang Chủ</a></li>
			<li><a href="{{$motel->category->slug}}.html">{{ $motel->category->name }}</a></li>
			<li class="active">{{ $motel->name }}</li>
		</ul>
	</div>
	<h3 class="title-comm"><span class="title-holder product-title" style="margin-bottom: 0;">THÔNG TIN {{ $motel->name }}</span></h3>
	<div class="card">
		<div class="wrapper">
			<div class="preview col-md-6">
				<div class="preview-pic tab-content">
					@php ($i = 1)
					@foreach(json_decode($motel->image, TRUE) as $image)
					<div class="tab-pane @if($i==1) active @endif" id="pic-{{$i}}" style="background: url(uploads/images/{{$image}}) center; background-size: cover;width: 100%;min-height: 350px"></div>
					@php ($i++)
					@endforeach
				</div>
				<ul class="preview-thumbnail nav nav-tabs">
					@php ($y = 1)
					@foreach(json_decode($motel->image, TRUE) as $image)
					<li @if($y==1) class="active" @endif><a data-target="#pic-{{$y}}" data-toggle="tab"><img src="uploads/images/{{$image}}" style="height: 70px; max-width: 120px" /></a></li>
					@php ($y++)
					@endforeach
				</ul>
				<div id="btnShowMap" style="margin-top: 20px" class="asks-first">
					<div class="asks-first-circle">
						<span class="fas fa-motorcycle"></span>
					</div>
					<div>
						<h3>Xem ngay chỉ đường</h3>
						<p>Hãy bật vị trí để có kết quả tốt nhất</p>
					</div>
				</div>
			</div>
			<div class="details col-md-6">
				<h3 class="product-title">{{ $motel->name }}</h3>
				<div class="rating">
					<div class="stars">
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					</div>
					<br>
					<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<div style="padding-top: 10px">					<div class="zalo-share-button" data-href="http://developers.zalo.me" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize="false"></div>
				</div>
				<hr>
				<span class="review-no"><i class="fas fa-eye"></i><b> Lượt xem: <span style="color: red; font-weight: bold;">{{$motel->view}}</span></b></span>
				<span class="pull-right"><span><i class="far fa-clock"></i><b> Ngày đăng: </b></span> <span style="color: red; font-weight: bold;">{{time_elapsed_string($motel->created_at)}}</span></span>
			</div>
			<strong><h4>GIÁ PHÒNG: <span class="price_area">{{number_format($motel->price)}} <span class="price_label">VND</span></span> </h4></strong>
			<div class="phone_btn">
				<a id="show_phone_bnt" href="tel:{{ $motel->phone }}" class="btn btn-primary" style="font-weight: bold !important;font-size: 14px;">
					<i class="fas fa-phone-square" style="font-size: 20px"></i>
					<span> Gọi Điện Thoại</span></a>
						<a id="show_phone_bnt" href="mailto:{{$motel->user->email}}" class="btn btn-warning" style="font-weight: bold !important;font-size: 14px;">
						<i class="fas fa-envelope" style="font-size: 20px"></i>
						<span> Gửi Mail</span></a>
					</div>
					<div class ="km-detail">
						<div class="fs-dtslt">Tiện ích </div>
						<div style="padding: 5px;">
							@foreach($motel->convenient as $tienich)
							<span><i class="fas fa-check"></i> {{ $tienich->name }}</span>
							@endforeach
						</div>
					</div>
					<div class="km-detail">
						<div class="fs-dtslt">Thông tin chi tiết</div>
						<div>
							<table class="table">
								<tr>
									<td style="width: 200px"><b>Lượt xem</b></td>
									<td>{{$motel->view}}</td>
								</tr>
								<tr>
									<td><b>Giá thuê/tháng/phòng</b></td>
									<td><span>{{number_format($motel->price)}} <span class="price_label">VND</span></span></td>
								</tr>
								<tr>
									<td><b>Số lượng phòng</b></td>
									<td>{{$motel->room_total}}</td>
								</tr>
								<tr>
									<td><b>Diện tích</b></td>
									<td><span> {{$motel->acreage}} m <sup>2</sup> </span></td>
								</tr>
								<tr>
									<td><b>Địa chỉ</b></td>
									<td>{{$motel->address}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h3 class="title-comm"><span class="title-holder">Mô TẢ THÊM</span></h3>
		<div style="padding: 5px; background-color: #F5F5F5">
			{!! $motel->description !!}
		</div>
		<div id="divMap" style="display: none;">
			<h3 class="title-comm"><span class="title-holder">THÔNG TIN ĐƯỜNG ĐI</span></h3>
			<div class="alert alert-info">
				<p><i class="fa fa-bolt"></i>Thông tin thêm:</h4> <span id="infoDirections">...</span></p>
			</div>
			<div id="map" style="height: 500px;border-radius: 5px;"></div>
		</div>

		<button id="btntop" data-toggle="tooltip" title="TO TOP"><span class="glyphicon glyphicon-chevron-up"></span></button>
		<h3 class="title-comm"><span class="title-holder">THÔNG TIN THÊM</span><!-- <marquee>Vị trí và nhiều thông tin hơn nửa</marquee> --></h3>
		<div class="row">
			<div class="col-md-4">
				<div>
					<div class="phone_btn">
						<a id="show_phone_bnt" href="tel:{{ $motel->phone }}" class="btn btn-primary btn-block" style="font-weight: bold !important;
						font-size: 14px;">
						<i class="fas fa-phone-square" style="font-size: 20px"></i>
						<span> Gọi Điện Đặt Ngay</span></a>
					</div>
<!-- 					@if(session('thongbao'))
					<div class="alert bg-success">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<span class="text-semibold">Well done!</span>  {{session('thongbao')}}
					</div>
					@else
					<div class="report">
						<h4>BÁO CÁO</h4>
						<form action="" >
							<label class="radio" style="margin-right:15px"> Đã cho thuê
								<input type="radio" checked="checked" name="baocao" value="1">
								<span class="checkround"></span>
							</label>
							<label class="radio"> Sai thông tin
								<input type="radio" name="baocao" value="2">
								<span class="checkround"></span>
							</label>
							<button class="btn btn-danger">Gửi báo cáo</button>
						</form>
					</div>
					@endif -->
					<div style="margin-top: 20px" class="asks-first2">
						<div class="asks-first-circle">
							<span class="fa fa-search"></span>
						</div>
						<div class="">
							<h4>Giải pháp tìm kiếm mới</h4>
							<p>Tiết kiệm nhiều thời gian cho bạn với giải pháp và công nghệ mới</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<h4>Bình luận về nhà trọ</h4>
				<hr>
				<div class="fb-comments" data-width="100%"  data-order-by="reverse_time" data-href="" data-numposts="5"></div>

				<script type="text/javascript">
					$(document).ready(function() {
						$(".fb-comments").attr('data-href',window.location);
						$(".fb-like").attr('data-href',window.location);
						$(".fb-comments-count").attr('data-href',window.location);
						$(".zalo-share-button").attr('data-href',window.location);
					});
				</script>
			</div>
		</div>
		<!-- danh mục -->
		<h3 class="title-comm"><span class="title-holder">NHÀ TRỌ LIÊN QUAN</span></h3>
		@includeIf('site.product', ['motels' => $motels])
	</div>

	<script>
		// lấy vị trí của bệnh viện từ kết quả
		var motel = @json($motel);
		var lat = JSON.parse(motel.location);
		//khởi tạo bản đồ
		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: {lat:9.923556, lng:106.345886},
				// gestureHandling: 'greedy'
			});

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(lat["0"], lat["1"]),
				map: map,
				icon: "images/gps.png",
				title: motel["name"],
			});
			var start;
			directionsDisplay.setMap(map);
		//nếu có hỗ trợ lấy vị trí
		if (navigator.geolocation) {
			//nếu vị trị dc cho phép
			navigator.geolocation.getCurrentPosition(function(position) {
				start  = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
				var marker = new google.maps.Marker({
					position: start,
					map: map,
					icon: "images/user.png",
					title: 'vị trí của bạn',
				});
				calculateAndDisplayRoute(directionsService, directionsDisplay,start);
			}, function() {  //nếu vị trí không dc phép bật
				start =new google.maps.LatLng(9.923556, 106.345886);
				calculateAndDisplayRoute(directionsService, directionsDisplay,start);
			});
		}
		else // nếu trình duyệt không hỗ trợ lấy vị trí
		{
			start =new google.maps.LatLng(9.923556, 106.345886);
			calculateAndDisplayRoute(directionsService, directionsDisplay,start);
		}
	}
	//hàm này để hiện thị chỉ đường nè
	function calculateAndDisplayRoute(directionsService, directionsDisplay,start) {
		directionsService.route({
			origin: start,
			destination: new google.maps.LatLng(lat["0"], lat["1"]),
			travelMode: 'DRIVING'
		}, function(response, status) {
			if (status === google.maps.DirectionsStatus.OK) {
				directionsDisplay.setOptions({ preserveViewport: true });
				directionsDisplay.setDirections(response);
				var htmlReturn = '';
				var route = response.routes[0];
				htmlReturn += "Khoảng cách với bạn: <strong>" + route.legs[0].distance.text + "</strong>, Thời gian chạy xe: <strong>" + route.legs[0].duration.text + "</strong>";
				document.getElementById('infoDirections').innerHTML  = htmlReturn;
			} else {
				window.alert('Directions request failed due to ' + status);
			}
		});
	}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD20leyBaRoFAvwVxKJwKzWdxJur6vnPiE&callback=initMap">
</script>
<script>
	$(document).ready(function(){
		$("#btnShowMap").click(function(){
			$("#divMap").slideDown("slow");
			$('html, body').animate({
				scrollTop: $('#divMap').offset().top
			},1000);
		});
	});
</script>

<!-- <script src="https://sp.zalo.me/plugins/sdk.js"></script> -->
@endsection