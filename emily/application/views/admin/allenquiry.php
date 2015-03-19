<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

<?php $this->load->view('admin/scripts_css');?>


<title>Emily Admin - Dashboard</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<?php //require 'modules/themer.php';?>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
     <?php 
     $this->load->view('admin/logocontainer.php');
          $this->load->view('admin/loginbox.php',$loginbox);

  ?>
    </div>
     <div id="mws-wrapper">
    
    	<?php 
        $this->load->view('admin/sidebar.php');
        ?>
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
       
        	<!-- Inner Container Start -->
            <div class="container">
        <?php 
       
            $this->load->view('admin/view_all_enquiry',$view_all_enquiry);
        ?>
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <?php        
             $this->load->view('admin/footer.php');
       ?>
            
        </div>
        <!-- Main Container End -->
        
    </div>
     

</body>
</html>