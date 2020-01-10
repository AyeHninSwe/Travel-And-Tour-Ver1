function orderFunction(){
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

  ajaxRequest.onreadystatechange = function(){
 if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 var checkInDate = document.getElementById('txtdate').value;
 ajaxRequest.open("GET", "book.php?checkInDate=" + checkInDate, true);  ajaxRequest.send(null); 
}