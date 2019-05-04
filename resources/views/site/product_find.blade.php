@if(count($motels) == 0)
<div style="margin-top: 10px" class="alert alert-danger">
	<p><i class="fa fa-bolt"></i> Không tìm thấy một kết quả nào</p>
</div>
@else
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