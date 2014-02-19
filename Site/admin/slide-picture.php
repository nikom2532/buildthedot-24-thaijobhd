<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");
?>
<script src="./js/jquery-1.7.1.min.js"></script>

<script>
	$(document).ready(function(){
  		$(".table-actions-button-del").live("click",function() 
  		{ 
			if (confirm("Do you want to delete")){
     	 		id = $(this).attr('id');
     	 		$.post("include/module/delete-slide-process.php",{ SID : id },function(data){
     	 			if(data == "true")
     	 			{
     	 				alert("Delete Complete");
     	 				location.reload();
     	 			}
     	 			else
     	 			{	
     	 				alert("Delete Uncomplete");
     	 				location.reload();
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
//For Development mode(No need to login)
 $_SESSION["userid"] = "1";

if ($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	//include ("include/footer.php");
} 
else {
	//check for Logout mode
	if(isset($_GET["mode"]))
	{
		if($_GET["mode"]=="logout")
		{
			include($rootadminpath."include/module/logout_process.php");
		}
	}
	
	//normal mode
	else
	{
		include($rootpath."lib/func_pagination.php");
		include($rootadminpath."include/initial/pagination.php");
		include($rootadminpath."include/top-bar.php");
		$menu="slide";
		include($rootadminpath."include/top-menu.php");
	?>
			<!-- MAIN CONTENT -->
				<div id="content">
					<div class="content-module">
						<div class="content-module-main">
							<h2>สไลท์</h2>
							<table>
								<thead>
									<tr>
										<th width="9%">ลำดับที่</th>
										<th width="43%">รูป</th>
										<th width="23%">การกระทำ</th>
									</tr>
								</thead>
					
								
								<tbody>
								<?php
									$pic = array();
									$sql = "SELECT * FROM buildthedot_thaijobhd_slide ORDER BY sid ASC ";
									$result = @mysql_query($sql);
									$count = 1;
									while($rs = @mysql_fetch_array($result))
									{
										switch ($rs['sid']) {
											case '1':
												$pic['1'] = $rs['pic_name'];
												break;
											case '2':
												$pic['2'] = $rs['pic_name'];
												break;
											case '3':
												$pic['3'] = $rs['pic_name'];
												break;
											case '4':
												$pic['4'] = $rs['pic_name'];
												break;
											case '5':
												$pic['5'] = $rs['pic_name'];
												break;
											default:
												break;
										}
			
										
									}
								?>
									<tr>
										<td class="center">
										1
										</td>
										<td>
											<img src="images/<?php echo $pic['1']; ?>">
										</td>
										<td id="action" class="center">	
			                                <a href="add-slide.php?id=1" class="table-actions-button text-blue">เพิ่ม</a>
			                                <a href="#" class="table-actions-button-del" style="color: red" id="1">ลบ</a> 	
										</td>
									</tr>
									
									<tr>
										<td class="center">
										2
										</td>
										<td>
											<img src="images/<?php echo $pic['2']; ?>">
										</td>
										<td id="action" class="center">	
			                                <a href="add-slide.php?id=2" class="table-actions-button text-blue">เพิ่ม</a>
			                                <a href="#" class="table-actions-button-del" style="color: red" id="2">ลบ</a> 	
										</td>
									</tr>
									
									<tr>
										<td class="center">
										3
										</td>
										<td>
											<img src="images/<?php echo $pic['3']; ?>">
										</td>
										<td id="action" class="center">	
			                                <a href="add-slide.php?id=3" class="table-actions-button text-blue">เพิ่ม</a>
			                                <a href="#" class="table-actions-button-del" style="color: red" id="3">ลบ</a> 	
										</td>
									</tr>
									
									<tr>
										<td class="center">
										4
										</td>
										<td>
											<img src="images/<?php echo $pic['4']; ?>">
										</td>
										<td id="action" class="center">	
			                                <a href="add-slide.php?id=4" class="table-actions-button text-blue">เพิ่ม</a>
			                                <a href="#" class="table-actions-button-del" style="color: red" id="4">ลบ</a> 	
										</td>
									</tr>
									
									<tr>
										<td class="center">
										5	
										</td>
										<td>
											<img src="images/<?php echo $pic['5']; ?>">
										</td>
										<td id="action" class="center">	
			                                <a href="add-slide.php?id=5" class="table-actions-button text-blue">เพิ่ม</a>
			                                <a href="#" class="table-actions-button-del" style="color: red" id="5">ลบ</a> 	
										</td>
									</tr>
							
								</tbody>
							</table>
						</div> <!-- end content-module-main -->
					</div> <!-- end content-module -->
	<?php					
	}
}
?>
				</div> <!-- end content -->		

	