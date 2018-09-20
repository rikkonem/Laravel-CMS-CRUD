/*
function show() {
    var x = document.getElementById("nav");
    if (x.style.display == "none") {
        x.style.display = "block";
    } else if(x.style.display == "block") {
        x.style.display = "none";
    }
}
*/

$(document).ready(function() {
   $(".user-name").click(function() {

       $("#nav").toggleClass("visible");

   });


});
