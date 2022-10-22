$(document).ready(function () {
    $(".userloginbtn").click(function (e) {
        e.preventDefault();

        var username = $("#loginusername").val();
        var password = $("#loginpassword").val();

        $.ajax({
            type: "POST",
            url: "login",
            data: { username: username, password: password },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function () {
                $("#loader").css({ display: "block" });
            },
            success: function (response) {
                if (response["alert"].includes("success")) {
                    toastr.success(response["message"]);
                    setTimeout(() => {
                        window.location.href = "/";
                    }, 1500);
                } else {
                    toastr.error(response["message"]);
                    setTimeout(() => {
                        $("#loader").css({ display: "none" });
                    }, 500);
                }
            },
        });
    });
});
