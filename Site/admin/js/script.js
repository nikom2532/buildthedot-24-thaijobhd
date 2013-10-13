$(document).ready(function() {

	//Content boxes expand/collapse
	$(".initial-expand").hide();

	$("div.content-module-heading").click(function(){
		$(this).next("div.content-module-main").slideToggle();

		$(this).children(".expand-collapse-text").toggle();
	});
	
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
