$(document).ready(function () {
    // $('#setingsmodal').modal('toggle');
    //########################  Pluggin Settings #####################
    $(".summernote").summernote({
        height: 150,
        toolbar: [
            ["style", ["style"]],
            [
                "font",
                [
                    "bold",
                    "italic",
                    "underline",
                    "strikethrough",
                    "superscript",
                    "subscript",
                    "clear",
                ],
            ],
            // [ 'fontname', [ 'fontname' ] ],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ol", "ul", "paragraph"]],
            ["table", ["table"]],
            ['height', ['height']]
            ["view", ["undo", "redo", "codeview", "help"]],
        ],
    });
    $(".select2").select2({
        placeholder: "Chose",
        closeOnSelect: true,
    });
    //########################  Pluggin Settings #####################

    //########################  Account setiings Change #####################
    $(".acoountsettingcheckbox").click(function () {
        var parameter = {
            colname: $(this).attr("name"),
            cvid: $("#cvid").val(),
            user_id: $("#userid").val(),
        };

        if ($(this).prop("checked")) {
            parameter.action = "active";
            changesettings(parameter);
        } else {
            parameter.action = "inactive";
            changesettings(parameter);
        }
    });
    //########################  Account setiings Change #####################
});

//########################  Account setiings Function #####################
function changesettings(parameter) {
    $.ajax({
        type: "POST",
        url: "/settings",
        data: parameter,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#loader").css({ display: "block" });
        },
        success: function (response) {
            if (response["alert"] == "success") {
                toastr.success(response["message"]);
                setTimeout(() => {
                    $("#loader").css({ display: "none" });
                }, 1000);

                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        },
    });
}
//########################  Account setiings Function #####################



$(document).ready(function () {

    $("#sendcvbtn").click(function (e) {
        $("#loader").css({ display: "block" });
    });
    
});

