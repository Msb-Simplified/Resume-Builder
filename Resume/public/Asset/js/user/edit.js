$(document).ready(function () {
   if(!heightcheck()){
      toastr.error("To long!, please maintainace green border");
      $("#wrapper").css({'border':'5px solid green'});
   }else{
   }


   $(".ModalCloseRelode").click(function(){
      location.reload(true);
   });
  

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

      $("#langchangemodalbtn").click(function(){
         var base = "loadLanguage";
         editCv(base);
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
            updateLanguage_or_Tools(data);
         }
      });


      $("#toolschangemodalbtn").click(function(){
         var base = "loadTools";
         editCv(base);
      });
      $(".updateToolsBtn").click(function(){
         var toolsArray = $('.tools-select option:selected')
         .toArray().map(item => item.text);

         if((toolsArray.length) < 1){
            toastr.error("Select tools first");
         }else{
            JsonObject = JSON.stringify(toolsArray);
            
            var data = {
               'type':"tools",
              'tools':JsonObject,
              'cvid':   $("#cvid").val(),
              'user_id':   $("#userid").val(),
            }
            updateLanguage_or_Tools(data);
         }
      });
     
      $("#educhangemodalbtn").click(function(){
         var base = "loadEducation";
         editCv(base);
      });

      $(".update-education").click(function(){
         const accountId = $(this).data("id");
         alert(accountId);
      });

      $("#experencechangemodalbtn").click(function(){
         //   $('#editexperence').modal('toggle');
           var base = "getExperence";
           editCv(base);
      });
      $(".addExperenceBtn").click(function(){
         addExperence();
      });

      
     $("#skillchangemodalbtn").click(function(){
         var base = "loadSkills";
         editCv(base);
     });

     

     $(".AddSkillsBtn").click(function(){

      var jsonTest = {
         'skillname':$("#skill-name-field").val(),
         'skillpercent':$("#skill-percent-field").val(),
         'cvid':$("#cvid").val()
      };
      var datas = JSON.stringify(jsonTest);
   
      $.ajax({
         type: "POST",
         url:"addSkill",
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
            $("#skill-name-field").val("");
            $("#skill-percent-field").val("");


            $('#skillsdiv').html("");

            response.forEach(element => {
               skillsPrintInModal(element);
            });
   
            toastr.success("Skill Added");

            setTimeout(() => {
               $("#loader").css({ display: "none" })
            }, 1000);
   
         }
      });
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
            }else if(base=="loadTools"){
               var tools = JSON.parse(response.tools);
 
                // $('.languagediv').html("");
                tools.forEach(element => {
                   toolsPrintInModal(element);
                });
                $('#edittools').modal('toggle');
             }else if(base=="loadEducation"){
               console.log(response);
               $('#educationDiv').html("");

               response.forEach(element => {
                  educationPrintInModal(element);
               });
               $('#editeducation').modal('toggle');
             }else if(base=="getExperence"){
               $('#experenceDiv').html("");
               
               console.log(response);
               response.forEach(element => {
                  experencePrintInModal(element);
               });
               $('#editexperence').modal('toggle');
             }else if(base=="loadSkills"){
               $('#skillsdiv').html("");

               response.forEach(element => {
                  skillsPrintInModal(element);
               });
               $('#editskills').modal('toggle');
             }

             

         }, 500);
       }
   });
}


var dataLang =[];
function languagePrintInModal(element){
   dataLang.push(element);
   $('.lang-select').val(dataLang);
}

