$(document).ready(function () {

    // Toggle signin & signup modal
    $(".signupmodalbtnopen").click(function (e) {
        e.preventDefault();
        $("#userloginmodal").modal('toggle');
        $("#usersignupmodal").modal('toggle');
    });
    $(".siginmodalbtnopen").click(function (e) {
        e.preventDefault();
        $("#userloginmodal").modal('toggle');
        $("#usersignupmodal").modal('toggle');
    });

    $(".userloginclosebtn").click(function (e) {
        $('#userloginform').trigger("reset");
        $('#usersignupform').trigger("reset");
        $("#signupuserpassword").css("border", "1px solid #ced4da");
        $("#signupusername").css("border", "1px solid #ced4da");
    });
});


