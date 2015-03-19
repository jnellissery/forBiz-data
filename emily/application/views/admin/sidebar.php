<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
        	<!-- Searchbox -->
<!--        	<div id="mws-searchbox" class="mws-inset">
            	<f<orm action="<?php echo base_url();?>/admin/dashboard">
                	<input type="text" class="mws-search-input" />
                    <input type="submit" class="mws-search-submit" />
                </form>
            </div>-->
            <?php $pagename=end($this->uri->segment_array());echo $pagename;?>
            <!-- Main Navigation -->
            <div id="mws-navigation">
            	<ul>
                	<li class="<?php echo (($pagename=='dashboard')) ? 'active' :''; ?>"><a href="<?php echo base_url();?>admin/dashboard" class="mws-i-24 i-home">Dashboard</a></li>
                	
					<!--<li class="<?php //echo (($pagename=='add_patients') || ($pagename=='manage_patients') ) ? 'active' :''; ?>">
                    	<a href="#" class="mws-i-24 i-user">Patients</a>
                        <ul>
                        	<li><a href="<?php //echo base_url();?>admin/add_patients">Add Patients</a></li>
                        	<li><a href="<?php // echo base_url();?>admin/manage_patients"">Manage Patients</a></li>
                        </ul>
                    </li>-->
                	
                	<li class="<?php echo (($pagename=='add_doctor') || ($pagename=='manage_doctors') ) ? 'active' :''; ?>">
                    	<a href="#" class="mws-i-24 i-user-2">Doctor</a>
                        <ul>
                        	<li><a href="<?php echo base_url();?>admin/add_doctor">Add Doctor</a></li>
                        	<li><a href="<?php echo base_url();?>admin/manage_doctors">Manage Doctor</a></li>
                        </ul>
                    </li>
                	
                    <li class="<?php echo (($pagename=='mobile_message_enquiry')) ? 'active' :'';?>">
                    	<a href="#" class="mws-i-24 i-phone-2">Call Center</a>
                         <ul >
							<li><a  id="subject" onclick="addsubject(this)"  >Add Subject</a></li>
							<li><a id="subject1"  onclick="managesubject(this)">Manage Subject</a></li>
							<li><a id="subject2"  onclick="sms(this)">SMS Enquiry</a></li>
                        </ul>
				
                </ul>
            </div>            
        </div>
 <script language="javascript1.5" type="text/javascript">
function addsubject(obj)
{
if ($.cookie('password')=='YES')
{
 $.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>admin/add_patients",
	datatype:'json',
		success: function(data)
		{
		$('#subject').attr('href',"<?php echo base_url();?>admin/add_patients");
		$('#subject').click(
		function() 
		{
   			 window.location = $(this).attr('href');
		}).click();
		
		//$('#subject').click();
		},
		error :function()
		{
			//alert("error");
		}
	});
}
	else
	{
		$.ajax
		({
		type:'POST',
		url:"<?php echo base_url();?>admin/popupsidebar",
		datatype:'json',
			success: function(data)
			{
			$('.container').html(data);
			},
			error :function()
			{
				//alert("error");
			}
	
		});
	
	}
}	
function managesubject(obj)
{
if ($.cookie('password')=='YES')
{
 $.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>admin/manage_patients",
	datatype:'json',
		success: function(data)
		{
		$('#subject1').attr('href',"<?php echo base_url();?>admin/manage_patients");
		$('#subject1').click(
		function() 
		{
   			 window.location = $(this).attr('href');
		}).click();
		//$('#subject1').click();
		},
		error :function()
		{
			//alert("error");
		}

	});
	}
		else
	{
	$.ajax
		({
		type:'POST',
		url:"<?php echo base_url();?>admin/popupsidebar",
		datatype:'json',
			success: function(data)
			{
			$('.container').html(data);
			},
			error :function()
			{
				//alert("error");
			}
	
		});
	}
}
function sms(obj)
{

if ($.cookie('password')=='YES')
	{
 	$.ajax
  	({
  	type:'POST',
	url:"<?php echo base_url();?>admin/mobile_message_enquiry",
	datatype:'json',
		success: function(data)
		{
		$('#subject2').attr('href',"<?php echo base_url();?>admin/mobile_message_enquiry");
		$('#subject2').click(
		function() 
		{
   			 window.location = $(this).attr('href');
		}).click();
		},
		error :function()
		{
			//alert("error");
		}

	});
	}
		else
	{
	$.ajax
		({
		type:'POST',
		url:"<?php echo base_url();?>admin/popupsidebar",
		datatype:'json',
			success: function(data)
			{
			$('.container').html(data);
			},
			error :function()
			{
				//alert("error");
			}
	
		});
	}
}

</script>       