$(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
});


function districtChange(value)
{

	$('select[name=district]').selectpicker();
	$('select[name=district]').val(value);

	$('select[name=province]').selectpicker();

	// Extract the value of the first option.
	var sVal = $('select[name=province] option:first').val();

	var data_send = {
		id: value
	}

	$.ajax({
		dataType: 'json',
		url : "searchprovince",
		method : "POST",
		data : data_send,
		success : function (result){
         		// Set the "selected" value of the <select>.
         		$('select[name=province]').val(result);
				// Force a refresh.
				$('select[name=district]').selectpicker('refresh');
				$('select[name=province]').selectpicker('refresh');
			}
		});


	// Force a refresh.
	$('select[name=district]').selectpicker('refresh');
	$('select[name=province]').selectpicker('refresh');
}


function provinceChange(value)
{

	$('select[name=province]').selectpicker();
	$('select[name=province]').val(value);

	$('select[name=district]').selectpicker();

	// Extract the value of the first option.
	var sVal = $('select[name=district] option:first').val();

	// Set the "selected" value of the <select>.
	$('select[name=district]').val(0);

	// Force a refresh.
	$('select[name=district]').selectpicker('refresh');
	$('select[name=province]').selectpicker('refresh');
}


function searchMotelajax(){
	var price_min = $("#price option:selected").attr("min");
	var price_max = $("#price option:selected").attr("max");
	var acreage_min = $("#acreage option:selected").attr("min");
	var acreage_max = $("#acreage option:selected").attr("max");
	var district_id = $("#district").val();
	var province_id = $("#province").val();
	var category_id = $("#category option:selected").val();
	var convenient = $("#convenient").val();
	var name = $("#name").val();


	var data_send = {
		price_min: price_min,
		price_max: price_max,
		acreage_min: acreage_min,
		acreage_max: acreage_max,
		district: district_id,
		province: province_id,
		category:category_id,
		convenient: convenient,
		name: name
	}

	$.ajax({
		// dataType: 'json',
		url : "searchmotel",
		method : "POST",
		data : data_send,
		success : function (result){
			var data ='<h3 class="title-comm"><span class="title-holder">KẾT QUẢ TÌM KIẾM</span></h3>';
			data += result;
			$("#content").html(data);
		}
	});

	$('html, body').animate({
		scrollTop: $('#content').offset().top

	},1000);

	$('#dailogfind').modal('hide');
}


function searchMotelajax_2(){
	var price_min = $("#price_2 option:selected").attr("min");
	var price_max = $("#price_2 option:selected").attr("max");
	var acreage_min = $("#acreage_2 option:selected").attr("min");
	var acreage_max = $("#acreage_2 option:selected").attr("max");
	var district_id = $("#district_2").val();
	var province_id = $("#province_2").val();
	var category_id = $("#category_2 option:selected").val();
	var convenient = $("#convenient_2").val();
	var name = $("#name_2").val();


	var data_send = {
		price_min: price_min,
		price_max: price_max,
		acreage_min: acreage_min,
		acreage_max: acreage_max,
		district: district_id,
		province: province_id,
		category:category_id,
		convenient: convenient,
		name: name
	}

	$.ajax({
		// dataType: 'json',
		url : "searchmotel",
		method : "POST",
		data : data_send,
		success : function (result){
			var data ='<h3 class="title-comm"><span class="title-holder">KẾT QUẢ TÌM KIẾM</span></h3>';
			data += result;
			$("#content").html(data);
		}
	});

	$('html, body').animate({
		scrollTop: $('#content').offset().top

	},1000);
}

$(document).ready(function(){
	$("#myBtn").click(function(){
		$("#find").slideToggle("slow");
		$('html, body').animate({
			scrollTop: $('#find').offset().top
		},1000);
	});

	$("#btntop").click(function(){
		$('html, body').animate({
			scrollTop: $('#totop').offset().top
		},1000);
	});

	$('form').bind("keypress", function(e) {
		if (e.keyCode == 13) {               
			e.preventDefault();
			return false;
		}
	});
});

function searchajax(){

	var name = $("#key").val();

	console.log(name);
	var data_send = {
		name: name
	}

	$.ajax({
		// dataType: 'json',
		url : "searchajax",
		method : "POST",
		data : data_send,
		success : function (result){
			var data ='<h3 class="title-comm"><span class="title-holder">KẾT QUẢ TÌM KIẾM</span><marquee>Còn nhiều kết quả khác - hãy xem nó có phù hợp với bạn</marquee></h3>';
			data += result;
			$("#content").html(data);
		}
	});

	$('html, body').animate({
		scrollTop: $('#content').offset().top
	},1000);
}




function timquanhday(){
	var khoangcach = $("#khoangcach option:selected").val();
	var lat = $("#txtLat").val();
	var log = $("#txtLog").val();



	var data_send = {
		khoangcach: khoangcach,
		lat: lat,
		log: log,
	}

	$.ajax({
		// dataType: 'json',
		url : "kqtimquanhday",
		method : "POST",
		data : data_send,
		success : function (result){
			var data = result;
			$("#content").html(data);
		}
	});
}
