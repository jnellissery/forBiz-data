<?php

include 'PHPExcel/IOFactory.php';
require_once 'PHPExcel.php';
 if (isset($_POST['Save'])) //  Do  THE FOLLOWING WHEN BUTTON IS PRESSED
{
define("host",$_POST["host"]);
define("username",$userName=$_POST["userName"]);
define("password",$_POST["pass"]);
define("dbname",$_POST["dbName"]);
$con="";
		if(constant("host")=="" ||  constant("username") =="" ||  constant("password")=="" ||  constant("dbname")=="")
		{
			header('Location:MainLogin.php?Error=1');
			exit;
			
		}
               
                 if ($_FILES["fname"]["error"] > 0)
                {
                        echo "Error: " . $_FILES["fname"]["error"] . 
			"You have not selected a file or some other error <br />";
                }
                else
                {   
				$finfo = finfo_open(FILEINFO_MIME_TYPE); 
				$file_name=$_FILES["fname"]["name"]; 
				$file_type=$_FILES["fname"]["type"];
				if($file_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
						echo "Please the input file should be a .csv file";
				}
				else
				{       
					   $location="upload/"; 
				}
			 move_uploaded_file($_FILES["fname"]["tmp_name"],$location . $_FILES["fname"]["name"]);
			$inputFileName=$location . $_FILES["fname"]["name"];
				try
				 {
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				} 
				catch(Exception $e) 
				{
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
				}
				$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				$arrayCount = count($allDataInSheet); 
				$highestColumn = $objPHPExcel->getActiveSheet()->getHighestDataColumn();  
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
				 
				$columns=""; 
				$row = 1;
				for($col = 0; $col <= $highestColumnIndex-1; ++$col)
				{
				$columns.=trim( "`".$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $row)->getValue()."` varchar(100),");
				}
				$columns =substr($columns,0,strlen($columns)-1);
				$table="test";
				$create = "create table if not exists $table ($columns);";
				connect_db($create);
				for ($row=2 ;$row<=$arrayCount;$row++)
				{
					
					for($col = 0; $col <= $highestColumnIndex-1; ++$col)
					{
					$value.=trim( "'".$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $row)->getValue()."' ,");
					}
					
					$final.="(".substr($value,0,strlen($value)-1)."),";
					$value="";
				}
				$final=substr($final,0,strlen($final)-1);
				$sql ="insert into test values $final";
				connect_db($sql);
				echo "Successfully created test table and inserted data from Excel file!!!";
				header("location:search.php");
                }
}

?>
<?php
function connect_db($q)
{
        //  Please make changes : input your username and password 
			$host= constant("host");
			$username=constant("username");
			$password=constant("password");
			$dbname=constant("dbname");
       $con = mysqli_connect($host,$username,$password,$dbname);
        if (!$con)
        {
                die('Could not connect: ' . mysql_error());
        }
		else
		{
		 mysqli_query($con,$q) or die(mysqli_error($con));
		
		}
		mysqli_close($con);
}
?> 