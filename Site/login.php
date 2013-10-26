<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] != "") {
	header("location: ".$rootpath."view-profile.php");
}
else{
?>
	<div id="wrapper">
		<!-- HEADER -->
		<div id="header" class="container_12">
			<div id="login-intro" class="grid_3">
				<img src="images/logo.png" width="128" height="71">
			</div> <!-- end full-width -->	
	
		</div> <!-- end header -->
			
		<!-- MAIN CONTENT -->
		<div id="content" class="container_12">
		 <div id="content-login">
				<div id="head-title">
					<h1>เข้าสู่ระบบ</h1>
	  		</div> 
				<form action="<?php echo $rootpath; ?>include/module/login_process.php" method="POST" id="login-form"  autocomplete="off" enctype="multipart/form-data">
					<p class="grid_2 prefix_3 uppercase">ชื่อผู้ใช้</p>
					<p class="grid_5"><input type="text" id="login-username" name ="login-username" class="round" /></p><br class="clear" />
					<p class="grid_2 prefix_3 uppercase">รหัสผ่าน</p>
					<p class="grid_5"><input type="password" id="login-password" name ="login-password" class="round" /></p><br class="clear" />
					
					<p class="grid_2 prefix_5"><input type="submit" class="login-button blue round" value="เข้าสู่ระบบ"></p>
					<p id="forgot-pass" class="grid_2 prefix_5"><a href="forgot-password-username.php">ลืมรหัสผ่าน?</a></p>
				</form>
			</div>
		</div> <!-- end content -->
		<!-- FOOTER -->
<?php
		include("include/footer.php");
}//end check user session
?>