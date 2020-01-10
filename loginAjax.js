//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
try{
       // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
       // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
             // Something went wrong
         alert("Your browser broke!"); 
return false;
 }
        }
  }
// Create a function that will receive data 
 // sent from the server and will update
// div section in the same page.
ajaxRequest.onreadystatechange = function(){
 if(ajaxRequest.readyState == 4){
	 /*session_start(); 
	 var address=$_SESSION['Address'];*/
	 //var address=readCookie('Address');
//	 alert (address);
	var response=ajaxRequest.responseText;
	 
	 var radios = document.getElementsByName('clientType');
	
		for (var i = 0, length = radios.length; i < length; i++)
	{
 		if (radios[i].checked)
 		{
  // do whatever you want with the checked radio
  			if(radios[i].value=='agency'){
				if(response=='Gmail or Phone or password is incorrect!'){
					alert (response);
				}else{
				alert (response);
				 window.location = 'welcomeAgency.php';
				}
			}
			else if(radios[i].value=='customer'){
				if(response=='Gmail or Phone or password is incorrect!'){
					alert (response);
				}else{
					alert (response);
				window.location = 'welcomeCust.php';
				}
			}
			else{
				alert (response);
				}

  // only one radio can be logically checked, don't check the rest
  			break;
 		}
	}
	
		
	 
	 
	 /*//if(address!="")
	 
	 if(document.document.getElementsByName('clientType').value=='agency'){
		 window.location = 'welcomeAgency.php';
	 }
	 if(document.document.getElementsByName('clientType').value=='customer'){
		 window.location = 'welcomeCust.php';
	 }*/
	 	
	/* $(document.activeElement).bind('click', function () {
          document.getElementById("<%=txtsearch.ClientID %>").focus();
      });*/
	 /*if(address!=""){
		if (confirm('Your text here')) {
    		
		}
		else {
    
		} 
	 }
	 else{
		 alert (ajaxRequest.responseText);
	 }*/
	 
	 
      /*var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;*/
   }
 }
 
 // Now get the value from user and pass it to
// server script.
 var gop = document.getElementById('gop').value;
 var password = document.getElementById('password').value;
 var queryString = "?gop=" + gop ;
 queryString +=  "&password=" + password;
 //alert(queryString);
ajaxRequest.open("GET", "ajax-Login.php" + queryString, true);  ajaxRequest.send(null); 
}