var btn      = document.querySelector("#view");
var sclass   = document.querySelector("#class_name");
var date     = document.querySelector('#date');
console.log(sclass);
console.log(date);

btn.onclick = function(){

  var selected = document.querySelector("#stud_topic");
  var classvalue = sclass.value;
  var datevalue  = date.value;
  console.log(selected);
  console.log(classvalue);
  console.log(datevalue);


	  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

         xmlhttp=new XMLHttpRequest();

     } else {// code for IE6, IE5

         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

     }




 	xmlhttp.onreadystatechange=function() {
 		if(xmlhttp.status==200 && xmlhttp.readyState==4){
 			document.getElementById("stud_topic").innerHTML = xmlhttp.responseText;

 		}
 	}
  console.log(xmlhttp.responseText);
 	 xmlhttp.open("GET","../hiddenajx/viewDairy.php?class="+classvalue+"&date="+datevalue);
 	 xmlhttp.send();
}
