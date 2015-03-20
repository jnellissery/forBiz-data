<html>

<body>



<form action="uploadimage.php" method="post"

enctype="multipart/form-data">

<label for="file">Filename:</label>

<input type="file" name="file" id="file" />

<br />

<input type="submit" name="submit" value="Submit" />

</form>



</body>

</html> 



PHP is now:



<?php
if ( isset($_POST["submit"]) )
{	
$allowedExts = array("jpg", "jpeg", "gif", "png");

$extension = end(explode(".", $_FILES["file"]["name"]));




  {

  if ($_FILES["file"]["error"] > 0)

    {

    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

    }

  else

    {

    echo "Upload: " . $_FILES["file"]["name"] . "<br />";

    echo "Type: " . $_FILES["file"]["type"] . "<br />";

    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";



    if (file_exists("images/" . $_FILES["file"]["name"]))

      {

      echo $_FILES["file"]["name"] . " already exists. ";

      }

    else

      {
		echo "testing   " .$_FILES["file"]["tmp_name"] .'    ' .$_FILES["file"]["name"]."</br>";
      move_uploaded_file($_FILES["file"]["tmp_name"], "Images/".$_FILES["file"]["name"]);

      echo "Stored in: " . "images/" . $_FILES["file"]["name"];

      }

    }

  }

}

?>