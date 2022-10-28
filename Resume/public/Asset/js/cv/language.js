$(document).ready(function () {
  
   $("#selectmanylanguage").click(function () {
      var languageArray = $('.lang-select option:selected')
      .toArray().map(item => item.text);
      JsonObject = JSON.stringify(languageArray);
      
      var data = {
        'language':JsonObject,
        'cvid':   $("#cvid").val(),
        'user_id':   $("#userid").val(),
      }

      $.ajax({
          type: "POST",
          url: "languageadd",
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

