<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
	   
        <!-- User Tools (notifications, logout, profile, change password) -->
        <style>
            div#mws-user-tools .mws-dropdown-menu .mws-dropdown-box  {
                width: 300px;
            }
        </style>
        <div id="mws-user-tools" class="clearfix">
        <!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
        	<a href="#" class="mws-i-24 i-alert-2 mws-dropdown-trigger">Notifications</a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif"><?php echo $enquiry_count; ?></span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<?php foreach($enquiry_list as $enquiry) {?>
                            
                            <li class="read">
                            	<a href="<?php echo base_url();?>admin/enquiry/<?php  echo $enquiry['id'];?>">
                                    <span class="message">
                                    
                                      <?php echo  $enquiry['name']?>
                                    </span>
                                    <span class="time">
                                  <?php echo  $enquiry['send_date']?>
                                                 </span>
                                    
                                </a></li>
                                <?php }?>
                            
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="<?php echo base_url(); ?>admin/enquiries">View All Enquiry</a>
                        </div>
                    </div>
                </div>
                
         </div>
         
         <!-- this is for counting malayalamanoram online servey  -->
            <div id="mws-user-notif" class="mws-dropdown-menu">
        	<a href="#" class="mws-i-24 i-alert-3 mws-dropdown-trigger">Notifications</a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif"><?php echo $menquiry_count; ?></span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<?php foreach($menquiry_list as $enquiry) {?>
                            
                            <li class="read">
                            	<a href="<?php echo base_url();?>admin/enquiry/<?php  echo $enquiry['id'];?>">
                                    <span class="message">
                                    
                                      <?php echo  $enquiry['name']?>
                                    </span>
                                    <span class="time">
                                  <?php echo  $enquiry['send_date']?>
                                                 </span>
                                    
                                </a></li>
                                <?php }?>
                            
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="<?php echo base_url(); ?>admin/menquiries">View All Enquiry</a>
                        </div>
                    </div>
                </div>
                
         </div>
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" class="mws-i-24 i-message mws-dropdown-trigger">Messages</a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif"><?php echo $messages_count;?></span>
                
                <!-- Me<div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                       
                            <ul class="mws-messages">
                       <?php
                        foreach($messages_list as $message) { ?> 
                            <?php 
                        if(intval($message['admin_read'])==intval('1'))
                        {
                           $msg  = 'read';
                       }
                       else{
                           $msg = 'unread';
                       }
                         ?>	<li class="<?php echo $msg; ?>"> 
                           
                                <span class="sender"> <?php echo $message['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;email&nbsp;:&nbsp; <?php echo $message['email']; ?></span>
                                     
                                    <span class="message">
                                       <?php echo strip_slashes($message['message']); ?>
                                    </span>
                                    <span class="time">
                                        <?php echo $message['date_added']; ?>
                                    </span>
                              
                            </li>
                        	<?php }?>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="<?php echo base_url();?>admin/all_messages">View All Messages</a>
                        </div>
                    </div>
                </div>ssages dropdown -->
                
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="<?php echo base_url();?>admin/example/profile.jpg" alt="User Photo" />
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello <?php echo $this->session->userdata('username');?> ,
                    </div>
                    <ul>
<!--                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>-->
                        <li><a href="<?php echo base_url();?>admin/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            $('.mws-notifications li a').click(function (e) {
		var href=$(this).attr('href');$(window).attr("location",href);
		return false;
	});$('.mws-dropdown-viewall a').click(function (e) {
		var href=$(this).attr('href');$(window).attr("location",href);
		return false;
	});
         $('.mws-messages a').click(function (e) {
		var href=$(this).attr('href');$(window).attr("location",href);
		return false;
	});$('.mws-dropdown-viewall a').click(function (e) {
		var href=$(this).attr('href');$(window).attr("location",href);
		return false;
	});
        </script>