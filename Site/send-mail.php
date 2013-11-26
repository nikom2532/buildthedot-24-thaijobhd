<?php
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$des = $_POST['text'];
	
	$subject = "=?UTF-8?B?" . base64_encode('คุณได้รับการติดต่อจากคุณ '.$name)."?=";
	$to = "team@buildthedot.com";
	$message = "เนื้อหา : \n<br>".$des."\n<br> เบอติดต่อกลับ  : ".$tel ."\n <br> e-mail : ".$mail;
	$from = "ThaiJobHD";
	$headers = "MIME-Version: 1.0' . \r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
	$headers .= "From:" . $from;
	mail($to,$subject,$message,$headers);
?>
	<script type="text/javascript">
		alert("Send e-mail complete");
		window.location="contact-us.php";
	</script>

<?php
	/*$strHeader .= "MIME-Version: 1.0' . \r\n";
	$strHeader .= "Content-type: text/html; charset=utf-8\r\n"; 
	$strHeader .= "From: Mr.Weerachai Nukitram<webmaster@thaicreate.com>\r\nReply-To: thaicreate@hotmail.com";
	*/
?>