<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"/>
<script type="text/javascript" src="loginAjax.js"></script>   
</head>
<body>
<!--<form name='myForm'>
Max Age: <input type='text' id='age' /> 
<br />
Max WPM: <input type='text' id='wpm' />
<br />
Sex: <select id='sex'>
		<option value="m">m</option>
		<option value="f">f</option>
	 </select>
<input type='button' onclick='ajaxFunction()' value='Query MySQL'/> 
</form>-->
<center><div class="centerPage" style="height:350px; padding:16px"><br>
<form name="myForm">
<table cellpadding="16px">

	<tr>
    	<td>Login as : <br>
        <input type="radio" name="clientType" <?php if (isset($clientType) && $clientType=="customer") echo "checked";?> value="customer">Normal User <br>
  		<input type="radio" name="clientType" <?php if (isset($clientType) && $clientType=="agency") echo "checked";?> value="agency">Travel Agency
        </td>
    </tr>
	<tr>
		<td><input type="text" id="gop" placeholder="email or phone" required><br></td>
		
	</tr>
    
    <tr>
		<td><input type="password" id="password" placeholder="password" required><br></td>
    </tr>
	
	
    <tr align="center">

		<td><input type="submit" onClick="ajaxFunction()" value="Login" class="buttons"></td>
    </tr>
    <tr align="right">

		<td id="td"><a href="forgetPassword.php">Forgot Password?</a></td>
     </tr>
    
	   </table>
</form></div></center>
<div id='ajaxDiv'></div>
</body>
</html>



