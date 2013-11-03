<?php include("include/header2.php");?>

<?php include("include/connect-to-database.php");?>
<?php 
	session_start();
	$_SESSION['count'] = 1;
	$count = $_SESSION['count'];
?>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
		$(document).ready(function(){
			
				$(".table-actions-button_text-blue").live("click",function(){
						var a = $(".eduction").attr('name');
						//alert(a);
						<?php
							$_SESSION['count'] = $count+1;
							$count = $_SESSION['count'];
						?>
						
						$(".edu").append('<input type="text" id="<?php echo $count; ?>" class="education" name="edu[]"/>');
						
				});
				
				$(".table-actions-button_text-red").live("click",function(){
					
					$(".education").empty();
				});  
		});
</script>
<?php 
	$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");

//For Development mode(No need to login)
//$_SESSION["userid"] = "1";

if ($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
//	include ("include/footer.php");
} 
else {
	//check for Logout mode
	if(isset($_GET["mode"])){
		if($_GET["mode"]=="logout"){
			include($rootadminpath."include/module/logout_process.php");
		}
	}
	//normal mode
	else{
		include("include/top-bar.php");
		$Admin = $_SESSION["userid"];
	$sql = "SELECT email, job_status FROM buildthedot_thaijobhd_user_account WHERE email = '$Admin'";
	$result = mysql_query($sql);
	$jid = 	$_SESSION['jid']; 
	if($result)
	{ 
		while($show = mysql_fetch_array($result))
		{
			$e_mail = $show['email'];
			$Status = $show['job_status'];
		}
		if($Status = 1)
		{
			
			
			?>
				<!-- HEADER -->
				<div id="header-with-tabs">
					<div class="page-full-width cf">
						<ul id="tabs" class="left">
							<li><a href="<?php echo $rootadminpath; ?>job.php"  class="active-tab">งาน</a></li>
							<li><a href="<?php echo $rootadminpath; ?>business-idea.php">ไอเดียธุรกิจ</a></li>
							<li><a href="<?php echo $rootadminpath; ?>advertisement.php">โฆษณา</a></li>
							<li><a href="<?php echo $rootadminpath; ?>top-company.php">บริษัทชั้นนำ</a></li>
						</ul> <!-- end tabs -->
						
						<!-- company logo -->
						
					</div> <!-- end full-width -->	
				</div> <!-- end header -->
				
			<!-- MAIN CONTENT -->
			<!-- MAIN CONTENT -->
			<div id="content">
			<?php
			$SQL = "SELECT * FROM buildthedot_thaijobhd_job WHERE JobID = $jid";
			$resultSQL = mysql_query($SQL);
			if($resultSQL)
			{
				while($show = mysql_fetch_array($resultSQL))
				{
					$company = $show['CompanyName'];
					$postionThai = $show['PositionThai'];
					$postionEng = $show['PositionEng'];
					$place = $show['Place'];
					$quantity = $show['Quantity'];
					$saraly = $show['Saraly'];
					$description = $show['JobDescription'];
					$recomment = $show['Recomment'];
					$property = $show['property'];
					$st = $show['StartTime'];
					$et = $show['EndTime'];
					$type = $show['JobType'];			
				}	
			?>	
					<div class="content-module">
					
						<div class="content-module-main">
		                    <div id="head-title">
		                    	<h1>งาน <span class="text-black">- แก้ไข</span></h1>
		                	</div>
							<div id="content-detail" class="container_12">
		                    <section>
		                    	<form action="include/module/update-job-attribute-process.php" onsubmit="return check_value_data()" id="form-edit" name="form-edit" method="post">
		                    	
		                       <div class="prefix_2" id="prefix_2">
		                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
		                         	
		                         	  <br class="clear"/>
		                              <div class="grid_10">
		                                   <?php 
		                         	  	$SQL = "SELECT * FROM buildthedot_thaijobhd_job_attribute WHERE JobId = '$jid' ";
										$resultSQL = mysql_query($SQL);
										$i = 0;
										if($resultSQL)
										{
											while($show = mysql_fetch_array($resultSQL))
											{
												$attID = $show['AttributeID'];	
												$attDes  = $show['AtrributDescription'];
												$i = 1;
											?>
												 <div class="grid_5"><?php echo "$attDes"; ?></div>
											<?php
											}
										}                     	  
		                         	  
		                         	  	if($i == 1)
										{
		                         	  ?>
		                                 
		                                    	<a href="edit-job-attribute.php" class="table-actions-button text-blue">แก้ไข</a>
		                                   
		                               <?php } ?>
		                               <p>
		                                  <div class="edu">
		                                    <input type="text" id="edu" class="eduction" name="edu[]"/>
		                                    </div> 
		                                    <br class="clear"/>
		                                    	<a href="#" class="table-actions-button_text-blue text-red">เพิ่ม</a>
		                              </div>
		                           </div>
		                         
		                         
		            <?php            
		            }
					else
					{
						?>
						<script language="JavaScript">
							alert("Error!!!");
						</script>
						<?php
					}    
		                       ?>      
							
		            		</section> 
		                    <div class="grid_12 center"><input type="submit" id="" class="save-button blue round" value = "บันทึก"></div>
		                    </div>         
		                   </form>
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
					
			</div> <!-- end content -->
		<?php 
		}
		else 
		{?>
				<script language="text/JavaScript">
					alert("Error");
				</script>	
		<?php 
		}
	}
	else
	{
		?>
				<script language="JavaScript">
					alert("Error");
				</script>	
			<?php 
	}
	
	?>
<?php include("include/footer.php");	
	}
}
	

