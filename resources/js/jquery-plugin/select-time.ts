import { IShowtime } from "@/types/showtime.interface";
import $ from "jquery";
import moment from "moment";

$.fn.selectTime = function ({showtimes, idShowtimeSelected}: {showtimes: IShowtime[], idShowtimeSelected: string | null}, onChange?: (time: IShowtime | null) => any) {
  const $this = $(this);
  const timesMatrix: IShowtime[][] = [[], [], []]; // 0: Morning, 1: Afternoon, 2: Evening
  $(this).html('');

  showtimes.sort((a, b) => moment(a.start_time).diff(moment(b.start_time)));

  showtimes.forEach(showtime => {
    if (moment(showtime.start_time).hour() < 12) {
      timesMatrix[0].push(showtime); // Morning
    } else if (moment(showtime.start_time).hour() < 18) {
      timesMatrix[1].push(showtime); // Afternoon
    } else {
      timesMatrix[2].push(showtime); // Evening
    }
  });

  const periods = ['Sáng', 'Chiều', 'Tối'];
  timesMatrix.forEach((timeArray, index) => {
    if (timeArray.length === 0) return;
    $this.append(`<div class="tw-text-sm tw-font-bold tw-text-black tw-mt-3 mb-1">${periods[index]}</div>`);
    const $timeContainer = $(`<div class="tw-grid tw-grid-cols-6 tw-gap-2"></div>`);
    timeArray.forEach(time => {
      const $timeElement = $(`<div class="time">${moment(time.start_time).format('HH:mm')} ~ ${moment(time.end_time).format('HH:mm')}</div>`);
      if (idShowtimeSelected && time.id === idShowtimeSelected) {
        $timeElement.addClass("selected");
      }
      $timeElement.on("click", function () {
        if ($(this).hasClass("selected")) {
          $(".time").removeClass("selected");
          onChange?.(null);
        } else {
          $(".time").removeClass("selected");
          $(this).addClass("selected");
          onChange?.(time);
        }
      });
      $timeContainer.append($timeElement);
    });
    $this.append($timeContainer);
  });
};
