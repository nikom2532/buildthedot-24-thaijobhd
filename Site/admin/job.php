<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/connect-to-database.php");?>
<?php session_start();
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
							<li><a href="job.php"  class="active-tab">งาน</a></li>
							<li><a href="business-idea.php">ไอเดียธุรกิจ</a></li>
							<li><a href="advertisement.php">โฆษณา</a></li>
			                <li><a href="top-company.php">บริษัทชั้นนำ</a></li>
						</ul> <!-- end tabs -->
						
						<!-- company logo -->
						
					</div> <!-- end full-width -->	
			
				</div> <!-- end header -->
					
				<!-- MAIN CONTENT -->
				<div id="content">
					
			
						<div class="content-module">
							
							<div class="content-module-main">
							
								<h2>งาน<span class="right"><a href="edit-job.php" class="add-button blue round">เพิ่ม</a></span></h2>
								
								<table id="tb-view">
								
									<thead>
								
										<tr>
											<th width="9%">ลำดับที่</th>
											<th width="43%">ชื่องาน</th>
											<th width="23%">บริษัท</th>
			                                <th width="14%">สถานะ</th>
											<th width="11%">Action</th>
										</tr>
									
									</thead>
			
									<tfoot>
									
								
									<tbody>
			
										<tr>
											<td>1</td> <a href="maps.php?param1=value1&amp;param2=value2">
											<td><a href="maps.php?param1=value1&amp;param2=value2"> Adrian Purdila </a></td>
											<td>Adrian Purdila</td>
			                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
											<td id="action" class="center">
			                                    <a href="edit-job.php" class="table-actions-button text-blue">แก้ไข</a>
			                                    <a href="#" class="table-actions-button text-red">ลบ</a>
			                                </td>
										</tr>
			
										<tr>
											<td>2</td>
											<td>Adrian Purdila</td>
											<td>Adrian Purdila</td>
			                                <td id="status"><img src="images/icons/message-boxes/error.png" alt="active"></td>
											<td>
			                                	<a href="edit-job.php" class="table-actions-button text-blue">แก้ไข</a>
			                                    <a href="#" class="table-actions-button text-red">ลบ</a>
			                                </td>
										</tr>
			
										<tr>
											<td>3</td>
											<td>Adrian Purdila</td>
											<td>Adrian Purdila</td>
			                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
											<td>
			                                	<a href="edit-job.php" class="table-actions-button text-blue">แก้ไข</a>
			                                    <a href="#" class="table-actions-button text-red">ลบ</a>
			                                </td>
										</tr>
			
										<tr>
											<td>4</td>
											<td>Adrian Purdila</td>
											<td>Adrian Purdila</td>
			                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
											<td>
			                                	<a href="edit-job.php" class="table-actions-button text-blue">แก้ไข</a>
			                                    <a href="#" class="table-actions-button text-red">ลบ</a>
			                                </td>
										</tr>
			
										<tr>
											<td>5</td>
											<td>Adrian Purdila</td>
											<td>Adrian Purdila</td>
			                                <td id="status"><img src="images/icons/message-boxes/error.png" alt="active"></td>
											<td>
			                                	<a href="edit-job.php" class="table-actions-button text-blue">แก้ไข</a>
			                                    <a href="#" class="table-actions-button text-red">ลบ</a>
			                                </td>
										</tr>
									</tbody>
									
								</table>
			                   
							</div> <!-- end content-module-main -->
						
						</div> <!-- end content-module -->
						
				</div> <!-- end content -->		
		<?php 
		}
		else 
		{
			?>
				<script language="JavaScript">
					alert("Kakkkk");
				</script>	
			<?php 
		}
	}
	else 
	{?>
		<script language="JavaScript">
			alert("Kakkkk");
		</script>	
	<?php 
	} 
?>

	
<?php include("include/footer.php");?>