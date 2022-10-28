$(document).ready(function () {
    $(".update-cv-image-btn").click(function(e){
        e.preventDefault();
        uploadimage();
     });
})

function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('profileimage');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);

};


function uploadimage(){
    var property = document.getElementById('imagechoser').files[0];
    var image_name = property.name;
    var image_extension = image_name.split('.').pop().toLowerCase();
    var userid = $("#userid").val();
    var cvid = $("#cvid").val();

    if(jQuery.inArray(image_extension,['jpg','jpeg','png']) == -1){
      alert("Invalid image file");
    }else{
        var form_data = new FormData();
        form_data.append("file",property);
        form_data.append("userid",userid);
        form_data.append("cvid",cvid);
        $.ajax({
            url: 'updateImage',
            type:'POST',
            enctype: 'multipart/form-data', // Use when send file or image
            data:form_data,
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache:false,        // Use when send file or image
            contentType: false, // Use when send file or image
            processData: false, // Use when send file or image
            beforeSend: function () {
                $("#loader").css({ display: "block" });
            },
            success:function(response) {
                if (response["alert"] == "success") {
                    toastr.success(response["message"]);

    
                    setTimeout(() => {
                        $("#loader").css({ display: "none" });
                        location.reload();
                    }, 1800);
                }
            },
        });
    }

}