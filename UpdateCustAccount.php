<?php 
    session_start();
	$id=$_SESSION['Id'];
	$name=$_POST["name"];
	$EmailOrPhone=$_POST["ephone"];
	$gender=$_POST["gender"];
	$pwd=$_POST["password"];
	include("Accountdb.php");
	$query="UPDATE Customer SET Name='$name',Password='$pwd',EmailOrPhone='$EmailOrPhone',Gender='$gender' WHERE CustomerId=$id";
    $ret=mysqli_query($con,$query);
   	if($ret) 
	{
			echo '<script>alert("Successfully Updated!");
			window.location.href="CustAccount.php";</script>';
	}
    else 
	{
           			 echo "<p>fail: ". mysqli_error($con)."</p>";
	}
    mysqli_close($con);

?>
