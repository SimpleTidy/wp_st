(function($) {
	/*Comienzan los js*/
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
	  });
	$(document).ready(function(){
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		$("#reg").on("click",function () {
			$("div#formlog").hide('slow/400/fast');
			$("div#formreg").show('slow/400/fast');
			
		});
		$("#log").on("click",function () {
			$("div#formreg").hide('slow/400/fast');
			$("div#formlog").show('slow/400/fast');
		});
		//$('div.load-content').html(" ");
		//$('div.load-content div.content-panel').hide('fast/10/fast');
		$('div.load-content div.partial_dashboard').removeClass('init');
		$('div.load-content div.content-panel').removeClass('active');
		$('div.load-content div.partial_dashboard').addClass('active');
	    //$('div.load-content').show('slow/400/fast');
	    $('div.load-content div.active').show('slow/400/fast');
		
	});
	$('.frame').on("click",function () {
						
		$("label.frame").removeClass('select_server')
		$(this).addClass('select_server');
			
	});

	

	$('div.add_server').on('click',function(event) {
		//event.preventDefault();
		//$('div.load-content').empty();
		$('div.load-content div.content-panel').hide('fast/100/fast');
		$('div.load-content div.content-panel').removeClass('init');
		$('div.load-content div.content-panel').removeClass('active');
		$('div.load-content div.partial_server').addClass('active');
	    //$('div.load-content').show('slow/400/fast');
	    $('div.load-content div.active').show('slow/400/fast');
	    
		
		/*CARGA PARTIAL AJAX PARA INGRESAR UN NUEVO SERVIDOR
		$.ajax({
	        url: ajaxurl,
	        data: {
	            'action':'charge_template_server'

	        },
	        success:function(resp) {
	        	console.log(resp);
	        	
	        	$('div.load-content').append(resp)
	        	$('div.load-content').show('slow/400/fast');

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	    FIN DE CARGA*/
	});
	$('div.add_service').on('click',function(event) {
		//event.preventDefault();
		//$('div.load-content').empty();
		$('div.load-content div.content-panel').hide('fast/100/fast');
		$('div.load-content div.partial_service').removeClass('init');
		$('div.load-content div.content-panel').removeClass('active');
		$('div.one').hide('slow/400/fast');
		$('div.two').hide('slow/400/fast');
		$('div.three').hide('slow/400/fast');
		$('div.one').show('slow/400/fast');
		$('div.load-content div.partial_service').addClass('active');
	    $('div.load-content div.active').show('slow/400/fast');
	    
		
		/*CARGA PARTIAL AJAX PARA LA SOLICITUD DE UN SERVCIO
		$.ajax({
	        url: ajaxurl,
	        data: {
	            'action':'charge_template_service'

	        },
	        success:function(resp) {
	        	console.log(resp);
	        	var cont = resp;
	        	
	        	
	        	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	    FIN DE CARGA*/
	});
	$('div.next2').on("click",function () {
						
		$('div.one').hide('slow/400/fast');
		$('div.two').hide('slow/400/fast');
		$('div.three').hide('slow/400/fast');
		$('div.two').show('slow/400/fast');
			
	});
	$('div.back1').on("click",function () {
						
		$('div.one').hide('slow/400/fast');
		$('div.two').hide('slow/400/fast');
		$('div.three').hide('slow/400/fast');
		$('div.one').show('slow/400/fast');
			
	});
	$('div.next3').on("click",function () {
						
		$('div.one').hide('slow/400/fast');
		$('div.two').hide('slow/400/fast');
		$('div.three').hide('slow/400/fast');
		$('div.three').show('slow/400/fast');
			
	});
	$('div.back2').on("click",function () {
						
		$('div.one').hide('slow/400/fast');
		$('div.two').hide('slow/400/fast');
		$('div.three').hide('slow/400/fast');
		$('div.two').show('slow/400/fast');
			
	});







  /*Terminan los js*/
}(jQuery));