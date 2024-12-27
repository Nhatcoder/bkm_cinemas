(function ($) {
  $.fn.filemanager = function (type, options) {
    type = type || "file";

    this.on("click", function (e) {
      var route_prefix = options?.prefix ? options.prefix : "/filemanager";

      var input = $("#" + $(this).data("input"));
      var preview = $("#" + $(this).data("preview"));
      window.open(
        route_prefix + "?type=" + type,
        "FileManager",
        "width=900,height=600",
      );
      window.SetUrl = function (items) {
        if (options?.onChange) {
          options?.onChange?.({ items, input, preview });
        } else {
          var file_path = items.map((item) => item.url).join(",");
          input.val("").val(file_path).trigger("change");
          preview.html("");
          items.forEach(function (item) {
            preview.append(
              $("<img>").css("height", "5rem").attr("src", item.thumb_url),
            );
          });
        }
        preview.trigger("change");
      };
      return false;
    });
  };
})($);
