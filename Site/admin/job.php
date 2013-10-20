<script src="js/jquery-1.7.1.min.js">
	/*$(document).ready(function(){
		$(".table-actions-button text-red").click(function(){
			$("").append('body')
                    .html('<div><h6>Are you sure?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();

                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });					
		});
				
	});
	*/
	
</script>
<?php 
session_start();
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
	if($_GET["mode"]=="logout"){
		include($rootadminpath."include/module/logout_process.php");
	}
	//normal mode
	else{
		
		include("include/top-bar.php");
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
				
?>
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
							<h2>งาน<span class="right"><a href="insert-job.php" class="add-button blue round" vlaue="insert">เพิ่ม</a></span></h2>
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
												$JID = $show['JobID'];
												$ST = $show['StartTime'];
												$ET = $show['EndTime'];
												$i++;
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $PositionName[$i-1];?></td>
												<td><?php echo $Company[$i-1];?></td>
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
				                                		<a href="edit-job.php" class="table-actions-button text-blue" id="<?php echo $JID[$i-1];?>">แก้ไข</a>
				                                		<a href="#" class="table-actions-button text-red" id="<?php echo $JID[$i-1];?>" name="delete" >ลบ</a>
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
		{
?>
		<script language="JavaScript">
			alert("Kakkkk");
		</script>	
<?php 
		} 
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
	
	include($rootadminpath."include/footer.php");	
?>