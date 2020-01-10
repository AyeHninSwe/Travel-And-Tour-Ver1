<?php
	session_start();
	$id=$_SESSION["Id"];
	
	include("Accountdb.php");
    	$query="Select * from customer where CustomerId='".$id."'";
    	$ret=mysqli_query($con,$query);
    	$num_rows= mysqli_fetch_assoc($ret);
		$pic=$num_rows['Picture'];
		$name=$num_rows['Name'];
		$EmailOrPhone=$num_rows['EmailOrPhone'];
		$gender=$num_rows['Gender'];
		$pwd=$num_rows['Password'];
		
    	mysqli_close($con);
?>

<html>
<head>
	<title>Save As Customer</title>
    <link rel="stylesheet" type="text/css" href="design.css"/>
</head>
<body><center><div class="centerPage">
	<form action="UpdateCustAccount.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="2" align="center">
					<figure><img src="<?php echo "CustImg/".$pic ?>" width="100px" height="150px" /><figcaption></figcaption></figure>
				</td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $name ?>" /></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="text" name="gender" value="<?php echo $gender ?>"></td>
			</tr>
           	<tr>
				<td>Email or Phone:</td>
				<td><input type="text" name="ephone" value="<?php echo $EmailOrPhone ?>" required/></td>
			</tr>
           	<tr>
				<td>Password:</td>
				<td><input type="text" name="password" value="<?php echo $pwd ?>" required/></td>
			</tr>
           	<tr>
               	<td></td>
               	<td align="left"><br><input type="submit" name="save" value="Save" class="buttons"/></td>
      	 	</tr>
        </table>
	</form>
    </div></center>
</body>
</html>