var dataTools =[];
function toolsPrintInModal(element){
   dataTools.push(element);
   $('.tools-select').val(dataTools);
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


function updateLanguage_or_Tools(data){
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



function educationPrintInModal(element){
   var data = "";
   var data = "<div class='mb-5'>";
            data += '<textarea class="educationfield-'+element.id+' summernote">'+element.institution+'</textarea>';
            data += '<button data-id='+element.id+' class="btn btn-warning  float-right update-education mt-2" type="button" onclick="updateEduBtn(this)">Update</button>';

            data += '<button data-id='+element.id+' class="btn btn-danger  float-right update-education mt-2" type="button" onclick="deleteEduBtn(this)">Delete</button>';

      data += "</div></br>";

   $('#educationDiv').append(data);
   $('.summernote').summernote({
      toolbar: [
          ["style", ["style"]],
          [
              "font",
              [
                  "bold",
                  "italic",
                  "underline",
              ],
          ],
          // [ 'fontname', [ 'fontname' ] ],
          ["fontsize", ["fontsize"]],
          ["color", ["color"]],
          ["para", ["ol", "ul", "paragraph"]],
          ["table", ["table"]],
          ['height', ['height']],
          ["view", ["undo", "redo",]],
          
      ],
   });
}
function updateEduBtn(ok){
   // alert();
   var btn = $(ok);
   var btnid = $(ok).data("id");
   var textareaClass = ".educationfield-"+btnid;
   let textArea = $(textareaClass);
   var textareaValue = $(textArea[0]).summernote('code');

   var data = {
     'id': btnid,
     'institution':textareaValue,
     'user_id':   $("#userid").val(),
     'cvid':$("#cvid").val()
   }

   $.ajax({
      type: "POST",
      url: "upadateEducation",
      data: data,
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function () {
          $("#loader").css({ display: "block" });
      },
      success: function (response) {
        if(response["alert"].includes("success")){
           toastr.success(response["message"]);
        }
        setTimeout(() => {
         $("#loader").css({ display: "none" });
        }, 500);
      }
  });
   return;
}
function deleteEduBtn(ok){
   // alert();
   var btn = $(ok);
   var btnid = $(ok).data("id");

   var data = {
     'id': btnid,
     'cvid':$("#cvid").val()
   }

   $.ajax({
      type: "POST",
      url: "deleteEducation",
      data: data,
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function () {
          $("#loader").css({ display: "block" });
      },
      success: function (response) {
         $("#loader").css({ display: "none" });


         $('#educationDiv').html("");
         response.forEach(element => {
            educationPrintInModal(element);
         });

         if(response["alert"].includes("success")){
            toastr.success(response["message"]);
         }
      }
  });
   return;
}

function experencePrintInModal(element){
   var data = "";
   var data = "<div class='mb-5'>";
            data += '<textarea class="experencefield-'+element.id+' summernote">'+element.experence+'</textarea>';
            data += '<button data-id='+element.id+' class="btn btn-warning  float-right update-experence mt-2" type="button" onclick="updateExperenceBtn(this)">Update</button>';

            data += '<button data-id='+element.id+' class="btn btn-danger  float-right update-experence mt-2" type="button" onclick="deleteExperenceBtn(this)">Delete</button>';

      data += "</div></br>";

   $('#experenceDiv').append(data);
   $('.summernote').summernote({
      toolbar: [
          ["style", ["style"]],
          [
              "font",
              [
                  "bold",
                  "italic",
                  "underline",
              ],
          ],
          // [ 'fontname', [ 'fontname' ] ],
          ["fontsize", ["fontsize"]],
          ["color", ["color"]],
          ["para", ["ol", "ul", "paragraph"]],
          ["table", ["table"]],
          ['height', ['height']],
          ["view", ["undo", "redo",]],
          
      ],
   });
}
function updateExperenceBtn(ok){
   // alert();
   var btnid = $(ok).data("id");
   var textareaClass = ".experencefield-"+btnid;
   let textArea = $(textareaClass);
   var textareaValue = $(textArea[0]).summernote('code');

   var data = {
     'id': btnid,
     'experence':textareaValue,
     'user_id':   $("#userid").val(),
     'cvid':$("#cvid").val()
   }

   $.ajax({
      type: "POST",
      url: "upadateEexperence",
      data: data,
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function () {
          $("#loader").css({ display: "block" });
      },
      success: function (response) {
        if(response["alert"].includes("success")){
           toastr.success(response["message"]);
        }
        setTimeout(() => {
         $("#loader").css({ display: "none" });
        }, 500);
      }
  });
   return;
}
function deleteExperenceBtn(ok){
   // alert();
   var btnid = $(ok).data("id");

   var data = {
     'id': btnid,
     'cvid':$("#cvid").val()
   }

   $.ajax({
      type: "POST",
      url: "deleteExperence",
      data: data,
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function () {
          $("#loader").css({ display: "block" });
      },
      success: function (response) {
         $("#loader").css({ display: "none" });


         $('#experenceDiv').html("");
         response.forEach(element => {
            experencePrintInModal(element);
         });

         if(response["alert"].includes("success")){
            toastr.success(response["message"]);
         }
      }
  });
   return;
}

function addExperence(){
   var textareaValue = $(".experenceField").summernote('code');

   var jsonTest = {
      'experence':textareaValue,
      'cvid':$("#cvid").val(),
   };
   var datas = JSON.stringify(jsonTest);

   $.ajax({
       type: "POST",
       url:"addExperence",
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

         $('#experenceDiv').html("");
         response.forEach(element => {
            experencePrintInModal(element);
         });

         toastr.success("Accounts updated");
         setTimeout(() => {
            $("#loader").css({ display: "none" });
            $(".experenceField").summernote('code',"");
         }, 1000);
       }
   });
}



function skillsPrintInModal(element){
   var data = "";
   data += '<div class="form-group">'+
     '<div class="input-group">'+
        '<div class="input-group-prepend">'+
           '<div class="input-group-text">'+
              '<span class="fas fa-solid fa-user-graduate"></span>'+
           '</div>'+
        '</div>'+
        '<input value="'+ element.subject+'" class="form-control"   id="skill-name-input" type="text" placeholder="C++">'+
        '<input value='+ element.percent +' class="form-control" id="skill-percent-input" type="text" placeholder="50%">'+
        '<div class="input-group-append">'+
           '<div class="input-group-text bg-warning " style="cursor:pointer;" data-id="'+element.id+'"  onclick="editSkill(this)">'+
              '<span class="fas fa-edit ml-1 "></span>'+
           '</div>'+
           '<div class="input-group-text bg-danger" style="cursor:pointer;" onclick="deleteSkill('+element.id+')">'+
              '<span class="fas fa-trash ml-1 "></span>'+
           '</div>'+
        '</div>'+
     '</div>'+
  '</div>';
  $('#skillsdiv').append(data);
}
function editSkill(skill){
   // console.log($("#profile-accounts-name-input-".accountId));

   const skillId = $(skill).data("id");
   let skillNameFild = $(skill).parent().siblings()[1];
   let skillPercentFild = $(skill).parent().siblings()[2];

   var jsonTest = {
      id: skillId,
      skillname:$(skillNameFild).val(),
      skillPercent:$(skillPercentFild).val(),
      cvid:$("#cvid").val()
   };

   var datas = JSON.stringify(jsonTest);

   $.ajax({
       type: "POST",
       url:"updateSkill",
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
         $('#skillsdiv').html("");

         response.forEach(element => {
            skillsPrintInModal(element);
         });

         toastr.success("Skill updated");

         setTimeout(() => {
            $("#loader").css({ display: "none" })
         }, 1000);

       }
   });

}


function deleteSkill(accountId){
   var jsonTest = {
      id: accountId,
      cvid:$("#cvid").val()
   };

   var datas = JSON.stringify(jsonTest);

   $.ajax({
       type: "POST",
       url:"skillDelete",
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
         $('#skillsdiv').html("");

         response.forEach(element => {
            skillsPrintInModal(element);
         });

         toastr.success("Skill Deleted");

         setTimeout(() => {
            $("#loader").css({ display: "none" })
         }, 1000);

       }
   });

}


