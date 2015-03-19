<link type='text/css' href='<?php echo base_url(); ?>css/basic.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/basic.js'></script>
<section class="gall" >  	
    <!--roud boxes -->      <div class="content_wrapper">       
        <!-- Round Box Content -->        	<div  class="slider" style="position:relative" >     
            	<div class="slider" id="slider">
            	<img src="images/slider1.jpg" width="299" height="267">
                <img src="images/slider2.jpg" width="299" height="267">
                <img src="images/slider3.jpg" width="299" height="267">
                <img src="images/slider4.jpg" width="299" height="267">
           </div></div>            <!-- End Slider -->        
            <div class="what_emily">            	
                <h2>What is Emily ?</h2>            
                <ul>    
                    <li>Emily is an intrauterine system (IUS) similar to a copper T device with the difference that it releases small amount of hormone daily inside your uterus.</li> 
                    <li>It provides effective contraception (up to 99%) for a long period of time and also is indicated for the management of heavy menstrual blood loss.</li>                    <li>You can become pregnant after the removal of Emily.</li> 
                </ul>              
                <div class="know_btn">
                    <a href="emily"><img src="images/know-more.png" width="124" height="71" alt="Know More"></a>
                </div> 
            </div>                <!-- End of Round box Content -->  
    </div>      <!-- End of Round Box -->	
</section><!--End of 1st Section -->	
<article id="mainArticle">    		
    <ul class="columns">        	
        <li class="intrest_emily">     
            <h3>Are you Interested to be an Emily User</h3>     
            <div class="click-btn">
                <a href="<?php echo base_url();?>marketing"><img src="images/click-btn.png" width="111" height="71"></a>
            </div>            </li>        	<!-- Intersted in Emily -->       
        <li class="parents_login" id="parents_login">            
            <h3>Subject Login</h3> 
            <?php if (isset($_GET['login'])){
                
                if($_GET['login']=="failed" && $_GET['user']=="patient")
                {
            
?> 
            <label class="invalid_login_label">Invalid Login</label>    <label class="invalid_login_label"><a href="#">Forgot Password?</a></label> <div class="forms pad20alltop10">    
            <?php } else{
                
                ?>
            <div class="forms padding20"> 
                <?php 
            }
            
            }else{
            ?>
            <div class="forms padding20"> 
                <?php } ?>
                <form id="form_patient" name="form_patient" action="login/patient" method="post">		
                    <div class="formsdiv">			
                        <label>User Name</label>
                        <input type="text" name="txt_pat_user" id="txt_pat_user"  >	
                    </div>					
                    <div class="formsdiv">			
                        <label>Password</label>                 
                        <input type="password" name="txt_pat_pass" id="txt_pat_pass" >	
                    </div>						
                    <div class="formsdiv">				
                        <input name="" type="image" src="images/submit.png">	
                    </div>					
                </form>                </div>       
        </li>            <!-- Parents Login -->     
        <li class="physician_login" id="physician_login">           
            <h3>Physicians Login</h3>     <?php if (isset($_GET['login'])){
                
                if($_GET['login']=="failed" && $_GET['user']=="doctor")
                {
            
?> 
            <label class="invalid_login_label">Invalid Login</label>  	  <label class="invalid_login_label"><a href="#">Forgot Password?</a></label> <div class="forms pad20alltop10">    
            <?php } else{
                
                ?>
            <div class="forms padding20"> 
                <?php 
            }
            
            }else{
            ?>         
            <div class="forms padding20">    <?php } ?>               
                <form id="form_doctor" name="form_doctor" action="login/doctor" method="post">			
                    <div class="formsdiv">					
                        <label>User Name</label>		
                        <input type="text" name="txt_doc_email" id="txt_doc_email" >
                    </div>						
                    <div class="formsdiv">			
                        <label>Password</label>                    
                        <input type="password" name="txt_doc_pass" id="txt_doc_pass" >	
                    </div>					
                    <div class="formsdiv">			
                        <input name="submit" type="image" src="images/submit.png">	
                    </div>					
                </form>          
            </div>       
            
        </li><!-- Physician Login -->    
    </ul>        <div class="clear"></div>	
</article>	<div id="basic-modal-content" align="center" style="padding-top: 20px">
                    <p>Please enter your email.We will send you the password to your mail.
                          </p>
                          <table width="400" border="0" style="padding-top: 30px" >
  <tr>
      <td style="width: 200px">&nbsp;</td>
    <td style="width: 200px">&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" id="username" name="username" /></td>
  </tr><tr>
    <td>&nbsp;</td>
    <td><input type="image" src="images/submit.png" name="sbt_forgot_password" id="sbt_forgot_password"></td>
  </tr>
</table>
         
                        
		</div><!-- End of Mail Article -->	
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.nivo.slider.js"></script>  
<script type="text/javascript">    
    $(window).load(function() {        $('#slider').nivoSlider({effect: 'fade',directionNav:false});    });    
</script>