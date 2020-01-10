<?php 
    session_start();
	$id=$_SESSION['Id'];
	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$address=$_POST["address"];
	$pwd=$_POST["password"];
	
	
	include("Accountdb.php");
	$query="UPDATE Agency SET Name='$name',Address='$address',Email='$email',Phone='$phone',Password='$pwd' WHERE AgencyId=$id";
    $ret=mysqli_query($con,$query);
   	if($ret) 
	{
			echo '<script>alert("Successfully Updated!");
			window.location.href="AgencyAccount.php";</script>';
	}
    else 
	{
           			 echo "<p>fail: ". mysqli_error($con)."</p>";
	}
    mysqli_close($con);

?>
