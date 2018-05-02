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
