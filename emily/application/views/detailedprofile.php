<style> table td{   
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

<div class="wrapper">
	 <!--End of header -->

		<div class="content_wrapper">  

        		<h1>Detailed Subject Profile</h1>
                <h2>Personal Details</h2>
            <table   width="500"   height="350px" >
                <tr style="border:1px;border-bottom-color:#ccc ">
                    <td align="left"  >Name</td>  
                    <td align="center"><?php echo $profile["name"]; ?> </td>  
                </tr>
                <tr style="border:1px;border-bottom-color:#ccc ">
                    <td align="left"  >Product</td>  
                    <td align="center"><?php echo $profile["product"]; ?> </td>  
                </tr>
                 <tr>
                    <td style="width: 250px;" align="left" >Date Of Insertion </td>
                    <td><?php echo $profile["joined_date"]; ?> </td> 
                </tr> 
           
                <tr>
                <td align="left" >Age</td>  
                <td align="center"><?php echo $profile["age"]; ?> </td>
                </tr>
                <tr> 
    
                    <td align="left" >Address</td> 
                    <td align="center"><?php echo $profile["address"]; ?> </td>
                </tr> 
                <tr> 
                    <td align="left" >Mobile No</td>  
                    <td ><?php echo $profile["phone"]; ?> </td>
                </tr>
                <tr>   
                 <td align="left" >Email Id</td> 
                <td><?php echo $profile["email"]; ?> </td> 
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
               <table width="720px" >
                <tr>
                <td style="width:250px;"  align="left" >Medical History </td>
                <td  align="left" style="text-align: justify;width:470px;margin-right: 50px;"><?php echo $profile["medical_history"]; ?> </td> 
                </tr>
          		<tr>
                <td colspan="2" align="center" style="text-align:center;padding-right: 150px;"> 
                <a  id="submit" href="<?php echo base_url();?>bleedingscore/graph/<?php echo $profile['id'];?>"> 
                <input type="button" class="CDBn" />
                </a>
                </td>  
            	</tr>
               </table>
               </div>

            <!-- End of Side Bar -->
	</div>
   <script>
    $("#submit").click(function() 	{
        window.location.href=$("#submit").attr('href');
    });
</script>