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
		$text_message .= "เธ–เธถเธ�เธ—เธตเธกเธ�เธฒเธ� \n\tเธชเธกเธฑเธ�เธฃเธ�เธฒเธ� เธ�เธฃเธดเธฉเธฑเธ— : " . $Company . " เธ•เธณเน�เธซเธ�เน�เธ�  : " . $positionThai . "(". $positionEng. ") \n";
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
			$text_subject = $firstname . " " . $midname . " " . $lastname . " เธชเธกเธฑเธ�เธฃเธ�เธฒเธ� เธ�เธฃเธดเธฉเธฑเธ— : " . $Company . "เธ•เธณเน�เธซเธ�เน�เธ�  :" . $positionThai . "(". $positionEng. ")" ;		
			$text_message .= "\tเธ�เธนเน�เธชเธกเธฑเธ�เธฃ  \n\t\tเธ�เธทเน�เธญ : " . $firstname . "\n\t\tเธ�เธทเน�เธญเธ�เธฅเธฒเธ� : " . $midname . "\n\t\tเธ�เธฒเธกเธชเธ�เธธเธฅ :  " . $lastname . " \n";	
			$text_message .= "\t\tเธงเธฑเธ�เน€เธ�เธดเธ” :  " . $birthdate . "\n\t\tเธชเธฑเธ“เธ�เธฒเธ•เธด  : " . $nationality . "\n\t\tเธจเธฒเธชเธ�เธฒ : ". $religion . "\n";
			$text_message .= "\tเธ—เธตเน�เธญเธขเธนเน�เธ�เธฑเธ�เธ�เธธเธ�เธฑเธ� : \n\t\t ". $current_address . "\n\t\tเน€เธ�เธญเธ•เธดเธ”เธ•เน�เธญ : " . $phone_number . "\t\te-mail : " . $email . "\n";
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
				$text_message .= "\t\tเธ�เธฃเธฐเธงเธฑเธ•เธดเธ�เธฒเธฃเธจเธถเธ�เธฉเธฒ : \n"; 
				while($rs=@mysql_fetch_array($result))
				{
					$education_level = $rs['education_level'];
					$Institution = $rs['Institution'];
					$year_start = $rs['year_start'];
					$year_end = $rs['year_end'];
					$text_message .= "\t\t\tเธฃเธฐเธ”เธฑเธ�เธ�เธฒเธฃเธจเธถเธ�เธฉเธฒ :". $education_level ." \n \t\t\tเธชเธ–เธฒเธ�เธฑเธ�  : ". $Institution ."\n \t\t\tเธ�เธตเธ�เธฒเธฃเธจเธถเธ�เธฉเธฒ  : " .$year_start . " เธ–เธถเธ� " . $year_end . "\n";
				}			
				//experiences
				$sql="	SELECT *
				FROM buildthedot_thaijobhd_user_history_experiences
				WHERE user_account_id = '$user_id'	
				LIMIT 0,1				
				";
				$result=@mysql_query($sql);
				if($result)
				{	$text_message .= "\t\tเธ�เธฃเธฐเธชเธ�เธ�เธฒเธฃเธ“เน�เธ�เธฒเธฃเธ—เธณเธ�เธฒเธ� : \n";
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						$job_position = $rs['job_position'];
						$company_name = $rs['company_name'];
						$year_start = $rs['year_start'];
						$year_end = $rs['year_end'];
						$text_message .= "\t\t\tเธ�เธฃเธดเธฉเธฑเธ—  :". $company_name ." \n \t\t\tเธ•เธณเน�เธซเธ�เน�เธ�  : ". $job_position ."\n \t\t\tเธ�เธต  : " . $year_start . " เธ–เธถเธ�  " . $year_end . "\n";
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
						$text_message .= "\t\tเธฃเธฐเธ”เธฑเธ�เธ เธฒเธฉเธฒ : \n";
						$count = 0;
						while($rs=@mysql_fetch_array($result))
						{
							$language = $rs['language'];
							$score_speaking = $rs['score_speaking'];
							$score_understanding = $rs['score_understanding'];
							$score_reading = $rs['score_reading'];
							$score_writing = $rs['score_writing'];
							$text_message .= "\t\t\tเธ เธฒเธฉเธฒ  :". $language ." \n ";
							$text_message .= "\t\t\tเธฃเธฐเธ”เธฑเธ�เธ�เธฒเธฃเธ�เธนเธ” : " . $score_speaking . "\n";
							$text_message .= "\t\t\tเธฃเธฐเธ”เธฑเธ�เธ�เธฒเธฃเธ�เธฑเธ� : " . $score_understanding  . "\n";
							$text_message .= "\t\t\tเธฃเธฐเธ”เธฑเธ�เธ�เธฒเธฃเธญเน�เธฒเธ� : " . $score_reading . "\n";
							$text_message .= "\t\t\tเธฃเธฐเธ”เธฑเธ�เธ�เธฒเธฃเน€เธ�เธตเธขเธ� : " . $score_writing . "\n";
						}			
						
						//talent other
						$sql="	SELECT *
						FROM buildthedot_thaijobhd_user_history_talent_others
						WHERE user_account_id = '$user_id'				
						";
						$result=@mysql_query($sql);
						if($result)
						{
							$text_message .= "\t\tเธ�เธงเธฒเธกเธชเธฒเธกเธฒเธฃเธ–เธ�เธดเน€เธจเธฉ : \n";	
							$count = 0;
							while($rs=@mysql_fetch_array($result))
							{
								$topic = $rs['topic'];
								$text_message .= "\t\t\t-" .  $topic ."\n";
							}			
							
							$subject = $text_subject;
							$to = "team@buildthedot.com";
							$message = $text_message;
							$from = "ThaiJobHD";
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