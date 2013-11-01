<?php 
session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");
?>
<script src="./js/jquery-1.7.1.min.js"></script>

<script>
	/*function deleteFunction()
	{
		var con = confirm("Delete");
		if (con==true)
  		{
  			var a = this.document.getElementsByTagName("a")[0];
			//document.getElementById("demo").innerHTML=a.getAttribute("id");
			alert(a.getAttribute("id"));
  		}
		else
  		{
  			
  		}
	}
	*/
	$(document).ready(function(){
  		$(".table-actions-button-del").live("click",function() 
  		{ 
			if (confirm("Do you want to delete")){
     	 		id = $(this).attr('id');
     	 		$.post("include/module/delete-job-process.php",{JID : id},function(data){
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
//For Development mode(No need to login)
// $_SESSION["userid"] = "1";

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
	else{
		include($rootpath."lib/func_pagination.php");
		include($rootadminpath."include/initial/pagination.php");
		include($rootadminpath."include/top-bar.php");
		
		//Remove Ken's Login, Add Arming Huang's login
		/*
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
			{
		*/
				
?>
				<!-- HEADER -->
				<div id="header-with-tabs">
					<div class="page-full-width cf">
						<ul id="tabs" class="left">
							<li><a href="<?php echo $rootadminpath; ?>job.php"  class="active-tab" id="s">งาน</a></li>
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
							<h2>งาน<span class="right"><a href="insert-job.php" class="add-button blue round" vlaue="insert">เพิ่ม</a></span></h2>
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
	<?php
									$i=1;
								/*	if($_GET["page"] ==""){
										$_GET["page"] = 1;
									}*/
									// $sql="
										// SELECT * 
										// FROM  `buildthedot_thaijobhd_job_idea`
										// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
									// ";
									$sql="
										SELECT * 
										FROM  `buildthedot_thaijobhd_job`
									";
									$result=@mysql_query($sql);
									$number_of_items=@mysql_num_rows($result);
									$sql="
										SELECT * 
										FROM  `buildthedot_thaijobhd_job` 
									 	LIMIT {$start} , {$page_limit} ;
									";
									$result=@mysql_query($sql);
									while($rs=@mysql_fetch_array($result)){
	?>
										<tr>
											<td><?php //echo $rs["CompanyID"]; ?><?php echo $i++; ?></td>
											<td>
												<a href="business-idea-detail.php?CompanyID=<?php echo $rs["JobID"]; ?>" class="text-black"><?php echo $rs["PositionThai"]; ?></a>
											</td>
											<td><?php echo $rs['CompanyName'];?></td>
											<td id="status">
												 <?php
					                                if(checkTime($rs['StartTime'],$rs['EndTime']))
												   	{
					                                ?>
					                                	<img src="images/icons/message-boxes/confirmation.png" alt="active">
					                               	<?php
													}
													else
													{ ?>
														<img src="images/icons/message-boxes/error.png" alt="active">
													<?php
													}
												?>
											</td>
											<td id="action" class="center">
			                                		<a href="edit-job.php?id=<?php echo $rs["JobID"];?>" class="table-actions-button text-blue" id="<?php echo $rs["JobID"];?>">แก้ไข</a>
			                                		<a href="#" class="table-actions-button-del" style="color: red" id="<?php echo $rs["JobID"];?>">ลบ</a> 
			                                	</td>
										</tr>
	<?php
									}
	?>
								</tbody>
							</table>
	<?php
								//############ Paging ############
							echo pagination($page_limit, $page, $rootadminpath."job.php?page=", $number_of_items); //call function to show pagination
								/*
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
									<?php
										$SQL = "SELECT * FROM buildthedot_thaijobhd_job";
										$resultSQL = mysql_query($SQL);
										if($resultSQL)
										{
											$i = 0;
											while($show = mysql_fetch_array($resultSQL))
											{
												$Company[$i] = $show['CompanyName'];
												$PositionName[$i] = $show['PositionThai'];
												$JID[$i] = $show['JobID'];
												$ST = $show['StartTime'];
												$ET = $show['EndTime'];
												$i++;
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $PositionName[$i-1];?></td>
												<td><?php echo $Company[$i-1];?>
												
												</td>
				                                <td id="status">
				                                <?php
				                                if(checkTime($ST,$ET))
											   	{
				                                ?>
				                                	<img src="images/icons/message-boxes/confirmation.png" alt="active">
				                               	<?php
												}
												else
												{ ?>
													<img src="images/icons/message-boxes/error.png" alt="active">
												<?php
												}
												?>
				                                </td>
													<td id="action" class="center">
				                                		<a href="edit-job.php?id=<?php echo $JID[$i-1];?>" class="table-actions-button text-blue" id="<?php echo $JID[$i-1];?>">แก้ไข</a>
				                                		<a href="#" class="table-actions-button-del" style="color: red" id="<?php echo $JID[$i-1];?>">ลบ</a> 
				                                	</td>
												</tr>
												<?php
											
											}
											$i = $i-1;
										}
										else 
										{
											
										}
									?>	

								</tbody>
							</table>
						 */ ?>
						</div> <!-- end content-module-main -->
					</div> <!-- end content-module -->
				</div> <!-- end content -->		
		<?php 
			/*
			}
			else
			{
			?>
				<script language="JavaScript">
					alert("Error");
				</script>	
			<?php 
			}
		}
		else 
		{
?>
		<script language="JavaScript">
			alert("Error);
		</script>	
<?php 
		} 
		*/
?>

<?php	
	/*function test()
	{
		$sql = "SELECT email, job_status FROM buildthedot_thaijobhd_user_account WHERE email = '$Admin' ORDER BY id DESC ";
		$result = mysql_query($sql);
		$i = 0;
		while($show = mysql_fetch_array($result))
		{
			$email = $show['email'];
			$i++;
		}
		
	}*/
?>
<?php 
		
	}
}//end check user session



	function checkTime($ST,$ET)
	{
		$NY = (int)date("Y");
		$SY = substr($ST,0,4);
		$EY = substr($ET,0,4);
		//echo $SY."-".$NY."-".$EY;
		if($NY < $SY || $NY > $EY) 
		{	//echo "^_^";
			return FALSE;
		}
		elseif($NY > $SY && $NY < $EY)
		{	//echo "^.^";
			return TRUE;	
		}
		elseif($NY == $SY && $NY == $EY) 
		{	//echo "^8^";
			if(checkStartMonth($ST) && checkEndMonth($ET))
			{
				return TRUE;
			}
		}
		elseif($NY == $SY && $NY < $EY)
		{	//echo "^U^";
			return checkEndMonth($ET);	
		}
		elseif ($NY > $SY && $NY == $EY) 
		{	//echo "^3^";
			return checkEndMonth($ET);
		}
	}
	
	
	function checkStartMonth($ST)
	{
			$NM = (int)date("m");
			$SM = substr($ST,5,2);
			//echo $NM."--".$SM;
			if($NM == $SM)
			{
				return checkDayStart($ST);
			}
			elseif($NM > $SM) 
			{
				return TRUE;	
			}
			elseif($NM < $SM) {
				return FALSE;
			}
	}	

	function checkEndMonth($ET)
	{
			$NM = (int)date("m");
			$EM = substr($ET,5,2);
			//echo $NM."-".$EM;
			if($NM == $EM)
			{
				return checkDayEnd($ET);
			}
			elseif($NM > $EM) 
			{
				return FALSE;	
			}
			elseif($NM < $EM) 
			{
				return TRUE;
			}
	}


	function checkDayStart($ST)
	{
		$ND = (int)date("d");
		$SD = substr($ST,8,2);
		if($ND ==$SD)
		{
			return TRUE;
		}
		elseif ($ND > $SD) {
			return TRUE;
		}
		else {
			return FALSE;		
		}
	}

	function checkDayEnd($ET)
	{
		$ND = (int)date("d");
		$ED = substr($ET,8,2);
		if($ND == $ED)
		{
			return TRUE;
		}
		elseif ($ND > $ED) {
			return FALSE;	
		}
		else {
			return TRUE;	
		}
	}
	
	//include($rootadminpath."include/footer.php");	
?>