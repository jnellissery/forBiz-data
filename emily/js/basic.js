/*
 * SimpleModal Basic Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */

jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	/*$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});*/
	$('.invalid_login_label a').on("click",  function() {
			$('#basic-modal-content').modal();
        });
	 $('#sbt_forgot_password').on("click",  function() {
			//$('#basic-modal-content').modal();
                    var pageUrl="login/forgotpassword";
					var val=$('#username').val();
                   
                    $.ajax({   
                        url: pageUrl, //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: 'username='+val,//The variables which are going.
                        dataType: "html", //Return data type (what we expect).
                         
                        //This is the function which will be called if ajax call is successful.
                        success: function(data) {
                          					  
						 $('#basic-modal-content').html(data);
		$('#basic-modal-content').modal();

		return false;
	
						   // $('#city').html(data);
                        },
						error: function(e) {
							alert(ed);
						}
                    })
                });
});