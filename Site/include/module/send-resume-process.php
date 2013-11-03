<?php
$rootpath = "./";
$rootadminpath = "./admin/";
include ("../../admin/include/connect-to-database.php");
@send_email();

function send_email(){
	$text_subject = "";	
	$text_message = "";
	$user_id = $_REQUEST['user_id'];
	$job_id = $_REQUEST['job_id'];
	$sql="	SELECT *
			FROM  buildthedot_thaijobhd_job
			WHERE JobID = '$job_id'	
			LIMIT 0,1				
		";
	$result=@mysql_query($sql);
	if($result)
	{	
		$count = 0;
		while($rs=@mysql_fetch_array($result))
		{
			$Company = $rs['CompanyName'];
			$positionThai = $rs['PositionThai'];
			$positionEng = $rs['PositionEng'];
		}
		$text_message .= "ถึงทีมงาน \n\tสมัครงาน บริษัท : " . $Company . " ตำแหน่ง  : " . $positionThai . "(". $positionEng. ") \n";
		//user	
		$sql="	SELECT *
			FROM  buildthedot_thaijobhd_user_account
			WHERE id = '$user_id'	
			LIMIT 0,1				
		";
		$result=@mysql_query($sql);
		if($result)
		{	
			$count = 0;
			while($rs=@mysql_fetch_array($result))
			{
				$email = $rs['email'];
				$firstname = $rs['firstname'];
				$midname = $rs['midname'];
				$lastname = $rs['lastname'];
				$birthdate = $rs['birthdate'];
				$nationality = $re['nationality'];
				$religion = $rs['religion'];
				$current_address = $rs['current_address'];
				$phone_number = $rs['phone_number'];	
			}
			$text_subject = $firstname . " " . $midname . " " . $lastname . " สมัครงาน บริษัท : " . $Company . "ตำแหน่ง  :" . $positionThai . "(". $positionEng. ")" ;		
			$text_message .= "\tผู้สมัคร  \n\t\tชื่อ : " . $firstname . "\n\t\tชื่อกลาง : " . $midname . "\n\t\tนามสกุล :  " . $lastname . " \n";	
			$text_message .= "\t\tวันเกิด :  " . $birthdate . "\n\t\tสัณชาติ  : " . $nationality . "\n\t\tศาสนา : ". $religion . "\n";
			$text_message .= "\tที่อยู่ฟัจจุบัน : \n\t\t ". $current_address . "\n\t\tเบอติดต่อ : " . $phone_number . "\t\te-mail : " . $email . "\n";
			//education
			$sql="	SELECT *
			FROM buildthedot_thaijobhd_user_history_educations
			WHERE user_account_id = '$user_id'	
			LIMIT 0,1				
			";
			$result=@mysql_query($sql);
			if($result)
			{	
				$count = 0;
				$text_message .= "\t\tประวัติการศึกษา : \n"; 
				while($rs=@mysql_fetch_array($result))
				{
					$education_level = $rs['education_level'];
					$Institution = $rs['Institution'];
					$year_start = $rs['year_start'];
					$year_end = $rs['year_end'];
					$text_message .= "\t\t\tระดับการศึกษา :". $education_level ." \n \t\t\tสถาบัน  : ". $Institution ."\n \t\t\tปีการศึกษา  : " .$year_start . " ถึง " . $year_end . "\n";
				}			
				//experiences
				$sql="	SELECT *
				FROM buildthedot_thaijobhd_user_history_experiences
				WHERE user_account_id = '$user_id'	
				LIMIT 0,1				
				";
				$result=@mysql_query($sql);
				if($result)
				{	$text_message .= "\t\tประสบการณ์การทำงาน : \n";
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						$job_position = $rs['job_position'];
						$company_name = $rs['company_name'];
						$year_start = $rs['year_start'];
						$year_end = $rs['year_end'];
						$text_message .= "\t\t\tบริษัท  :". $company_name ." \n \t\t\tตำแหน่ง  : ". $job_position ."\n \t\t\tปี  : " . $year_start . " ถึง  " . $year_end . "\n";
					}			
					//talent_languages
					$sql="	SELECT *
					FROM buildthedot_thaijobhd_user_history_talent_languages
					WHERE user_account_id = '$user_id'	
					LIMIT 0,1				
					";
					$result=@mysql_query($sql);
					if($result)
					{
						$text_message .= "\t\tระดับภาษา : \n";
						$count = 0;
						while($rs=@mysql_fetch_array($result))
						{
							$language = $rs['language'];
							$score_speaking = $rs['score_speaking'];
							$score_understanding = $rs['score_understanding'];
							$score_reading = $rs['score_reading'];
							$score_writing = $rs['score_writing'];
							$text_message .= "\t\t\tภาษา  :". $language ." \n ";
							$text_message .= "\t\t\tระดับการพูด : " . $score_speaking . "\n";
							$text_message .= "\t\t\tระดับการฟัง : " . $score_understanding  . "\n";
							$text_message .= "\t\t\tระดับการอ่าน : " . $score_reading . "\n";
							$text_message .= "\t\t\tระดับการเขียน : " . $score_writing . "\n";
						}			
						
						//talent other
						$sql="	SELECT *
						FROM buildthedot_thaijobhd_user_history_talent_others
						WHERE user_account_id = '$user_id'				
						";
						$result=@mysql_query($sql);
						if($result)
						{
							$text_message .= "\t\tความสามารถพิเศษ : \n";	
							$count = 0;
							while($rs=@mysql_fetch_array($result))
							{
								$topic = $rs['topic'];
								$text_message .= "\t\t\t-" .  $topic ."\n";
							}			
							
							$subject = $text_subject;
							$to = "swort_k@hotmail.com";
							$message = $text_message;
							$from = "swort_k@hotmail.com";
							$headers = "";
							
							$send_mail = mail($to,$subject,$message,$headers);
							if($send_mail)
							{
								echo TRUE;
							}
							else {
								echo FALSE;
							}
						}
						else {
							echo FALSE;
						}
							
					}
					else {
						echo FALSE;
					}
						
				}
				else {
					echo FALSE;
				}	
				
			}
			else {
				echo FALSE;
			}	
			
			
		}
		else {
			echo FALSE;
		}
			
	}
	else {
		echo FALSE;
	}
}
?>