<?php
ob_start();
$new_url = 'http://liver.studio';
header('Location: '.$new_url);
ob_end_flush();

$name=$_POST['name'];
$company=$_POST['company'];
$email=$_POST['email'];
$desc=$_POST['desc'];

$name=htmlspecialchars($name);
$company=htmlspecialchars($company);
$email=htmlspecialchars($email);
$desc=htmlspecialchars($desc);

$name=urldecode($name);
$company=urldecode($company);
$email=urldecode($email);
$desc=urldecode($desc);

$name=trim($name);
$company=trim($company);
$email=trim($email);
$desc=trim($desc);

define('TELEGRAM_TOKEN', '5122753571:AAEfRR-DELSIyQWcb4BCo_vMZ0qotBSFaac');
define('TELEGRAM_CHATID', '352567045');
$message = "'Имя:'$name'. Email: '$email 'Компания:'$company ' Описание: '$desc";
$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_exec($ch);
curl_close($ch);
?>