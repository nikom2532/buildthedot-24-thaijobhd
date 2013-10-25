<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>
<script src="js/jquery-1.7.1.min.js"></script>


<div id="search-bar" class="container_12">       			
    <form action="#" method="POST" id="search-form" class="center"  class="grid_12">
        <fieldset>
            <label for="keyword">ค้นหางาน</label>
            <input type="text" id="keyword" class="round" name="searh" placeholder="ค้นหาตำแหน่งงาน" />
            <input type="submit" value="" class="round black ic-search" />
        </fieldset>
    </form>
</div><!--end search-bar -->      
    <div id="content" class="container_12">
    	<?php
    		$search = $_POST['search'];
			echo $search;
    	?>
        <div class="grid_12" id="search-list">
        	<h2 id="sub-title">Lorem Ipsum</h2>
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
            <h5 class="date">10 กันยายน 2556</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
            
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
             <h5 class="date">10 กันยายน 2556</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
            
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
             <h5 class="date">10 กันยายน 2556</h5>
            <p class="border-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
     
        </div>        
        <div class="grid_12" id="page-num">
            <ul>
            	<li><a href="#"><<</a></li>
                <li class="active-page"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div>
    </div><!--end content -->
<?php include("include/footer.php");?>