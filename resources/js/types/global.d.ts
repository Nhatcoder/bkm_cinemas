import { AxiosInstance } from "axios";
import { route as ziggyRoute } from "ziggy-js";
import { IOptionFileManager as IOption } from "@/types/option-file-manager.interface";
import { IMediaFileManager as IMedia } from "@/types/media-file-manager.interface";
import Alpine from "alpinejs";
import * as utils from "@/utils/common";
import Services from "@/services";
import Swal from "sweetalert2";
import Pusher from "pusher-js/types/src/core/pusher";
import Echo from "laravel-echo";
import { IUser } from "./user.interface";

declare global {
  interface Window {
    axios: AxiosInstance;
    $: JQueryStatic;
    SetUrl: (items: IMedia[]) => any;
    Services: typeof Services;
    Alpine: typeof Alpine;
    utils: typeof utils;
    echo: Echo<'pusher'>;
    Pusher: typeof Pusher;
    user: IUser
  }
  interface JQuery {
    filemanager(type: string, options: IOption): any;
    seatmanager(seatLayout: any, options: any): any;
    seatview(seatLayout: any, options: any): any;
    selectDay(options: any, onChange?: (data: any) => any): any;
    selectTime(data: any, onChange?: (data: any) => any): any;
  }
  var route: typeof ziggyRoute;
  var toastr: Toastr;
  var swal: typeof Swal;
}
