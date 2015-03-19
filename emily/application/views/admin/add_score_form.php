<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.print_r($add_scor[0]);

 */
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
                    	<span class="mws-i-24 i-user">Add Score</span>
                        <div class="mws-collapse-button mws-inset"><span></span></div>
                    </div><div class="mws-panel-body">
                        <form  class="mws-form" id="add_patient" name="add_patient">
                    		<div class="mws-form-inline">
                                    <div class="mws-form-row">
                    				<label>Patient Name</label>
                    				<div class="mws-form-item small">
                                                    <select class="chzn-select required" id="sel_patients" name="sel_patients">
                                                            
                                                            <?php
                                                            $doct_name="";
                                                            foreach($add_score['patient_list'] as $score ){ ?>
                                                               
                                                        <option value="<?php echo $score['id'];?>" ><?php echo trim($score['name']).' Email--'.$score['email']; ?></option>
                    						
                                                                    
                                                                    <?php } ?>
                    					</select><?php //echo $doct_name;?>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label>Bleeding Month </label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_dob" name="txt_dob" value="" class="mws-textinput required">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label>Score</label>
                    				<div class="mws-form-item small">
                                                    <input type="text" id="txt_score" name="txt_score" value="" class="mws-textinput required digits">
                    				</div>
                    			</div>
                    		
                    		</div>
                    		<div class="mws-button-row ">
                                    
                                    <input type="hidden" name="email_availablity" value="" class="required email" id="email_availablity" />
                    			<input type="button" id="submit" name="submit" class="mws-button red" value="Submit">
                    			<input type="reset" class="mws-button gray" value="Reset">
                    		</div>
                    	</form>
                    </div></div>
 <script>           
     
    //$('#sel_doctors').chosen();
    
    
            $( "#txt_dob" ).datepicker({
                changeMonth: true,
                   changeYear: true,yearRange : "1920:2002",setDate:"10/12/2012",defaultDate: "-10Y"
              });
               $( "#txt_dob" ).datepicker( "option", "dateFormat", "yy-mm-dd");
            $("#submit").click(function() 	{  
                //$("#add_patient").validate();
           
                var patients_id = $('#sel_patients').val();
                var dob = $('#txt_dob').val(); 	
                var score = $('#txt_score').val(); 
               alert(patients_id+'--'+dob+'==='+score);
                $.ajax( {	
                    url : siteUrl + "admin/addUserScore",	
                    type : "POST",	
                    data : 'patients_id=' + patients_id +'&dob='+dob+'&score='+score,
                    success : function(data) {
                  alert(data);
                        if(data == 'SUCCESS')					
                        {	
                            
                         TINY.box.show ( {html:'Successfully Added the Patient', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					
                        }else					
                        {		
                            
                          TINY.box.show ( {html:'Something went Wrong !!!', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	

                        }									},				async:   false			
                });	
            });		     
        </script>