$(document).ready(function () {
    $(".usersignupbtn").click(function (e) {
        e.preventDefault();
        isUsernameValid();
        isUserPasswordValid();

        if (usernameError == true && passwordError == true) {
            var username = $("#signupusername").val();
            var password = $("#signupuserpassword").val();
            $.ajax({
                type: "POST",
                url: "signup",
                data: { username: username, password: password },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
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
                        $(".usercheck").show();
                        $(".usercheck").html("uername already taken");
                        $("#loader").css({ display: "none" });
                        $("#signupusername").css("border", "1px solid red");
                        toastr.error(response["message"]);
                    }
                },
            });
        }
    });

    // Validate Username
    $(".usercheck").hide();
    let usernameError = false;
    $("#signupusername").keyup(function () {
        isUsernameValid();
    });

    // Validate Password
    $(".passcheck").hide();
    let passwordError = false;
    $("#signupuserpassword").keyup(function () {
        isUserPasswordValid();
    });

    function isUsernameValid() {
        let signupusername = $("#signupusername").val();
        if (signupusername.length == "") {
            $(".usercheck").show();
            $("#signupusername").css("border", "1px solid grey");
            usernameError = false;
        } else if (signupusername.length < 3) {
            $(".usercheck").show();
            $("#signupusername").css("border", "1px solid grey");
            $(".usercheck").html("username is to short");
            usernameError = false;
        } else if (signupusername.length > 10) {
            $(".usercheck").show();
            $("#signupusername").css("border", "1px solid grey");
            $(".usercheck").html("username is to long");
            usernameError = false;
        } else {
            usernameError = true;
            $("#signupusername").css("border", "1px solid green");
            $(".usercheck").hide();
        }
    }
    function isUserPasswordValid() {
        let signupuserpassword = $("#signupuserpassword").val();
        if (signupuserpassword.length == "") {
            $(".passcheck").show();
            $("#signupuserpassword").css("border", "1px solid grey");
            passwordError = false;
        } else if (signupuserpassword.length < 7) {
            $(".passcheck").show();
            $(".passcheck").html("password at least 7 char");
            $("#signupuserpassword").css("border", "1px solid grey");
            passwordError = false;
        } else if (signupuserpassword.length > 10) {
            $(".passcheck").show();
            $(".passcheck").html("password is to long");
            $("#signupuserpassword").css("border", "1px solid grey");
            passwordError = false;
        } else {
            passwordError = true;
            $("#signupuserpassword").css("border", "2px solid green");
            $(".passcheck").hide();
        }
    }
});
