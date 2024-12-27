$(document).ready(function () {
    let name = $("#name");
    let slug = $("#slug");
    let content = $(".content");

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    if(content.length > 0) {
        let editor;
        ClassicEditor.create(document.querySelector(".content"), {})
            .then((newEditor) => {
                editor = newEditor;
            })
            .catch((err) => {
                console.error(err.stack);
            });
    
        $("#post-preview").click(function () {
            var contentValue = editor.getData();
            var url = $(this).data("url");
            $.ajax({
                url: url,
                method: "post",
                data: {
                    _token: csrfToken,
                    name: name.val(),
                    slug: slug.val(),
                    content: contentValue,
                },
                success: function (response) {
                    window.open(response.preview_url, "_blank");
                },
            });
        });
    }
});
