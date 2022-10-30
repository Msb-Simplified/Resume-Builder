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

     $("#accountschangemodalbtn").click(function(){
         var base = "loadResumeData";
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
            }else if(base=="loadResumeData"){
               // console.log(response);
               $('.accountsdiv').html("");

               response.forEach(element => {
                  accountsPrint(element);
               });
               $('#editaccounts').modal('toggle');
            } 
         }, 500);
       }
   });
}

function accountsPrint(element){
   var data = "";
   data += '<div class="form-group">'+
     '<div class="input-group">'+
        '<div class="input-group-prepend">'+
           '<div class="input-group-text">'+
              '<span class="fas fa-solid fa-user-graduate"></span>'+
           '</div>'+
        '</div>'+
        '<input value="'+ element.accountname+'"class="form-control" id="profile-accounts-input" type="text" placeholder="github">'+
        '<input value='+ element.accounthandler +' class="form-control" id="profile-accounts-input" type="text" placeholder="ShishirBhuiyan">'+
        '<div class="input-group-append">'+
           '<div class="input-group-text bg-success" style="cursor:pointer;">'+
              '<span class="fas fa-check"></span>&nbsp;'+
           '</div>'+
           '<div class="input-group-text bg-warning" style="cursor:pointer;">'+
              '<span class="fas fa-edit ml-1 "></span>'+
           '</div>'+
           '<div class="input-group-text bg-danger" style="cursor:pointer;"onclick="deleteAccount('+element.id+')">'+
              '<span class="fas fa-trash ml-1 "></span>'+
           '</div>'+
        '</div>'+
     '</div>'+
  '</div>';
  $('.accountsdiv').append(data);
}


function deleteAccount(accountId){
   var jsonTest = {
      id: accountId,
      cvid:$("#cvid").val()
   };

   var datas = JSON.stringify(jsonTest);

   $.ajax({
       type: "POST",
       url:"accountDelete",
       data: datas,
       cache: false,
       dataType: "json",
       contentType: "application/json; charset=utf-8",
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       beforeSend: function () {
           $("#loader").css({ display: "block" });
       },
       success: function (response) {
         $('.accountsdiv').html("");
         response.forEach(element => {
            accountsPrint(element);
         });
         toastr.success("Deleted");
         setTimeout(() => {
            $("#loader").css({ display: "none" })
         }, 1000);

       }
   });

}

 

