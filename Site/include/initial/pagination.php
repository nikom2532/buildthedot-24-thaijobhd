<?php
	//Page: Pagination
	//initial Value

	/*---------Paging------------*/
function get()
{
	if($_GET["page"] =="")
	{
			$_GET["page"] = 1;
	}
}
/*---------Paging------------*/
		get();
		$page_limit=10;//Records per page
		$start=0;//starts displaying records from 0
		$page=$_GET["page"];
		$start=($page-1)*$page_limit;
/*---------end Paging------------*/

?>