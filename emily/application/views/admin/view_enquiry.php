<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="mws-panel grid_4 mws-collapsible">
                	<div class="mws-panel-header">
                  <span><?php echo $enquiry['name']?><label style="margin-left:75px;"><?php echo $enquiry['email']?></label>
                      <label style="margin-left:75px;"><?php echo $enquiry['send_date'];?></label></span>
                    <div class="mws-collapse-button mws-inset"><span></span></div></div>
                    <div class="mws-panel-body" style="display: block;">
                    	<div class="mws-panel-content">
                      <table width="500px">
                    <tr>
                        <td>Age :</td>
                        <td ><?php echo $enquiry['age']; ?><td>
                        
                    </tr><tr>
					<?php 
					echo $enquiry['type'];
					if ($enquiry['type']=="P")
					{ 
					echo ("<td>Symptoms :</td>" );
					}
					else 
					{  
					echo ("<td>Doctor RegNo :</td>");
					 }
					 ?>
                        
                         <td ><?php echo $enquiry['symptoms']; ?><td>
                        
                    </tr><tr>
                        <td>Contact :</td>
                         <td ><?php echo $enquiry['phone']; ?><td>
                        
                    </tr><tr>
                        <td>Address :</td>
                         <td ><?php echo $enquiry['address']; ?><td>
                        
                    </tr><tr>
                        <td>State :</td>
                       <td> <?php echo $enquiry['state']; ?><td>
                        
                    </tr>
                </table>
                
                                 </div>
                    </div>
                </div>