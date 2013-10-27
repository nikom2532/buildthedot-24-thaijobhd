<?php
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$des = $_POST['text'];
	
	$subject = "การติดต่อจาก คุณ".$name;
	$to = "swort_k@hotmail.com";
	$message = "เนื้อหา \n".$des."\n เบอติดต่อกลับ  : ".$tel ."\n e-mail ติดต่อกลับ : ".$mail;
	$from = "swort_k@hotmail.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
?>
	<script type="text/javascript">
		alert("Send e-mail complete");
		window.location="contact-us.php";
	</script>

<?php

?>