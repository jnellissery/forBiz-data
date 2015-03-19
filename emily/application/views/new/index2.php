<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Emily</title>

 
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>  
<script type="text/javascript" src="js/bootstrap.js"></script>  


<script type="text/javascript">
jQuery(document).ready
(
	function() 
	{
		 $('#CartModel').modal('show');
	     login_box_show() ;
		}
	
);
</script>

<script type="text/javascript" src="js/scripts.js"></script>

</head>

<body  style="background-color:transparent">
 <div  id="CartModel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="width: 500px; left: 40%; top: 10%; text-align: center">
         
    
        <div id="patient_interest_box">
            <div id="login_form" style="display:none">
            <form id="patient_doctor_login" name="patient_doctor_login" method="post">
                    <table width="360" border="0" >  
                    <tbody>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>   
                    <td align="left">Login as</td>  
                    </tr>
                    <tr>   

                    <td width="108" align="left">Username</td>  

                    <td width="205"><input type="text" name="username" id="username" class="rounded required"> </td> 

                    </tr>  <tr>  

                    <td align="left">Password</td>   

                    <td><input type="password" name="password" id="password" class="rounded required digits"> </td> 

                    </tr> 

                    <tr>  

                    <td colspan="2" align="right" style="padding-top:20px;">

                    	<a href="javascript:;" class="emily_buttons" onclick="login_check()">Login Now</a>

                    </td>  

                    </tr>

                    

                    </tbody>

                    </table>

            </form>

            </div>

        </div>
        </div> 
</body>



</html>

