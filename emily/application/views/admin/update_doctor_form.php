<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($profile);
?>    
<style>
     #usernamechk{
                color: #E13300;
                font-family: sans-serif;
                font-size: 10px;
            }
    </style>
<script>
           
            $(document).ready(function(){
                $("#add_patient").validate();
            });
        </script>
<div class="mws-panel grid_8  mws-collapsible">
                	
                <div class="mws-panel-header">
                    	<span class="mws-i-24 i-user-2">Update Details of <?php echo $doctors_details['name']; ?>r</span>
                        <div class="mws-collapse-button mws-inset"><span></span></div>
                    </div><div class="mws-panel-body">
                        <form  class="mws-form" id="add_doctor" name="add_doctor">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label>Name</label>
                    				<div class="mws-form-item small">
                                               <input type="hidden" id="doctor_id" name="doctor_id" value="<?php echo  $doctors_details['0']['id'] ;?>" />                    					
                                               <input type="text" id="txt_name" name="txt_name" value="<?php echo  $doctors_details['0']['name'] ;?>"   class="mws-textinput required">
                    				</div>
                    			</div>
                    			<!--<div class="mws-form-row">
                    				<label>Specialisation</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_Specialisation" value="<?php echo  $doctors_details['0']['specialisation'] ;?>" name="txt_Specialisation"  class="mws-textinput required">
                    				</div>
                    			</div>-->
                    			<!--<div class="mws-form-row">
                        			<label>Medical Registraion Number</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_registration_number" name="txt_registration_number"  class="mws-textinput required">
                    				</div>
                                        </div>-->
                                        
                    			<div class="mws-form-row">
                    				<label>Address</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_address" name="txt_address" value="<?php echo  $doctors_details['0']['address'] ;?>"  class="mws-textinput required">
                    				</div>
                                        </div>
                    			<div class="mws-form-row">
                    				<label>Select State</label>
                    				<div class="mws-form-item small">
                                                    <select class="chzn-select required" id="sel_state" name="sel_state">
                                                            
                                                            <?php foreach($states_list as $states ){ ?>
                    						<option  ><?php echo $states['city_state']; ?></option>
                    						<?php } ?>
                    					</select>
                    				</div>
                    			</div>
                                   <div class="mws-form-row">
                    				<label>Email</label>
                    				<div class="mws-form-item small required">
                                                    <input type="text" id="txt_email" name="txt_email"  value="<?php echo  $doctors_details['0']['email'] ;?>"  class="mws-textinput">
                                                    <div id='usernamechk'></div>
                    				</div>
                    			</div>
                                    <div class="mws-form-row">
                    				<label>Mobile No</label>
                    				<div class="mws-form-item small required">
                                                    <input type="text" id="txt_contact" name="txt_contact" value="<?php echo  $doctors_details['0']['phone'] ;?>" class="mws-textinput">
                    				</div>
                    				</div>
                                    <!-- <div class="mws-form-row">
                    				<label>Password</label>
                    				<div class="mws-form-item small required">
                                                    <input type="password" id="password" name="password"  value="<?php echo  $doctors_details['0']['password'] ;?>"  class="mws-textinput">
                                                    
                                                   
                    				</div>
                    			</div>-->
                     <tr>    <td>&nbsp;</td>    <td><input type="hidden" name="email_availablity" value="" class="required email" id="email_availablity" />
                    </td> 
                     </tr>                		
                    		</div>
                    		<div class="mws-button-row ">
                    			<input type="button" id="submit" name="submit" class="mws-button red" value="Submit">
                    			<input type="reset" class="mws-button gray" value="Reset">
                    		</div>
                    	</form>
                    </div></div>
 <script>           
     
    //$('#sel_doctors').chosen();
     $('#sel_state').val('<?php echo ucfirst($doctors_details['0']['state']);?>');
//    $('sel_state').v
//      $("#txt_email").focusout(function() {
//                var email=document.getElementById("txt_email").value;//
//                //alert(email);
//                var params = "email="+email;
//                var url = "<?php echo base_url(); ?>admin/doctornameavailability";
//                $.ajax({
//                    type: 'POST',
//                    url: url,
//                    data: params,
//                    beforeSend: function() {
//                        document.getElementById("usernamechk").innerHTML= 'checking'  ;
//                    },
//                    success: function(data) {
//                           alert(data);
//                        document.getElementById("usernamechk").innerHTML= data ;
//                        if(data=="Available"){
//                            $('#email_availablity').val('Available');
//                        }else{
//                            $('#email_availablity').val('');
//
//                        }
//                    }
//                });
//            });

            $("#submit").click(function() 	{  
               $("#add_patient").validate();
             //  alert('hhssh');
                var doctor_id = $('#doctor_id').val();
                var name = $('#txt_name').val();
               // var Specialisation = $('#txt_Specialisation').val();
                var address = $('#txt_address').val(); 
                var phone = $('#txt_contact').val(); 	
                var email = $('#txt_email').val(); 	
                var state=$('#sel_state').val();   
                var password=$('#password').val(); 
                $.ajax( {	
                    url : siteUrl + "admin/update_doctors_profile/"+doctor_id ,	
                    type : "POST",	
                    data : 'name='+name +'&address='+address+'&phone='+phone+'&email='+email+'&state='+state+'&doctors_id='+doctor_id,
                    success : function(data)  {   
                        
                        if(data == 'SUCCESS')					
                        {	
                        $('#email_availablity').val('');

                         TINY.box.show ( {html:'Successfully Updated the Doctor', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					
                   // window.location.href=siteUrl+"admin/manage_doctors"; 
               }else					
                        {		
                            
                            TINY.box.show ( {html:'Something went Wrong !!!', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	

                        }									},				async:   false			
                });	
            });		     
        </script>