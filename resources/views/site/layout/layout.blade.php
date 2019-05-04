@extends('site.layout.master')
@section('content')
<div class="container" style="padding-bottom: 10px;padding-top: 10px">
		<div id="content"></div>
	<ul class="nav nav-pills">
		<li class="active"><a href="user/profile">Thông tin cá nhân</a></li>
		<li><a class="btn btn-default" href="user/motel/add">Đăng tin nhà trọ</a></li>
	</ul>
</div >
@yield('content2')
@endsection