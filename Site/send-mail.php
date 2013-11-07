<?php
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$des = $_POST['text'];
	
	$subject = "เธ�เธฒเธฃเธ•เธดเธ”เธ•เน�เธญเธ�เธฒเธ� เธ�เธธเธ“".$name;
	$to = "team@buildthedot.com";
	$message = "เน€เธ�เธทเน�เธญเธซเธฒ \n".$des."\n เน€เธ�เธญเธ•เธดเธ”เธ•เน�เธญเธ�เธฅเธฑเธ�  : ".$tel ."\n e-mail เธ•เธดเธ”เธ•เน�เธญเธ�เธฅเธฑเธ� : ".$mail;
	$from = "ThaiJobHD";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
?>
	<script type="text/javascript">
		alert("Send e-mail complete");
		window.location="contact-us.php";
	</script>

<?php

?>