<?php
	//Page: Pagination
	//initial Value
	
	
	// //Start Page = 1
	// if(!isset($_GET["page"])){
		// $_GET["page"]=1;
	// }
	// $page = $_GET["page"];
	// $page_limit = 10;
	
	
/*---------Paging------------*/
$page=1;//Default page
$page_limit=10;//Records per page
$start=0;//starts displaying records from 0
if(isset($_GET['page']) && $_GET['page']!=''){
	$page=$_GET['page'];
}
else{
	$page=1;
}
$start=($page-1)*$page_limit;
/*---------end Paging------------*/

?>