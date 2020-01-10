<html>
<head>
<style>
	#bd{
    border-bottom: 1px solid #09F;
	}
	
	#font{
		font-size:20px;
		font-family:Georgia;	
		}
	#tb{border: 1px solid #09F;
	border-radius:30px;
	text-align:left;
	width:35%;
	height:50%;
	margin-left:20%;
	margin-right:25%;
	margin-top:10%;
	margin-bottom:25%;
	padding:20px;
	}
		
	
	input[type=text]{
    width: 50%;
    padding: 4px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #666;
    border-radius: 2px;
    box-sizing: border-box;
	}
	#button{background-color:#09F;
	text-decoration:none;}
</style>
</head>
<body>
<center>
<form action="identify.php" method="post">

<table id="tb">


<tr id="font">
 <td id="bd"><p>Find Your Account</p></td>
</tr>
<tr>
<td><p>Please enter your email address or phone number to search your account</p></td>
</tr>

<tr>
<td><input type="text" name="phoneOrMail" value="" placeholder="email or phone" required/></td>
</tr>

<tr align="right">
<td><input type="submit" value="Search" id="button">&nbsp;&nbsp;&nbsp;
	<input type="reset" value="Cancel" name="search" id="button"/></td>
</tr>

</table>
</form>

</center>

</body>
</html>
