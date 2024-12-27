$(function () {
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.config.allowedContent = true;

    $(document).ready(function () {
        function addImageCaption(img) {
            var altText = $(img).attr('alt');
            if (altText) {
                var caption = $('<div>', {
                    'class': 'image-caption',
                    'text': altText,
                    'css': {
                        'text-align': 'center',
                        'font-style': 'italic'
                    }
                });
                $(img).after(caption);
            }
        }

        CKEDITOR.on('instanceReady', function (evt) {
            var editor = evt.editor;

            $(document).on("click", ".cke_dialog_ui_button_ok", function () {
                setTimeout(function () {
                    var images = $(editor.document.$).find('img');
                    images.each(function () {
                        if (!$(this).next().hasClass('image-caption')) {
                            addImageCaption(this);
                        }
                    });
                }, 100);
            });
        });
    });
});


