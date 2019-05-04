@include('admin.layout.css')
@include('admin.layout.header')
@include('admin.layout.menu')
<div class="content-wrapper">
  @yield('content')
</div>
@include('admin.layout.footer')
@include('admin.layout.sidebar')
@include('admin.layout.js')
@include('admin.layout.script')
@include('admin.layout.end')
