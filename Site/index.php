<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
//include ($rootpath . "include/search-bar.php");
?>
<?php /* ?>
<!--start banner -->
<div id="banner-1">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-3">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-5">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-7">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-9">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<!-- <div id="banner-1">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-2">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-3">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-4">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-5">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div> -->
<!--end banner side-left -->
<div id="banner-2">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-4">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-6">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-8">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-10">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<!--end banner side-right -->
<?php */ ?>
<div id="search-bar" class="container_12">
	<form action="search.php" method="POST" id="search-form" class="center"  class="grid_12">
		<fieldset>
			<label for="keyword">ค้นหางาน</label>
			<input type="text" id="keyword" class="round" name="search" placeholder="ค้นหาตำแหน่งงาน"/>
			<input type="submit" value="" class="round black ic-search" />
		</fieldset>
	</form>
</div><!--end search-bar -->
<div  id="slide-image" class="container_12">
	<img src="images/slide-image.jpg" width="1000" height="280" alt="images">
</div><!--end slide-image-->
<div id="content" class="container_12">
	<div class="grid_2 margin-left-5 margin-right-5">
<?php
	for($i_advertisement=1;$i_advertisement<=9;$i_advertisement=$i_advertisement+2){
		$sql_advertisement="
			SELECT * 
			FROM  `buildthedot_thaijobhd_ad`
			WHERE `AdType` = 'Side_Ads'
			AND `AdPosition` = '{$i_advertisement}' ;
		";
		$result_advertisement=@mysql_query($sql_advertisement);
		if($rs_advertisement=@mysql_fetch_array($result_advertisement)){
?>
			<div id="banner-<?php echo $i_advertisement; ?>">
				<a href="http://<?php echo $rs_advertisement["AdLink"]; ?>" target="_block"><img src="<?php echo $rootpath; ?>images/ad/<?php echo $rs_advertisement["AdPic"]; ?>" width="144" height="143"></a>
			</div>
<?php
		}
		else{
?>
			<div id="banner-<?php echo $i_advertisement; ?>">
				<img src="<?php echo $rootpath; ?>admin/images/banner-2.png" width="144" height="143">
			</div>
<?php
		}
	}
?>
	</div>
	<div class="grid_8"><?php //Center Content ?>
		<div id="head-title">
			<h1>งานแนะนำ</h1>
		</div>
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Full Time <span class="right"><a href="find-job-recommend-fulltime.php" class="button round black">ดูทั้งหมด</a></span></h2>
			
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE Recomment = '1' AND JobType = '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						if(checkTime($rs['StartTime'],$rs['EndTime']))
						{?>
				            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
				            <p>
				            <?php 
				            	$des = substr($rs['JobDescription'], 0 , 125);
				            	echo $des."..."; 
				            ?>
				            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
				        <?php	
			        	}
					}
				}
			?>
			
			<div id="banner">
				<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
			</div>
		</div>
	
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Part Time <span class="right"><a href="find-job-recommend-partime.php" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE Recomment = '1' AND JobType != '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						if(checkTime($rs['StartTime'],$rs['EndTime']))
						{?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php
			            	$des = substr($rs['JobDescription'], 0 , 125);
			            	echo $des."...";
			            	?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
			        	}
					}
				}
			?>

			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p 
			-->
<?php
			$sql_advertisement="
				SELECT * 
				FROM  `buildthedot_thaijobhd_ad`
				WHERE `AdType` = 'Content_Ads'
				AND `AdPosition` = '2' ;
			";
			$result_advertisement=@mysql_query($sql_advertisement);
			if($rs_advertisement=@mysql_fetch_array($result_advertisement)){
?>
				<div id="banner">
					<a href="<?php echo $rs["AdLink"]; ?>" target="_block"><img src="images/ad/<?php echo $rs_advertisement["Content_Ads"]; ?>" width="100%" <?php // width="458" height="175" ?> alt="Banner"></a>
				</div>
<?php
			}
			else{
?>
				<div id="banner">
					<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
				</div>
<?php
			}
?>
		</div>
	
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>งานใหม่ล่าสุด </h1>
		</div>
	
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Full time<span class="right"><a href="find-job-new-fulltime.php" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT *
				FROM  buildthedot_thaijobhd_job
				WHERE JobType = '1'
				ORDER BY JobID DESC	
				LIMIT 0,3
				";
				$result=@mysql_query($sql);
				if($result)
				{
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						if(checkTime($rs['StartTime'],$rs['EndTime']))
						{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black" ><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php
			            	$des = substr($rs['JobDescription'], 0 , 125);
			            	echo $des."...";
			            	?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
			        	}
					}
				}
			?>
			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p-->
		</div>
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Part time<span class="right"><a href="find-job-new-parttime.php" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE JobType != '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						if(checkTime($rs['StartTime'],$rs['EndTime']))
						{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php
			            	$des = substr($rs['JobDescription'], 0 , 125);
			            	echo $des."...";
			            	?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
						}
					}
				}
			?>
			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p-->
		</div>
	
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>บริษัทชั้นนำ</h1>
		</div>
		<div id="top-company">
<?php
		$sql_top_company="
			SELECT * 
			FROM  `buildthedot_thaijobhd_top_company`
			WHERE Status = 1
			LIMIT 0, 12 ;
		";
		$result_top_company=@mysql_query($sql_top_company);
		while($rs_top_company=@mysql_fetch_array($result_top_company)){
?>
			<div class="grid_2 margin-left-5 margin-right-5"><a href="<?php echo $rs_top_company["LinkAddress"]; ?>" target="_blank"><img src="images/top_company/<?php echo $rs_top_company["CompanyPic"]; ?>" width="144" height="143" /></a>
			</div>
<?php
		}
