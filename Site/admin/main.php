<?php 
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include($rootpath."include/opendb.php");
$_SESSION["userid"] = "1";
if ($_SESSION["userid"] == "") {
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
} else { echo "aaa";
	include($rootadminpath."include/top-bar.php");
	
	$menu="job";
	include($rootadminpath."include/top-menu.php");
?>
	<!-- MAIN CONTENT -->
	<div id="content">
		

			<div class="content-module">
				
				<div class="content-module-main">
				
					<h2>งาน<span class="right"><a href="#" class="add-button blue round">เพิ่ม</a></span></h2>
					
					<table>
					
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
								<td>1</td>
								<td>Adrian Purdila</td>
								<td>Adrian Purdila</td>
                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
								<td id="action" class="center">
                                    <a href="#" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>2</td>
								<td>Adrian Purdila</td>
								<td>Adrian Purdila</td>
                                <td id="status"><img src="images/icons/message-boxes/error.png" alt="active"></td>
								<td>
                                	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>3</td>
								<td>Adrian Purdila</td>
								<td>Adrian Purdila</td>
                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
								<td>
                                	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>4</td>
								<td>Adrian Purdila</td>
								<td>Adrian Purdila</td>
                                <td id="status"><img src="images/icons/message-boxes/confirmation.png" alt="active"></td>
								<td>
                                	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>

							<tr>
								<td>5</td>
								<td>Adrian Purdila</td>
								<td>Adrian Purdila</td>
                                <td id="status"><img src="images/icons/message-boxes/error.png" alt="active"></td>
								<td>
                                	<a href="#" class="table-actions-button text-blue">แก้ไข</a>
                                    <a href="#" class="table-actions-button text-red">ลบ</a>
                                </td>
							</tr>
						</tbody>
						
					</table>
                   
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
			
	</div> <!-- end content -->
<?php 
	include($rootadminpath."include/footer.php");
	}//end check user session
?>