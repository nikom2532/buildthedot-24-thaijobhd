<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
			<ul id="tabs" class="left">
				<li><a href="<?php echo $rootadminpath; ?>job.php">งาน</a></li>
				<li><a href="<?php echo $rootadminpath; ?>business-idea.php">ไอเดียธุรกิจ</a></li>
				<li><a href="<?php echo $rootadminpath; ?>advertisement.php" class="active-tab">โฆษณา</a></li>
				<li><a href="<?php echo $rootadminpath; ?>top-company.php">บริษัทชั้นนำ</a></li>
			</ul> <!-- end tabs -->
			<!-- company logo -->
			
		</div> <!-- end full-width -->
	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content">
		

			<div class="content-module">
				
				<div class="content-module-main">
				
					<h2>โฆษณา<span class="right"><a href="#" class="add-button blue round">เพิ่ม</a></span></h2>
					
					<table>
					
						<thead>
					
							<tr>
								<th width="9%">ลำดับที่</th>
								<th width="43%">ชื่อ Banner</th>
								<th width="23%">ลิ้งค์</th>
								<th width="11%">Action</th>
							</tr>
						
						</thead>

						<tfoot>
						
						
						<tbody>

							<tr>
								<td>1</td>
								<td>Adrian Purdila</td>
                                <td><a href="#">http://www.xxx.xxx</a></td>
								<td id="action" class="center">
                                    <a href="edit-advertisement.php" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>2</td>
								<td>Adrian Purdila</td>
                                <td><a href="#">http://www.xxx.xxx</a></td>
								<td id="action" class="center">
                                    <a href="edit-advertisement.php" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>3</td>
								<td>Adrian Purdila</td>
                                <td><a href="#">http://www.xxx.xxx</a></td>
								<td id="action" class="center">
                                    <a href="edit-advertisement.php" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>4</td>
								<td>Adrian Purdila</td>
                                <td><a href="#">http://www.xxx.xxx</a></td>
								<td id="action" class="center">
                                    <a href="edit-advertisement.php" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>5</td>
								<td>Adrian Purdila</td>
                                <td><a href="#">http://www.xxx.xxx</a></td>
								<td id="action" class="center">
                                    <a href="edit-advertisement.php" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>
						</tbody>
						
					</table>
                   
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
			
	</div> <!-- end content -->
	
<?php include("include/footer.php");?>