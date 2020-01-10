<?php
session_start();
$CustId=$_SESSION["Id"];
$PackageId=$_SESSION["AgencyId"];
$description=$_POST["description"];
$reviewType=1;
if(isset($_POST["rating"]))
{
	$description="{ ".$_POST["rating"]." }\t".$description;
}
	$host="localhost";
    $user="root";
    $pass="";
    $database="traveldb";
    $connection=mysqli_connect($host,$user,$pass)or die("Couldn't connect to datbase");
    mysqli_select_db($connection,$database);
	$query="INSERT INTO reviews(ReviewTypeId,CustomerId,PackageOrAgencyId,Description) VALUES
	       ('$reviewType','$CustId','$PackageId','$description')";
    $ret=mysqli_query($connection,$query);
	if($ret) 
		{
			echo "Review is posted!";
		}
   	 else 
		{
            echo "<p>Something went wrong: ". mysqli_error($connection)."</p>";
		}
    mysqli_close($connection);
?>