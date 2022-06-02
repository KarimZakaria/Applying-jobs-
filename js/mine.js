/*
get methods in dom 
document.getElementById(""); 
document.getElementsByClassName(); 
document.getElementsByTagName(); 

document.querySelector(); 
document.querySelectorAll()



events in dom --> addEventListener

onclick 
onmousemove 
onmousedown
onmouseup 
onmousewheel

onkeydown 
onkeyup 
onkeypress 



attributes in dom 

style 
id 
classList





*/


var items = document.getElementsByClassName("myimg"); 
var overlay = document.querySelector(".back-box");
var slide = document.querySelector(".slide");
var close = document.querySelector(".ico-close");
var next = document.getElementById("next"); 
var prev = document.getElementById("prev"); 


var index=0; 


var myarray = []; 




for (var i = 0 ; i<items.length;i+=1)
    {
        
        myarray.push(items[i]); 
        
        items[i].addEventListener("click" , function(e){
        var temp =e.target.src; 
        overlay.classList.add("show")
        slide.style.backgroundImage="url("+temp+")";
        
        index=myarray.indexOf(e.target); 
        
        })
    }


close.onclick = function()
{
    overlay.classList.remove("show")
}

next.addEventListener("click" , function()
{
   ne()
})

function ne()
{
    index++; 
   index%=myarray.length; 
   var temp =myarray[index].src; 
   slide.style.backgroundImage="url("+temp+")";
}

function pre()
{
    index--; 
   if (index<0)
       index=myarray.length-1; 
   var temp =myarray[index].src; 
   slide.style.backgroundImage="url("+temp+")";
}

prev.addEventListener("click" , function()
{
   pre()
})

overlay.onclick = function(e)
{
    if (overlay==e.target)
        {
            overlay.classList.remove("show")
        }
}

document.addEventListener("keydown", function(e)
                         {
    if (e.keyCode==39)
        {
            ne()
        }
    if (e.keyCode==37)
        {
            pre(); 
        }
    if (e.keyCode==27)
        {
            overlay.classList.remove("show")
        }
})










