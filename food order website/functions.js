
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

/*
var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('total');
var gtotal=document.getElementById('gtotal');

function subTotal()
{
for(i=0;i<iprice.length;i++){
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

 gt=gt+(iprice[i].value)*(iquantity[i].value);
}
gtotal.innerText=gt;
}
subTotal();

*/



