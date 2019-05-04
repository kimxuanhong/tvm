<!-- contain link css -->
@include('site.layout.header')

<!-- contain header and navbar -->
@include('site.layout.navbar')

<!-- contain content -->
<div id="wraper" style="background-color: #F5F5F5; min-height: 400px">
@yield('content')
</div>
<!-- contain link js and footer -->
@include('site.layout.footer')