
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Data file</title>

<link rel="stylesheet" type="text/css" href="demo.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>


</head>

<body>

<div id="div-regForm">

<div class="form-title">Upload XML file</div>

<form id="regForm" action="add_data.php" method="post" enctype="multipart/form-data">

<table>
  <tbody>
  <tr>
    <td><label for="fname">Data File:</label></td>
    <td><div class="input-container"><input name="fname" id="fname" type="file" /></div></td>
  </tr>
  <tr>
    <td><label for="fname">Host Name:</label></td>
    <td><div class="input-container"><input name="host" id="host" type="text"  value="localhost"/></div></td>
  </tr>
  <tr>
    <td><label for="lname">Database Name:</label></td>
    <td><div class="input-container"><input name="dbName" id="dbName" type="text"  value="test"/></div></td>
  </tr>
  <tr>
    <td><label for="email">User Name:</label></td>
    <td><div class="input-container"><input name="userName" id="userName" type="text" /></div></td>
  </tr>
  <tr>
    <td><label for="pass">New Password:</label></td>
    <td><div class="input-container"><input name="pass" id="pass" type="password" /></div></td>
  </tr>
 
  <tr>
  <td>&nbsp;</td>
  <td><input type="submit" class="greenButton" value="Save"  name="Save" id="Save" /><img id="loading" src="img/ajax-loader.gif" alt="working.." />
	</td>
  </tr>
  
  
  </tbody>
</table>

</form>

<div id="error">

</div>

</div>

</body>
</html>
