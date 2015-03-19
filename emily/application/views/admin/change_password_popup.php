					<div class="mws-panel grid_8  mws-collapsible">
					<div class="mws-panel-body">
                                    <form  class="mws-form" id="add_patient" name="add_patient">
                                        <div class="mws-form-inline">
                                        <div class="mws-form-row">
                                        <label>New Password</label>
                                        <div class="mws-form-item small">
                                        <input type="password" id="txt_password" name="txt_password" value="" class="mws-textinput required ">
                                        </div>
                                        </div>
                                    	</div>
                                    <div class="mws-button-row "><input type="hidden" name="email_availablity" value="" class="required email" id="email_availablity" />
                    			<input type="button" id="submit" name="submit" class="mws-button red" value="Submit">
                    			<input type="reset" class="mws-button gray" value="Reset">
                    		</div>
                                    
                                    </form>
                      </div>
                      </div>
                                


        <div id="patient_lists"
        </div>
        <script>
            
           $('#submit').click(function(){
              var password= $('#txt_password').val();  
			    
            $.ajax({   
						url: "<?php echo base_url(); ?>admin/changepasswordadmin", //The url where the server req would we made.
						async: false,
						type: "POST", //The type which you want to use: GET/POST
						data: 'password='+password,//The variables which are going.
                    	dataType: "html",  //Return data type (what we expect).,
  					 success: function(data) 
					{
    					alert(data);
                      return false;
                    },
					error: function(e) 
					{
					alert(e.responseText);
					}
                });
               });
        </script>