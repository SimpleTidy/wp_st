(function($) {
	/*Comienzan los js*/
$(document).ready(function(){
	
	$("#reg").on("click",function () {
		$("div#formlog").hide('slow/400/fast');
		$("div#formreg").show('slow/400/fast');
		
	});
	$("#log").on("click",function () {
		$("div#formreg").hide('slow/400/fast');
		$("div#formlog").show('slow/400/fast');
	});
});
  /*Terminan los js*/
}(jQuery));