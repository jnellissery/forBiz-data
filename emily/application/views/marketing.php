        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
           <link rel="stylesheet" type="text/css" href="<?php  echo  base_url();?>admin/css/core/form.css" media="screen" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
         <style type="text/css">	
            input.rounded {  border: 1px solid #ccc;    
                             /* Safari 5, Chrome support border-radius without vendor prefix.   * FF 3.0/3.5/3.6, Mobile Safari 4.0.4 require vendor prefix.   * No support in Safari 3/4, IE 6/7/8, Opera 10.0.   */ 
                             -moz-border-radius: 10px;  
                             -webkit-border-radius: 10px; 
                             border-radius: 10px;   
                             /* Chrome, FF 4.0 support box-shadow without vendor prefix.   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.   * change the offsets, blur and color to suit your design.   */  
                             -moz-box-shadow: 2px 2px 3px #666;  
                             -webkit-box-shadow: 2px 2px 3px #666; 
                             box-shadow: 2px 2px 3px #666;    /* using a bigger font for demo purposes so the box isn't too small */ 
                             font-size: 15px;    /* with a big radius/font there needs to be padding left and left   * otherwise the text is too close to the radius.   * on a smaller radius/font it may not be necessary   */ 
                             padding: 4px 7px;    /* only needed for webkit browsers which show a rectangular outline;   * others do not do outline when radius used.   * android browser still displays a big outline   */  
                             outline: 0;  /* this is needed for iOS devices otherwise a shadow/line appears at the   * top of the input. depending on the ratio of radius to height it will   * go all the way across the full width of the input and look really messy.   * ensure the radius is no more than half the full height of the input,    * and the following is set, and everything will render well in iOS.   */
                             -webkit-appearance: none;  
            }
            input.rounded:focus {    /* supported IE8+ and all other browsers tested.   * optional, but gives the input focues when selected.   * change to a color that suits your design.   */  
                border-color: #339933;
            
            }
             select {
     -moz-border-radius: 10px;  
                             -webkit-border-radius: 10px; 
                             border-radius: 10px;   
                             /* Chrome, FF 4.0 support box-shadow without vendor prefix.   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.   * change the offsets, blur and color to suit your design.   */  
                             -moz-box-shadow: 2px 2px 3px #666;  
                             -webkit-box-shadow: 2px 2px 3px #666; 
                             box-shadow: 2px 2px 3px #666;    /* using a bigger font for demo purposes so the box isn't too small */ 
                             font-size: 15px;    /* with a big radius/font there needs to be padding left and left   * otherwise the text is too close to the radius.   * on a smaller radius/font it may not be necessary   */ 
                             padding: 4px 7px;    /* only needed for webkit browsers which show a rectangular outline;   * others do not do outline when radius used.   * android browser still displays a big outline   */  
                             outline: 0;  /* this is ne*/
                             width: 200px;
}
            textarea.rounded {  border: 1px solid #ccc;    
                                /* Safari 5, Chrome support border-radius without vendor prefix.   * FF 3.0/3.5/3.6, Mobile Safari 4.0.4 require vendor prefix.   * No support in Safari 3/4, IE 6/7/8, Opera 10.0.   */ 
                                -moz-border-radius: 10px; 
                                -webkit-border-radius: 10px;
                                border-radius: 10px;   
                                /* Chrome, FF 4.0 support box-shadow without vendor prefix.   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.   * change the offsets, blur and color to suit your design.   */  
                                -moz-box-shadow: 2px 2px 3px #666;
                                -webkit-box-shadow: 2px 2px 3px #666; 
                                box-shadow: 2px 2px 3px #666;    /* using a bigger font for demo purposes so the box isn't too small */ 
                                font-size: 15px;    /* with a big radius/font there needs to be padding left and left   * otherwise the text is too close to the radius.   * on a smaller radius/font it may not be necessary   */ 
                                padding: 4px 7px;    /* only needed for webkit browsers which show a rectangular outline;   * others do not do outline when radius used.   * android browser still displays a big outline   */  
                                outline: 0;  /* this is needed for iOS devices otherwise a shadow/line appears at the   * top of the input. depending on the ratio of radius to height it will   * go all the way across the full width of the input and look really messy.   * ensure the radius is no more than half the full height of the input,    * and the following is set, and everything will render well in iOS.   */
                                -webkit-appearance: none; 
            }
            textarea.rounded:focus {  
                /* supported IE8+ and all other browsers tested.   * optional, but gives the input focues when selected.   * change to a color that suits your design.   */  
                border-color: #339933; 
            }    

            #tbl_profile td{  
                border: 0;    
                padding-left: 100px;
                font-size:14px;
                font-family:Arial, Helvetica, sans-serif;  
            }
            #tbl_profile{   
                margin-left: 130px;
                height: 450px;
            }	

            #usernamechk{
                color: #E13300;
                font-family: sans-serif;
                font-size: 10px;
            }
           
           /* * { font-family: Verdana; font-size: 96%; }*/
            label { width: 10em; float: left; }
            label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
            p { clear: both; }
            .submit { margin-left: 12em; }
            em { font-weight: bold; padding-right: 1em; vertical-align: top; }
       
        </style>
        <script>
            $(function() {
                $( "#txt_dob" ).datepicker({
                    changeMonth: true,
                    changeYear: true,yearRange : "1920:2002",setDate:"10/12/2012",defaultDate: "-10Y"
                });
                $( "#txt_dob" ).datepicker( "option", "dateFormat", "yy-mm-dd");

            });
       
            $(document).ready(function(){
                $("#add_patient").validate();
            });
        </script>
        <div class="content_wrapper">        		<h1>Your Information</h1>	
            <form id="marketing_query" name="marketing_query" method="post" />  
            <table   width="600" border="0" id="tbl_profile">  
                
                <tr>   
                    <td align="left" >Name</td>  
                    <td><input type="text" class="rounded required" id="txt_name" name="txt_name" /> </td> 
                </tr>  <tr>  
                    <td align="left" >Age</td>   
                    <td><input type="text" class="rounded required digits" id="txt_age" name="txt_age"/> </td> 
                </tr> 
                 <tr>
                    <td align="left" >Symptoms</td> 
                    <td>       
                        <textarea id="txt_symptoms" class="rounded" name="txt_symptoms"></textarea>        </td>  
                 </tr>

                
                <tr>   
                    <td align="left" >Address</td>  
                    <td><input type="text" class="rounded required" id="txt_address" name="txt_address" /> </td>
                </tr>  <tr>   
                    <td align="left" >State</td>  
                    <td> <select id="sel_state" name="sel_state" class="required" >
                         <option value="">Select State</option>
                           <?php foreach($states_list as $states ){ ?>
                    	<option value="<?php echo $states['city_state']; ?>"><?php echo $states['city_state']; ?></option>
                    	<?php } ?>
                    					</select>
                        </td>
                </tr><tr> 
                    <td align="left" >Mobile Number</td>   
                    <td><input type="text" class="rounded required digits" id="txt_contact" name="txt_contact"/> </td>  </tr>  
                <tr>  
                    <td align="left" >Email</td> 
                    <td><input type="text" class="rounded required email" id="txt_email"  name="txt_email" /></td>  </tr>
