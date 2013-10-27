<?php 
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php"); 
?>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
	$(document).ready(function()
	{
		$("#se").bind("click", function(){
			var input = $("#keyword").attr('value');
			
			$.post("search-process.php",
			{
				search : input
			},function(data)
			{
/*				$.each({ name: "John", lang: "JS" }, function( k, v ) {
  alert( "Key: " + k + ", Value: " + v );
});*/			var obj = jQuery.parseJSON(data);
				$("#search-result").empty();
		
				$.each(obj, function(key, val){
					
					$("#search-result").append("<h6 id='headline'><a href='find-job-detail.php?id=" + val['id'] + "'><font color='blue'>"+val['company']+" : "+ val['thaiPosition'] +"</font></a><h5 class='date'>"+ val['time']+"</h5></h6> <p>" + val['Description'] + "<span id='read-mor'><a href='find-job-detail.php?id="+val['id']+"'><font color='blue'> อ่านต่อ</font></a></span></p>");
				});
			});	
		});
		
	});
</script>

<div id="search-bar" class="container_12">       			
   <!-- <form action="#" method="POST" id="search-form" class="center"  class="grid_12"> -->
       <br>
       <dev id="search-form" class="center"  class="grid_12">
       <fieldset>
            <label for="keyword">ค้นหางาน</label>
            <input type="text" id="keyword" class="round" name="searh" placeholder="ค้นหาตำแหน่งงาน" />
  	  
            <input type="submit" value="" class="round black ic-search" id="se"/>
        </fieldset>
        </dev>
  <!-- </form> -->
</div><!--end search-bar -->      
    <div id="content" class="container_12">
    	<?php
    	//	$search = $_POST['search'];
			//echo $search;
    	?>
    	
        <div class="grid_12" id="search-list">
     	<h2 id="sub-title">Lorem Ipsum(ไม่รู้ว่าคืออะไร)</h2>
     	<div id="search-result">
     <?php
     		$value = $_POST['search'];
        	$sql="
			SELECT * 
			FROM  buildthedot_thaijobhd_job
			WHERE PositionThai LIKE '%$value%' OR PositionEng LIKE '%$value%'
			ORDER BY JobID DESC	
			";
			$result=@mysql_query($sql);
			if($result)
			{	
				$count = 0;
				while($rs=@mysql_fetch_array($result))
				{
					$data[$count]['id'] = $rs['JobID'];
					$data[$count]['company'] = $rs['CompanyName'];
					$data[$count]['thaiPosition'] = $rs['PositionThai'];
					$data[$count]['engPosition'] = $rs['PositionEng'];
					$data[$count]['Description'] = $rs['JobDescription'];
					$data[$count]['time'] = date("D-M-Y");
					$count++;
			
	?>
        	<h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="red"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a><span id="job-type">- 
            <?php if((int)$rs['JobType'] == 0){ ?> Part Time  <?php }else{ ?>Full Time <?php } ?></span></h6>
            <h5 class="date"><?php echo date("D-M-Y"); ?></h5>
            <p><?php echo $rs['JobDescription']; ?><span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
        	<?php
				}
			}
        	?>	
            
        		</div>
        </div>        
        <!---div class="grid_12" id="page-num">
            <ul>
            	<li><a href="#"><<</a></li>
                <li class="active-page"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div-->
    </div><!--end content -->
<?php include("include/footer.php");?>