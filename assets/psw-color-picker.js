
jQuery(document).ready(function(){
	jQuery('#widgets-right .psw-color, .inactive-sidebar .psw-color').wpColorPicker();
});
jQuery(document).ajaxComplete(function() {
	jQuery('#widgets-right .psw-color, .inactive-sidebar .psw-color').wpColorPicker();
});