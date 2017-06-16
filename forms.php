<?php
define( '_JEXEC', 1 );
header('Content-type: text/plain; charset=utf8');
if ($_POST) {
	//VAR
	$to  = "info@zlataooo.ru" ;
	$subject = 'Новый лид ООО "ЗЛАТА"!';
	//GEO
	include("SxGeo.php");
	$SxGeo = new SxGeo('SxGeoCity.dat');
	$ip = $_SERVER['REMOTE_ADDR'];
	$city = $SxGeo->getCityFull($ip);
	$city2 = $city['city']['name_ru'];
	//Mobile detect
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ( $detect->isMobile() ) {
		$detect1 = 'Смартфон';
		if( $detect->isiOS() ){
			$detect2 = 'iOS ';
		}
		if( $detect->isAndroidOS() ){
			$detect2 = 'Android ';
		}
	}
	if( $detect->isTablet() ){
		$detect1 = 'Планшет';
	}
	if (!$detect1) {
		$detect1 = "ПК/Ноутбук";
	}
	//Браузер
	$user_agent = $_SERVER["HTTP_USER_AGENT"];
	if (strpos($user_agent, "Firefox") !== false) $detect2 .= "Firefox";
	elseif (strpos($user_agent, "Opera") !== false) $detect2 .= "Opera";
	elseif (strpos($user_agent, "Chrome") !== false) $detect2 .= "Chrome";
	elseif (strpos($user_agent, "MSIE") !== false) $detect2 .= "Internet Explorer";
	elseif (strpos($user_agent, "Safari") !== false) $detect2 .= "Safari";
	else $detect2 .= "Неизвестно";
	//
	$message = '
	<html>
		<head>
			<title></title>
		</head>
    <body>';
	//POST to message
	foreach ($_POST as $key=>$val)
		{
			$message .= "<p>$key :  <strong>$val</strong></p>";
		}
	//referer url
	$referer = urldecode($_SERVER[HTTP_REFERER]);
	$get = parse_url($referer, PHP_URL_QUERY);
	$get = explode('&', $get);
	$utm = '';
	$channel = '';
	foreach($get as $param)	{
		$param = explode('=', $param);
		if($param[0] === 'utm_term') {
			$utm = $param[1];
			break;
		}
	}
	var_dump($utm);
	foreach($get as $param)	{
		$param = explode('=', $param);
		if($param[0] === 'utm_medium') {
			$channel = $param[1];
			break;
		}
	}
	
	//Channel?
	if ($channel == 'search') {$channel = '382';}
	if ($channel == 'rsy') {$channel = '384';}
	if ($channel == 'retarget') {$channel = '386';}
	if ($channel == 'cpc') {$channel = '388';}
	if (!$channel) {$channel = '1';}
	var_dump($channel);
	//message
	$message .= "<br>Возможный город: <strong>$city2</strong><br>Ключевое слово : <strong>$utm</strong><br>Страница заявки : $referer<br>IP: $ip<br>Устройство: $detect1<br>Система: $detect2</body>
	</html>";
	//HEADERS
	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: ООО ЗЛАТА <info@zlataooo.ru>\r\n";
	//GOGOGO .6 - admin
	if ($_SERVER['REMOTE_ADDR'] == '178.155.8.5') {
		echo "admin";
		mail($to, $subject, $message, $headers);
	}
	else {
		mail($to, $subject, $message, $headers);
	}
	//
	// CRM server conection data
	define('CRM_HOST', 'shurup.bitrix24.ru'); // your CRM domain name
	define('CRM_PORT', '443'); // CRM server port
	define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path
	//define('CRM_LOGIN', 'info@zlataooo.ru'); // логин пользователя, которого мы создали для подключения
	//define('CRM_PASSWORD', '123'); // пароль пользователя CRM
	define('CRM_AUTH', '589ba00e629256bd5b3d940f6be5cb1a'); // authorization hash
	/********************************************************************************************/
	//test mail
	function email_check($email) {
		if (!preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',trim($email)))
		{
		return false;
		}
		else return true;
	}
	if (email_check($_POST['E-mail'])) {$bitrix_mail=$_POST['E-mail'];}
	if (($_POST['ПоставщикМатериалов'])) {echo "ONE"; $bitrix_work='162';}
	if (($_POST['СубподрядчикиРаботы'])) {echo "TWO"; $bitrix_work='156';}
	if (!$bitrix_work) {$bitrix_work='';} //Обнуляем
	if (!$_POST['ВидДеятельности']) {$bitrix_class='1';} else {$bitrix_class=$_POST['ВидДеятельности'];}
	// get lead data from the form
	$postData = array(
		'TITLE' => $_POST['Имя'],
		'PHONE_WORK' => $_POST['Телефон'],
		'NAME' => $_POST['Имя'],
		'UF_CRM_1490354378' => $_POST['ФИО'],
		'UF_CRM_1490709463' => $bitrix_class,//Вид деятельности
		'UF_CRM_1490353775' => $bitrix_work,//Поставщик или субподрядчик
		'UF_CRM_1490096118' => $_POST['Промокод'],
		'UF_CRM_1490353542' => 'ЗЛАТА',
		'UF_CRM_1491918568' => $_POST['Форма'],
		'EMAIL_WORK' => $bitrix_mail,
		'UF_CRM_1491916827' => $utm,
		'UF_CRM_1491918677' => $channel,
		'SOURCE_ID' => 'WEB',
		'ASSIGNED_BY_ID' => '50'
	);

	// append authorization data
	if (defined('CRM_AUTH'))
	{
		$postData['AUTH'] = CRM_AUTH;
	}
	else
	{
		$postData['LOGIN'] = CRM_LOGIN;
		$postData['PASSWORD'] = CRM_PASSWORD;
	}

	// open socket to CRM
	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp)
	{
		echo "1";
		// prepare POST data
		$strPostData = '';
		foreach ($postData as $key => $value)
			$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		// prepare POST headers
		$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		$str .= "Host: ".CRM_HOST."\r\n";
		$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		$str .= "Connection: close\r\n\r\n";

		$str .= $strPostData;

		// send POST to CRM
		fwrite($fp, $str);

		// get CRM headers
		$result = '';
		while (!feof($fp))
		{
			$result .= fgets($fp, 128);
			echo "2";
		}
		fclose($fp);

		// cut response headers
		$response = explode("\r\n\r\n", $result);

		$output = '<pre>'.print_r($response[1], 1).'</pre>';
		//echo $result;
	}
	else
	{
		echo 'Connection Failed! '.$errstr.' ('.$errno.')';
	}
}
else
{
	$output = '';
}
?>