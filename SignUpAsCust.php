<html>
<head>
	<title>Sign Up As Customer</title>
	<link rel="stylesheet" href="design.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="Custscript.js"></script>
</head>
<body style="overflow-y:scroll;">
	<form id="uploadimage" action="" enctype="multipart/form-data">
		<table cellspacing="8px">
			<tr>
				<td colspan="2" align="center">
					<div class="avatar-zone2" id="image_preview">
					<img id="previewing" src="noimage.png" /></div>
					
					<input type="file" class="upload_btn" name="file" id="file" required />
					<div class="overlay-layer2" id="selectImage">Select Photo </div>
					<br><br>
				</td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" id="m" value='Male'>
						<label for="m">Male</label>
			       		<input type="radio" name="gender" id="f" value='Female'>
		    			<label for="f">Female</label> 
				</td>
			</tr>
            <tr>
				<td>Email or Phone:</td>
				<td><input type="text" name="emailphone" required autofocus /></td>
			</tr>
            <tr> 
				<td>Password:</td>
				<td><input type="password" name="password" id="password" required /></td>
			</tr>
            <tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="conpassword"  id="confirm_password" required /></td>
			</tr>
            <tr>
                <td colspan="2" align="center"><br>
                	<input type="submit" name="post" value="Sign Up" class="buttons"/>
                </td>
           	</tr>
        </table>
	</form>
	<h4 id='loading' >loading..</h4>
	<div id="message"></div>
</body>
</html>
