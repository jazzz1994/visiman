var update  = document.querySelector("#upattend");
console.log(update);
update.style.display = "none";

var btn      = document.querySelector("#view");
var sclass   = document.querySelector("#class_name");
var date     = document.querySelector('#date');



btn.onclick = function(){

  var selected = document.querySelector("#stud_attend");
  var classvalue = sclass.value;
  var datevalue  = date.value;
  console.log(selected);
  if(update.style.display =="none"){
  update.style.display = "block";
  }


	  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

         xmlhttp=new XMLHttpRequest();

     } else {// code for IE6, IE5

         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

     }




 	xmlhttp.onreadystatechange=function() {
 		if(xmlhttp.status==200 && xmlhttp.readyState==4){
 			document.getElementById("stud_attend").innerHTML = xmlhttp.responseText;

 		}
 	}
  console.log(xmlhttp.responseText);
 	 xmlhttp.open("GET","../hiddenajx/viewAttend.php?class="+classvalue+"&date="+datevalue);
 	 xmlhttp.send();
}
