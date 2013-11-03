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
	$( "#birthdate" ).datepicker({
		inline:true,
		showOtherMonths:true,
		changeMonth: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#birthdate" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	// jQuery("#edit_profile_form #age").keypress(function(){
	    // var value = jQuery(this).val();
	    // value = value.replace(/[^0-9]+/g, '');
	    // jQuery(this).val(value);
	// });
});	
function delete_user_history_talent_languages(rootpath, ID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootpath+"include/module/delete-talent-language-process.php?id="+ID;
	}
}
function delete_user_history_experience(rootpath, ID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootpath+"include/module/delete-experience-process.php?id="+ID;
	}
}
function delete_user_history_education(rootpath, ID){
	if (confirm('Do you want to confirm to delete?')) {
	    window.location = rootpath+"include/module/delete-education-process.php?id="+ID;
	}
}
function validate_number(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
function validate_phone_number(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\-/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}