@extends('admin.layout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Người dùng
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Người dùng</a></li>
        <li class="active">Dach sách</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Người quản trị</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Tên người dùng</th>
                        <th>Số ĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th width="140px">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if($user->level ==1)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                            <a class="btn btn-danger" href="admin/user/delete/{{ $user->id }}">Xóa</a>
                            <a class="btn btn-warning" href="admin/user/disable/{{ $user->id }}">Khóa</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Người dùng thường</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Tên người dùng</th>
                        <th>Số ĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th width="140px">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if($user->level ==2)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                            <a class="btn btn-danger" href="admin/user/delete/{{ $user->id }}">Xóa</a>
                            <a class="btn btn-warning" href="admin/user/disable/{{ $user->id }}">Khóa</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách tạm khóa</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Tên người dùng</th>
                        <th>Số ĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th width="140px">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if($user->level >= 3)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                            <a class="btn btn-danger" href="admin/user/delete/{{ $user->id }}">Xóa</a>
                            <a class="btn btn-warning" href="admin/user/enable/{{ $user->id }}">Kích hoạt</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection