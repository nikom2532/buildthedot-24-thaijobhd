<?php include("include/header2.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/connect-to-database.php");?>
<?php session_start();?>
<script type="text/javascript">
<!--calendar -->
	$(function() {
		$( "#date_from" ).datepicker({
			inline:true,
			showOtherMonths:true,
			changeMonth: true,
			dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#date_to" ).datepicker( "option", "minDate", selectedDate );
				
			}
		});
		$( "#date_to" ).datepicker({
			inline:true,
			showOtherMonths:true,
			changeMonth: true,
			dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#date_from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		 
	});	
</script>

<script type="text/javascript">
	function check_value_data()
	{
		var companyName = document.getElementById("CompanyName").value;
		if(companyName == "" || companyName == null)
		{
			alert("Company name is not valid");
			return false;
		}
		
		var positionThaiName = document.getElementById("PositionThaiName").value;
		var positionEngName = document.getElementById("PositionEngName").value;		
		if(positionThaiName == "" || positionThaiName == null || positionEngName == "" || positionEngName == null)
		{
			alert("Position is not valid");
			return false;
		}
		
		var placeName = document.getElementById("PlaceName").value;
		if(placeName == "" || placeName == null) 
		{
			alert("Place is not valid");
			return false;
		}
		
		var Quantity = document.getElementById("Quantity").value;
		if(Quantity == "" || Quantity == null) 
		{
			alert("Quantity is not valid");
			return false;
		}
		
		var Saraly = document.getElementById("Saraly").value;
		if(Saraly == "" || Saraly == null) 
		{
			alert("Saraly is not valid");
			return false;
		}
				
		var Property = document.getElementById("Property").value;
		if(Property == "" || Property == null) 
		{
			alert("Property is not valid");
			return false;
		}
		
		var date_from = document.getElementById("date_from").value;
		if(date_from == "" || date_from == null) 
		{
			alert("Start date is not valid");
			return false;
		}
		
		var date_to = document.getElementById("date_to").value;
		if(date_to == "" || date_to == null) 
		{
			alert("End date is not valid");
			return false;
		}
		
		var Description = document.getElementById("Description").value;
		if(Description == "" || Description == null) 
		{
			alert("Description date is not valid");
			return false;
		}
		
		
	}
</script>
	
<?php /*
<<<<<<< HEAD
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
		                    	<form action="add-job-attribute.php" onsubmit="return check_value_data()" id="form-edit" name="form-edit" method="post">
		                    	  
		                    	  <div class="grid_2">
		                                <h6 class="detail-title">บริษัท</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="CompanyName" name ="CompanyName" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(ไทย)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="PositionThaiName" name ="PositionThaiName" class="round" value="Lorem Ipsum is simply dummy text of the printing"/></p>
		                          </div><br class="clear"/>
		                           <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(อังกฤษ)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="PositionEngName" name ="PositionEngName" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สถานที่ปฏิบัติงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><textarea type="text" id="PlaceName" name ="PlaceName" class="round" value=""></textarea> </p>
		                          </div><br class="clear"/>
		                         
		                         <div class="grid_2">
		                                <h6 class="detail-title">]ลายละเอียดงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><textarea type="text" id="Description" name ="Description" class="round" value=""></textarea> </p>
		                          </div><br class="clear"/>
		                         
		                          <div class="grid_2">
		                                <h6 class="detail-title">อัตรา</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Quantity" name ="Quantity" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">เงินเดือน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Saraly" name ="Saraly" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">คุณสมบัติ</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Property" name ="Property" class="round" value=""/></p>
		                          </div>
		                          <br class="clear"/>
		                        
		                          <div class="grid_2">
		                                <h6 class="detail-title">ลักษณะงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><label for="read" class="alt-label"><input type="radio" id="Full" name="FP" value="1" checked="checked"  />
		            					Full Time
		            				</label>
									<label for="read" class="alt-label"><input type="radio" id="Part" name="FP" value="2" />
		           						Part Time
		            				</label> </p>
		                          </div><br class="clear"/>
		                          
		                          <div class="grid_2">
		                                <h6 class="detail-title">เริ่ม</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input name="date_from" type="text" id="date_from" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สิ้นสุด</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input name="date_to" type="text" id="date_to" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">งานแนะนำ</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="checkbox" id="recommend" value="re" />แนะนำ</p>
		                          </div><br class="clear"/>
		
		                          <br class="clear"/>
		                       <?php /*
								  <div class="prefix_2" id="prefix_2">
		                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
		                         	  <br class="clear"/>
		                              <div class="grid_10">
		                                    <div class="grid_5">dddd</div>
		                                    <div class="grid_3">
		                                    	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
		                                    	<a href="#" class="table-actions-button text-red">ลบ</a>
		                                    </div><br class="clear"/>
		                                    <div class="grid_5">dddd</div>
		                                    <div class="grid_3">
		                                    	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
		                                    	<a href="#" class="table-actions-button text-red">ลบ</a>
		                                    </div>
		                              </div>
		                           </div>
		                        */  /* ?>      
								
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
	*/
	?>
<?php //include("include/footer.php");?>
<?php
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
	if(FALSE){
		include($rootadminpath."include/module/logout_process.php");
	}
	//normal mode
	else{
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
				                    	<form action="add-job-attribute.php" onsubmit="return check_value_data()" id="form-edit" name="form-edit" method="post">
				                    	  
				                    	  <div class="grid_2">
				                                <h6 class="detail-title">บริษัท</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="CompanyName" name ="CompanyName" class="round"/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                             <h6 class="detail-title">ตำแหน่ง(ไทย)</h6>
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="PositionThaiName" name ="PositionThaiName" class="round" value=""/></p>
				                          </div><br class="clear"/>
				                           <div class="grid_2">
				                             <h6 class="detail-title">ตำแหน่ง(อังกฤษ)</h6>
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="PositionEngName" name ="PositionEngName" class="round" value=""/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                                <h6 class="detail-title">สถานที่ปฏิบัติงาน</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><textarea type="text" id="PlaceName" name ="PlaceName" class="round" value=""></textarea> </p>
				                          </div><br class="clear"/>
				                         
				                         <div class="grid_2">
				                                <h6 class="detail-title">ลายละเอียดงาน</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><textarea type="text" id="Description" name ="Description" class="round" value=""></textarea> </p>
				                          </div><br class="clear"/>
				                         
				                          <div class="grid_2">
				                                <h6 class="detail-title">อัตรา</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="Quantity" name ="Quantity" class="round" value=""/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                                <h6 class="detail-title">เงินเดือน</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="Saraly" name ="Saraly" class="round" value=""/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                                <h6 class="detail-title">คุณสมบัติ</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="text" id="Property" name ="Property" class="round" value=""/></p>
				                          </div>
				                          <br class="clear"/>
				                        
				                          <div class="grid_2">
				                                <h6 class="detail-title">ลักษณะงาน</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><label for="read" class="alt-label"><input type="radio" id="Full" name="FP" value="1" checked="checked"  />
				            					Full Time
				            				</label>
											<label for="read" class="alt-label"><input type="radio" id="Part" name="FP" value="2" />
				           						Part Time
				            				</label> </p>
				                          </div><br class="clear"/>
				                          
				                          <div class="grid_2">
				                                <h6 class="detail-title">เริ่ม</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input name="date_from" type="text" id="date_from" class="round"/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                                <h6 class="detail-title">สิ้นสุด</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input name="date_to" type="text" id="date_to" class="round"/></p>
				                          </div><br class="clear"/>
				                          <div class="grid_2">
				                                <h6 class="detail-title">งานแนะนำ</h6>   
				                          </div>
				                          <div class="grid_8">
				                          		<p><input type="checkbox" id="recommend" value="1" name="recommend" />แนะนำ</p>
				                          </div><br class="clear"/>
				
				                          <br class="clear"/>
				                       <?php /*
										  <div class="prefix_2" id="prefix_2">
				                          	  <p class="center head-table grid_5">ระดับการศึกษา</p>
				                         	  <br class="clear"/>
				                              <div class="grid_10">
				                                    <div class="grid_5">dddd</div>
				                                    <div class="grid_3">
				                                    	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
				                                    	<a href="#" class="table-actions-button text-red">ลบ</a>
				                                    </div><br class="clear"/>
				                                    <div class="grid_5">dddd</div>
				                                    <div class="grid_3">
				                                    	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
				                                    	<a href="#" class="table-actions-button text-red">ลบ</a>
				                                    </div>
				                              </div>
				                           </div>
				                        */ ?>      
										
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
?>