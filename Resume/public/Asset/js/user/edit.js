$(document).ready(function () {
      $(".closemodalbtn").click(function(){
         $('.summernote').summernote('code','');
      });


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

function resetForm($form) {
   $form.find('input:text, input:password, input:file, select, textarea').val('');
   $form.find('input:radio, input:checkbox')
        .removeAttr('checked').removeAttr('selected');
}


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
               $('.aboutfield').summernote('code',response.about);
               $('#editabout').modal('toggle');
            }else if(base=="getAddress"){
               $('.addressfield').summernote('code',response.address);
               $('#editaddress').modal('toggle');
            }
            
         }, 500);
       }
   });
}