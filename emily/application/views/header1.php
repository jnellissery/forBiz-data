<div class="wrapper">	<header class="pageheader">  	
        <div class="logo"><a href="<?php echo base_url(); ?>home">
                <img src="<?php echo base_url(); ?>images/logo.png" width="147" height="62" alt="Emily"></a>
        </div><!-- End of Logo --><?php $page = $this->uri->segment(1); ?>  		
        <nav>            	<div class="nav-left"></div>             
            <div class="navigation">  
                <?php
                $usertype = $this->session->userdata("usertype");
                if ($usertype == 'patient' || $page == 'patient_profile' || $page == 'instruction' || $page == 'askadoctor') {
                    ?>
                    <ul>                    	
                        <li  <?php echo $page == 'patient_profile' ? 'class="active"' : ''; ?> ><a href="<?php echo base_url(); ?>patient_profile">View Profile</a></li>    
                        <li <?php echo $page == 'enter_score' ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>enter_score">Enter Data</a></li>                      
                        <li <?php echo $page == 'askadoctor' ? 'class="active"' : ''; ?> ><a href="<?php echo base_url(); ?>askadoctor">Ask Expert/Contact My Doctor</a></li>  
						<li <?php echo $page == 'changepswd' ? 'class="active"' : ''; ?> style="padding:0 8px"><a  href="<?php echo base_url(); ?>changepassword">Change Password</a></li>
                        <li <?php echo $page == 'logout' ? 'class="active"' : ''; ?> ><a href="<?php echo base_url(); ?>logout">Logout</a></li>                    </ul>    
<?php } else if ($page == 'profile' || $page == 'askadoctor' || $usertype == 'doctor' || $page == 'patientlist' || $page == 'deletepatient') { ?>            
                    <ul>     
                        <li <?php echo $page == 'patientlist' ? 'class="active"' : ''; ?>  style="padding:0 12px"><a href="<?php echo base_url(); ?>patientlist/1">My Patient List</a></li>
                        <li <?php echo $page == 'profile' ? 'class="active"' : ''; ?>  style="padding:0 12px"><a href="<?php echo base_url(); ?>profile">Add a New Patient</a></li>           
                        <li <?php echo $page == 'Contact' ? 'class="active"' : ''; ?> style="padding:0 7px"><a href="<?php echo base_url();?>images/Instruction_for_doctors.pdf" target="_blank">Instruction</a></li>
                        <li <?php echo $page == 'changepswd' ? 'class="active"' : ''; ?> style="padding:0 7px"><a  href="<?php echo base_url(); ?>changepassword1">Change Password</a></li>  
						<li style="padding:0 12px"><a href="#">Doctors Forum</a></li>
                        <li <?php echo $page == 'logout' ? 'class="active"' : ''; ?> ><a href="<?php echo base_url(); ?>logout">Logout</a></li>   
                    </ul><?php } else { ?> 
                    <ul>                    	
                        <li  <?php echo $page == 'home' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo base_url(); ?>home">Home</a></li> 
							<li <?php $class = ($page == 'emily' ? 'class="active"' : '');
    echo $class; ?> >
                            <a href="<?php echo base_url(); ?>emily">About Emily</a></li>
							 <li <?php $class = ($page == 'faq' ? 'class="active"' : '');
    echo $class; ?> >
                            <a href="<?php echo base_url(); ?>faq">FAQ's</a></li>
                        <li <?php echo $page == 'about' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo base_url(); ?>about">HLL R & D</a></li>      
                        <li <?php $class = ($page == 'news' ? 'class="active"' : '');
    echo $class; ?> ><a href="<?php echo base_url(); ?>news">News Release</a></li>                   
  <li <?php $class = ($page == 'aaa' ? 'class="active"' : '');
    echo $class; ?> ><a href="<?php echo base_url(); ?>aaa">Buy Emily</a></li>                                       
                        <li <?php echo $page == 'contact' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo base_url(); ?>contact">Contact Us</a></li>          
                    </ul>                                        <?php } ?>    
                <div class="clear"></div>      </div>         
            <div class="nav_right"></div>   		
        </nav><!--End of Main Navigation -->       
        <div class="hll_logo">            	
            <img src="<?php echo base_url(); ?>images/hll-logo.png" width="173" height="35">      
        </div><div class="clear"></div>		</header> <!--End of header -->
    <?php

    function get_months($date1, $date2) {
        $date1 = new DateTime($date1);
        $date1->format('Y-m-d');
        $date2 = new DateTime($date2);
        $date2->format('Y-m-d');
        $interval = $date1->diff($date2);
        $str = "You are with Emily for ";
        if ($interval->y != 0) {
            $str.= $interval->y . " years  and  ";
        }
        $str.= $interval->m . " months and  " . $interval->d . " days ";

        echo $str;
    }
   
    ?>