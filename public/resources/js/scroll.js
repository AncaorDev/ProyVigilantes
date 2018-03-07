$(document).ready(function(){
  window.onscroll =  function(){
    var scroll = document.documentElement.scrollTop || document.body.scrollTop;
    console.log(scroll);
    var nav = document.getElementById("ncab");
    if (scroll >= 80) {   
      console.log("?");
      nav.classList.add("fixed");
      // console.log(nav.classList); 
    } else {
      nav.classList.remove("fixed");
    }
  }
});