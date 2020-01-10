<?php
session_start();
$description=$_POST['txtAreaPost'];
$Tripname=$_POST['tripName'];
$price=$_POST['price'];
$duration=$_POST['duration'];
echo $price;
$Id=$_SESSION["Id"];

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
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
/*else
{
if (file_exists("uploads/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}*/
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "uploads/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

$name=$_FILES["file"]["name"];
			   /*$type=$_FILES["file"]["type"];
				$size=$_FILES["file"]["size"] / 1024;
				$temp_name=$_FILES["file"]["tmp_name"];*/
				  
$date= date("Y/m/d");
 //for post date

include("imagedb.php");
    	/*$query="INSERT INTO PostImages(url,CustomerId) VALUES
	       ('$name','$Id')";
    	$ret=mysqli_query($con,$query);*/
		$query="INSERT INTO package(Name,AgencyId,Price,Description,Picture,Duration,PackageDate) VALUES
	       ('$Tripname','$Id','$price','$description','$name','$duration','$date')";
    	$ret1=mysqli_query($con,$query);
   	 	if($ret1) 
		{
			echo '<script>alert("Your package is posted!");
			window.location.href="createPackageGUI.php";</script>';
		}
   	 	else 
		{
            			echo "<p>Something went wrong: ". mysqli_error($con)."</p>";
		}
		
		
    	mysqli_close($con);

}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}



?>