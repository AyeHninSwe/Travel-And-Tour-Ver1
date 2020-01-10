<?php
	session_start();
	$name=$_SESSION["Name"];
?>
<html>
<head>
	<title>Create Package Page</title>
    <link rel="stylesheet" type="text/css" href="design.css"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="ImagePackage.js"></script>

</head>
<body style="overflow-y: scroll;">
  <form  action="" enctype="multipart/form-data" id="uploadimage">
  <table border="0" cellspacing="12px">
  	<tr>
        	<td><h2><b><?php echo $name;?></b></h2></td>
        </tr>
  	<tr>
  		<td colspan="2"><div class="avatar-zone2" id="image_preview">
            	<img id="previewing" src="noimage.png">
            	 </div>   
 				<input type="file" class="upload_btn" name="file" id="file" multiple>
    			<div class="overlay-layer2">Photos/Videos</div><br><br>
        </td>
  		
  	</tr>
  	<tr>
  		<td><br>Trip Name:</td>
  		<td><input type="text" name="tripName" size="50"></td>
  	</tr>
  	<tr>
  		<td>Price:</td>
  		<td><input type="text" name="price" size="50"></td>
  	</tr>
  	<tr>
  		<td>Duration:</td>
  		<td><input type="text" size="50" name="duration"></td>
  	</tr>
  	<tr>
  		<td colspan="2"><br>
  		<font size="+3" face="Times New Roman, Times, serif"><textarea placeholder="Description..." rows="20" cols="100" name="txtAreaPost"></textarea></font></td>
  	</tr>
  	<tr>
  		
  		<td colspan="2" align="center"><br><input class="buttons" type="submit" name="post" value="Create"></td>
  	</tr>
  </table><br>
  </form>
 <h4 id='loading' >loading..</h4>
<div id="message"></div>
</body>
</html>