<?php
	session_start();
	$name=$_SESSION["Name"];
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href="design.css">
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="ImagePost.js"></script>
</head>
<body style="overflow-y: scroll;"><form action="" enctype="multipart/form-data" id="uploadimage">
	<table border="0">
    	<tr>
        	<td><h2><b><?php echo $name;?></b></h2></td>
        </tr>
    	<tr>
        	<td><font size="+3" face="Times New Roman, Times, serif"><textarea placeholder="What's on your mind?" rows="20" cols="200" name="txtAreaPost"></textarea></font></td>
        </tr>
        <tr>
       		<td> <br><div class="avatar-zone2" id="image_preview">
            	<img id="previewing" src="noimage.png" />
            	 </div>   
 				<input type="file" class="upload_btn" name="file" id="file" multiple />
    			<div class="overlay-layer2">Photos/Videos</div><br>
			</td>
		</tr>
        <tr align="center">
        	<td id="post"><input type="submit" name="post" value="Post" class="buttons"></td>
        </tr>
        
    </table>
</form>
<h4 id='loading' >loading..</h4>
<div id="message"></div>

</body>
</html>