?>
			<h2 class="right"><a href="<?php echo $rootpath; ?>top-company.php" class="button round black">ดูทั้งหมด</a></h2>
		</div>
		
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>ไอเดียธุรกิจแนะนำ </h1>
		</div>
		<div id="recommend-idea" class="grid_8">
<?php
			$sql_business_ieda_suggest="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				WHERE `IdeaRecomment` = 1
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC 
				LIMIT 0, 4 ;
			";
			$result_business_ieda_suggest=@mysql_query($sql_business_ieda_suggest);
			while($rs=@mysql_fetch_array($result_business_ieda_suggest)){
?>
				<div class="grid_3">
					<img src="<?php echo $rootpath; ?>images/<?php
						if(($rs["Pic1"] == "")&&($rs["Pic2"] == "")&&($rs["Pic3"] == "")){
							echo "banner-2.png";
						}
						else{
							echo "business-idea/";
							if($rs["Pic1"] != ""){
								echo $rs["Pic1"];
							}
							elseif($rs["Pic2"] != ""){
								echo $rs["Pic2"];
							}
							elseif($rs["Pic3"] != ""){
								echo $rs["Pic3"];
							}
						}
					?>" width="144" height="143">
					<h3><?php echo $rs["MainIdea"]; ?></h3>
					<p><?php echo substr($rs["Description1"], 0 , 125)."..."; ?><span class="right" id="read-more"><a href="<?php echo $rootpath; ?>business-idea-detail.php?id=<?php echo $rs["CompanyID"]; ?>">อ่านต่อ</a></span></p>
				</div>
<?php
			}
?>
		</div>
		<h2 class="right"><a href="<?php echo $rootpath; ?>business-idea.php?menu=suggest" class="button round black">ดูทั้งหมด</a></h2>
		
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>ไอเดียธุรกิจมาใหม่ </h1>
		</div>
		<div id="recommend-idea" class="grid_8">
<?php
			$sql_business_ieda_suggest="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC
				LIMIT 0, 4 ;
			";
			$result_business_ieda_suggest=@mysql_query($sql_business_ieda_suggest);
			while($rs=@mysql_fetch_array($result_business_ieda_suggest)){
?>
				<div class="grid_3">
					<img src="<?php echo $rootpath; ?>images/<?php
						if(($rs["Pic1"] == "")&&($rs["Pic2"] == "")&&($rs["Pic3"] == "")){
							echo "banner-2.png";
						}
						else{
							echo "business-idea/";
							if($rs["Pic1"] != ""){
								echo $rs["Pic1"];
							}
							elseif($rs["Pic2"] != ""){
								echo $rs["Pic2"];
							}
							elseif($rs["Pic3"] != ""){
								echo $rs["Pic3"];
							}
						}
					?>" width="144" height="143">
					<h3><?php echo $rs["MainIdea"]; ?></h3>
					<p><?php echo substr($rs["Description1"], 0 , 125)."..."; ?><span class="right" id="read-more"><a href="<?php echo $rootpath; ?>business-idea-detail.php?id=<?php echo $rs["CompanyID"]; ?>">อ่านต่อ</a></span></p>
				</div>
<?php
			}
?>
		</div>
		
		<h2 class="right"><a href="<?php echo $rootpath; ?>business-idea.php" class="button round black">ดูทั้งหมด</a></h2>
		<br class="clear seperator"/>
<?php
		for($i_advertisement=1;$i_advertisement<=2;$i_advertisement++){
			$sql_advertisement="
				SELECT * 
				FROM  `buildthedot_thaijobhd_ad`
				WHERE `AdType` = 'Content_Ads'
				AND `AdPosition` = '{$i_advertisement}' ;
			";
			$result_advertisement=@mysql_query($sql_advertisement);
			if($rs_advertisement=@mysql_fetch_array($result_advertisement)){
?>
				<div class="grid_4 margin-left-5 margin-right-5">
					<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
				</div>
<?php
			}
			else{
?>
				<div class="grid_4 margin-left-5 margin-right-5">
					<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
					<a href="http://<?php echo $rs_advertisement["AdLink"]; ?>" target="_block"><img src="<?php echo $rootpath; ?>images/ad/<?php echo $rs_advertisement["AdPic"]; ?>" width="144" height="143"></a>
				</div>
<?php
			}
		}
?>
				
	</div><?php //End Center Content ?>
	<div class="grid_2 margin-left-5 margin-right-5">
<?php
	for($i_advertisement=2;$i_advertisement<=10;$i_advertisement=$i_advertisement+2){
		$sql_advertisement="
			SELECT * 
			FROM  `buildthedot_thaijobhd_ad`
			WHERE `AdType` = 'Side_Ads'
			AND `AdPosition` = '{$i_advertisement}' ;
		";
		$result_advertisement=@mysql_query($sql_advertisement);
		if($rs_advertisement=@mysql_fetch_array($result_advertisement)){
?>
			<div id="banner-<?php echo $i_advertisement; ?>">
				<a href="http://<?php echo $rs_advertisement["AdLink"]; ?>" target="_block"><img src="<?php echo $rootpath; ?>images/ad/<?php echo $rs_advertisement["AdPic"]; ?>" width="144" height="143"></a>
			</div>
<?php
		}
		else{
?>
			<div id="banner-<?php echo $i_advertisement; ?>">
				<img src="<?php echo $rootpath; ?>admin/images/banner-2.png" width="144" height="143">
			</div>
<?php
		}
	}
?>
	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
	
	

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
	
?>