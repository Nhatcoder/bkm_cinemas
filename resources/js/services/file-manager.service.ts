import { IMediaFileManager as IMedia } from "@/types/media-file-manager.interface";
import $ from "jquery";

export class FileManagerService {
  itemsStore: IMedia[] = [];
  inputEl?: JQuery;
  previewEl?: JQuery;
  constructor(selector: JQuery) {
    $(selector).filemanager("image", {
      onChange: ({ items, input, preview }) => {
        this.itemsStore = [...this.itemsStore, ...items];
        this.inputEl = input;
        this.previewEl = preview;
        this.renderCardImages();
      },
    });
  }

  renderCardImages() {
    this.previewEl?.html("");
    this.itemsStore.forEach((item, i) => {
      this.previewEl?.append(
        this.preview({ ...item, id: i.toString() }).on("click", ".close-icon", () =>
          this.deleteImage(item.id),
        ),
      );
    });
    this.inputEl
      ?.val(this.itemsStore.map((item) => item.url).join(","))
      .trigger("change");
  }
  preview(item: IMedia) {
    return $(`
      <div class="card-image tw-relative tw-w-24 tw-h-24 tw-bg-gray-100 tw-rounded-md tw-overflow-hidden tw-border-2 tw-rounded-2">
        <img src="${item.thumb_url}" alt="" class="tw-w-full tw-h-full tw-object-cover">
        <div class="close-icon tw-absolute tw-top-2 tw-right-2 tw-text-gray-500 tw-hover:tw-text-gray-800">
          <i class="fa-regular fa-trash-can"></i>
        </div>
      </div>
    `);
  }
  deleteImage(id: string) {
    this.itemsStore.splice(parseInt(id), 1);
    this.renderCardImages();
  }
}
