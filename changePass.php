<?php
session_start();
$agencyId=$_SESSION['agencyId'];
$custId=$_SESSION['custId'];
//echo $custId;
//echo $agencyId;

	include("ChangePassDb.php");
	
		$query1="Select * from agency where AgencyId='".$agencyId."'" ;
		$result=mysqli_query($con,$query1);	
		$num_rows= mysqli_fetch_assoc($result);
		$emailOrPhone1=$num_rows['Email'];
		$emailOrPhone1=$num_rows['Phone'];
		//echo $emailOrPhone1;
		$_SESSION['emailOrPhone1']=$emailOrPhone1;
		
		
		
		$query2="Select * from customer where CustomerId='".$custId."'" ;
		$result2=mysqli_query($con,$query2);	
		$num_rows2= mysqli_fetch_assoc($result2);
		$emailOrPhone2=$num_rows2['EmailOrPhone'];
		//echo $emailOrPhone2;
		$_SESSION['emailOrPhone2']=$emailOrPhone2;
?>

<html>
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
		
	#font{
		
		font-size:25px;
		font-family:Georgia;	
		}
	#button{
		
		background-color:#09F;}
	</style>
<body>
	<form action="successfulChange.php" method="post" enctype="multipart/form-data"  id="ChangePass">
    <center>
    	<table id="tb">
        	<tr class="bb">
            <td id="font">Choose a new password</td>
            </tr>
            
            <tr>
            <td>A strong password is a combination of letters and panctuation marks.</td>
            </tr>
            
            <tr class="bb">
            <td>New Password &nbsp;&nbsp;
            	<input type="password" name="pass" placeholder="new password" required="required" />
            </td>
            </tr>
            
            <tr align="right">
            <td><input type="submit" name="continue" value="Continue" id="button">
            
            </td>
            </tr>
        </table>
        </center>
    </form>

</body>
</html>

