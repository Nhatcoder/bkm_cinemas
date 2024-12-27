import { IOptionFileManager as IOption } from "@/types/option-file-manager.interface";
import { IMediaFileManager as IMedia } from "@/types/media-file-manager.interface";
import $ from "jquery";
$.fn.filemanager = function (type: string, options: IOption) {
  type = type || "file";

  this.on("click", function () {
    const route_prefix = options?.prefix ? options.prefix : "/filemanager";

    const input = $("#" + $(this).data("input"));
    const preview = $("#" + $(this).data("preview"));
    window.open(
      route_prefix + "?type=" + type,
      "FileManager",
      "width=900,height=600",
    );
    window.SetUrl = function (items: IMedia[]) {
      if (options?.onChange) {
        options.onChange({ items, input, preview });
      } else {
        const file_path = items.map((item: IMedia) => item.url).join(",");
        input.val("").val(file_path).trigger("change");
        preview.html("");
        items.forEach(function (item: IMedia) {
          preview.append($(`<img src="${item.thumb_url}" alt="${item.name}">`));
        });
      }
      preview.trigger("change");
    };
  });
};
