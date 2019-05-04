@extends('site.layout.master')
@section('content')
<div class="container">
	<br>
	<table class="tbCenter">
		<tr>
			<td style="text-align: center; font-size: 20px;">Chào mừng bạn trở lại</td>
		</tr>
		<tr>
			<td><hr></td>
		</tr>
		<tr>
			<td>
				<a style="width: 100%;height: 35px;" class="btn btn-danger form-control" href="{{ URL::to('auth/google') }}">Đăng nhập / Đăng ký bằng <i class="fab fa-google-plus-g"></i> </a>
			</td>
		</tr>
	</table>
</div>
<style type="text/css">
.tbCenter{
	margin: auto; width: 30%; padding-top: 100px
}

@media (max-width: 600px) {
	.tbCenter{
		width: 70%;
	}
}

</style>
@endsection