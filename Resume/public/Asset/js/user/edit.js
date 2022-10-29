$(document).ready(function () {
     $("#profileimage").click(function(){
        $('#editimage').modal('toggle');
     });
     $("#namechangemodalbtn").click(function(){
        $('#editname').modal('toggle');
     });
     $("#titlechangemodalbtn").click(function(){
        $('#edittitle').modal('toggle');
     });
     $("#aboutchangemodalbtn").click(function(){
         var url = "getAbout/"+$("#cvid").val();
         editCv(url);
     });

     $("#aboutchangemodalbtn").click(function(){
        $('#editabout').modal('toggle');
     });

     $("#addresschangemodalbtn").click(function(){
      $('#editaddress').modal('toggle');
     });
     $(".submit-Form-With-Js").click(function(e){
        e.preventDefault();
        $("#loader").css({ display: "block" });
        setTimeout(() => {
          $(this).closest("form").submit();
        }, 1100);
     });
     
});


function editCv(url){
   $.ajax({
       type: 'GET',
       url: url,
       dataType: "json",
       beforeSend: function () {
         //   $("#loader").css({ display: "block" });
       },
       success: function (response) {
         $('#aboutsummernote').summernote('pasteHTML',response.about)
         $('#editabout').modal('toggle');
       }
   });
}