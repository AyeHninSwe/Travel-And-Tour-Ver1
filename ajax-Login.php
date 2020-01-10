<?php
session_start();
$host="localhost";
  $user="root";
  $pass="";
  $db="traveldb";
  $con=mysqli_connect($host,$user,$pass) or die("Couldn?t connect to datbase");
  mysqli_select_db($con,$db);
$gop = $_GET['gop'];
$password = $_GET['password'];

/*// Escape User Input to help prevent SQL Injection
$gop = mysqli_real_escape_string($gop);
$password = mysqli_real_escape_string($password);*/
//for agency
  $query1="Select * 
  			from agency 
			where Email='".$gop."'
			or Phone='".$gop."'
			and Password='".$password."'";
		$result=mysqli_query($con,$query1);	
		$num_rows= mysqli_fetch_assoc($result);
		
/*		$email=$num_rows['Email'];
 $phone=$num_rows['Phone'];
 $password=$num_rows['Password'];
 */
 
 //for customer
 $query2="Select * 
  			from customer 
			where EmailOrPhone='".$gop."'
			and Password='".$password."'";
		$result2=mysqli_query($con,$query2);	
		$num_rows2= mysqli_fetch_assoc($result2);
/*		
		$emailOrPhone2=$num_rows2['EmailOrPhone'];
 $password2=$num_rows2['Password'];*/
 
  if($num_rows==true){
	  //agency
	  $_SESSION["IsCust"]=false;
	  $_SESSION["Id"]=$num_rows['AgencyId'];
	  echo ("Login Success! Welcome ".$num_rows["Name"]);
	  /*if(confirm("Login Success!")){
			  welcomeAgency.php;
		}*/
	  /*link('ajax-Login.php','welcomeAgency.php');
	  header('Status: 301 Moved Permanently', false, 301); 
	  header('Location: welcomeAgency.php');
	  exit();*/
   }
   else if($num_rows2==true){
	   //customer
	   $_SESSION["IsCust"]=true;
	   $_SESSION["Id"]=$num_rows2['CustomerId'];
	   echo ("Login Success! Welcome ".$num_rows2["Name"]);
	  /*if(confirm("Login Success!")){
			  welcomeCust.php;
		}
		else{
		}*/
	   /*link('ajax-Login.php','welcomeAgency.php');
	   header('Status: 301 Moved Permanently', false, 301); 
	   header('Location: welcomeCust.php');
	   exit();*/
   }
   else if($num_rows==false && $num_rows2==false){
  		echo "Gmail or Phone or password is incorrect!";
   }
?>
