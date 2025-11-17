<?php
// Tutorial https://dev.1c-bitrix.ru/community/blogs/chaos/crm-sozdanie-lidov-iz-drugikh-servisov.php
$login = 'kolya@grodno.net';
$password = '3U6mjm05ph';

$name			= (isset($_REQUEST['name']))			? $_REQUEST['name']			: '';
$phone			= (isset($_REQUEST['phone']))			? $_REQUEST['phone']		: '';
$email			= (isset($_REQUEST['email']))			? $_REQUEST['email']		: '';
$comment		= (isset($_REQUEST['comment']))			? $_REQUEST['comment']		: '';

$utm_source		= (isset($_REQUEST['utm_source']))		? $_REQUEST['utm_source']	: '';
$utm_medium		= (isset($_REQUEST['utm_medium']))		? $_REQUEST['utm_medium']	: '';
$utm_term		= (isset($_REQUEST['utm_term']))		? $_REQUEST['utm_term']		: '';
$utm_content	= (isset($_REQUEST['utm_content']))		? $_REQUEST['utm_content']	: '';
$utm_campaign	= (isset($_REQUEST['utm_campaign']))	? $_REQUEST['utm_campaign']	: '';
$form			= (isset($_REQUEST['form']))			? $_REQUEST['form']			: '';

$log = print_r($_REQUEST, true);

if ($phone > '') {
	$title= "$phone"; 

	$source_id = 'WEB'; // 3 - bizpro.by

	$url = 'https://24privoz.bitrix24.by/crm/configs/import/lead.php?LOGIN='.$login.'&PASSWORD='.$password.'&TITLE='.$title.'&NAME='.$name.'&PHONE_MOBILE='.$phone.'&EMAIL_HOME='.$email.'&COMMENTS='.$comment
	.'&SOURCE_ID='.$source_id
	.'&UF_CRM_1466597539='.$utm_source
	.'&UF_CRM_1466597545='.$utm_medium
	.'&UF_CRM_1466597551='.$utm_term
	.'&UF_CRM_1466597557='.$utm_content
	.'&UF_CRM_1466597563='.$utm_campaign;

	echo 'Link:'.$url.'<br>';
	
	$result = file_get_contents($url);
	
	echo '<p>Result:</p>';
	print('<pre>');
	print_r($result);
	print('</pre>');
	
	$log .= "\nОтвет от Битрикс24:\n".print_r($result, true);
} else {
	echo '<p>Error.</p><p>REQUEST data:</p>';
	print('<pre>');
	print_r($_REQUEST);
	print('</pre>');
	
	//echo '<p>GET data:</p>';
	//print('<pre>');
	//print_r($_GET);
	//print('</pre>');
}
$log .= "\nПараметры сервера:\n".print_r($_SERVER, true);
file_put_contents('logs/log_'.date('Y-m-d_H-i-s').'.txt', $log);