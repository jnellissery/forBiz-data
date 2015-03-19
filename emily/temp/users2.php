<?PHP
session_start();
include('conn.php');
if(isset($_SESSION['login']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users -Emily Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<style>
#callcenteruser{
.adduser;
}
#send{
#button1;
}
</style>


   <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        $( "#month" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
	$(function() {
        $( "#dop" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
    </script>

 
 


<body>
	<div id="container">
    	<div id="header">
        	<h2>Emily Admin </h2>
    <div id="topmenu">
            	<ul>
				<li class="current"><a href="users2.php">Users</a></li>
                	<li><a href="#">Doctors</a></li>
                  <!--  <li><a href="#">Orders</a></li>
                	<li class="current"><a href="#">Users</a></li>
                    <li><a href="#">Manage</a></li>
                    <li><a href="#">CMS</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Settings</a></li>-->
              </ul>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
					<li><a href="#adduser" class="useradd">Add user</a></li>
                    <li><a href="#" class="group">Groups</a></li>
            		<li><a href="#" class="search">Find user</a></li>
                  <!--  <li><a href="#" class="online">Users online</a></li>-->
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Users</h3>
                	<table width="100%">
						<thead>
				<?php if(isset($_REQUEST['action'])){
if(($_REQUEST['action']=='delete')){

?>
<tr>
				<td colspan="5" style="color:#FF0000" align="center">Sucessfully Deleted</td>
				</tr>	<?php
				
				}
				 }?>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#">Registration Id</a></th> 
								 <th width="90px"><a href="#">Name</a></th>                             
                                <th width="50px"><a href="#">Age</a></th>
                                <th width="50px"><a href="#">Location </a></th>
                               
								  <th><a href="#">Month</a></th>
								    <th><a href="#">No of Pads</a></th>
                                <th width="60px"><a href="#">Action</a></th>
                            </tr>
						</thead>
						<tbody>
									<?php 
									
						
$sql="SELECT *
FROM emerging_labs order by id desc Limit 0,10";
$query=mysql_query($sql) or die (mysql_error());
 $num=mysql_num_rows($query);
//$row=mysql_fetch_array($query);print_r($row);
for($i=0;$i<$num;$i++){
//echo $i+1;
$row=mysql_fetch_array($query);
$count=$i+1;
?>
					
							<tr>
                            	
                                <td><?php echo $count;?></td>
								
                                <td><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
                               
								<td><?php echo $row[4];?></td>
								 <td><?php echo $row[5];?></td> <td><?php echo $row[6];?></td><td><?php echo $row[7];?></td>
                                <td align="center"><a href="#"><!--<img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a>--><a href="delete.php?id=<?php echo $row[0];?>"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr><?php } ?>
						<!--	<tr>
                            	<td class="a-center">231</td>
                            	<td><a href="#">Mark Kyrnin</a></td>
                            	<td>mark.kyrnin@hotmail.com</td>
                                <td>Affiliate</td>
                                <td>8310</td>
                                <td>June 17, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<tr>
                            	<td class="a-center">230</td>
                            	<td><a href="#">Virgílio Cezar</a></td>
                                <td>virgilio@somecompany.cz</td>
                                <td>General</td>
                                <td>6200</td>
                                <td>June 31, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<tr>
                            	<td class="a-center">229</td>
                            	<td><a href="#">Todd Simonides</a></td>
                                <td>todd.simonides@gmail.com</td>
                                <td>Wholesale</td>
                                <td>2010</td>
                                <td>June 5, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
                            <tr>
                            	<td class="a-center">228</td>
                            	<td><a href="#">Carol Elihu</a></td>
                                <td>carol@herbusiness.com</td>
                                <td>General</td>
                                <td>3120</td>
                                <td>May 23, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
                            <tr>
                            	<td class="a-center">232</td>
                            	<td><a href="#">Jennifer Hodes</a></td>
                                <td>jennifer.hodes@gmail.com</td>
                                <td>General</td>
                                <td>1000</td>
                                <td>July 2, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<tr>
                            	<td class="a-center">231</td>
                            	<td><a href="#">Mark Kyrnin</a></td>
                            	<td>mark.kyrnin@hotmail.com</td>
                                <td>Affiliate</td>
                                <td>8310</td>
                                <td>June 17, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<tr>
                            	<td class="a-center">230</td>
                            	<td><a href="#">Virgílio Cezar</a></td>
                                <td>virgilio@somecompany.cz</td>
                                <td>General</td>
                                <td>6200</td>
                                <td>June 31, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
							<tr>
                            	<td class="a-center">229</td>
                            	<td><a href="#">Todd Simonides</a></td>
                                <td>todd.simonides@gmail.com</td>
                                <td>Wholesale</td>
                                <td>2010</td>
                                <td>June 5, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>
                            <tr>
                            	<td class="a-center">228</td>
                            	<td><a href="#">Carol Elihu</a></td>
                                <td>carol@herbusiness.com</td>
                                <td>General</td>
                                <td>3120</td>
                                <td>May 23, 2008</td>
                                <td><a href="#"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
                            </tr>-->
						</tbody>
					</table>
                    <div id="pager">
                    	Page <a href="#"><img src="img/icons/arrow_left.gif" width="16" height="16" /></a> 
                    	<input size="1" value="1" type="text" name="page" id="page" /> 
                    	<a href="#"><img src="img/icons/arrow_right.gif" width="16" height="16" /></a>of 42
                    pages | View <select name="view">
                    				<option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                    			</select> 
                    per page | Total <strong><?php echo $num;?></strong> records found
                    </div>
                </div>
                <br />
			
			      <div id="box">
				
                	<h3 id="callcenteruser">Call Center User</h3>
						
                   <iframe src="http://www.shortcodesindia.com/repliesapi.aspx?username=emily&password=39016832&keyw=Emily&frmdate=2012-11-24&todate=2012-11-28" height="125px" scrolling="auto" width="100%" ></iframe>
                      

                </div>
			<br/>
                <div id="box">
				
                	<h3 id="adduser">Add user</h3>
						
                    <form id="form" action="adduser.php" method="post">
                      <fieldset id="personal">
                        <legend>PERSONAL INFORMATION</legend>
                       <label for="firstname">Registration No : </label>
                        <input name="regno" id="regno" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="email">Date Of Purchase: </label>
                        <input type="text" id="dop" name="dop" />
                        <br />
                       <label for="pass">Name: </label>
                        <input name="name" id="name" type="text" 
                        tabindex="2" />
						<br/>
                        <label for="pass">Age : </label>
                        <input name="age" id="age" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="pass-2">Location : </label>
                        <input name="location" id="location" type="text" 
                        tabindex="2" />
                        <br />
                      </fieldset>
					  
                      <fieldset id="bleedinginfo">
                        <legend>Bleeding Info</legend>
                        <label for="street">Month </label> 
                      <input type="text" id="month" name="month" />
                        <br />
                        <label for="No_of_Pads">No_of_pads : </label>
                        <input name="pads" id="pads" type="text" 
                        tabindex="2" />
                        
                      </fieldset>
					
                      <div align="center">
                      <input id="button1" type="submit" value="Send" /> 
                      <input id="button2" type="reset" />
                      </div>
                    </form>

                </div>
            </div>
            <div id="sidebar">
  				<ul>
                	<li><h3><a href="#" class="house">Dashboard</a></h3>
                        <ul>
                        	<li><a href="#" class="report">Patient Report</a></li>
                    		<li><a href="#" class="report_seo">Average Patient Report</a></li>
                            <!--<li><a href="#" class="search">Search</a></li>-->
                        </ul>
                    </li>
                   <!-- <li><h3><a href="#" class="folder_table">Orders</a></h3>
          				<ul>
                        	<li><a href="#" class="addorder">New order</a></li>
                          <li><a href="#" class="shipping">Shipments</a></li>
                            <li><a href="#" class="invoices">Invoices</a></li>
                        </ul>
                    </li>-->
                    <li><h3><a href="#" class="manage">Manage </a></h3>
          				<ul>
                            <li><a href="#" class="useradd">Patients</a></li>
                            <li><a href="#" class="useradd">Doctor</a></li>
                            <!--<li><a href="#" class="folder">Product categories</a></li>
            				<li><a href="#" class="promotions">Promotions</a></li>-->
                        </ul>
                    </li>
                  <li><h3><a href="#" class="user">Forum</a></h3>
          				<ul>
                            <li><a href="#" class="group">Doctor -Patient Forum</a></li>
                            <li><a href="#" class="group">Doctor -Doctor Forum</a></li>
            				 <!--<li><a href="#" class="search">Find user</a></li>
                           <li><a href="#" class="online">Users online</a></li>-->
                        </ul>
                    </li>
				</ul>  
				<h4><a href="#" class="user" style="padding-left:20px">Account</a></h4>
          				<ul>
                          
                           <li><a href="logout.php" style="padding-left:20px" ><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" />Logout</a></li>
                           <!-- <li><a href="#" class="online">Users online</a></li>-->
                        </ul>
                    </li>
				</ul>            
          </div>
      </div>
        <div id="footer">
        <div id="credits">
   		Template by <a href="http://www.emerginglabsonline.com">Emerging Labs</a>
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
<?php }else{
header('Location:login.php');

}?>
