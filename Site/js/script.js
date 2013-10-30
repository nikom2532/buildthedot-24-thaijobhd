function add_education_form_keypress(e) {
	if (e.keyCode == 13) {
		document.getElementById("add_education_form").submit();
	}
}
// ### Add-education-process ###
// ### DatePicker ###
// calendar
$(function() {
	$( "#year_start" ).datepicker({
		inline:true,
		showOtherMonths:true,
		changeMonth: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#year_start" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#year_end" ).datepicker({
		inline:true,
		showOtherMonths:true,
		changeMonth: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#year_end" ).datepicker( "option", "minDate", selectedDate );
		}
	});
});	
function delete_user_history_talent_languages(rootpath, ID){
	if (confirm('Do you want to confirm to delete?')) {
	    // Delete it!
	    window.location = rootpath+"include/module/delete-talent-language-process.php?id="+ID;
	}
}