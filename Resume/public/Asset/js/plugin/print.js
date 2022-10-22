$(function(){
    $("#print").click(function () {
        //Hide all other elements other than printarea.
        $(this).hide();
        setTimeout(() => {
            $(this).show();
        }, 1000);
        $("#wrapper").show();
        $("body").css({"margin": "0px"});
        $("body").css({"margin-left": "50px"});
        $("body").css({"width": "650px"});
        window.print();
    });

});