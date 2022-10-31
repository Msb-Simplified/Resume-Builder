$(document).ready(function () {
    // $('#setingsmodal').modal('toggle');
    //########################  Pluggin Settings #####################
    $(".summernote").summernote({
        height: 250,
        // airMode: true,
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

    $(".lang-select").select2({
        placeholder: "Chose Language",
        closeOnSelect: false,
    });
    //########################  Pluggin Settings #####################
});



