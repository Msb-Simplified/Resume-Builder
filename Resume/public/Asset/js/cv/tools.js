$(document).ready(function () {
  
    $("#selectmanytools").click(function () {
       var toolsArray = $('.tools-select option:selected')
       .toArray().map(item => item.text);
       JsonObject = JSON.stringify(toolsArray);
       
       var data = {
         'tools':JsonObject,
         'cvid':   $("#cvid").val()
       }
 
        $.ajax({
           type: "POST",
           url: "toolsadd",
           data: data,
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           beforeSend: function () {
               $("#loader").css({ display: "block" });
           },
           success: function (response) {
             console.log(response["message"]);
             if(response["alert"].includes("success")){
                toastr.success(response["message"]);
                setTimeout(() => {
                   window.location.href = "/makecv";
                }, 1500);
             }
           }
        });
   });
 
 
 });
 
 