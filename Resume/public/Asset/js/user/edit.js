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
         var base = "getAbout";
         editCv(base);
     });

     $("#addresschangemodalbtn").click(function(){
      //   $('#editaddress').modal('toggle');
        var base = "getAddress";
        editCv(base);
     });
     
     $(".submit-Form-With-Js").click(function(e){
        e.preventDefault();
        $("#loader").css({ display: "block" });
        setTimeout(() => {
          $(this).closest("form").submit();
        }, 1100);
     });
     
});


function editCv(base){
   var url = base+"/"+$("#cvid").val();
   $.ajax({
       type: 'GET',
       url: url,
       dataType: "json",
       beforeSend: function () {
           $("#loader").css({ display: "block" });
       },
       success: function (response) {
         setTimeout(() => {
            $("#loader").css({ display: "none" });

            if(base=="getAbout"){
               $('.aboutfield').summernote('pasteHTML',response.about);
               $('#editabout').modal('toggle');
            }else if(base=="getAddress"){
               $('.addressfield').summernote('pasteHTML',response.address);
               $('#editaddress').modal('toggle');
            }
            
         }, 500);
       }
   });
}