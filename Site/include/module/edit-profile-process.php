<?php
session_start();
$rootpath ="../../";
$rootadminpath ="../../admin/";
// include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
// include ($rootpath . "include/top-menu.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$birthdate=$_POST["birthdate"];
	$place_of_birth=$_POST["place_of_birth"];
	$age=$_POST["age"];
	$nationality=$_POST["nationality"];
	$religion=$_POST["religion"];
	$height=$_POST["height"];
	$weight=$_POST["weight"];
	$blood=$_POST["blood"];
	$lesion=$_POST["lesion"];
	$current_address=$_POST["current_address"];
	$phone_number=$_POST["phone_number"];
	$email=$_POST["email"];
	$pouse_name=$_POST["pouse_name"];
	$military_status=$_POST["military_status"];
	$current_address_status=$_POST["current_address_status"];
	$relationship_status=$_POST["relationship_status"];
	$father_name=$_POST["father_name"];
	$father_age=$_POST["father_age"];
	$father_career=$_POST["father_career"];
	$father_live_status=$_POST["father_live_status"];
	$mother_name=$_POST["mother_name"];
	$mother_age=$_POST["mother_age"];
	$mother_career=$_POST["mother_career"];
	$mother_live_status=$_POST["mother_live_status"];
	$ref_name=$_POST["ref_name"];
	$ref_relationship=$_POST["ref_relationship"];
	$ref_workplace=$_POST["ref_workplace"];
	$ref_position=$_POST["ref_position"];
	$ref_phone_number=$_POST["ref_phone_number"];	
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	
	if($rs_user = @mysql_fetch_array($result_user)){
		$sql_user_edit="
			UPDATE `buildthedot_thaijobhd_user_account` 
			SET
			`birthdate` =  '{$birthdate}' ,
			`place_of_birth` = '{$place_of_birth}' ,
			`age` = '{$age}' ,
			`nationality` = '{$nationality}' ,
			`religion` = '{$religion}' ,
			`height` = '{$height}' ,
			`weight` = '{$weight}' ,
			`blood` = '{$blood}' ,
			`lesion` = '{$lesion}' ,
			`current_address` = '{$current_address}' ,
			`phone_number` = '{$phone_number}' ,
			`email` = '{$email}' ,
			`pouse_name` = '{$pouse_name}' ,
			`military_status` = '{$military_status}' ,
			`current_address_status` = '{$current_address_status}' ,
			`relationship_status` = '{$relationship_status}' ,
			`father_name` = '{$father_name}' ,
			`father_age` = '{$father_age}' ,
			`father_career` = '{$father_career}' ,
			`father_live_status` = '{$father_live_status}' ,
			`mother_name` = '{$mother_name}' ,
			`mother_age` = '{$mother_age}' ,
			`mother_career` = '{$mother_career}' ,
			`mother_live_status` = '{$mother_live_status}' 
			WHERE `id` = '".$_SESSION["userid"]."' ;
		";
		@mysql_query($sql_user_edit);
		$sql_user_ref="
			SELECT * 
			FROM  `buildthedot_thaijobhd_user_account_reference_contacts` 
			WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
		";
		$result_user_ref=@mysql_query($sql_user_ref);
		if($rs_user_ref=@mysql_fetch_array($result_user_ref)) {
			$sql_user_ref_update="
				UPDATE `buildthedot_thaijobhd_user_account_reference_contacts` 
				SET
					`name` = '{$ref_name}' ,
					`relationship` = '{$ref_relationship}' ,
					`workplace` = '{$ref_workplace}' ,
					`position` = '{$ref_position}' ,
					`phone_number` = '{$ref_phone_number}' 
				WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
			";
			@mysql_query($sql_user_ref_update);
		}
		else{
			$sql_user_ref_update="
				INSERT INTO `buildthedot_thaijobhd_user_account_reference_contacts` 
				(`user_account_id`, `name`, `relationship`, `workplace`, `position`, `phone_number`)
				VALUE
				('".$_SESSION["userid"]."', '{$ref_name}' , '{$ref_relationship}', '{$ref_workplace}', '{$ref_position}', '{$ref_phone_number}') ;
			";
			@mysql_query($sql_user_ref_update);
		}
		?><form id="edit_education_message_form" action="<?php echo $rootpath; ?>view-profile.php" method="POST">
			<input type="hidden" id="add_education_messaage" name="add_education_messaage" value="" />
		</form>
		<script>
			document.getElementById("edit_education_message_form").submit();
		</script> 
<?php
	}
}
?>