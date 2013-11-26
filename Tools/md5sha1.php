<form action="./md5sha1.php" method="POST">
	Input : <input type="text" name="str" value="<?php echo $_POST["str"]; ?>" style="width: 200px;" autofocus />
	<br/><br/><input type="submit" value="see the password" />
</form>
<?php
$str=$_POST["str"];
if($str!=""){
?>
	Output : <input type="text" value="<?php echo md5(sha1($str)).sha1(md5($str)); ?>" style="width: 550px;" />
<?php
}
?>