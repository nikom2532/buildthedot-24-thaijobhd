<?php include("include/header2.php");?>

<?php include("include/connect-to-database.php");?>
<?php @session_start();?>
<script type="text/javascript">
//<!--calendar -->
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

<?php 

$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");

//For Development mode(No need to login)


if ($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	//include ("include/footer.php");
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
	if($result)
	{ 
		while($show = mysql_fetch_array($result))
		{
			$e_mail = $show['email'];
			$Status = $show['job_status'];
		}
		if($Status = 1)
		{
			$jid = $_REQUEST['id']; 
			$_SESSION['jid'] = $jid;
			
			$menu="job";
			include($rootadminpath."include/top-menu.php");
			?>
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
		                    	<form action="include/module/update-job-process.php" onsubmit="return check_value_data()" id="form-edit" name="form-edit" method="post">
		                    	  
		                    	  <div class="grid_2">
		                                <h6 class="detail-title">บริษัท</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="CompanyName" name ="CompanyName" class="round" value="<?php echo $company;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(ไทย)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="PositionThaiName" name ="PositionThaiName" class="round" value="<?php echo $postionThai ;?>"/></p>
		                          </div><br class="clear"/>
		                           <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(อังกฤษ)</h6>
		                          </div>
		                          <div class="grid_8">

		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="PositionThaiName" name ="PositionThaiName" class="round" value="<?php echo $postionThai ;?>"/></p>
		                          </div><br class="clear"/>
		                           <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(อังกฤษ)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="PositionEngName" name ="PositionEngName" class="round" value="<?php echo $postionEng;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สถานที่ปฏิบัติงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><textarea type="text" id="PlaceName" name ="PlaceName" class="round"><?php echo $place;?></textarea> </p>
		                          </div><br class="clear"/>
		                         
		                         <div class="grid_2">
		                                <h6 class="detail-title">รายละเอียดงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><textarea type="text" id="Description" name ="Description" class="round"><?php echo $description;?></textarea> </p>
		                          </div><br class="clear"/>
		                         
		                          <div class="grid_2">
		                                <h6 class="detail-title">อัตรา</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Quantity" name ="Quantity" class="round" value="<?php echo $quantity;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">เงินเดือน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Saraly" name ="Saraly" class="round" value="<?php echo $saraly;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">คุณสมบัติ</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="Property" name ="Property" class="round" value="<?php echo $property;?>"/></p>
		                          </div>
		                          <br class="clear"/>
		                        
		                          <div class="grid_2">
		                                <h6 class="detail-title">ลักษณะงาน - <?php if($type==1){echo "Full Time";}else{echo "Part Time";} ?></h6>   
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
		                          		<p><input name="date_from" type="text" id="date_from" class="round" value="<?php echo $st;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สิ้นสุด</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input name="date_to" type="text" id="date_to" class="round" value="<?php echo $et;?>"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">งานแนะนำ  <?php //if($recomment == 1){echo "Recommend";}else{echo "No recommend";}?> </h6>   
		                          </div>
		                          <?php 
		                          	if($recomment == 1){
		                          		?> 
		                          		<div class="grid_8">
				                          		<p><label for="rec" class="alt-label"><input type="radio" id="rec" name="rec" value="1" checked="checked"/>
				            					Recommend
				            				</label>
											<label for="rec" class="alt-label"><input type="radio" id="nrec" name="rec" value="0" />
				           						Not Recommeded
				            				</label> </p>
				                          </div>
		                          		<?php
		                          	}else{
		                          		?>
		                          		<div class="grid_8">
				                          		<p><label for="rec" class="alt-label"><input type="radio" id="rec" name="rec" value="1" />
				            					Recommend
				            				</label>
											<label for="rec" class="alt-label"><input type="radio" id="nrec" name="rec" value="0" checked="checked"/>
				           						Not Recommeded
				            				</label> </p>
				                          </div>
		                          		<?php
		                          	}
		                          ?>
		                           
		                          
		                          
		                          
		                          <!--div class="grid_8">

		                          		<!-- <p><input type="checkbox" id="recommend" value="re" />แนะนำ</p> --><?php // ======= ?>
		                          		<!--p><input type="checkbox" id="recommend" value="re" name="recomment"/>แนะนำ</p>

		                          </div-->
		                          <br class="clear"/>
		
		                          <br class="clear"/>
								  <h6 class="detail-title">การศึกษา</h6>		                      
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
										<div class="grid_5"><?php echo $attDes; ?></div>
										<?php
											}
										}                     	  
		                         	  
		                         	  	if($i == 1)
										{
		                         	  ?>          
		                                    
		                                    	<a href="edit-job-attribute.php" class="table-actions-button text-blue">แก้ไข</a>
		                                    
		                         <?php 	} ?>  
		                                    <br class="clear"/>
		                                    	<a href="add-job-attribute-two.php" class="table-actions-button text-red">เพิ่ม</a>
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

	include("include/footer.php");
	}
}
?>
	
