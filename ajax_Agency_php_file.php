<?php
session_start();
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
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
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000)&& in_array($file_extension, $validextensions)) {
			if ($_FILES["file"]["error"] > 0)
			{
				$response.="Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}

		else
		{
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "agencyImg/".$_FILES['file']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file


			$filename=$_FILES["file"]["name"];

  
			$query="select * from agency";
			$ret=mysqli_query($con,$query);
			$num_result=mysqli_num_rows($ret);
			$b=true;
			for($i=0;$i<$num_result;$i++)
			{
				$row=mysqli_fetch_array($ret);
				if($row["Email"]==$email&&$phone==$row["Phone"])
				{
					$b= $b && false; 
				}
			}

			if ($b)
			{
				$inquery="INSERT INTO Agency(Name,Address,Email,Phone,Password,Picture) 
				VALUES('$name','$address','$email','$phone','$password','$filename')";
 				$rst=mysqli_query($con,$inquery);
    			if($rst){
        			$response.="Welcome";
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
	$response.='Your passwords are not same!!';	
}

$getId="select * from Agency where Email='$email' and Phone='$phone'";
$retId=mysqli_query($con,$getId);
$resultId=mysqli_fetch_array($retId);
$_SESSION["Id"]=$resultId["AgencyId"];

mysqli_close($con);
echo $response; 
?>