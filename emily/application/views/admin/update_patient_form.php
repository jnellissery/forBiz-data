<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($profile);
?>        
<div class="mws-panel grid_8  mws-collapsible">
                	
                <div class="mws-panel-header">
                    	<span class="mws-i-24 i-user">Update Details of <?php echo $profile['name']; ?></span>
                        <div class="mws-collapse-button mws-inset"><span></span></div>
                    </div><div class="mws-panel-body">
                    	<form  class="mws-form">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label>Name</label>
                    				<div class="mws-form-item small">
                                               <input type="hidden" id="subject_id" name="subject_id" value="<?php echo $profile['id']; ?>" />                    					
                                               <input type="text" id="txt_name" name="txt_name" value="<?php echo $profile['name']; ?>" class="mws-textinput">
                    				</div>
                    			</div>
                                 <div class="mws-form-row">
                                        <label>Date Of Insertion </label>
                                        <div class="mws-form-item small">
                                        <input type="text" id="txt_DOI" name="txt_DOI" value="<?php echo $profile['joined_date']; ?>" class="mws-textinput required">
                                        </div>
                    				</div>
                                    
                    			<div class="mws-form-row">
                    				<label>Age</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_age" name="txt_age" value="<?php echo $profile['age']; ?>" class="mws-textinput">
                    				</div>
                    			</div><div class="mws-form-row">
                    				<label>Address</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_address" name="txt_address" value="<?php echo $profile['address']; ?>" class="mws-textinput">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label>Select State</label>
                    				<div class="mws-form-item small">
                                                    <select class="chzn-select" id="sel_state" name="sel_state">
                                                            
                                                            <?php foreach($states_list as $states ){ ?>
                    						<option  ><?php echo $states['city_state']; ?></option>
                    						<?php } ?>
                    					</select>
                    				</div>
                    			</div>
                                    <div class="mws-form-row">
                    				<label>Select Doctor</label>
                    				<div class="mws-form-item small">
                                                    <select class="chzn-select" id="sel_doctors" name="sel_doctors">
                                                            
                                                            <?php
                                                            $doct_name="";
                                                            foreach($doctors_list as $doctors ){ ?>
                                                                <?php if($doctors['id']===$profile['doctor_id']){
                                                                    $doct_name=trim($doctors['id']);
                                                                }
?>
                                                        <option value="<?php echo $doctors['id'];?>" ><?php echo trim($doctors['name']); ?></option>
                    						
                                                                    
                                                                    <?php } ?>
                    					</select><?php //echo $doct_name;?>
                    				</div>
                    			</div>
                                    <div class="mws-form-row">
                    				<label>Mobile No</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_contact" name="txt_contact" value="<?php echo $profile['phone']; ?>" class="mws-textinput">
                    				</div>
                    			</div><div class="mws-form-row">
                    				<label>Email</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_email" readonly name="txt_email" value="<?php echo $profile['email']; ?>" class="mws-textinput">
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                    				<label>Username</label>
                    				<div class="mws-form-item small">
                                                   <input type="text" id="txt_username" name="txt_username"  value="<?php echo $profile['username']; ?>" class="mws-textinput"/>
                    				</div>
                    			</div>
                                
                                    
                                    
                                    
                    			<div class="mws-form-row">
                    				<label>Textarea</label>
                    				<div class="mws-form-item large">
                                                    <textarea id="txt_medical_history" name="txt_medical_history" cols="100%" rows="100%"><?php echo $profile['medical_history']; ?></textarea>
                    				</div>
                    			</div>
                    			 
                    		
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="button" id="submit" name="submit" class="mws-button red" value="Submit">
                    			<input type="reset" class="mws-button gray" value="Reset">
                    		</div>
                    	</form>
                    </div></div>
 <script>           
        $( "#txt_DOI" ).datepicker({
                changeMonth: true,
                   changeYear: true,yearRange : "2013:2050",setDate:"10/12/2012",defaultDate: "-10Y",dateFormat:"yy-mm-dd"
              });
     $('#sel_state').val('<?php echo ucfirst($profile['state']);?>'); //$('#sel_state').chosen();
      $('#sel_doctors').val('<?php echo $doct_name;?>'); //$('#sel_doctors').chosen();
            $("#submit").click(function() 	{  
                var subj_id = $('#subject_id').val();
                var name = $('#txt_name').val();
                var dob = $('#txt_dob').val(); 		
                var age = $('#txt_age').val(); 	
                var address = $('#txt_address').val(); 
                var phone = $('#txt_contact').val(); 	
                var email = $('#txt_email').val(); 	
                var doctor_id = $('#sel_doctors').val(); 	
                var state=$('#sel_state').val(); 
                var medical_history=$('#txt_medical_history').val();
				var username=$('#txt_username').val();
				//var password=$('#txt_password').val();
				var DOI=$('#txt_DOI').val();
                $.ajax( {	
                    url : siteUrl + "update_pat_profile",	
                    type : "POST",	
                    data : 'subj_id=' + subj_id +'&name='+name+'&dob='+ dob +'&address='+address+'&phone='+phone+'&email='+email+'&state='+state+'&age='+age+'&doctor_id='+doctor_id+'&medical_history='+medical_history+'&username='+username+'&date_of_insertion='+DOI ,
                    success : function(data) {   
 //alert(data); return false;
                        if(data == 'SUCCESS')					
                        {	
                            
                         TINY.box.show ( {html:'Successfully Updated the Details', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					
                        }else					
                        {		
                            
                            TINY.box.show ( {html:'Something went Wrong !!!', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	

                        }									},				async:   false			
                });	
            });		     
        </script>