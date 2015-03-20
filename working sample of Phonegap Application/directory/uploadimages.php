<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="uploadimages.php" method="post"  enctype="multipart/form-data">
<input type="file" name="file" id="file" />

<input type="submit" name="submit" value="submit"  />

</form>
</body>
</html>

<?php 

if (isset($_POST["submit"]))

	{
	
	if ($_FILES["file"]["error"] >0) 
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		
		}
		else
		{
		if (file_exists("services/images/".$_FILES["file"]["name"]))
			{
				echo "the file with   this name is already Existing!!!";
			}
		else
			{
			move_uploaded_file($_FILES["file"]["tmp_name"],"services/images/".$_FILES["file"]["name"]);
				echo "Successfully Uploaded image!!!";
			}	
		}
	}


?>