<?php include("include/header2.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/connect-to-database.php");?>
<?php session_start();
	$_SESSION['count'] = 1;
	$count = $_SESSION['count'];
?>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
		$(document).ready(function(){
  		$(".table-actions-button-del").live("click",function() 
  		{
			if (confirm("Do you want to delete")){
     	 		id = $(this).attr('id');
     	 		$.post("include/module/delete-job-attribute-process.php",{JAID : id},function(data){
     	 			if(data == true)
     	 			{
     	 				alert("Delete Complete");
     	 				  location.reload();
     	 			}
     	 			else
     	 			{
     	 				alert("Delete Uncomplete");
     	 			}
     	 		});
     	 		//$.post("include/module/delete-job-process.php",{JID = id},function(data){alert("Delete Job Sucess");});	
    		}
    		else
    		{
    			
    		}
		});
	});
</script>		

	<?php 
	$Admin = "a@a.com";
	$sql = "SELECT email, job_status FROM buildthedot_thaijobhd_user_account WHERE email = '$Admin'";
	$result = mysql_query($sql);
	$jid = $_SESSION['jid'];
	if($result)
	{ 
		while($show = mysql_fetch_array($result))
		{
			$e_mail = $show['email'];
			$Status = $show['job_status'];
		}
		if($Status = 1)
		{?>
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
			<div id="content">
				
		
					<div class="content-module">
						
						<div class="content-module-main">
		                    <div id="head-title">
		                    	<h1>งาน <span class="text-black">- เพิ่ม </span></h1>
		                	</div>
							<div id="content-detail" class="container_12">
		                    <section>
		                       <form action="edit-job.php?id=<?php echo $jid; ?>" id="form-edit" name="form-edit" method="post">
								 
								 
								 
								  <div class="prefix_2" id="prefix_2">
		                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
		                         	  <br class="clear"/>
		                              <div class="grid_10">
		                                   <div class="edu">
		                                   	<?php 
		                                   		
				                         	  	$SQL = "SELECT * FROM buildthedot_thaijobhd_job_attribute WHERE JobId = '$jid' ";
												$resultSQL = mysql_query($SQL);
												if($resultSQL)
												{
													while($show = mysql_fetch_array($resultSQL))
													{
														$attID = $show['AttributeID'];	
														$attDes  = $show['AtrributDescription'];
													?>
														<input type="text" id="edu" class="eduction" name="edu[]" value="<?php echo "$attDes";?>"/>
														<a href="#" class="table-actions-button-del" id="<?php echo $attID; ?>"><font color="red">ลบ</font></a>
													<?php
													}
												}                     	  
				                         	?>
		                                    
		                                    </div>
		                                    <div class="grid_3">
		                                   
		                                    </div><br class="clear"/>
		                                   
		                                  
		                              </div>
		                           </div>
		                             
								
		            		</section> 
		                    <div class="grid_12 center"><input type="submit" id="" class="save-button blue round" value = "กลับ">
		                    	
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
	
	?>
<?php include("include/footer.php");?>

<?php 
/*$rootpath="../";
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
			$jid = $_SESSION['jid'];
			if($result)
			{ 
				while($show = mysql_fetch_array($result))
				{
					$e_mail = $show['email'];
					$Status = $show['job_status'];
				}
				if($Status = 1)
				{?>
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
					<div id="content">
						
				
							<div class="content-module">
								
								<div class="content-module-main">
				                    <div id="head-title">
				                    	<h1>งาน <span class="text-black">- เพิ่ม </span></h1>
				                	</div>
									<div id="content-detail" class="container_12">
				                    <section>
				                       <form action="edit-job.php?id=<?php echo $jid; ?>" id="form-edit" name="form-edit" method="post">
										 
										 
										 
										  <div class="prefix_2" id="prefix_2">
				                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
				                         	  <br class="clear"/>
				                              <div class="grid_10">
				                                   <div class="edu">
				                                   	<?php 
				                                   		
						                         	  	$SQL = "SELECT * FROM buildthedot_thaijobhd_job_attribute WHERE JobId = '$jid' ";
														$resultSQL = mysql_query($SQL);
														if($resultSQL)
														{
															while($show = mysql_fetch_array($resultSQL))
															{
																$attID = $show['AttributeID'];	
																$attDes  = $show['AttribuetDescription'];
															?>
																<input type="text" id="edu" class="eduction" name="edu[]" value="<?php echo "$attDes";?>"/>
																<a href="#" class="table-actions-button-del" id="<?php echo $attID; ?>"><font color="red">ลบ</font></a>
															<?php
															}
														}                     	  
						                         	?>
				                                    
				                                    </div>
				                                    <div class="grid_3">
				                                   
				                                    </div><br class="clear"/>
				                                   
				                                  
				                              </div>
				                           </div>
				                             
										
				            		</section> 
				                    <div class="grid_12 center"><input type="submit" id="" class="save-button blue round" value = "กลับ">
				                    	
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
			
			?>
		<?php include("include/footer.php");
	}
}?>
>>>>>>> 0c67dceb2e06ae724bec53a5e37405d86cce0e5f
*/
?>

