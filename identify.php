<?php
$phOrmail= $_POST['phoneOrMail'];
session_start();
		$host="localhost";
  		$user="root";
  		$pass="";
  		$db="traveldb";
  		$con=mysqli_connect($host,$user,$pass) or die("Couldn�t connect to datbase");
  		mysqli_select_db($con,$db);
  
  		$query1="Select * 
  			from agency 
			where Email='".$phOrmail."'
			or Phone='".$phOrmail."'";
		$result=mysqli_query($con,$query1);	
		$num_rows= mysqli_fetch_assoc($result);
		$name1=$num_rows['Name'];
		$agencyId=$num_rows['AgencyId'];
		$_SESSION['agencyId']=$agencyId;	
		
		$query2="Select * 
  			from customer 
			where EmailOrPhone='".$phOrmail."'";
		$result2=mysqli_query($con,$query2);	
		$num_rows2= mysqli_fetch_assoc($result2);
		$name2=$num_rows2['Name'];
		$custId=$num_rows2['CustomerId'];
		$_SESSION['custId']=$custId;
				
echo '<html>
	<style>
	
	#tb{border: 1px solid #09F;
	border-radius:20px;
	text-align:left;
	width:35%;
	height:40%;
	padding:20px;
	}
	tr.bb td {
	border-bottom:1pt solid #09F;
	}
	tr.wh td {
	border-bottom:1pt solid #09F;
	}
	
	#wh{	
	height: 100px;
    vertical-align: top;
	font-size:20px;
	font-family:Palatino Linotype;
	}
	#font{
		
		font-size:25px;
		font-family:Georgia;	
		}
	#button{
		
		background-color:#09F;}
	</style>
	
	<body>
	<form action="changePass.php" method="post" enctype="multipart/form-data">
		<table id="tb" align="center">
		<tr class="bb">
		<td id="font">Choose Your Account</td>
		</tr>
		
		<tr>
		<td>This account matched your search.</td>
		</tr>';
		if($num_rows==true)
		{
		echo "<tr id='wh' class='wh'>";
		echo "<td>" . $name1 . "</td>";
		echo "</tr>";
		}
		else if($num_rows2==true){
		echo "<tr id='wh' class='wh'>";
		echo "<td >" . $name2 . "</td>";		
		echo "</tr>";
		}
		else{
		echo "<tr id='wh' class='wh'>";
		echo "<td>Your account is not found</td>";
		echo "</tr>";
		}	
		
		 		
echo 	'<tr align="right">
		<td><input type="submit" name="changepass" value="Continue" id="button">&nbsp;&nbsp;&nbsp;
		<a href="forgetPassword.php"><input type="button" name="back" value="Back" id="button"></a></td>
		</tr>';
	
		

mysqli_close($con);
?>