import { IMediaFileManager as IMedia } from "@/types/media-file-manager.interface";

export interface IOptionFileManager {
  prefix?: string;
  input?: JQuery;
  preview?: JQuery;
  onChange: ({
    items,
    input,
    preview,
  }: {
    items: IMedia[];
    input: JQuery;
    preview: JQuery;
  }) => any;
}
