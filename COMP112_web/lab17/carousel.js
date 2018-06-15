
var images = new Array("imageA.jpg","imageB.jpg","imageC.jpg","imageD.jpg");
var index= 0;

function goRight(){
 var img = document.getElementById("picture");
  index = index + 1;
  if(index == images.length){
   index = 0;
 }

 img.src = images[index];
}

 function goLeft(){
 var img = document.getElementById("picture");
  index = index - 1;
  if(index<0){
   index = images.length-1;
 }
 
 img.src = images[index];
}

function setup(){
 var leftArrow = document.getElementById("leftArrow");
 var rightArrow = document.getElementById("rightArrow");
 leftArrow.onclick = goLeft;
 rightArrow.onclick = goRight;
}

if (document.getElementById){
 window.onload = setup;
}



