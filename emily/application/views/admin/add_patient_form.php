<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($profile);
?>   <style>
     #usernamechk{
                color: #E13300;
                font-family: sans-serif;
                font-size: 10px;
            }
    </style>         <script>
            $(function() {
                  
  
            });
            $(document).ready(function(){
                $("#add_patient").validate();
            });
        </script>
<div class="mws-panel grid_8  mws-collapsible">
                	
                <div class="mws-panel-header">
                    	<span class="mws-i-24 i-user">Register New Patient</span>
                        <div class="mws-collapse-button mws-inset"><span></span></div>
                    </div><div class="mws-panel-body">
                        <form  class="mws-form" id="add_patient" name="add_patient">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label>Name</label>
                    				<div class="mws-form-item small">
                                               <input type="hidden" id="subject_id" name="subject_id" value="" />                    					
                                               <input type="text" id="txt_name" name="txt_name" value="" class="mws-textinput required ">
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                       <label>Product Name</label>  
                    <div class="mws-form-item small">
                     <select class="chzn-select required" id="sel_product" name="sel_product">
                     <option value="Emily">Emily</option>
                     <option value="LNG-IUS">LNG-IUS</option>
                        </select>
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
                                                    <input type="text" id="txt_age" name="txt_age" value="" class="mws-textinput required digits">
                    				</div>
                                                
      </div>
      
                                     <div class="mws-form-row">
                    				<label>Address</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_address" name="txt_address" value="" class="mws-textinput required">
                    				</div>
                    			</div>
                              <!--  <div class="mws-form-row">
                    				<label>DOB</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_dob" name="txt_dob" value="" class="mws-textinput required">
                    				</div>
                    			</div>-->
                                     
                   
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
                    				<label>Select Doctor</label>
                    				<div class="mws-form-item small">
                                                    <select class="chzn-select required" id="sel_doctors" name="sel_doctors">
                                                            
                                                            <?php
                                                            $doct_name="";
                                                            foreach($doctors_list as $doctors ){ ?>
                                                               
                                                        <option value="<?php echo $doctors['id'];?>" ><?php echo trim($doctors['name']); ?></option>
                    						
                                                                    
                                                                    <?php } ?>
                    					</select><?php //echo $doct_name;?>
                    				</div>
                    			</div>
                                    <div class="mws-form-row">
                    				<label>Mobile No</label>
                    				<div class="mws-form-item small required">
                                                    <input type="text" id="txt_contact" name="txt_contact" value="" class="mws-textinput required digits">
                    				</div>
                    			</div><div class="mws-form-row">
                    				<label>Email</label>
                    				<div class="mws-form-item small required">
                                                    <input type="text" id="txt_email" name="txt_email" value="" class="mws-textinput required email">
                                                     <div id='usernamechk'></div>
                    				</div>
                    			</div>
                             
                    			<div class="mws-form-row">
                    				<label>Medical History</label>
                    				<div class="mws-form-item medium ">
                                                    <textarea id="txt_medical_history" name="txt_medical_history" cols="100%" rows="100%"></textarea>
                    				</div>
                    			</div>
                    			
                    		
                    		</div>
                    		<div class="mws-button-row "><input type="hidden" name="email_availablity" value="" class="required email" id="email_availablity" />
                    			<input type="button" id="submit" name="submit" class="mws-button red" value="Submit">
                    			<input type="reset" class="mws-button gray" value="Reset">
                    		</div>
                    	</form>
                    </div></div>
 <script>           
     
    //$('#sel_doctors').chosen();
    
    
     /*       $( "#txt_dob" ).datepicker({
                changeMonth: true,
                   changeYear: true,yearRange : "1920:2002",setDate:"10/12/2012",defaultDate: "-10Y"
              });
               $( "#txt_dob" ).datepicker( "option", "dateFormat", "yy-mm-dd");*/

           $( "#txt_DOI" ).datepicker({
                changeMonth: true,
                   changeYear: true,yearRange : "2013:2050",setDate:"10/12/2012",defaultDate: "-10Y",dateFormat:"yy-mm-dd"
              });
           
   
    
      $("#txt_email").focusout(function() {
                var email=document.getElementById("txt_email").value;//
                //alert(email);
                var params = "email="+email;
                var url = "<?php echo base_url(); ?>admin/checkusername";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: params,
                    beforeSend: function() {
                        document.getElementById("usernamechk").innerHTML= 'checking'  ;
                    },
                    success: function(data) {
                           
                        document.getElementById("usernamechk").innerHTML= data ;
                        if(data=="Available"){
                            $('#email_availablity').val('Available');
                        }else{
                            $('#email_availablity').val('');

                        }
                    }
                });
            });

            $("#submit").click(function() 	{ 
                $("#add_patient").validate();
                 if($("#add_patient").valid()==false)
                    return false;
                if($('#email_availablity').val()==''){
                    TINY.box.show ( {html:' Enter another Email', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	
                    return false;
                }
             
                var subj_id = $('#subject_id').val();
                var name = $('#txt_name').val();
              //  var dob = $('#txt_dob').val(); 		
                var age = $('#txt_age').val(); 	
                var address = $('#txt_address').val(); 
                var phone = $('#txt_contact').val(); 	
                var email = $('#txt_email').val(); 	
                var doctor_id = $('#sel_doctors').val(); 	
                var state=$('#sel_state').val(); 
                var medical_history=$('#txt_medical_history').val();
                var product = $('#sel_product').val();
				var DOI=$('#txt_DOI').val();
				//new line for chk age
				//var d1 = Date.parse(dob);
				//var dt=new Date(d1);
				//var year = dt.getFullYear();
				var d = new Date();
				var year1=d.getFullYear()
					/*if (year1-year!=age)
					{
					  TINY.box.show ( {html:' Enter correct Age and Dob', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});
						return false;
					}*/
                $.ajax( {	
                    url : siteUrl + "admin/add_pat_profile",	
                    type : "POST",	
                    data : 'subj_id=' + subj_id +'&name='+name +'&address='+address+'&phone='+phone+'&email='+email+'&state='+state+'&age='+age+'&doctor_id='+doctor_id+'&medical_history='+medical_history+'&product='+product+'&date_of_insertion='+DOI,
                    success : function(data) {   
                           $('#email_availablity').val('');
                        if(data == 'SUCCESS')					
                        {	
                            
                        TINY.box.show ( {html:'Successfully Added the Patient', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					
                        }else					
                        {		
                            
                            TINY.box.show ( {html:'Something went Wrong !!!', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	

                        }									},
						 error: function(XMLHttpRequest, textStatus, errorThrown)
							{
								alert(errorThrown);
							},				
						async:   false			
                });	
            });		     
        </script>