import $ from "jquery";
import moment from "moment";

interface SelectDayOptions {
  daysFromNow: number; // Số ngày từ hôm nay
  numberOfDays: number; // Số ngày sẽ được tạo
}

$.fn.selectDay = function (options: SelectDayOptions, onChange?: (date: string | null) => any) {
  const { daysFromNow, numberOfDays } = options;
  const $this = $(this);

  // Tạo các phần tử ngày
  for (let i = 0; i < numberOfDays; i++) {
    const date = moment().add(daysFromNow + i, 'days');
    const dayName = moment(date).format('dddd'); // Tên ngày
    const dateString = date.format('DD/MM'); // Ngày tháng
    $(this).removeClass().addClass('tw-grid tw-grid-cols-12 tw-gap-2');
    const $dayElement = $(`<div class="day">${dayName}<br>${dateString}</div>`);

    $dayElement.on("click", function () {
      if ($(this).hasClass("selected")) {
        $(this).removeClass("selected");
        onChange?.(null);
      } else {
        $(".day").removeClass("selected");
        $(this).addClass("selected");
        onChange?.(date.format());
      }
    });

    $this.append($dayElement);
  }
};
