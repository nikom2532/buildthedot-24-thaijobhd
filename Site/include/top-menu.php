<script>
/*	$(document).ready(function(){
		
		$("#logout").click(function()
		{	alert("a");
			$("#log-out").load("log-out.php");
		});
	});
*/
</script>
<div id="wrapper">
	<div id="header" class="container_12">
		<div class="right"  class="grid_12">
			<ul id="my-profile">
				<font color="red"><?php
	//			$_SESSION['userid'] = 1;
					?>
				</font>
				
<?php		
				if(!isset($_SESSION['userid']) || empty($_SESSION['userid']) || $_SESSION['userid'] == ""){
?>
					<li>
						<a href="login.php" class="text-blue">ลงชื่อเข้าใช้</a>
					</li>
					<li>
						<a href="register.php" class="text-grey">ลงทะเบียน</a>
					</li>
<?php
				}
				else{
?>
					<li class="text-blue">
<?php
						$sql_user = "
							SELECT * 
							FROM  `buildthedot_thaijobhd_user_account`
							WHERE `id` = '".$_SESSION["userid"]."' ;
						";
						$result_user = @mysql_query($sql_user);
						if($result_user)
						{
							if($rs_user = @mysql_fetch_array($result_user)){
								echo "Hello, ".$rs_user["firstname"]." ".$rs_user["midname"]." ".$rs_user["lastname"];
							}
						}
						else {
							echo "Error";
						}
?>
					</li>
					<li>
						<a href="view-profile.php" class="text-blue">
							My Profile
						</a>
					</li>
					<li>
						<a href="include/module/logout_process.php" class="text-blue" id="logout">
							Log out
						</a>
					</li>
<?php
				}
?>	
			</ul>
		</div>
		<div id="login-intro" class="grid_3">
			<a href="<?php echo $rootpath; ?>"><img src="images/logo.png" alt="ThaiJobHD" width="130" height="71"></a>
		</div>

		<div id="top-nav" class="grid_8 prefix_1">
			<ul>
				<li>
					<a href="index.php">หน้าหลัก
					<br/>
					<span id="sub-memu">JobHD</span></a>
				</li>
				
				<li>
					<a href="find-job.php">หางาน
					<br/>
					<span id="sub-memu">สมัครงาน</span></a>
				</li>
				<li>
					<a href="business-idea.php">ไอเดียธุรกิจ
					<br/>
					<span id="sub-memu">ไอเดีย</span></a>
				</li>
				<li>
					<a href="advertisement-rate.php">อัตราโฆษณา
					<br/>
					<span id="sub-memu">ประกาศ</span></a>
				</li>
				<li>
					<a href="condition.php">เงื่อนไข
					<br/>
					<span id="sub-memu">ข้อตกลง</span></a>
				</li>
				<li>
					<a href="contact-us.php">ติดต่อทีมงาน
					<br/>
					<span id="sub-memu">ติดต่อเรา</span></a>
				</li>
			</ul>
		</div>
	</div><!--end header -->
