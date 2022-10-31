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
     

     $("#langchangemodalbtn").click(function(){
         var base = "loadLanguage";
         editCv(base);
     });

     $("#addresschangemodalbtn").click(function(){
      //   $('#editaddress').modal('toggle');
        var base = "getAddress";
        editCv(base);
     });

     $(".AddAccountsbtn").click(function(){
         var jsonTest = {
            accountname:$("#accounts-name-field").val(),
            accounthandler:$("#accounts-handler-field").val(),
            cvid:$("#cvid").val()
         };
         var datas = JSON.stringify(jsonTest);
      
         $.ajax({
            type: "POST",
            url:"addAccount",
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
               $("#accounts-name-field").val("");
               $("#accounts-handler-field").val("")

               $('.accountsdiv').html("");
               $('.handlerAddress').html("");
      
               response.forEach(element => {
                  accountsPrintInModal(element);
                  accountsPrintInPage(element);
               });
      
               toastr.success("Accounts Added");

               setTimeout(() => {
                  $("#loader").css({ display: "none" })
               }, 1000);
      
            }
         });
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

      $(".updateLanguageBtn").click(function(){
         var languageArray = $('.lang-select option:selected')
         .toArray().map(item => item.text);

         if((languageArray.length) < 1){
            toastr.error("Select language first");
         }else{
            JsonObject = JSON.stringify(languageArray);
            
            var data = {
              'language':JsonObject,
              'cvid':   $("#cvid").val(),
              'user_id':   $("#userid").val(),
            }
             updateLanguage(data);
         }
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
           $("#loader-black").css({ display: "block" });
       },
       success: function (response) {
         setTimeout(() => {
            $("#loader-black").css({ display: "none" });
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
                  accountsPrintInModal(element);
               });
               $('#editaccounts').modal('toggle');
            }else if(base=="loadLanguage"){
              var language = JSON.parse(response.language);

               // $('.languagediv').html("");
               language.forEach(element => {
                  languagePrintInModal(element);
               });
               $('#editlanguage').modal('toggle');
            }
         }, 500);
       }
   });
}


var data =[];
function languagePrintInModal(element){
    data.push(element);
   $('.lang-select').val(data);
}


function accountsPrintInModal(element){
   var data = "";
   data += '<div class="form-group">'+
     '<div class="input-group">'+
        '<div class="input-group-prepend">'+
           '<div class="input-group-text">'+
              '<span class="fas fa-solid fa-user-graduate"></span>'+
           '</div>'+
        '</div>'+
        '<input value="'+ element.accountname+'" class="form-control"   id="profile-accounts-name-input" type="text" placeholder="github">'+
        '<input value='+ element.accounthandler +' class="form-control" id="profile-accounts-handler-input" type="text" placeholder="ShishirBhuiyan">'+
        '<div class="input-group-append">'+
           '<div class="input-group-text bg-warning " style="cursor:pointer;" data-id="'+element.id+'"  onclick="editAccount(this)">'+
              '<span class="fas fa-edit ml-1 "></span>'+
           '</div>'+
           '<div class="input-group-text bg-danger" style="cursor:pointer;" onclick="deleteAccount('+element.id+')">'+
              '<span class="fas fa-trash ml-1 "></span>'+
           '</div>'+
        '</div>'+
     '</div>'+
  '</div>';
  $('.accountsdiv').append(data);
}

function accountsPrintInPage(element){
   var data = "";
   data += '<p><a href="https://'+element.accountname+'.com/'+element.accounthandler+'" target="_blank">';
   data += '<img src="/Asset/socialmedia/'+element.accountname+'.svg" height="20px" width="20px"/>';
   data += '&nbsp;<span id="rendergithubhandler">'+element.accounthandler+'</span></a></p>';
   
   // {{ asset('Asset/socialmedia/' . $account->accountname.'.svg') }}

  $('.handlerAddress').append(data);
  
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
         $('.handlerAddress').html("");

         response.forEach(element => {
            accountsPrintInModal(element);
            accountsPrintInPage(element);
         });
         toastr.success("Deleted");
         setTimeout(() => {
            $("#loader").css({ display: "none" })
         }, 1000);

       }
   });

}

function editAccount(account){
   // console.log($("#profile-accounts-name-input-".accountId));

   const accountId = $(account).data("id");
   let AccountNameFild = $(account).parent().siblings()[1];
   let AccountHandlerFild = $(account).parent().siblings()[2];

   var jsonTest = {
      id: accountId,
      accountname:$(AccountNameFild).val(),
      accounthandler:$(AccountHandlerFild).val(),
      cvid:$("#cvid").val()
   };

   var datas = JSON.stringify(jsonTest);

   $.ajax({
       type: "POST",
       url:"updateAccount",
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
         console.log(response);
         $('.accountsdiv').html("");
         $('.handlerAddress').html("");

         response.forEach(element => {
            accountsPrintInModal(element);
            accountsPrintInPage(element);
         });

         toastr.success("Accounts updated");

         setTimeout(() => {
            $("#loader").css({ display: "none" })
         }, 1000);

       }
   });

}


function updateLanguage(data){
   $.ajax({
      type: "POST",
      url: "upadateLanguage",
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
              window.location.href = "/";
           }, 1500);
        }
      }
  });
}



