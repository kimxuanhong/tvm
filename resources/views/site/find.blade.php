@extends('site.layout.master')
@section('content')
<div id="totop"  class="container" style="min-height: 400px">
    <form onsubmit="return false">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div style="margin: auto; width: 400px; padding-top: 50px">
            <div id="pnkhoangcach">
                <table>
                    <tr>
                        <td colspan="2" style="text-align: center; font-size: 20px;">Tìm kiếm nhà trọ gần bạn</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="khoangcach" id="khoangcach" data-show-subtext="true" data-live-search="true" style="height:45px;width:200px;">
                                <option value="0.5">-------- Chọn bán kính -------</option>
                                <option value="1">Dưới 1 km</option>
                                <option value="2">Dưới 2 km</option>
                                <option value="3">Dưới 3 km</option>
                                <option value="4">Dưới 4 km</option>
                                <option value="5">Dưới 5 km</option>
                                <option value="6">Dưới 6 km</option>
                                <option value="7">Dưới 7 km</option>
                                <option value="8">Dưới 8 km</option>
                                <option value="9">Dưới 9 km</option>
                                <option value="10">Dưới 10 km</option>
                            </select>
                        </td>
                        <td>
                            <input onclick="timquanhday()" type="submit" name="submit" value="Tìm ngay" style="color:White;background-color:#E65C15;border-color:Green;border-style:None;height:45px;width:200px;" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <input name="txtLat" type="text" value="9.92355" id="txtLat" style="display: none;" />
        <input name="txtLog" type="text" value="106.345886" id="txtLog" style="display: none;" />
    </form>
    <div id="content">
    </div>

    <script>
        var map;
        var markers = [];
        var start;
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                icon: "images/user.png",
                title: "Đại học Trà Vinh"
            });
            var infowindow = new google.maps.InfoWindow();
            (function (marker) {
                var content = '<div>Vị trí của bạn</div>';
                infowindow.setContent(content);
                infowindow.open(map, marker);
                google.maps.event.addListener(marker, "click", function (e) {

                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                });
            })(marker);
            markers.push(marker);
        }


        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    start = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    $("#txtLat").val(position.coords.latitude);
                    $("#txtLog").val(position.coords.longitude);

                    addMarker(start);
                }, function () {
                	// chỗ này níu trình duyệt bật lấy vị trí thì em gán mặt định ... phần này tránh lỗi
                    start = new google.maps.LatLng(9.923556, 106.345886);
                    $("#txtLat").val("9.923556");
                    $("#txtLog").val("106.345886");
                    addMarker(start);
                });
            }
            else
            {
            	// chỗ này níu trình duyệt không hỗ trợ lấy vị trí thì em gán mặt định ... phần này tránh lỗi
                start = new google.maps.LatLng(9.923556, 106.345886);
                $("#txtLat").val("9.923556");
                $("#txtLog").val("106.345886");
                addMarker(start);
            }
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD20leyBaRoFAvwVxKJwKzWdxJur6vnPiE&callback=initMap"></script>
</div>
@endsection