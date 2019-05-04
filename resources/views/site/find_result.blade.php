@if(count($motels) == 0)
<h3 class="title-comm"><span class="title-holder">KẾT QUẢ TÌM KIẾM</span></h3>
<div style="margin-top: 10px" class="alert alert-danger">
	<p><i class="fa fa-bolt"></i> Không tìm thấy một kết quả nào</p>
</div>
@else
<h3 class="title-comm"><span class="title-holder">KẾT QUẢ MAP</span></h3>
<div style="margin-top: 10px" class="alert alert-info">
	<p><i class="fa fa-bolt"></i> Kết quả tìm kiếm: có {{count($motels)}} nhà trọ như điều kiện của bạn </p>
</div>
<div id="map-canvas" style="width: auto; height: 500px;"></div>
<h3 class="title-comm"><span class="title-holder">KẾT QUẢ TÌM KIẾM</span></h3>
<div style="margin-top: 10px" class="alert alert-info">
	<p><i class="fa fa-bolt"></i> Kết quả tìm kiếm: có {{count($motels)}} nhà trọ như điều kiện của bạn </p>
</div>
@endif
<div class="row motel-hot">
	@php($i=0)
	@foreach($motels as $motel)
	@php($img= json_decode($motel->image,true))
	<div class="col-md-4 col-sm-6">
		<div class="motel-item">
			<div class="wrap-img" style="background: url(uploads/images/{{$img[0]}}) center; background-size: cover;">
				<div class="category">
					<a href="{{ $motel->category->slug}}.html">{{ $motel->category->name }}</a>
				</div>
			</div>
			<div class="motel-detail">
				<h4><a href="{{ $motel->category->slug}}/{{ $motel->slug }}.html">{{ $motel->name }}</a></h4>
				<div class="motel-meta">
					<span><i class="fas fa-user-circle"></i> Người đăng: <a href="/"> {{ $motel->user->fullname }}</a></span>
					<span class="pull-right"><i class="far fa-clock">{{time_elapsed_string($motel->created_at)}}</i>
					</span>
				</div>
				<div class="motel-description"><i class="fas fa-audio-description"></i>
					{!! limit_description($motel->description) !!}
				</div>
				<div class="motel-info">
					<span><i class="far fa-stop-circle"></i> Diện tích: <b>{{ $motel->acreage }} m<sup>2</sup></b></span>
					<span class="pull-right"><i class="fas fa-eye"></i> Lượt xem: <b>{{ $motel->view }}</b></span>
					<div><i class="fas fa-map-marker"></i>
						Địa chỉ: {{ $motel->address }}
					</div>
					<div style="color: #e74c3c">
						<i class="far fa-money-bill-alt"></i> Giá thuê:
						<b>{{ number_format($motel->price) }} VNĐ</b>
					</div>
				</div>
			</div>
			<div class="motel-btn text-center">
				<a class="btn btn-info" href="{{ $motel->category->slug}}/{{ $motel->slug }}.html"> <i class="fas fa-shopping-cart"></i> Xem chi tiết</a>
			</div>
		</div>
	</div>
	@php($i++)
	@endforeach
</div>

<script>
	var map;
	var markers = [];

	function initialize()
	{
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				start = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				addMarker(start);
			}, function () {
				start = new google.maps.LatLng(9.923556, 106.345886);
				addMarker(start);
			});
		}
		else
		{
			start = new google.maps.LatLng(9.923556, 106.345886);
			addMarker(start);
		}

		var daihoctravinh= new google.maps.LatLng(9.923556, 106.345886);


		var mapOptions = {
			zoom: 15,
			center: daihoctravinh,
		};


		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


		var motels = @json($motels);

		console.log(motels);
		for (i in motels){

			var data = motels[i];

			var location = JSON.parse(data.location);
			var latlng =  new google.maps.LatLng(location["0"],location["1"]);
			var phongtro = new google.maps.Marker({
				position:  latlng,
				map: map,
				title: data.name,
				icon: "images/gps.png",
				content: 'kimxuanhong'
			});
			var infowindow = new google.maps.InfoWindow();
			(function(phongtro, data){
				var image = JSON.parse(data.image);
				var content = '<div id="iw-container">' +
				'<img height="200px" width="350" src="uploads/images/'+image["0"]+'">'+
				'<a href="'+data.category.slug+'/'+data.slug+'.html"><div class="iw-title">' + data.name +'</div></a>' +
				'<p><i class="fas fa-map-marker" style="color:#003352"></i> '+ data.address +'<br>'+
				'<br><strong>Phone. ' +data.phone +'</strong></div>';

				google.maps.event.addListener(phongtro, "click", function(e){

					infowindow.setContent(content);
					infowindow.open(map, phongtro);
				});
			})(phongtro,data);

		}
	}

	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			icon: "images/user.png",
			title: "Đại học Trà VInh"
		});
		var infowindow = new google.maps.InfoWindow();
		(function(marker){
			var content = '<div>Vị trí hiện tại của bạn</div>';
			infowindow.setContent(content);
			infowindow.open(map, marker);
			google.maps.event.addListener(marker, "click", function(e){

				infowindow.setContent(content);
				infowindow.open(map, marker);
			});
		})(marker);
		markers.push(marker);
	}

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&language=vi"></script>