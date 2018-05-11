var student = document.querySelectorAll(".outline"),
    btnstu  = document.querySelectorAll(".resp-tab-item");

console.log(btnstu);

console.log(student);
// console.log(btnstu);


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

}

student[0].style.display = "block";
student[1].style.display = "none";

btnstu[0].onclick = function(){
  student[0].style.display = "block";
  student[1].style.display = "none";
  document.querySelector("#defaultOpen1").click();
}
btnstu[1].onclick = function(){
  student[0].style.display = "none";
  student[1].style.display = "block";
  document.querySelector("#defaultOpen2").click();
}
// Get the element with id="defaultOpen" and click on it
document.querySelector("#defaultOpen1").click();





// var tile = document.querySelectorAll(".select"),
//     attendence = document.querySelector("#attendence"),
//     diary = document.querySelector("#diary"),
//     teacher = document.querySelector("#teacher");
//     payment =document.querySelector("#payment");
//
//     diary.style.display  = "none";
//     teacher.style.display  = "none";
//     attendence.style.display = "none";
//     payment.style.display = "none";
//     // location.href=#payment;
//
//
// console.log(tile);
// console.log(attendence);
// console.log(diary);
// console.log(teacher);
//
//
// tile[1].onclick = function(){
//    diary.style.display  = "none";
//    teacher.style.display  = "none";
//    attendence.style.display = "block";
//    payment.style.display = "none";
//
// }
// tile[2].onclick = function(){
//   teacher.style.display  = "none";
//   attendence.style.display = "none";
//   diary.style.display  = "block";
//   payment.style.display = "none";
//
// }
// tile[3].onclick = function(){
//
//   teacher.style.display  = "block";
//   attendence.style.display = "none";
//   diary.style.display  = "none";
//   payment.style.display = "none";
//
// }
// tile[4].onclick = function(){
//
//   teacher.style.display  = "none";
//   attendence.style.display = "none";
//   diary.style.display  = "none";
//   payment.style.display = "block";
//
// }


// resp-tab-active
