<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload

function ChuHoa($string) {
	echo strtoupper($string);
}

function generateRandomString($length) {
	$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$charsLength = strlen($characters) - 1;
	$string = "";
	for ($i = 0; $i < $length; $i++) {
		$randNum = mt_rand(0, $charsLength);
		$string .= $characters[$randNum];
	}
	return $string;
}

function distance($value, $lat2, $lon2) {

	$location = json_decode($value, JSON_FORCE_OBJECT);
	$lat1 = $location[0];
	$lon1 = $location[1];
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	return $miles * 1.609344;
}

function distance2($lat1, $lon1, $lat2, $lon2, $unit) {

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K") {
		return ($miles * 1.609344);
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
}
function changeTitle($str, $strSymbol = '-', $case = MB_CASE_LOWER) {
// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = trim($str);
	if ($str == "") {
		return "";
	}

	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, $case, 'utf-8');
	$str = preg_replace('/[\W|_]+/', $strSymbol, $str);
	return $str . '-' . generateRandomString(10);
}

function stripUnicode($str) {
	if (!$str) {
		return '';
	}

	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae' => 'ǽ',
		'AE' => 'Ǽ',
		'c' => 'ć|ç|ĉ|ċ|č',
		'C' => 'Ć|Ĉ|Ĉ|Ċ|Č',
		'd' => 'đ|ď',
		'D' => 'Đ|Ď',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f' => 'ƒ',
		'F' => '',
		'g' => 'ĝ|ğ|ġ|ģ',
		'G' => 'Ĝ|Ğ|Ġ|Ģ',
		'h' => 'ĥ|ħ',
		'H' => 'Ĥ|Ħ',
		'i' => 'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij' => 'ĳ',
		'IJ' => 'Ĳ',
		'j' => 'ĵ',
		'J' => 'Ĵ',
		'k' => 'ķ',
		'K' => 'Ķ',
		'l' => 'ĺ|ļ|ľ|ŀ|ł',
		'L' => 'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe' => 'œ',
		'OE' => 'Œ',
		'n' => 'ñ|ń|ņ|ň|ŉ',
		'N' => 'Ñ|Ń|Ņ|Ň',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's' => 'ŕ|ŗ|ř',
		'R' => 'Ŕ|Ŗ|Ř',
		's' => 'ß|ſ|ś|ŝ|ş|š',
		'S' => 'Ś|Ŝ|Ş|Š',
		't' => 'ţ|ť|ŧ',
		'T' => 'Ţ|Ť|Ŧ',
		'w' => 'ŵ',
		'W' => 'Ŵ',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z' => 'ź|ż|ž',
		'Z' => 'Ź|Ż|Ž',
	);
	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}

function limit_description($string) {
	$string = strip_tags($string);
	if (strlen($string) > 150) {

		// truncate string
		$stringCut = substr($string, 0, 150);
		$endPoint = strrpos($stringCut, ' ');

		//if the string doesn't contain any space then it will cut without word basis.
		$string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		$string .= '...';
	}
	return $string;
}

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'năm',
		'm' => 'tháng',
		'w' => 'tuần',
		'd' => 'ngày',
		'h' => 'giờ',
		'i' => 'phút',
		's' => 'giây',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) {
		$string = array_slice($string, 0, 1);
	}

	return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
}

?>