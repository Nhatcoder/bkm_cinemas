CKEDITOR.editorConfig = function (config) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    config.toolbarGroups = [
        { name: "clipboard", groups: ["clipboard", "undo"] },
        { name: "editing", groups: ["find", "selection", "spellchecker"] },
        { name: "links" },
        { name: "insert" },
        { name: "forms" },
        { name: "tools" },
        { name: "document", groups: ["mode", "document", "doctools"] },
        { name: "others" },
        "/",
        { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
        {
            name: "paragraph",
            groups: ["list", "indent", "blocks", "align", "bidi"],
        },
        { name: "styles" },
        { name: "colors" },
        { name: "about" },
    ];

    config.allowedContent = true;
    config.removeButtons = "SpellChecker,Smiley,Underline,Subscript,Superscript,Maximize,Language,HorizontalRule,SpecialChar,Anchor,Styles,About,Select,Format,Checkbox,Radio,TextField,Textarea,HiddenField,ShowBlocks";
    config.format_tags = "p;h1;h2;h3;h4;h5;h6;pre";
    config.removeDialogTabs = "image:advanced;link:advanced";
    config.filebrowserImageBrowseUrl = "/file-manager?type=Images";
    config.filebrowserBrowseUrl = "/file-manager?type=Files";
    config.filebrowserUploadUrl = "/file-manager/upload?type=Files&_token=" + csrfToken;
    config.filebrowserImageUploadUrl = "/file-manager/upload?type=Images&_token=" + csrfToken;
    config.fontSize_defaultLabel = "14px";
    config.autoParagraph = false;
    config.allowedContent = config.allowedContent || {};
    config.allowedContent.iframe = {
        attributes: "src,width,height,name,align,sandbox",
        classes: true,
        styles: true,
    };

    CKEDITOR.on("instanceReady", function (ev) {
        ev.editor.dataProcessor.htmlFilter.addRules({
            elements: {
                iframe: function (element) {
                    if (!element.attributes.sandbox) {
                        element.attributes.sandbox = "allow-scripts allow-same-origin";
                    }
                },
            },
        });
    });
};
