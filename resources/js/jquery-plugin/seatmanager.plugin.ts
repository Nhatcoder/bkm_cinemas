import $ from "jquery";
import { SEAT_TYPE } from "@/define/seat.define";
import { ISeatLayout } from "@/types/seat-layout.interface";
import { price } from "@/utils/common";
import { ISeatType } from "@/types/seat-type.interface";

$.fn.seatmanager = async function (seatLayout: ISeatLayout & { base_price: any, seat_types: ISeatType[] }, onChange?: (data: any) => any) {
  let { seats, col_count, row_count, base_price = 0, seat_types = [] } = seatLayout;
  if (!seats || seats.length === 0) {
    seats = [];
    for (let row = 0; row < row_count; row++) {
      for (let col = 0; col < col_count; col++) {
        //@ts-ignore
        seats.push({
          type: SEAT_TYPE.STANDARD_SEAT,
          slot: 1,
          visible: true,
          seat_number: `${String.fromCharCode(65 + row)}${(col + 1).toString().padStart(2, '0')}`,
          merged_seats: [],
          order: row * col_count + col,
          price: 0
        });
      }
    }
  }

  const seatTypes = seat_types;
  const contextMenu = $("<div>", {
    class: "context-menu",
  });
  const rowLabels = $("<div>", {
    class: "row-labels tw-py-4",
  });

  const seatTable = $("<div>", {
    class: "seat-table tw-grid tw-gap-2 tw-p-4 tw-rounded-xl",
  });
  this.empty();

  generateSeats(seats);
  this.append(contextMenu, rowLabels, seatTable, rowLabels.clone());

  seatTable.children().each(function () {
    addEventListeners($(this));
  });

  function generateSeats(seats: any[]) {
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
      let calculatorPrice = 0;
      if (base_price !== 0) {
        calculatorPrice = (parseFloat(base_price) + seatTypes[seat.type].bonus_price) * seat.slot
      } else if (seat?.price) {
        calculatorPrice = seat.price
      } else {
        calculatorPrice = (seatTypes[seat.type]?.bonus_price || 0) * seat.slot
      }
      seatTable.append($('<div>', {
        style: `background-color: ${seatTypes[seat.type]?.color}`,
        class: `draggable seat seat-lg tw-col-span-${seat.slot} tw-bg-${seat.type} ${!seat.visible ? 'tw-hidden' : 'tw-visible'}`,
        id: seat.seat_number,
        draggable: true,
        'data-slot': seat.slot,
        'data-type': seat.type,
        'data-seat-number': seat.seat_number,
        'data-visible': seat.visible,
        'data-price': seat.price ?? 0,
        ...(seat.type !== SEAT_TYPE.EMPTY_SEAT && { 'x-tooltip': `"${seat.seat_number} - ${price(calculatorPrice)}"` }),
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


    seatTable.children().each(function () {
      addEventListeners($(this));
    });
    onChange?.({ seatTable, contextMenu, rowLabels, seats, col_count, row_count });
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
        merged_seats: $(this).data('merged-seats')
      };
      seats.push(seat);
    });
    return seats;
  }

  let draggedElement: any = null;
  let contextElement: any = null;

  function addEventListeners(draggable: any) {
    draggable.on('dragstart', (e: any) => {
      draggedElement = e.target;
      e.originalEvent.dataTransfer.effectAllowed = 'move';
      e.originalEvent.dataTransfer.setData('text/plain', $(e.target).html());
    });

    draggable.on('dragover', (e: any) => {
      e.preventDefault();
      seatTable.children().removeClass('drag-over');
      if (draggedElement !== e.target) {
        const draggedData = $(draggedElement).data();
        const targetIndex = $(e.target).index();
        const slot = draggedData.slot;
        const rowLength = col_count;

        if ((targetIndex % rowLength) + slot <= rowLength) {
          let validDrop = true;
          let sumSlot = 0;

          for (let i = 0; i < slot; i++) {
            const targetCell = $(e.target).parent().children().eq(targetIndex + i);
            sumSlot += targetCell.data('slot');
            if (sumSlot > slot) {
              validDrop = false;
              break;
            }
          }

          if (validDrop) {
            for (let i = 0; i < slot; i++) {
              const targetCell = $(e.target).parent().children().eq(targetIndex + i);
              targetCell.addClass('drag-over');
            }
            e.originalEvent.dataTransfer.dropEffect = 'move';
            $(e.target).css('cursor', 'copy');
          } else {
            e.originalEvent.dataTransfer.dropEffect = 'none';
            $(e.target).css('cursor', 'not-allowed');
          }
        } else {
          e.originalEvent.dataTransfer.dropEffect = 'none';
          $(e.target).css('cursor', 'not-allowed');
        }
      }
    });

    draggable.on('dragleave', (e: any) => {
      seatTable.children().removeClass('drag-over');
      $(e.target).css('cursor', '');
    });

    draggable.on('drop', (e: any) => {
      e.preventDefault();
      seatTable.children().removeClass('drag-over');
      $(e.target).css('cursor', '');
      if (draggedElement !== e.target) {
        const draggedData = {
          slot: $(draggedElement).data('slot'),
          type: $(draggedElement).data('type'),
          seatNumber: $(draggedElement).data('seat-number'),
          visible: $(draggedElement).data('visible'),
          price: $(draggedElement).data('price'),
          mergedSeats: $(draggedElement).data('merged-seats') || []
        };

        const targetIndex = $(e.target).index();
        const slot = draggedData.slot;
        const rowLength = col_count;


        if ((targetIndex % rowLength) + slot <= rowLength) {
          let validDrop = true;
          let sumSlot = 0;

          for (let i = 0; i < slot; i++) {
            const targetCell = $(e.target).parent().children().eq(targetIndex + i);
            sumSlot += targetCell.data('slot');
            if (sumSlot > slot) {
              validDrop = false;
              break;
            }
          }

          if (validDrop) {
            const targetData = {
              slot: $(e.target).data('slot'),
              type: $(e.target).data('type'),
              seatNumber: $(e.target).data('seat-number'),
              visible: $(e.target).data('visible'),
              price: $(e.target).data('price'),
              mergedSeats: $(e.target).data('merged-seats') || []
            };


            draggedData.mergedSeats.forEach((seatId: any) => {
              $(`#${seatId}`).data('visible', true);
            });


            $(draggedElement).data('merged-seats', []);
            const newMergedSeats = [];
            for (let i = 0; i < slot; i++) {
              const targetCell = $(e.target).parent().children().eq(targetIndex + i);
              targetCell.data('visible', false);
              if (i !== 0) {
                newMergedSeats.push(targetCell.data('seat-number'));
              }
            }
            $(e.target).data('merged-seats', newMergedSeats);


            $(draggedElement).data('slot', targetData.slot);
            $(draggedElement).data('type', targetData.type);
            $(draggedElement).data('seat-number', targetData.seatNumber);
            $(draggedElement).data('visible', targetData.visible);
            $(draggedElement).data('price', targetData.price);
            $(e.target).data('slot', draggedData.slot);
            $(e.target).data('type', draggedData.type);
            $(e.target).data('seat-number', draggedData.seatNumber);
            $(e.target).data('visible', draggedData.visible);
            $(e.target).data('price', draggedData.price);
            seats = getSeatsFromDOM();
            generateSeats(seats);
          }
        }
      }
    });

    draggable.on('contextmenu', (e: any) => {
      e.preventDefault();
      contextElement = e.target;
      showContextMenu(e.clientX, e.clientY);
    });
  }

  function showContextMenu(x: number, y: number) {
    const colIndex = $(contextElement).index() % col_count;
    const rowIndex = Math.floor($(contextElement).index() / col_count);
    let totalSlotUpToTarget = 0;
    $(seatTable).children().slice(rowIndex * col_count, rowIndex * col_count + colIndex).each(function () {
      if ($(this).data('visible')) {
        totalSlotUpToTarget += $(this).data('slot');
      }
    });
    totalSlotUpToTarget += $(contextElement).data('slot');

    const slot = $(contextElement).data('slot');
    const type = $(contextElement).data('type');
    const isFirstCol = totalSlotUpToTarget === 1 || colIndex === 0;
    const isLastCol = totalSlotUpToTarget === col_count || colIndex === col_count - 1;

    const leftSeat = $(contextElement).prevAll(':visible').first();
    const rightSeat = $(contextElement).nextAll(':visible').first();
    const isLeftCoupleSeat = leftSeat.data('type') === SEAT_TYPE.COUPLE_SEAT;
    const isRightCoupleSeat = rightSeat.data('type') === SEAT_TYPE.COUPLE_SEAT;

    const menuItemsHeader = [
      {
        text: 'Thêm cột',
        icon: `<svg xmlns="http://www.w3.org/2000/svg" fill="#4567B7" width="800px" height="800px" viewBox="0 0 1920 1920"><path d="M120 180v1560c0 33 26.88 60 60 60h1020V120H180c-33.12 0-60 27-60 60Zm1620-60h-420v480h480V180c0-33-26.88-60-60-60Zm60 600h-480v480h480V720Zm-60 1080c33.12 0 60-27 60-60v-420h-480v480h420ZM180 1920c-99.24 0-180-80.76-180-180V180C0 80.76 80.76 0 180 0h1560c99.24 0 180 80.76 180 180v1560c0 99.24-80.76 180-180 180H180Zm596.484-510h-240v-330h-330V840h330V510h240v330h330v240h-330v330Z" fill-rule="evenodd"/><script xmlns=""/></svg>`,
        action: () => addColumn(colIndex)
      },
      {
        text: 'Xóa cột',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none"><path stroke="#E74C3C" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h3M3 21h3m0 0h4a2 2 0 0 0 2-2V9M6 21V9m0-6h4a2 2 0 0 1 2 2v4M6 3v6M3 9h3m0 0h6m-9 6h9m3-6 3 3m0 0 3 3m-3-3 3-3m-3 3-3 3"/><script xmlns=""/></svg>',
        action: () => removeColumn(colIndex)
      },
      {
        text: 'Thêm hàng',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="#4567B7" width="800px" height="800px" viewBox="0 0 1920 1920"><path d="M1740 120H180c-33 0-60 26.88-60 60v1020h1680V180c0-33.12-27-60-60-60Zm60 1620v-420h-480v480h420c33 0 60-26.88 60-60Zm-600 60v-480H720v480h480Zm-1080-60c0 33.12 27 60 60 60h420v-480H120v420ZM0 180C0 80.76 80.76 0 180 0h1560c99.24 0 180 80.76 180 180v1560c0 99.24-80.76 180-180 180H180c-99.24 0-180-80.76-180-180V180Zm510 596.484v-240h330v-330h240v330h330v240h-330v330H840v-330H510Z" fill-rule="evenodd"/><script xmlns=""/></svg>',
        action: () => addRow(rowIndex)
      },
      {
        text: 'Xóa hàng',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none"><path stroke="#E74C3C" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v3m18-3v3m0 0v4a2 2 0 0 1-2 2H9m12-6H9M3 6v4a2 2 0 0 0 2 2h4M3 6h6m0-3v3m0 0v6m6-9v9m-6 3 3 3m0 0 3 3m-3-3 3-3m-3 3-3 3"/><script xmlns=""/></svg>',
        action: () => removeRow(rowIndex)
      }
    ]

    const menuItemsBody = [
      !isFirstCol && !isLeftCoupleSeat && {
        action: () => mergeSeats('merge-left'),
        text: 'Hợp nhất bên trái',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8H14.5a.5.5 0 0 1 0 1H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708 0z"/></svg>',
        color: '#FF0000'
      },
      !isLastCol && !isRightCoupleSeat && {
        action: () => mergeSeats('merge-right'),
        text: 'Hợp nhất bên phải',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M10.146 4.146a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 9H1.5a.5.5 0 0 1 0-1h11.793L10.146 4.854a.5.5 0 0 1 0-.708z"/></svg>',
        color: '#00FF00'
      },
      slot !== 1 && {
        action: () => splitSeat(),
        text: 'Tách ra',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrows-split" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8 1.5a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 7.793V2a.5.5 0 0 1 .5-.5zm0 13a.5.5 0 0 1-.5-.5v-5.793l-2.146 2.147a.5.5 0 0 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 8.707V14a.5.5 0 0 1-.5.5z"/></svg>',
        color: '#FF0000'
      },
      type !== 'empty-seat' && {
        action: () => convertTo(SEAT_TYPE.EMPTY_SEAT),
        text: 'Xóa',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg>',
        color: '#FFA500'
      },
      {
        text: 'Chọn loại ghế',
        icon: '',
        color: '#FFFFFF',
        dropdown: Object.keys(seatTypes)
          .filter(type => type !== 'empty-seat' && type !== 'couple-seat')
          .map(type => ({
            action: () => convertTo(type),
            text: (seatTypes[type as keyof typeof seatTypes] as ISeatType).text,
            icon: (seatTypes[type as keyof typeof seatTypes] as ISeatType).icon,
            color: (seatTypes[type as keyof typeof seatTypes] as ISeatType).color
          }))
      }
    ].filter(item => item);
    createContextMenu(menuItemsBody, menuItemsHeader);

    contextMenu.css({
      left: `${x}px`,
      top: `${y}px`,
      display: 'block'
    });
  }

  function hideContextMenu() {
    contextMenu.hide();
  }

  $(document).on('click', (e) => {
    if (!$(e.target).closest('.context-menu').length) {
      hideContextMenu();
    }
  });

  function mergeSeats(action: string) {
    let elMergeable = null;
    if (action === 'merge-left') {
      elMergeable = $(contextElement).prev();
      while (!elMergeable.data('visible')) {
        elMergeable = elMergeable.prev();
      }
    } else if (action === 'merge-right') {
      elMergeable = $(contextElement).next();
      while (!elMergeable.data('visible')) {
        elMergeable = elMergeable.next();
      }
    }
    if (elMergeable && elMergeable.data('type') !== SEAT_TYPE.COUPLE_SEAT) {
      const oldSlot = $(contextElement).data('slot');
      const newSlot = parseInt(oldSlot) + parseInt(elMergeable.data('slot'));
      $(contextElement).data('slot', newSlot).data('type', 'couple-seat');
      $(elMergeable).data('visible', false);
      $(contextElement).data('merged-seats').push($(elMergeable)[0].id)
    }
  }

  function convertToEmptySeat() {
    $(contextElement).data('slot', 1).data('type', 'empty-seat');
    $(contextElement).nextAll(':hidden').each(function () {
      $(this).data('visible', true).data('type', 'empty-seat').data('slot', 1);
    });
    $(contextElement).prevAll(':hidden').each(function () {
      $(this).data('visible', true).data('type', 'empty-seat').data('slot', 1);
    });
  }

  function splitSeat() {
    $(contextElement).data('slot', 1);
    if ($(contextElement).hasClass('couple-seat')) {
      $(contextElement).data('slot', 1).data('type', 'standard-seat');
    }

    const mergedSeats = $(contextElement).data('merged-seats') || [];
    mergedSeats.forEach((seatId: string) => {
      $(`#${seatId}`).data('visible', true).data('slot', 1);
    });

    $(contextElement).data('merged-seats', []);
  }

  function convertTo(type: string) {
    $(contextElement).data('type', type);
  }

  function createContextMenu(menuItems: any[], menuItemsHeader: any[]) {
    contextMenu.empty();

    const menuHeader = $('<div>', {
      class: 'context-menu__header tw-grid tw-grid-cols-4'
    });
    menuHeader.css('border-bottom', '1px solid #202327');
    menuItemsHeader.forEach((item: any) => {
      const menuItem = $('<div>', {
        class: 'context-menu__item',
        title: item.text,
        click: function () {
          if (item.action) {
            item.action();
            seats = getSeatsFromDOM();
            seats = generateSeats(seats);
            hideContextMenu();
          }
        },
      });
      const icon = $(item.icon).css({
        'margin-right': '0'
      });
      menuItem.append(icon);
      menuHeader.append(menuItem);
    });
    contextMenu.append(menuHeader);
    menuItems.forEach((item: any) => {
      const menuItem = $('<div>', {
        class: 'context-menu__item',
        click: function () {
          if (item.action) {
            item.action();
            seats = getSeatsFromDOM();
            seats = generateSeats(seats);
            hideContextMenu();
          }
        }
      });
      const icon = $(item.icon).css('color', item.color);
      menuItem.append(icon).append(item.text);

      if (item.dropdown) {
        const dropdownMenu = $('<div>', {
          class: 'context-menu__dropdown'
        });
        item.dropdown.forEach((subItem: any) => {
          const dropdownItem = $('<div>', {
            class: 'context-menu__dropdown-item',
            click: function () {
              subItem.action();
              seats = getSeatsFromDOM();
              seats = generateSeats(seats);
              hideContextMenu();
            }
          });
          const subIcon = $(subItem.icon).css('color', subItem.color);
          dropdownItem.append(subIcon).append(subItem.text);
          dropdownMenu.append(dropdownItem);
        });
        menuItem.append(dropdownMenu);
      }

      contextMenu.append(menuItem);
    });
  }

  function addRow(position: number) {
    console.log(position);

    row_count++;
    for (let col = 0; col < col_count; col++) {
      //@ts-ignore
      seats?.splice(position * col_count + col, 0, {
        type: SEAT_TYPE.STANDARD_SEAT,
        slot: 1,
        visible: true,
        seat_number: `${String.fromCharCode(65 + position)}${(col + 1).toString().padStart(2, '0')}`,
        merged_seats: [],
        order: position * col_count + col,
        price: 0
      });
    }
    generateSeats(seats ?? []);
  }

  function addColumn(position: number) {
    for (let row = 0; row < row_count; row++) {
      const seat = seats?.[row * col_count + position];
      if (seat && seat.type === SEAT_TYPE.COUPLE_SEAT || !seat?.visible) {
        //@ts-ignore
        toastr.warning('Vui lòng xóa ghế cặp trước');
        return;
      }
    }
    col_count++;
    for (let row = 0; row < row_count; row++) {
      //@ts-ignore
      seats?.splice(row * col_count + position, 0, {
        type: SEAT_TYPE.STANDARD_SEAT,
        slot: 1,
        visible: true,
        seat_number: `${String.fromCharCode(65 + row)}${(position + 1).toString().padStart(2, '0')}`,
        merged_seats: [],
        order: row * col_count + position,
        price: 0
      });
    }
    generateSeats(seats ?? []);
  }

  function removeRow(position: number) {
    if (position < 0 || position >= row_count) return;
    seats?.splice(position * col_count, col_count);
    row_count--;
    generateSeats(seats ?? []);
  }


  function removeColumn(position: number) {
    for (let row = 0; row < row_count; row++) {
      const seat = seats?.[row * col_count + position];
      if (seat && seat.type === SEAT_TYPE.COUPLE_SEAT || !seat?.visible) {
        //@ts-ignore
        toastr.warning('Vui lòng xóa ghế cặp trước');
        return;
      }
    }

    if (position < 0 || position >= col_count) return;
    for (let row = row_count - 1; row >= 0; row--) {
      seats?.splice(row * col_count + position, 1);
    }
    col_count--;
    generateSeats(seats ?? []);
  }

}