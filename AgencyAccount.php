<?php
	session_start();
	$id=$_SESSION["Id"];
	
	include("Accountdb.php");
    	$query="Select * from agency where AgencyId='".$id."'";
    	$ret=mysqli_query($con,$query);
    	$num_rows= mysqli_fetch_assoc($ret);
		$pic=$num_rows['Picture'];
		$name=$num_rows['Name'];
		$email=$num_rows['Email'];
		$phone=$num_rows['Phone'];
		$address=$num_rows['Address'];
		$pwd=$num_rows['Password'];
		
    	mysqli_close($con);
?>


<html>
<head>
	<title>Save As Agency</title>
    <link rel="stylesheet" type="text/css" href="design.css"/>
</head>
<body><center><div class="centerPage">
	<form action="UpdateAgencyAccount.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="2" align="center">
					<figure><img src="<?php echo "AgencyImg/".$pic ?>" width="100px" height="150px" /><figcaption></figcaption></figure>
				</td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $name ?>" /></td>
			</tr>
            <tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $email ?>" /></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input type="text" name="phone" value="<?php echo $phone ?>" /> </td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea rows="5" cols="15" name="address" required><?php echo $address ?></textarea></td>
			</tr>
           	<tr>
				<td>Password:</td>
				<td><input type="text" name="password" value="<?php echo $pwd ?>" required /></td>
			</tr>
            <tr>
               	<td></td>
               	<td align="left"><br><input type="submit" name="save" value="Save" class="buttons"/></td>
           	</tr>
        </table>
	</form></div></center>
</body>
</html>
