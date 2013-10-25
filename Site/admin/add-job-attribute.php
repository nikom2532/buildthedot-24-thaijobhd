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
			
				$(".table-actions-button_text-blue").live("click",function(){
						var a = $(".eduction").attr('name');
						
						<?php
							$_SESSION['count'] = $count+1;
							$count = $_SESSION['count'];
						?>
						
						$(".edu").append('<input type="text" id="<?php echo $count; ?>" class="education" name="edu[]"/>');
						
				});
				/*
				$(".table-actions-button_text-red").live("click",function(){
					
					$(".education").empty();
				});
				*/
				
				$("#submit").blind("click", function(event){
					var a = $(".education").attr("value");
					if(a == null || a == "")
					{
						alert("Error");
						event.preventDefault();
					}
					
				});  
		});
</script>
		<?php   
		
				$company_name = $_POST['CompanyName'];
				$position_thai_name = $_POST['PositionThaiName'];
				$position_eng_name = $_POST['PositionEngName'];
				$place_name = $_POST['PlaceName'];
				$quantity = $_POST['Quantity'];
				$description = $_POST['Description'];
				$saraly = $_POST['Saraly'];
				$FP = $_POST['FP'];
				$property = $_POST['Property'];
				$date_start = $_POST['date_from'];
				$date_end = $_POST['date_to'];
				 $a = $_POST['recomment'];
				 if($a == 1 )
				{
					$recomment = ":)";	
				}
				else {
					$recomment = ":(";
				}
			 		 
				$_SESSION['company_name'] = $company_name;
				$_SESSION['position_thai_name'] = $position_thai_name;
				$_SESSION['position_eng_name'] = $position_eng_name;
				$_SESSION['place_name'] = $place_name;
				$_SESSION['quantity'] = $quantity;
				$_SESSION['description'] = $description;
				$_SESSION['saraly'] = $saraly;
				$_SESSION['FP'] = $FP ;
				$_SESSION['property'] = $property;
				$_SESSION['date_start'] = $date_start;
				$_SESSION['date_end'] = $date_end;
				$_SESSION['recomment'] = $recomment;
				
		?>
		
	<?php 
	$Admin = "a@a.com";
	$sql = "SELECT email, job_status FROM buildthedot_thaijobhd_user_account WHERE email = '$Admin'";
	$result = mysql_query($sql);
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
		                    	
		                    	  
		                    	  <div class="grid_2">
		                                <h6 class="detail-title">บริษัท : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		 <h6 class="detail-title"> <?php echo $company_name;?></h6> </p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(ไทย) : </h6>
		                          </div>
		                          <div class="grid_8">
		                          		 <h6 class="detail-title"> <?php echo $position_thai_name;?></h6></p>
		                          </div><br class="clear"/>
		                           <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(อังกฤษ) : </h6>
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $position_eng_name;?></h6></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สถานที่ปฏิบัติงาน : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $place_name;?></h6></p>
		                          </div><br class="clear"/>
		                         
		                          <div class="grid_2">
		                                <h6 class="detail-title">ลายละเอียดงาน : </h6>   
		                          </div>
		                         <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $description;?></h6></p>
		                          </div><br class="clear"/>
		                         
		                          <div class="grid_2">
		                                <h6 class="detail-title">อัตรา</h6>   
		                          </div>
		                          <div class="grid_8">
		                          	<h6 class="detail-title"> <?php echo $quantity;?></h6></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">เงินเดือน : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $saraly;?></h6></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">คุณสมบัติ : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $property;?></h6></p>
		                          </div>
		                          <br class="clear"/>
		                        
		                          <div class="grid_2">
		                                <h6 class="detail-title">ลักษณะงาน : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php if($FP == 1){echo "Full Time";}else{echo "Part Time";}?></h6></p>
		                          </div><br class="clear"/>
		                          
		                          <div class="grid_2">
		                                <h6 class="detail-title">เริ่ม : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php echo $date_start;?></h6></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สิ้นสุด : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title" color=""> <?php echo $date_end;?></h6></p>
		                          </div><br class="clear"/>
		                          
		                          <div class="grid_2">
		                                <h6 class="detail-title">งานแนะนำ : </h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<h6 class="detail-title"> <?php if(TRUE){echo $recomment;}else{echo "Not recommened job";}?></h6></p>
		                          </div><br class="clear"/>
		
		                          <br class="clear"/>
		                       
		                       <form action="include/module/add-job-process.php" id="form-edit" name="form-edit" method="post">
								  <div class="prefix_2" id="prefix_2">
		                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
		                         	  <br class="clear"/>
		                              <div class="grid_10">
		                                   <div class="edu">
		                                    <input type="text" id="edu" class="eduction" name="edu[]"/>
		                                    </div>
		                                    <div class="grid_3">
		                                    	<a href="#" class="table-actions-button_text-blue" id="<?php echo $count; ?>">เพิ่ม</a>
		                                    	<?php //<a href="#" class="table-actions-button_text-red" id="<?php echo $count; "><font color="red">ลบ</font></a> ?>
		                                    </div><br class="clear"/>
		                                   
		                                  
		                              </div>
		                           </div>
		                             
								
		            		</section> 
		                    <div class="grid_12 center"><input type="submit" id="submit" class="save-button blue round" value = "บันทึก">
		                    	
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
<?php include("include/footer.php");?>


