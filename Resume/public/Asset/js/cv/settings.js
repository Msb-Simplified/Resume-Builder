$(document).ready(function () {
    // $('#setingsmodal').modal('toggle');
    //########################  Pluggin Settings #####################
    $(".summernote").summernote({
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
            ['height', ['height']],
            ["view", ["undo", "redo", "codeview", "help"]],
            
        ],
    });

    $('.summernote').on('summernote.blur', function() {
        console.log('Editable area loses focus');
    });

    $(".lang-select").select2({
        placeholder: "Chose Language",
        closeOnSelect: false,
    });



    $(".tools-select").select2({
        placeholder: "Chose Tools",
        closeOnSelect: false,
    });
    //########################  Pluggin Settings #####################
});



