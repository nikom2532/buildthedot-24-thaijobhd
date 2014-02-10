$(document).ready(function() {

	//Content boxes expand/collapse
	$(".initial-expand").hide();
	$("div.content-module-heading").click(function(){
		$(this).next("div.content-module-main").slideToggle();
		$(this).children(".expand-collapse-text").toggle();
	});
	
	//####### Edit Advertisement Page #######
	$('#ad_content_position').hide();
	$('#ad_side_position').hide();
	if($("form#form-advertisement #ad_type1").is(":checked")){
		$('#ad_content_position').show();
		$('#ad_side_position').attr("name","ad_position_barbage");
	}
	else if($("form#form-advertisement #ad_type2").is(":checked")){
		$('#ad_side_position').show();
		$('#ad_content_position').attr("name","ad_position_barbage");
	}
	$('form#form-advertisement').click(function(){
		if($("form#form-advertisement #ad_type1").is(":checked")){
			$('#ad_content_position').show();
			$('#ad_side_position').hide();
			$('#ad_content_position').attr("name","ad_position");
			$('#ad_side_position').attr("name","ad_position_barbage");
		}
		else if($("form#form-advertisement #ad_type2").is(":checked")){
			$('#ad_content_position').hide();
			$('#ad_side_position').show();
			$('#ad_content_position').attr("name","ad_position_barbage");
			$('#ad_side_position').attr("name","ad_position");
		}
	});
	//####### End Edit Advertisement Page #######
	
});
function delete_recommend_idea(rootadminpath, CompanyID){
	if (confirm('Do you want to confirm to delete?')) {
	    // Delete it!
	    window.location = rootadminpath+"include/module/delete-recommend-idea-process.php?CompanyID="+CompanyID;
	}
}
function delete_advertisement(rootadminpath, adid){
	if (confirm('Do you want to confirm to delete?')) {
	    // Delete it!
	    window.location = rootadminpath+"include/module/delete-advertisement-process.php?adid="+adid;
	}
}
function delete_top_company(rootadminpath, CompanyID){
	if (confirm('Do you want to confirm to delete?')) {
	    // Delete it!
	    window.location = rootadminpath+"include/module/delete-company-process.php?CompanyID="+CompanyID;
	}
}

function delete_user_history_talent_languages(rootadminpath, ID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootadminpath+"include/module/delete-talent-language-process.php?id="+ID;
	}
}
function delete_user_history_experience(rootadminpath, ID, userID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootadminpath+"include/module/delete-experience-process.php?id="+ID+"&userID="+userID;
	}
}
function delete_user_history_education(rootadminpath, ID, userID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootadminpath+"include/module/delete-education-process.php?id="+ID+"&userID="+userID;
	}
}