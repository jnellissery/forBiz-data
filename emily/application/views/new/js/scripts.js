	

$(document).ready(function() {

    $("#top").ezBgResize({

        img : "bg/1.jpg"

    });

});





/* -- Smooth scroll -- */



	$(document).ready(function() {

	var scrollDuring=500; /* Duree du Scroll 1000 = 1seconde */

	var scrollBegin=0; /* Hauteur entre l'ancre le scroll */

	$('a.scroll').click(function(){

		if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&location.hostname==this.hostname){

			var $targetid=$(this.hash);

			$targetid=$targetid.length&&$targetid||$('[id='+this.hash.slice(1)+']');

			if($targetid.length){

				var targetOffset=$targetid.offset().top-scrollBegin;

					$('html,body').animate({scrollTop:targetOffset},scrollDuring);

					$("a").removeClass("active");

					$(this).addClass("active");

			return false;

			}

		}

	});

	});

	





function interest_box_show()

{

	var html = document.getElementById('interest_form').style.display;

	

	 if(html!= "none")

	 {

	 	//$('#interest_box_close').html('+ Show');

		$('#interest_form').hide('slow');

		

		

	 }

	 else

	 {

	  	//$('#interest_box_close').html('- Hide');

		$('#interest_form').show('slow');

	 }

}





function login_box_show()

{

	var html = document.getElementById('login_form').style.display;

	

	 if(html!= "none")

	 {

	 	//$('#interest_box_close').html('+ Show');

		$('#login_form').hide('slow');

	 }

	 else

	 {

	  	//$('#interest_box_close').html('- Hide');

		$('#login_form').show('slow');

	 }

}





function change_field_label(type)


{

	alert("jjjj");

}

	



//function submit_registration(){

//	var flag = 0;

//	

//	if(document.getElementById('txt_name').value==""){

//		document.getElementById('txt_name').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_name').style.borderColor="";

//	}

//	

//	if(document.getElementById('txt_age').value==""){

//		document.getElementById('txt_age').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_age').style.borderColor="";

//	}

//	

//	

//	if(document.getElementById('txt_symptoms_mrn').value==""){

//		document.getElementById('txt_symptoms_mrn').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_symptoms_mrn').style.borderColor="";

//	}

//	

//	

//	if(document.getElementById('txt_address').value==""){

//		document.getElementById('txt_address').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_address').style.borderColor="";

//	}

//	

//	

//	if(document.getElementById('sel_state').value==""){

//		document.getElementById('sel_state').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('sel_state').style.borderColor="";

//	}

//	

//	

//	if(document.getElementById('txt_contact').value==""){

//		document.getElementById('txt_contact').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_contact').style.borderColor="";

//	}

//	

//	

//	if(document.getElementById('txt_email').value==""){

//		document.getElementById('txt_email').style.borderColor="#FF0000";

//		flag = 1;

//	}

//	else{

//		document.getElementById('txt_email').style.borderColor="";

//	}

//	

//	if(flag==0){

//		var arr = jQuery('#patient_doctor_form').serialize();

//		jQuery.post('registration_submit.php',arr,function(){

//			

//		})

//	}

//}

	

	

	

/* -- Largeur Window -- */



function adpaterALaTailleDeLaFenetre(){

  var largeur = document.documentElement.clientWidth,

  hauteur = document.documentElement.clientHeight;

  

  var source = document.getElementById('top'); // récupère l'id source 

  source.style.height = hauteur+'px'; // applique la hauteur de la page

  source.style.width = largeur+'px'; // la largeur

}



// Une fonction de compatibilité pour gérer les évènements

function addEvent(element, type, listener){

  if(element.addEventListener){

    element.addEventListener(type, listener, false);

  }else if(element.attachEvent){

    element.attachEvent("on"+type, listener);

  }

}



// On exécute la fonction une première fois au chargement de la page

addEvent(window, "load", adpaterALaTailleDeLaFenetre);

// Puis à chaque fois que la fenêtre est redimensionnée

addEvent(window, "resize", adpaterALaTailleDeLaFenetre);









function calculeHauteur() {

	var fenetre = jQuery(window).height();

	if (fenetre < "710"){

		jQuery("#scrolldown").css("display","none");

	}

	else{

		jQuery("#scrolldown").css("display","block");

	}

}



jQuery(document).ready(function() {

	

	calculeHauteur();

	jQuery(window).resize(function() {

		calculeHauteur();

	});



});





