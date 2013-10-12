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
		                    	<h1>งาน <span>-</span><span class="text-black">เพิ่ม</span></h1>
		                	</div>
							<div id="content-detail" class="container_12">
		                    <section>
		                    	<form id="form-edit" name="form-edit">

		                         <div class="grid_2">
		                             <h6 class="detail-title">ชื่อบริษัท</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="CompanyName" class="round" value=""/></p>
		                          </div><br class="clear"/>

		                          <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(ภาษาไทย)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="PositionThaiName" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          
		                          <div class="grid_2">
		                             <h6 class="detail-title">ตำแหน่ง(ภาษาอังกฤษ)</h6>
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="PositionEngName" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                         
		                          <div class="grid_2">
		                                <h6 class="detail-title">สถานที่ปฏิบัติงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><textarea type="text" id="name" name ="Placename" class="round" value=""></textarea>				                                </p>
		                          </div><br class="clear"/>
		                          
		                          <br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">อัตรา</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="Quantity" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">เงินเดือน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="Salaly" class="round" value=""/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">คุณสมบัติ</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="name" name ="name" class="round" value=""/></p>
		                          </div>
		                          <div class="grid_2">
		                          	<a href="#" class="button round black">เพิ่ม</a>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">บริษัท</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input type="text" id="company" name ="company" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">ลักษณะงาน</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><label for="read" class="alt-label"><input type="radio" id="test" name="Full" checked="checked" value="1" />
		            					Full Time
		            				</label>
									<label for="read" class="alt-label"><input type="radio" id="test" name="Part" value="2"/>
		           						Part Time
		            				</label> </p>
		            				
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">เริ่ม</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input name="date_start" type="text" id="date_from" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">สิ้นสุด</h6>   
		                          </div>
		                          <div class="grid_8">
		                          		<p><input name="date_end" type="text" id="date_to" class="round"/></p>
		                          </div><br class="clear"/>
		                          <div class="grid_2">
		                                <h6 class="detail-title">งานแนะนำ</h6>   
		                          </div>
		                          
		                          <div class="grid_8">
		                          		<p><input type="checkbox" id="recommend" value="1" />แนะนำ</p>
		                          </div><br class="clear"/>
		
		                          <br class="clear"/>
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
		                           </div>  <div class="grid_12 center"><a href="#" class="save-button blue round">บันทึก</a></div>      
								</form>
		            		</section> 
		                    <div class="grid_12 center"></div>
		                    </div>         
		                   
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