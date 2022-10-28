$(document).ready(function () {


});


function heightcheck() 
{ 
    var cvheight = $("#cvwrapper").height();
    if(cvheight > 1100){
      $("#cvwrapper").css({'border':'5px solid red','background-color':'red'});
    
    }else{
      $("#cvwrapper").css({'border':'5px solid green','background-color':'white'});
    }
    return false;
}


