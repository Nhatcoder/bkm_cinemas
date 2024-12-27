import $ from "jquery";
import { SEAT_STATUS, SEAT_TYPE } from "@/define/seat.define";
import { ISeatLayout } from "@/types/seat-layout.interface";
import { price } from "@/utils/common";
import { ISeatType } from "@/types/seat-type.interface";
import { ISeat, SEAT_STATUS_VALUES } from "@/types/seat.interface";
import Swal from "sweetalert2";

$.fn.seatview = async function (seatLayout: ISeatLayout & { base_price: any, seat_types: ISeatType[] }, onChange?: (data: any) => any) {
  const user = window.user;
  let { seats, col_count, row_count, base_price = 0, seat_types = [] } = seatLayout;
  let seatErrors = {
    typeError: true,
    slotError: true,
    quantityError: true,
  }
  let seatsSelected: ISeat[] = seats?.filter(seat => seat.status === SEAT_STATUS.BOOKING) as unknown as ISeat[];
  const rowLabels = $("<div>", {
    class: "row-labels tw-py-4",
  });
  seatErrors.quantityError = seatsSelected.length > 9;
  //@ts-ignore
  seatErrors.typeError = seatsSelected.some(seat => seatsSelected[0].type != seat.type);

  const seatTable = $("<div>", {
    class: "seat-table tw-grid tw-gap-2 tw-p-4 tw-rounded-xl",
  });
  this.empty();

  generateSeats(seats ?? []);
  addEventListeners();
  this.append(rowLabels, seatTable, rowLabels.clone());
  checkSeatMapping();

  function generateSeats(seats: ISeat[]) {
    seatTable.removeClass();
    seatTable.empty().addClass(`seat-table tw-grid tw-gap-2 tw-p-4 tw-rounded-xl tw-grid-cols-${col_count}`);
    const labels = rowLabels.empty();

    const rows = seats.length / col_count;
    for (let i = 0; i < rows; i++) {
      labels.append($('<div>', {
        class: 'row-label row-label-lg',
        text: String.fromCharCode(65 + i)
      }));
    }

    seats.forEach((seat, index) => {
      const isUserSelectSeat = user?.id == seat.user_id && seat.status == SEAT_STATUS.BOOKING;
      seatTable.append($('<div>', {
        style: `${isUserSelectSeat || seat.status == SEAT_STATUS.AVAILABLE ? 'cursor: pointer' : 'cursor: not-allowed'}`,
        class: `seat seat-lg tw-col-span-${seat.slot} tw-border-solid tw-text-white tw-border-2 tw-border-${seat.type} ${!seat.visible ? 'tw-hidden' : 'tw-visible'} ${isUserSelectSeat ? SEAT_STATUS.SELECTED : seat.status}`,
        id: seat.seat_number,
        'data-id': seat.id,
        'data-slot': seat.slot,
        'data-type': seat.type,
        'data-seat-number': seat.seat_number,
        'data-visible': seat.visible,
        'data-price': seat.price ?? 0,
        'data-status': seat.status ?? SEAT_STATUS.AVAILABLE,
        'data-order': seat.order,
        'data-user-id': seat.user_id,
        ...(seat.type !== SEAT_TYPE.EMPTY_SEAT && { 'x-tooltip': `"${seat.seat_number} - ${price(seat.price ?? 0)}"` }),
      }));

      $(seatTable.children()[index]).data('merged-seats', seat.merged_seats ?? []);
    });



    let seatIndex = 0;
    seatTable.children().each(function (i, cell) {
      const rowIndex = Math.floor(i / col_count);
      $(cell).html(`${String.fromCharCode(65 + rowIndex)}${(seatIndex + 1).toString().padStart(2, '0')}`);
      $(cell).data('seat-number', `${String.fromCharCode(65 + rowIndex)}${(seatIndex + 1).toString().padStart(2, '0')}`);
      seatIndex++;
      if (seatIndex >= col_count) {
        seatIndex = 0;
      }

    });
    return getSeatsFromDOM();
  }

  function getSeatsFromDOM() {
    const seats: any[] = [];
    seatTable.children().each(function () {
      const seat = {
        type: $(this).data('type'),
        slot: $(this).data('slot'),
        order: $(this).index(),
        visible: $(this).data('visible'),
        seat_number: $(this).data('seat-number'),
        price: $(this).data('price'),
        merged_seats: $(this).data('merged-seats'),
        status: $(this).data('status'),
        user_id: $(this).data('user-id')
      };
      seats.push(seat);
    });
    return seats;
  }

  function addEventListeners() {
    seatTable.on('click', function (e) {
      if ($(e.target).hasClass('seat')) {
        const seatElement = $(e.target);
        const isSelected = seatElement.data('status') !== SEAT_STATUS.BOOKING;
        const seat = {
          id: seatElement.data('id'),
          seat_number: seatElement.data('seat-number'),
          type: seatElement.data('type'),
          slot: seatElement.data('slot'),
          visible: seatElement.data('visible'),
          order: seatElement.index(),
          price: seatElement.data('price'),
          merged_seats: seatElement.data('merged-seats'),
          status: seatElement.data('status') as SEAT_STATUS_VALUES,
          user_id: seatElement.data('user-id')
        }
        const isUserSelectSeat = user.id == seat.user_id && seat.status == SEAT_STATUS.BOOKING;
        if (isUserSelectSeat || seat.status == SEAT_STATUS.AVAILABLE) {
          seatElement.removeClass(seatElement.data('status'));

          if (seatsSelected.length >= 9 && (seat.status != SEAT_STATUS.BOOKING && !seat.user_id)) {
            seatErrors.quantityError = true;
            Swal.fire({
              icon: 'warning',
              title: 'Cảnh báo',
              text: 'Nếu bạn muốn đặt trên 9 ghế, vui lòng thực hiện giao dịch nhiều lần hoặc liên hệ tại quầy!',
            });
            // return;
          } else {
            seatErrors.quantityError = false;
          }

          if (seatsSelected[0] && seatsSelected[0]?.type !== seat.type) {
            seatErrors.typeError = true;
            Swal.fire({
              icon: 'warning',
              title: 'Cảnh báo',
              text: 'Không được chọn 2 loại ghế khác nhau!',
            });
          } else {
            seatErrors.typeError = false;
          }

          // if (isSelected) {
          // seatElement.data('status', SEAT_STATUS.BOOKING);
          // seatElement.addClass(SEAT_STATUS.BOOKING);
          // seatsSelected.push(seat as unknown as ISeat);
          // } else {
          // seatElement.data('status', SEAT_STATUS.AVAILABLE);
          // seatElement.addClass(SEAT_STATUS.AVAILABLE);
          // seatsSelected = seatsSelected.filter(seat => seat.seat_number !== seatElement.data('seat-number')) ?? [];
          // }
          // seats = getSeatsFromDOM();
          // checkSeatMapping();
          // if (seatErrors.typeError || seatErrors.quantityError) {

          //   seatElement.removeClass(seatElement.data('status'));
          //   seatElement.data('status', SEAT_STATUS.AVAILABLE);
          //   // seatElement.addClass(SEAT_STATUS.AVAILABLE);
          //   seatsSelected = seatsSelected.filter(seat => seat.seat_number !== seatElement.data('seat-number')) ?? [];

          // }
          onChange?.({ seatErrors, seat });
        }
      }
    });
  }

  function getColIndex(seatNumber: string) {
    const colIndex = $(`#${seatNumber}`).index() % col_count;
    return colIndex;
  }

  function getRowIndex(seatNumber: string) {
    const rowIndex = Math.floor($(`#${seatNumber}`).index() / col_count);
    return rowIndex;
  }

  function checkSeatMapping() {
    if (seatsSelected.length > 0) {
      const seatNumber = seatsSelected.sort((a, b) => b.selected_order - a.selected_order)[0].seat_number;
      seatErrors.slotError = false;

      if (!seatNumber) return;
      if (!seats) return;
      const selectedPos = getPositionSeat(seatNumber);

      const seatMatrix: ISeat[][] = [];
      for (let row = 0; row < row_count; row++) {
        const rowSeats = seats.slice(row * col_count, (row + 1) * col_count);
        seatMatrix.push(rowSeats);
      }

      for (let row = 0; row < row_count; row++) {
        let firstSelectedIndex = seatMatrix[row].findIndex(seat => seat.status === SEAT_STATUS.BOOKING);
        let lastSelectedIndex = seatMatrix[row].findLastIndex(seat => seat.status === SEAT_STATUS.BOOKING);

        // Nếu hàng không có ghế được chọn, bỏ qua
        if (firstSelectedIndex === -1 || lastSelectedIndex === -1) continue;
        if (seatMatrix[row].some(seat => seat.slot > 1)) continue;
        // Kiểm tra ghế không liên tục trong hàng
        let prevSelectedIndex = -1;
        for (let i = 0; i < col_count; i++) {
          if (seatMatrix[row][i]?.status === SEAT_STATUS.BOOKING) {
            if (prevSelectedIndex !== -1 && i - prevSelectedIndex > 1) {
              seatErrors.slotError = true;
              break;
            }
            prevSelectedIndex = i;
          }
        }

        // Kiểm tra các điều kiện mép cho hàng này
        if (
          firstSelectedIndex === 1 &&
          seatMatrix[row][0]?.status === SEAT_STATUS.AVAILABLE &&
          seatMatrix[row][lastSelectedIndex + 1]?.status === SEAT_STATUS.AVAILABLE
        ) {
          seatErrors.slotError = true;
        }

        if (
          lastSelectedIndex === (col_count - 1) - 1 &&
          seatMatrix[row][col_count - 1]?.status === SEAT_STATUS.AVAILABLE &&
          seatMatrix[row][firstSelectedIndex - 1]?.status === SEAT_STATUS.AVAILABLE
        ) {
          seatErrors.slotError = true;
        }

        // Nếu phát hiện lỗi ở hàng này, dừng kiểm tra
        if (seatErrors.slotError) break;
      }

      onChange?.({ seatErrors });
    }
  }


  function getPositionSeat(seatNumber: string) {
    const rowIndex = getRowIndex(seatNumber);
    const colIndex = getColIndex(seatNumber);
    return { rowIndex, colIndex };
  }

  function distributeByPct(items: { string: string, percent: number }[]): string {
    const totalPercentage = items.reduce((sum, item) => sum + item.percent, 0);

    // Adjust the last item's percentage if the total is not 100
    if (totalPercentage !== 100) {
      const difference = 100 - totalPercentage;
      items[items.length - 1].percent += difference;
    }

    const randomValue = Math.random() * 100;
    let cumulativePercentage = 0;

    for (let i = 0; i < items.length; i++) {
      cumulativePercentage += items[i].percent;
      if (randomValue < cumulativePercentage) {
        return items[i].string;
      }
    }

    return SEAT_STATUS.AVAILABLE;
  }

}
