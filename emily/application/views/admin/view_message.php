<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($message);
?>
<div class="mws-panel grid_4 mws-collapsible">
                	<div class="mws-panel-header">
                            <span><?php echo $message['name']?><label style="margin-left:200px;"><?php echo $message['email']?></label></span>
                    <div class="mws-collapse-button mws-inset"><span></span></div></div>
                    <div class="mws-panel-body" style="display: block;">
                    	<div class="mws-panel-content">
                        	<p><?php echo $message['message']?></p>
                        </div>
                    </div>
                </div>