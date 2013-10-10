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
	    // Save it!
	    window.location = rootadminpath+"include/module/delete-recommend-idea-process.php?CompanyID="+CompanyID;
	} else {
	    // Do nothing!
	}
}
