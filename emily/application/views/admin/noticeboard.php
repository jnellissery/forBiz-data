<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
	<div class="mws-panel grid_3  mws-collapsible">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-books-2">Website Summary</span><div class="mws-collapse-button mws-inset"><span></span></div>
                    </div>
                    <div class="mws-panel-body">
                        <ul class="mws-summary">
                            <li>
                                <span><?php echo ($total_unique_visits);?></span> Total Unique visits
                            </li>
                             <li>
                                <span><?php echo ($total_visits);?></span> Total visits
                            </li>
							 <li>
                                <span><?php echo ($summary_malayalamanoram); ?></span> Malayalamanorama
                            </li>
                            <li>
                                <span><?php echo ($summary_patients); ?></span> Patients
                                
                            </li>
                            <li>
                                <span><?php echo ($summary_doctors); ?></span> Doctors
                            </li>
                            
                            <li>
                                <span><?php echo ($total_messages); ?></span> Messages
                            </li>
                            <li>
                                <span>  </span><a  onclick="showmappopup1()" style="text-decoration:none">Change Password </a>
                            </li>

                        </ul>
                    </div>
                </div>
                
                      <script type="text/javascript" language="javascript1.5">
function showmappopup1()
	{
			 
			var pageUrl=siteUrl+"/admin/change_password_popup";
		$.ajax
			({   
			url: pageUrl, //The url where the server req would we made.
			async: false,
			type: "POST", //The type which you want to use: GET/POST
			dataType: "html", //Return data type (what we expect).
			success: function(data) 
				{
				jq4map('#basic-modal-content').html(data);
				jq4map('#basic-modal-content').modal();
				return false;
				},
			error: function(e) 
				{
				alert(e);
				}
			});
		
	}
</script> 