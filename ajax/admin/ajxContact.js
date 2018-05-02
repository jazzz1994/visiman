


var sclass  = document.querySelector("#class_name");

function check(){
   var scheck       = document.querySelector("#firstCheck");
   var selectall    = document.querySelectorAll("input[name='parent[]']");

  for(var i=0; i<selectall.length;i++){
    if(scheck.checked == true){
     selectall[i].checked = true;
     }
     if(scheck.checked == false){
       selectall[i].checked =false;

     }
}
}


sclass.onchange = function(){
	var classvalue = sclass.value;

	  // if(classvalue==""){
		// 	// location.reload();
		// }
	  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

         xmlhttp=new XMLHttpRequest();

     } else {// code for IE6, IE5

         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

     }




 	xmlhttp.onreadystatechange=function() {
 		if(xmlhttp.status==200 && xmlhttp.readyState==4){
 			document.getElementById("contact_list").innerHTML = xmlhttp.responseText;
 		}
 	}

 	 xmlhttp.open("GET","../hiddenajx/getContact.php?class="+classvalue);
 	 xmlhttp.send();
}
