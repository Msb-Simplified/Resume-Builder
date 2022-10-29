$(document).ready(function () {
    // $('#setingsmodal').modal('toggle');
    //########################  Pluggin Settings #####################
    $(".summernote").summernote({
        height: 250,
        codemirror: {
            theme: 'monokai'
        },
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
    $(".select2").select2({
        placeholder: "Chose",
        closeOnSelect: true,
    });
    //########################  Pluggin Settings #####################
});



