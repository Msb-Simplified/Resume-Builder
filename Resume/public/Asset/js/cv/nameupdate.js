$(document).ready(function () {
    $(".update-cv-name-btn").click(function(e){
        e.preventDefault();
       let name = $("#profile-name-input").val();
       var url = "updateName";
       var jsonTest = {
        name: name,
        cvid:$("#cvid").val()
       };

       updateCv(jsonTest,url);
    });
    $(".update-cv-title-btn").click(function(e){
        e.preventDefault();
       let title = $("#profile-title-input").val();
       var url = "updateTitle";
       var jsonTest = {
        title: title,
        cvid:$("#cvid").val()
       };

       updateCv(jsonTest,url);
    });
});

function updateCv(data,url){
    var datas = JSON.stringify(data);
    $.ajax({
        type: "POST",
        url: url,
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
            if (response["alert"] == "success") {
                toastr.success(response["message"]);
                setTimeout(() => {
                    $("#loader").css({ display: "none" });
                    location.reload();
                }, 1800);
            }
        }
    });


    // console.log(JSON.stringify(data));
}