<!--                <tr>   
                    <td align="left" >Dob</td> 
                    <td><input type="text" class="rounded required " id="txt_dob" name="txt_dob" /> </td> 
                </tr>  -->
               <tr>
                    <td align="left" >&nbsp;</td>    
                    <td><input type="button" id="submit" name="submit" value="Send" class="rounded" /> </td>  </tr>
                <tr>    <td>&nbsp;</td>    <td><input type="hidden" name="email_availablity" value="" class="required email" id="email_availablity" />
                    </td>  </tr></table>	    		
        </form>
        </div>
        
        <script>           		
            $("#submit").click(function() 	{  
                //alert($("#add_patient").validate());
                if($("#marketing_query").valid()==false)
                    return false;
               
               
                var name = $('#txt_name').val();
                var age = $('#txt_age').val(); 	
                var address = $('#txt_address').val(); 
                var phone = $('#txt_contact').val(); 	
                var email = $('#txt_email').val(); 	
                var state=$('#sel_state').val(); 
                var symptoms=$('#txt_symptoms').val();
                $.ajax( {	
                    url : siteUrl + "emily_enquiry",	
                    type : "POST",	
                    data : 'name='+name+'&address='+address+'&phone='+phone+'&email='+email+'&state='+state+'&age='+age+'&symptoms='+symptoms+'&type=P',
                    success : function(data) {   
 
                        if(data == 'SUCCESS')					
                        {				
                            TINY.box.show ( {html:'Successfully Send The Enquiry', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});					
                        }else					
                        {				
                            TINY.box.show ( {html:'Something went Wrong !!!', animate:false, close:true, boxid:'error', top:50,openjs:function(){remove_overflow()}});	

                        }									},				async:   false			
                });	
            });		     
        </script>