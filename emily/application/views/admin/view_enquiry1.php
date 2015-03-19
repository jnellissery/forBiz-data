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
                        	<p><?php echo $enquiry['symptoms']?></p>
                        </div>
                    </div>
                </div>