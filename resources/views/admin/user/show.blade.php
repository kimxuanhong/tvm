@extends('admin.layout.master')
@section('content')

<section class="content-header">
	<h1>
		Thông tin người dùng
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Quản lý người dùng</li>
		<li class="active">Quản lý nhà trọ</li>
	</ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row col-lg-6">
		<table class="table">
			<tr>
				<td><strong>Họ Tên</strong></td>
				<td>{{$User->fullname}}</td>
			</tr>
			<tr>
				<td><strong>Giới tính</strong></td>
				<td>{{$User->sex}}</td>
			</tr>
			<tr>
				<td><strong>Ngày Sinh</strong></td>
				<td>{{$User->birthday}}</td>
			</tr>
			<tr>
				<td><strong>Địa Chỉ</strong></td>
				<td>{{$User->address}}</td>
			</tr>
			<tr>
				<td><strong>Email</strong></td>
				<td>{{$User->email}}</td>
			</tr>
			<tr>
				<td><strong>SĐT</strong></td>
				<td>{{$User->phone}}</td>
			</tr>
		</table>
	</div>

	<div class="row col-lg-12 text-center">

    	<h2>Danh sách nhà trọ của người dùng</h2>
    </div>
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('motels.create') }}"> Create</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>Địa Chỉ</th>
            <th>Số Phòng</th>
            <th>Số Phòng Trống</th>
            <th>Giá Cho Thuê</th>
            <th>Mô Tả</th>
            <th width="200px">Action</th>
        </tr>
        <?php
$i = 1;
?>
        @foreach ($motels as $motel)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $motel->name }}</td>
            <td>{{ $motel->phone }}</td>
            <td>{{ $motel->address }}</td>
            <td>{{ $motel->room_total }}</td>
            <td>{{ $motel->room_available }}</td>
            <td>{{ $motel->price }}</td>
            <td>{{ $motel->description }}</td>
            <td>
                <form action="{{ route('motels.destroy',$motel->id) }}" method="POST">


                    <a class="btn btn-info" href="{{ route('motels.show',$motel->id) }}">Show</a>


                    <a class="btn btn-primary" href="{{ route('motels.edit',$motel->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')


                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $motels->links() !!}
</section>
@endsection