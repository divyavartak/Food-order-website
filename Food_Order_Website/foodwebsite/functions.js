
function bigImg(x) {
  x.height = 190;
  x.width =190 ;
}
function normalImg(x) {
  x.height = 160;
  x.width =160 ;
 
}
function popupview(){
  x=document.getElementById("popup1");
  y=document.getElementsByClassName("close")[0];
  y.onclick = function() {
    x.style.display = "none";
  }
  
  x.style.display="block";
 
}

