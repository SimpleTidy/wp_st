(function($) {
	/*Comienzan los js*/
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year
	    hiddenName: true,
	    formatSubmit: 'yyyy-mm-dd',
	    hiddenPrefix: 'prefix__',
  		hiddenSuffix: '__suffix'
	  });
	$('.timepicker').pickatime({
	  formatSubmit: 'HH:i',
	  hiddenName: true,
	  container: '#root-picker-outlet'
	})
	$(document).ready(function(){
		
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		$("#reg").on("click",function () {
			$("div#formlog").hide('slow/400/fast');
			$("div#formreg").show('slow/400/fast');
			
		});
		$("div.alert").hide('slow/400/fast');
		$('div.error-cont').hide('slow/400/fast');
		$('div.loader').hide('slow/400/fast');
		$('div.next2').hide('slow/400/fast');
		$('div.next3').hide('slow/400/fast');
		$('div#submit-service').hide('slow/400/fast');
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

	    /*FUNCTION TO CALCULATE HOURS AUTOMATICLY*/
	    function updatetime(){
	        var i = $("input[name='hour_init']").val();
	        var sum = $(".sum_final_h").val();
	        var init = moment(i,"hhmm").format("HH:mm:ss");
	        var end = moment(i,"hhmm").add(sum, 'hour').format("hh:mm A");
	        var endr = moment(i,"hhmm").add(sum, 'hour').format("HH:mm:ss");
	        $("#hour_init_real").val(init);
	        $("#hour_final").val(end);
	        $("#hour_final_real").val(endr);
	    }
	    $(document).on("change", "#hour_init", updatetime);
	    $("i.clickefect").on("click",function () {
	    	
	    	$("div.menu-icon").toggleClass('hideMenuIcon');
			$("div.menu-total").toggleClass('showMenu');
			$("div.work-area").toggleClass('showMenuContent');
			$("div.back-screnn").toggleClass('showback');
		});
		$("div.back-screnn").on("click",function () {
	    	
	    	$("div.menu-icon").removeClass('hideMenuIcon');
			$("div.menu-total").removeClass('showMenu');
			$("div.work-area").removeClass('showMenuContent');
			$(this).removeClass('showback');
		});
		
	});
	

	/*PROGRAMING FOR ADD SERVER*/

	$('div.add_server').on('click',function(event) {
		console.log("hola")
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


	function showloaderinservers() {
		$('form.form_server').hide('slow/100/fast');
		$('div.loader').show('slow/400/fast');
	}
	function hideloaderinservers() {
		
		$('div.loader').hide('slow/400/fast');
		$('form.form_server').show('slow/100/fast');
	}
	/*END OF PROGRAMING FOR SERVERS OPTION ADMIN*/
	$('div#submit-server').on('click', function(event) {
		//save_u
		/*i_name
		i_role
		i_user
		i_email
		i_pass
		i_pass2*/
		event.preventDefault();
		/* Act on the event */
		var i_name = $("input[name='i_name']").val()
		var i_role = $("input[name='i_role']").val()
		var i_user = $("input[name='i_user']").val()
		var i_email = $("input[name='i_email']").val()
		var i_pass = $("input[name='i_pass']").val()
		var i_pass2 = $("input[name='i_pass2']").val()
	   	
		showloaderinservers()
		$.ajax({
			type: 'POST',
	        url: ajaxurl,
	        data: {
	            'action':'save_servers',
	            'i_name': i_name,
	            'i_role': i_role,
	            'i_user': i_user,
	            'i_email': i_email,
	            'i_pass': i_pass,
	            'i_pass2': i_pass2

	        },
	        success:function(resp) {
	        	if (resp != 1) {
	        		console.log(resp);
	        		$("strong.bodymsg").text(resp)
		        	$("div.alert").show('slow/400/fast');
		        	hideloaderinservers();
		        	return;
	        	}
	        	console.log(resp);
	        	$("input[name='i_name']").val("")
				$("input[name='i_role']").val("")
				$("input[name='i_user']").val("")
				$("input[name='i_email']").val("")
				$("input[name='i_pass']").val("")
				$("input[name='i_pass2']").val("")
	        	hideloaderinservers();
	        	setTimeout(function() {
				        location.reload();
				}, 1000);
	        	
	        	/*if (resp == 1) {
	        		hideloaderinservices();
	        		$('div.error-cont').show('slow/400/fast');
	        		$('div.error-cont').text('Lamentablemente, ya hay un servicio para esta fecha. Intente con otro servidor o en otro dia.');
	        	}
	        	if (resp == 0) {
	        		$('div.loader').hide('slow/400/fast');
	        		$('div.error-cont').text('!Gracias¡, su reservacion ha sido procesada');
	        		$('div.error-cont').show('slow/400/fast');
	        		
	        		setTimeout(function() {
				        location.reload();
				    }, 3000);
	        	}*/
	        	       	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	});

	/*PROGRAMING JS FOR SERVICE PROCESS*/

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

	   
	});
	$('.frame').on("click",function () {
						
		$("label.frame").removeClass('select_server')
		$(this).addClass('select_server');
			
	});
	$('.frame_package').on("click",function () {
						
		$("label.frame_package").removeClass('select_server')
		$(this).addClass('select_server');
		hours = $(this).children('.end_service').val();
		price = $(this).children('.price_service').val();
		$('div.three .price').val(price);
		$('div.three .sum_final_h').val(hours);
			
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
	/*SUBMIT FORM VIA AJAX*/
	function showloaderinservices() {
		$('form.form_service').hide('slow/100/fast');
		$('div.loader').show('slow/400/fast');
	}
	function hideloaderinservices() {
		
		$('div.loader').hide('slow/400/fast');
		$('form.form_service').show('slow/100/fast');
	}
	function ChecksFields() {
		//ar comp = $('input[name=who]:checked');
		if ( $('input[name=who]').is(':checked')) {
			alert("ya eligieron");
		}
		
	}
	function updatebuttonnext1(){
	    $('div.next2').show('slow/400/fast');
	}
	$(document).on("change, click", "label.frame", updatebuttonnext1);
	function updatebuttonnext2(){
	    $('div.next3').show('slow/400/fast');
	}
	$(document).on("change, click", "label.frame_package", updatebuttonnext2);
	
	function enablesubmit(){
	        var dir = $('input#dir').val();
			var date = $('input.dateservice').val();
			var hour = $('input#hour_init').val();
			if (dir != " " && date != "" && hour != "") {
				$('div#submit-service').show('slow/400/fast');
			}
    }
    $(document).on("change", "input#dir , input.dateservice, input#hour_init", enablesubmit);
	$('div#submit-service').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var who = $("input[name='who']:checked").val()
		var package = $('.package_aj').val()
		var hinit = $('#hour_init_real').val()
		var hfinal = $('#hour_final_real').val()
		var date = $("input[name='date']").val()
		var dir = $("#direccio").val()
		var price = $(".price").val()
	   
		showloaderinservices();
		$.ajax({
			type: 'POST',
	        url: ajaxurl,
	        data: {
	            'action':'save_sercivices',
	            'who': who,
	            'package': package,
	            'date': date,
	            'hinit': hinit,
	            'hfinal': hfinal,
	            'dir': dir,
	            'price': price

	        },
	        success:function(resp) {
	        	console.log(resp);
	        	if (resp == 1) {
	        		hideloaderinservices();
	        		$('div.error-cont').show('slow/400/fast');
	        		$('div.error-cont').text('Lamentablemente, ya hay un servicio para esta fecha. Intente con otro servidor o en otro dia.');
	        	}
	        	if (resp == 0) {
	        		$('div.loader').hide('slow/400/fast');
	        		$('div.error-cont').text('!Gracias¡, su reservacion ha sido procesada');
	        		$('div.error-cont').show('slow/400/fast');
	        		$("input[name='who']").val() = "";
	        		$('.package_aj').val() = "";
					$('#hour_init_real').val() = "";
					$('#hour_final_real').val() = "";
					$("input[name='date']").val() = "";
					$("#direccio").val() = "";
					$(".price").val() = "";
	        		
	        		setTimeout(function() {
				        location.reload();
				    }, 1000);
	        	}
	        	       	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	});
	/*END JS SERVICE PROCESS*/
	
	/*PROGAMING FOR LIST OF ALL SERVICES*/
	
	$('div.show_services').on('click',function(event) {
	//event.preventDefault();
	//$('div.load-content').empty();
	$('div.load-content div.content-panel').hide('fast/100/fast');
	$('div.load-content div.content-panel').removeClass('init');
	$('div.load-content div.content-panel').removeClass('active');
	$('div.load-content div.partial_all_services').addClass('active');
    //$('div.load-content').show('slow/400/fast');
    $('div.load-content div.active').show('slow/400/fast');
    
	
	});

	/*END OF ALL SERVICES*/

	/*PROGAMING FOR LIST OF ALL SERVICES TO SERVERS*/
	
	$('div.show_my_job').on('click',function(event) {
	//event.preventDefault();
	//$('div.load-content').empty();
	$('div.load-content div.content-panel').hide('fast/100/fast');
	$('div.load-content div.content-panel').removeClass('init');
	$('div.load-content div.content-panel').removeClass('active');
	$('div.load-content div.partial_all_services_server').addClass('active');
    //$('div.load-content').show('slow/400/fast');
    $('div.load-content div.active').show('slow/400/fast');
    
	
	});

	/*END OF ALL SERVICES TO SERVICES*/

	/*PROGAMING FOR LIST OF ALL SERVICES TO USERS*/
	
	$('div.show_service_user').on('click',function(event) {
	//event.preventDefault();
	//$('div.load-content').empty();
	$('div.load-content div.content-panel').hide('fast/100/fast');
	$('div.load-content div.content-panel').removeClass('init');
	$('div.load-content div.content-panel').removeClass('active');
	$('div.load-content div.partial_all_services_user').addClass('active');
    //$('div.load-content').show('slow/400/fast');
    $('div.load-content div.active').show('slow/400/fast');
    
	
	});

	/*END OF ALL SERVICES TO SERVICES*/

	/*PROGAMING FOR LIST OF new product*/
	
	$('div.add_product').on('click',function(event) {
	//event.preventDefault();
	//$('div.load-content').empty();
	$('div.load-content div.content-panel').hide('fast/100/fast');
	$('div.load-content div.content-panel').removeClass('init');
	$('div.load-content div.content-panel').removeClass('active');
	$('div.load-content div.partial_new_product').addClass('active');
    //$('div.load-content').show('slow/400/fast');
    $('div.load-content div.active').show('slow/400/fast');
    
	
	});

	/*END OF new product*/

	$('span.click_appear').on('click', function() {
		
		$('div.head-detail span').toggleClass('appear');
	});

	$('div.proced-page').on('click', function() {
		
		$('div.info-service-page').show('slow/200/fast');
		var $target = $('html,body'); 
		setTimeout(function() {
		        $target.animate({scrollTop: $target.height()}, 2000);
		}, 500);
		
		
	});
	$('div#RtingServiceEnd').on('click', function() {
		
		$('div.info-rating-page').show('slow/200/fast');
		var $target = $('html,body'); 
		setTimeout(function() {
		        $target.animate({scrollTop: $target.height()}, 2000);
		}, 500);
		
		
	});

	$('div.out-page').on('click', function() {
		
		$('div.info-service-page').hide('slow/50/fast');
	});

	$('div.out-rating').on('click', function() {
		
		$('div.info-rating-page').hide('slow/50/fast');
	});

	$('div#SubmitPage').on('click', function() {
		
		/*event.preventDefault();*/

		var transaccion = $("input[name='transaccion']").val()
		var nameTrans = $("input[name='nameTrans']").val()
		var lastnameTrans = $("input[name='lastnameTrans']").val()
		var mountTrans = $("input[name='mountTrans']").val()
		var dateTrans = $("input[name='dateTrans']").val()
		var statusTrans = $("input[name='statusTrans']").val()
		var service = $("input[name='id_service']").val()
		$('.loader.loader_pay').show('slow/200/fast');
		/*showloaderinservers()*/


	
		$.ajax({
			type: 'POST',
	        url: ajaxurl,
	        data: {
	            'action':'save_page',
	            'transaccion': transaccion,
	            'nameTrans': nameTrans,
	            'lastnameTrans': lastnameTrans,
	            'mountTrans': mountTrans,
	            'dateTrans': dateTrans,
	            'statusTrans': statusTrans,
	            'service': service

	        },
	        success:function(resp) {
	        	var resParse = JSON.parse(resp)
	        	if (resParse.error) {
	        		console.log(resParse.content);
	        		$("div.error_cont p").text(resParse.content)
	        		$("div.error_cont").css('opacity', '1');
	        		$('.loader.loader_pay').hide('slow/200/fast');
	        	}else{
	        		$("input[name='transaccion']").val("")
					$("input[name='nameTrans']").val("")
					$("input[name='lastnameTrans']").val("")
					$("input[name='mountTrans']").val("")
					$("input[name='dateTrans']").val("")
					$("input[name='statusTrans']").val("")
					$("input[name='id_service']").val("")
	        		$("div.error_cont p").text(resParse.content)
	        		$("div.error_cont p").addClass('success')
	        		$("div.error_cont").css('opacity', '1');
	        		setTimeout(function() {
	        			$('.loader.loader_pay').hide('slow/200/fast');
					    location.reload();
					}, 500);

	        	}
	        	/*if (resp != 1) {
	        		console.log(resp);
	        		$("strong.bodymsg").text(resp)
		        	$("div.alert").show('slow/400/fast');
		        	hideloaderinservers();
		        	return;
	        	}
	        	console.log(resp);
	        	
	        	hideloaderinservers();
	        	setTimeout(function() {
				        location.reload();
				}, 1000);*/
	        	
	        	/*if (resp == 1) {
	        		hideloaderinservices();
	        		$('div.error-cont').show('slow/400/fast');
	        		$('div.error-cont').text('Lamentablemente, ya hay un servicio para esta fecha. Intente con otro servidor o en otro dia.');
	        	}
	        	if (resp == 0) {
	        		$('div.loader').hide('slow/400/fast');
	        		$('div.error-cont').text('!Gracias¡, su reservacion ha sido procesada');
	        		$('div.error-cont').show('slow/400/fast');
	        		
	        		setTimeout(function() {
				        location.reload();
				    }, 3000);
	        	}*/
	        	       	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	});
	/*aceptar pago*/
	$('div#confirmPageBtn').on('click', function() {
		
		/*event.preventDefault();*/

		var servicio = $("input[name='id_service']").val()
		var pago = $("input[name='id_page']").val()


	
		$.ajax({
			type: 'POST',
	        url: ajaxurl,
	        data: {
	            'action':'confirm_page',
	            'servicio': servicio,
	            'pago': pago

	        },
	        success:function(resp) {
	        	console.log(resp)
	        	if (resp == "OK") {
	        		setTimeout(function() {
	        			$('.loader.loader_pay').hide('slow/200/fast');
					    location.reload();
					}, 500);
	        	};
	        	
	        	
	        	       	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	});
	/*Cerrar el ciclo*/
	$('div#SubmitEnd').on('click', function() {
		
		/*event.preventDefault();*/
		if ($("input#rating-input-1-5").is(":checked")) {
			var ranking = $("input#rating-input-1-5").val()
		};
		if ($("input#rating-input-1-4").is(":checked")) {
			var ranking = $("input#rating-input-1-4").val()
		};
		if ($("input#rating-input-1-3").is(":checked")) {
			var ranking = $("input#rating-input-1-3").val()
		};
		if ($("input#rating-input-1-2").is(":checked")) {
			var ranking = $("input#rating-input-1-2").val()
		};
		if ($("input#rating-input-1-1").is(":checked")) {
			var ranking = $("input#rating-input-1-1").val()
		};
		
		var coment = $("textarea#textarea1").val()
		var service = $("input[name='id_service']").val()
		

	
		$.ajax({
			type: 'POST',
	        url: ajaxurl,
	        data: {
	            'action':'end_service',
	            'servicio': service,
	            'coment': coment,
	            'ranking': ranking


	        },
	        success:function(resp) {
	        	console.log(resp)
	        	if (resp == "OK") {
	        		setTimeout(function() {
	        			$('.loader.loader_pay').hide('slow/200/fast');
					    location.reload();
					}, 500);
	        	};
	        	
	        	
	        	       	

	        },
	        error: function(errorThrown){
	        	console.log("No contecta")
	            console.log(errorThrown);

	        }
	    });

	});


  /*Terminan los js*/
}(jQuery));

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
 (document.getElementById('direccio')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}


/*function initMap() {
 
  var input = (
      document.getElementById('direccio'));

  var types = document.getElementById('type-selector');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}*/