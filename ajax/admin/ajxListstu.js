var sclass  = document.querySelector("#class_name");



sclass.onchange = function(){
	var classvalue = sclass.value;

	  if(classvalue==""){
			location.reload();
		}
	  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

         xmlhttp=new XMLHttpRequest();

     } else {// code for IE6, IE5

         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

     }




 	xmlhttp.onreadystatechange=function() {
 		if(xmlhttp.status==200 && xmlhttp.readyState==4){
 			document.getElementById("stud_list").innerHTML = xmlhttp.responseText;
 		}
 	}

 	 xmlhttp.open("GET","../hiddenajx/getStudent.php?class="+classvalue);
 	 xmlhttp.send();
}
