<script>
	var map;
	var markers = [];

	function initialize()
	{
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

		addMarker(daihoctravinh);
	}


	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			icon: "images/motel.png",
			title: "Đại học Trà VInh"
		});
		var infowindow = new google.maps.InfoWindow();
		(function(marker){
			var content = '<div>Đại học Trà Vinh</div>';
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