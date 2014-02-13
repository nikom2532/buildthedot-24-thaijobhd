<?php 
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");
if($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	include ("include/footer.php");
}
else{
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_detail` ;
	";
	$result = @mysql_query($sql);
	while ($rs = @mysql_fetch_array($result)) {
		$post_title[] = $rs["title"];
		$post_detail[] = $_POST[$rs["title"]];
	}
	
	for ($i=0; $i < count($post_title); $i++) {
		$sql = "
			UPDATE `buildthedot_thaijobhd_detail`
			SET `detail` = '" . $post_detail[$i] . "' 
			WHERE `title` = '" . $post_title[$i] . "' ;
		";
		echo $sql;
		@mysql_query($sql);
	}
	
	// header("Location: {$rootadminpath}top-company.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>advertisement-rate.php";
	</script><?php
}