<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");     
?>  
    <div id="content" class="container_12">
        <div id="content-detail">
        	<div id="head-title">
    			<h1>หางาน</h1>
    		</div>
            <div id="notification" class="grid_12">
            		<h2 class="center text-red">ขออภัย</h2>
            		<p class="center">ไม่สามารถส่งประวัติไปยังผู้ดูแลระบบค่ะ</p>
            </div>
        </div>        
    </div><!--end content -->
<?php include("include/footer.php");?>