<?php
session_start();
$phOrmail1=$_SESSION['emailOrPhone1'];
$phOrmail2=$_SESSION['emailOrPhone2'];
//echo $phOrmail2;
$password=$_POST['pass'];
//echo $password;
//echo $password;
//echo $phOrmail1;
//echo $phOrmail2;

include("ChangePassDb.php");
	
		$query1="UPDATE agency SET Password='".$password."' WHERE Email='".$phOrmail1."' OR Phone='".$phOrmail1."' ";
		$result=mysqli_query($con,$query1);	
		//$num_rows= mysqli_fetch_assoc($result);
		if($result) 
			{
				echo '<script>alert("Your password successfully changes!! Please login again!");
				window.location.href="login.php";</script>';
			}
    		else 
			{
           			 echo "<p>fail: ". mysqli_error($con)."</p>";
			}
		
		
		$query2="UPDATE customer SET Password='".$password."' WHERE EmailOrPhone='".$phOrmail2."' ";
		$result2=mysqli_query($con,$query2);	
		//$num_rows2= mysqli_fetch_assoc($result2);
		if($result2) 
			{
				echo '<script>alert("Your password successfully changes!! Please login again!");
				window.location.href="login.php";</script>';
			}
    		else 
			{
           			 echo "<p>fail: ". mysqli_error($con)."</p>";
			}



?>