/*
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");

//For Development mode(No need to login)
$_SESSION["userid"] = "1";

if ($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	include ("include/footer.php");
} 
else {
	//check for Logout mode
	if($_GET["mode"]=="logout"){
		include($rootadminpath."include/module/logout_process.php");
	}
	//normal mode
	else{
			$Admin = "a@a.com";
			$sql = "SELECT email, job_status FROM buildthedot_thaijobhd_user_account WHERE email = '$Admin'";
			$result = mysql_query($sql);
			$jid = 	$_SESSION['jid']; 
			if($result)
			{ 
				while($show = mysql_fetch_array($result))
				{
					$e_mail = $show['email'];
					$Status = $show['job_status'];
				}
				if($Status = 1)
				{			
					?>
						<!-- HEADER -->
						<div id="header-with-tabs">
							<div class="page-full-width cf">
								<ul id="tabs" class="left">
									<li><a href="<?php echo $rootadminpath; ?>job.php"  class="active-tab">งาน</a></li>
									<li><a href="<?php echo $rootadminpath; ?>business-idea.php">ไอเดียธุรกิจ</a></li>
									<li><a href="<?php echo $rootadminpath; ?>advertisement.php">โฆษณา</a></li>
									<li><a href="<?php echo $rootadminpath; ?>top-company.php">บริษัทชั้นนำ</a></li>
								</ul> <!-- end tabs -->
								
								<!-- company logo -->
								
							</div> <!-- end full-width -->	
						</div> <!-- end header -->
						
					<!-- MAIN CONTENT -->
					<!-- MAIN CONTENT -->
					<div id="content">
					<?php
					$SQL = "SELECT * FROM buildthedot_thaijobhd_job WHERE JobID = $jid";
					$resultSQL = mysql_query($SQL);
					if($resultSQL)
					{
						while($show = mysql_fetch_array($resultSQL))
						{
							$company = $show['CompanyName'];
							$postionThai = $show['PositionThai'];
							$postionEng = $show['PositionEng'];
							$place = $show['Place'];
							$quantity = $show['Quantity'];
							$saraly = $show['Saraly'];
							$description = $show['JobDescription'];
							$recomment = $show['Recomment'];
							$property = $show['Property'];
							$st = $show['StartTime'];
							$et = $show['EndTime'];
							$type = $show['JobType'];			
						}	
					?>	
							<div class="content-module">
							
								<div class="content-module-main">
				                    <div id="head-title">
				                    	<h1>งาน <span class="text-black">- แก้ไข</span></h1>
				                	</div>
									<div id="content-detail" class="container_12">
				                    <section>
				                    	<form action="include/module/update-job-attribute-process.php" onsubmit="return check_value_data()" id="form-edit" name="form-edit" method="post">
				                    	
				                       <div class="prefix_2" id="prefix_2">
				                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
				                         	
				                         	  <br class="clear"/>
				                              <div class="grid_10">
				                                   <?php 
				                         	  	$SQL = "SELECT * FROM buildthedot_thaijobhd_job_attribute WHERE JobId = '$jid' ";
												$resultSQL = mysql_query($SQL);
												$i = 0;
												if($resultSQL)
												{
													while($show = mysql_fetch_array($resultSQL))
													{
														$attID = $show['AttributeID'];	
														$attDes  = $show['AttribuetDescription'];
														$i = 1;
													?>
														 <div class="grid_5"><?php echo "$attDes"; ?></div>
													<?php
													}
												}                     	  
				                         	  
				                         	  	if($i == 1)
												{
				                         	  ?>
				                                    <div class="grid_3">
				                                    	<a href="edit-job-attribute.php" class="table-actions-button text-blue">แก้ไข</a>
				                                    </div>
				                               <?php } ?> 
				                                  <div class="edu">
				                                    <input type="text" id="edu" class="eduction" name="edu[]"/>
				                                    </div> 
				                                    <br class="clear"/>
				                                    	<a href="#" class="table-actions-button_text-blue">เพิ่ม</a>
				                              </div>
				                           </div>
				                         
				                         
				            <?php            
				            }
							else
							{
								?>
								<script language="JavaScript">
									alert("Error!!!");
								</script>
								<?php
							}    
				                       ?>      
									
				            		</section> 
				                    <div class="grid_12 center"><input type="submit" id="" class="save-button blue round" value = "บันทึก"></div>
				                    </div>         
				                   </form>
								</div> <!-- end content-module-main -->
							
							</div> <!-- end content-module -->
							
					</div> <!-- end content -->
				<?php 
				}
				else 
				{?>
						<script language="text/JavaScript">
							alert("Kakkkk");
						</script>	
				<?php 
				}
			}
			else
			{
				?>
						<script language="JavaScript">
							alert("Kakkkk");
						</script>	
					<?php 
			}
			include("include/footer.php");
	}
}
 */
?>

