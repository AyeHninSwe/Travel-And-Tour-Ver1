<?php
session_start();

$name=$_POST["name"];
$gender=$_POST["gender"];
$emailphone=$_POST["emailphone"];
$password=$_POST["password"];
$conpassword=$_POST["conpassword"];
include("db.php");
$response="";
if($password==$conpassword){

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
$response.="Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
/*else
{
if (file_exists("upload/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}*/
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "CustImg/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
/*echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/

$filename=$_FILES["file"]["name"];

  
$query="select * from customer";
	$ret=mysqli_query($con,$query);
		$num_result=mysqli_num_rows($ret);
		$b=true;
		for($i=0;$i<$num_result;$i++)
		{
			$row=mysqli_fetch_array($ret);
			if($row["EmailOrPhone"]==$emailphone)
			{
				$b= $b && false; 
			}
		}

	if ($b)
	{
		$inquery="INSERT INTO customer(Name,Password,EmailOrPhone,Gender,Picture) 
		VALUES('$name','$password','$emailphone','$gender','$filename')";
 		$rst=mysqli_query($con,$inquery);
    	if($rst){
        	$response.="Welcome ".$name;
			
    	}	
    	else 
       	{
           	$response.="<p>Something went wrong: ". mysqli_error($con) + "</p>";
       	}
    	
	}
	else
	{
		$response.="Invalid Email";
		
	}
}
}
}
else
{
$response.="<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
else{
	$response.="Your passwords are not same!!";	
}

$getId="select * from customer where EmailOrPhone='$emailphone'";
$retId=mysqli_query($con,$getId);
$resultId=mysqli_fetch_array($retId);
$_SESSION["Id"]=$resultId["CustomerId"];

mysqli_close($con);
echo $response; 
?>