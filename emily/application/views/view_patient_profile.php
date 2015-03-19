 <script src="<?php echo base_url(); ?>admin/js/jquery.cookie.js" type="text/javascript"></script>
<style>    
    body{        
        font-weight: bold;
        font-family:Arial, Helvetica, sans-serif;
        color:#09578b; 
        font-size: 16px;
    }
    
    input.rounded { 
        border: 1px solid #ccc;     /* Safari 5, Chrome support border-radius without vendor prefix.   * FF 3.0/3.5/3.6, Mobile Safari 4.0.4 require vendor prefix.   * No support in Safari 3/4, IE 6/7/8, Opera 10.0.   */
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
         border-radius: 10px;    /* Chrome, FF 4.0 support box-shadow without vendor prefix.   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.   * change the offsets, blur and color to suit your design.   */
         -moz-box-shadow: 2px 2px 3px #666;
         -webkit-box-shadow: 2px 2px 3px #666; 
         box-shadow: 2px 2px 3px #666;    /* using a bigger font for demo purposes so the box isn't too small */
         font-size: 15px;    /* with a big radius/font there needs to be padding left and left   * otherwise the text is too close to the radius.   * on a smaller radius/font it may not be necessary   */
         padding: 4px 7px;    /* only needed for webkit browsers which show a rectangular outline;   * others do not do outline when radius used.   * android browser still displays a big outline   */
         outline: 0;  /* this is needed for iOS devices otherwise a shadow/line appears at the   * top of the input. depending on the ratio of radius to height it will   * go all the way across the full width of the input and look really messy.   * ensure the radius is no more than half the full height of the input,    * and the following is set, and everything will render well in iOS.   */
         -webkit-appearance: none;
    }
    input.rounded:focus {    /* supported IE8+ and all other browsers tested.   * optional, but gives the input focues when selected.   * change to a color that suits your design.   */
        border-color: #339933;  
    }
    table td{   
        border: 0;   
        font-family:sans-serif;
       
    }
    table{ 
        margin-left: 180px;
        list-style:none;  
        line-height:35px; 
        font-size:14px;
        font-weight: bold;
        font-family:Arial, Helvetica, sans-serif;
        color:#09578b; 
                   

    }
    table td{ 
        text-align:left ;
        vertical-align: text-top;
        
    } #table tr{
                border: 1px;
                border-bottom-color: #E9E9E9;  

    }
    .marginL120{
     margin-left: 120px;  
    }

</style>	
    <div class="content_wrapper">
        <h1><label>
		
            <?php
                
            echo "Welcome " . ucfirst($this->session->userdata('username')) . " , ";
            $joined = date("d-m-Y", strtotime($profile['joined_date']));
            echo "  " . get_months($joined, date("d-m-Y"));
            ?>
                <p>Product you are using : <?php echo $profile["product"]; ?></p>
            </label>Subject Information</h1>
        <h2>Personal Details</h2>
        <table   width="500"   height="350px" >
            <tr style="border:1px;border-bottom-color:#ccc ">
                <td align="left"  >Name</td>  
                <td align="center"><?php echo $profile["name"]; ?> </td>  
            </tr>
            <tr>
                <td style="width: 250px;" align="left" >Subject Id </td>
                <td><?php echo $profile["id"]; ?> </td> 
            </tr>
			<tr>
                <td align="left" >Product</td>  
                <td align="center"><?php echo $profile["product"]; ?> </td>  </tr>
            <tr> 
            <tr>
                <td align="left" >Age</td>  
                <td align="center"><?php echo $profile["age"]; ?> </td>  </tr>
            <tr> 

                <td align="left" >Place</td> 
                <td align="center"><?php echo $profile["address"]; ?> </td>
            </tr> <tr> 
                <td align="left" >Mobile No</td>  
                <td ><?php echo $profile["phone"]; ?> </td>
            </tr>
            <tr>    <td align="left" >Email Id</td> 
                <td><?php echo $profile["email"]; ?> </td>  </tr>
             <tr> 

                <td align="left" >State</td> 
                <td align="center"><?php echo $profile["state"]; ?> </td>
            </tr>
             </table>
    <!--          <tr>
                <td style="width: 250px;" align="left" >Medical History </td>
                <td align="center"><?php echo $profile["medical_history"]; ?> </td> 
            </tr>
          <tr>
                <td colspan="2" align="center" style="text-align:center"> 
                    <a href="<?php //echo base_url() ?>bleedingscore/graph/<?php //echo $profile["id"]; ?>">
                     <input type="button" class="ViewMyProBn" /></a>
                </td>  
            </tr>-->
               <h2>Medical History</h2>
               <table width="720px">
                     <tr>
                <td style="width: 250px;" align="left" >Medical History </td>
                <td style="text-align: justify;width:470px;margin-right: 50px;"><?php echo $profile["medical_history"]; ?> </td> 
            </tr>
          <tr>
                <td colspan="2" align="center" style="text-align:center;padding-right: 150px;"> 
                    <a id="submit" href="<?php echo base_url();?>bleedingscore/graph/<?php echo $profile["id"]; ?>">
                     <input type="button" class="ViewMyProBn" /></a>
                </td>  
            </tr>
               </table>
       	    		           	
    </div>
	
<script>
 
    $("#submit").click(function() 	
	{
        window.location.href=$("#submit").attr('href');
    });
</script>


