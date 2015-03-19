<div class="content_wrapper">

    <h1><label><?php echo "Welcome ".ucfirst($this->session->userdata('username')); ?></label> Contact </h1>
	  			
		<div class="width908">
        	<div class="width450 askdoctorL roundbody">
            	<div class="askdoctorL1"><?php ?>
            		<h2>In case of any emergency contact:</h2><p class="fbold">04712774781 <?php echo $doctor_details['name'];?><br><?php echo $doctor_details['address'];?><br><?php echo $doctor_details['phone'];?></p>
            	</div>
            	<div class="askdoctorL2">
            		<h2>Emergency Helpline Number:</h2><p class="fbold">+91-000000000</p>
            	</div>
            </div>    
        	<div class="width450 roundbody">
            	<div class="askdoctorR">
                	<h2>Ask A Doctor</h2>
<!--                    <input type="text" class="width200 txt marB10 height30 RB colorGrey" value="Name" />
                    <input type="text" class="width200 txt marB10 height30 RB colorGrey" value="Email" />-->
                    <textarea class="width250 txt marB10 height150 RB colorGrey" id="description" name="description"></textarea>
                    <input type="button" class="AskBn" />
                </div>
            </div>
        </div>

            <!-- End of Side Bar -->
			
			<?php //print_r($this->session->userdata);?>
	</div>
    <script type="text/javascript">
    
    jQuery(function ($) {
        $('.AskBn').on("click",  function() {
            var description=$('#description').val().replace(/\n/g, "<br />");
        
            $.ajax({   
                url: "<?php echo base_url(); ?>querydoctor", //The url where the server req would we made.
                async: false,
                type: "POST", //The type which you want to use: GET/POST
                data: 'desc='+description,//The variables which are going.
                dataType: "html", //Return data type (what we expect).
                
                //This is the function which will be called if ajax call is successful.
                success: function(data)
				 {
                    if(data=="SUCCESS")
                        {
                    
                    TINY.box.show ( {html:'Successfully Send Your Query', animate:false, close:true, boxid:'success', top:100,openjs:function(){remove_overflow()}});
                }
                    alert(data)
                    //return false;
                    
                    // $('#city').html(data);
                },
                  error: function(XMLHttpRequest, textStatus, errorThrown) 
				  {
                    alert(XMLHttpRequest.responseText);
                }
            });
            return false;
	});
    });
</script>