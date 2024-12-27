import { roomService } from "@/services/room.service";
import Alpine from "alpinejs";
import { domToBlob, redirect } from "@/utils/common";
import $ from "jquery";
import "../jquery-plugin/seatmanager.plugin";
import "@/jquery-plugin/select-day"
import "@/jquery-plugin/select-time"
import { IRoom } from "@/types/room.interface";
import * as yup from 'yup';
import { ISeatType } from "@/types/seat-type.interface";
import { ISeat } from "@/types/seat.interface";
import { showtimeService } from "@/services/showtime.service";
import { IShowtime } from "@/types/showtime.interface";
import { IMovie } from "@/types/movie.interface";
import { movieService } from "@/services/movie.service";
import Inputmask from "inputmask";
import "jquery.inputmask";
import moment from "moment";

const roomSchema = yup.object().shape({
  room_name: yup.string().required('Tên phòng là bắt buộc'),
  col_count: yup.number()
    .typeError('Số cột phải là một số và không được để trống')
    .min(1, 'Số cột phải lớn hơn hoặc bằng 1'),
  row_count: yup.number()
    .typeError('Số cột phải là một số và không được để trống')
    .min(1, 'Số hàng phải lớn hơn hoặc bằng 1'),
  base_price: yup.number().min(10000, 'Giá cơ bản phải lớn hơn hoặc bằng 10000').required('Giá cơ bản là bắt buộc'),
});

Alpine.data('RoomComponent', (roomId: string | null = null) => ({
  errors: {} as Record<string, string>,
  isSubmitting: false,
  formData: {
    id: null as any,
    room_name: '',
    col_count: 11,
    row_count: 10,
    base_price: 0,
    seats: null as ISeat[] | null,
  } as IRoom,
  seatTable: null as JQuery<HTMLElement> | null,
  showModal: false,
  showModalMovie: false,
  seatLayouts: null as any[] | null,
  seatTypes: [] as ISeatType[],
  showtimeSelected: null as IShowtime | null,
  showtimes: [] as IShowtime[],
  dateSelected: null as string | null,
  movies: [] as IMovie[],
  async init() {
    $(":input").inputmask();
    this.seatTypes = await roomService.getSeatTypesKeyByCode();
    this.seatLayouts = await roomService.getSeatLayouts();
    this.movies = await movieService.getMovies();

    if (roomId) {
      await this.getRoomById(roomId);
    }
    this.renderSeatLayout();
    this.renderSelectDay();
  },
  async onSubmit() {
    if (this.isSubmitting) return;
    this.isSubmitting = true;
    try {
      await roomSchema.validate(this.formData, { abortEarly: false });
    } catch (error: any) {
      if (error instanceof yup.ValidationError) {
        const { inner } = error;
        inner.forEach((err: any) => {
          this.errors[err.path] = err.message;
        });
      }
      this.isSubmitting = false;
      return;
    }

    const formData = new FormData();
    let repoData:{ url: string };
    formData.set('room_name', this.formData.room_name);
    formData.set('col_count', this.formData.col_count.toString());
    formData.set('row_count', this.formData.row_count.toString());
    formData.set('base_price', this.formData.base_price.toString());
    formData.set('seats', JSON.stringify(this.formData.seats));
    if (this.seatTable) {
      formData.set('image', await domToBlob(this.seatTable[0]));
    }
    try {
      let url = '/admin/room-manager/rooms';
      if (roomId) {
        await roomService.putRoom(roomId, formData);
      } else {
        const room = await roomService.postRoom(formData);
        url = `/admin/room-manager/rooms/${room.id}/edit`;
      }
      swal.fire({
        title: 'Thao tác thành công!',
        icon: 'success',
        showCancelButton: false,
        showConfirmButton: false,
        timer: 1000,
        reverseButtons: false
      }).then(() => redirect().to(url));
    } catch (error: any) {
      toastr.error(error?.response?.data?.message || error?.message);
    } finally {
        this.isSubmitting = false; 
    }
  },
  async getRoomById(roomId: string) {
    const room = await roomService.getRoom(roomId);
    if (room) {
      this.formData = { ...room };
    }
  },
  toggleModal() {
    this.showModal = !this.showModal;
  },
  selectLayout(seatLayout: any) {
    this.formData.id = seatLayout.id;
    this.formData.col_count = seatLayout.col_count;
    this.formData.row_count = seatLayout.row_count;
    this.formData.seats = seatLayout.seats;
    this.renderSeatLayout();
    setTimeout(() => {
      this.showModal = false;
    }, 100);
  },
  renderSeatLayout() {
    $("#seatingArea").seatmanager({
      col_count: this.formData.col_count,
      row_count: this.formData.row_count,
      seats: this.formData.seats,
      seat_types: this.seatTypes,
      base_price: this.formData.base_price,
    }, (data: any) => {
      this.formData.seats = data.seats;
      this.seatTable = data.seatTable;
      if (!isNaN(data.col_count)) {
        this.formData.col_count = data.col_count;
      }
      if (!isNaN(data.row_count)) {
        this.formData.row_count = data.row_count;
      }
    });
  },
  renderSelectDay() {
    $("#selectDay").selectDay({
      daysFromNow: 0,
      numberOfDays: 24,
    }, (date: string | null) => {
      this.dateSelected = moment(date).format('YYYY-MM-DD');
      this.showtimeSelected = null;
      (date && roomId) && showtimeService.getShowtimesByDayAndRoomId(date, roomId).then((showtimes) => {
        this.showtimes = showtimes;
        this.renderSelectTime(showtimes);
      });
    });
  },
  renderSelectTime(showtimes: IShowtime[], idShowtimeSelected: string | null = null) {
    $("#selectedTime").selectTime({ showtimes, idShowtimeSelected }, (showtime: IShowtime | null) => {
      this.showtimeSelected = showtime;
    });
  },
  searchQuery: '',
  filteredMovies() {
    if (this.searchQuery === '') {
      return this.movies;
    }
    return this.movies?.filter(movie => movie.title.toLowerCase().includes(this.searchQuery.toLowerCase())) ?? [];
  },
  async selectMovie(movie: IMovie) {
    if (!this.showtimeSelected?.id) return;
    await showtimeService.updateShowtimeMovie(this.showtimeSelected?.id, movie.id)
      .then((showtime) => {
        toastr.success('Cập nhật phim thành công');
        this.showtimeSelected = showtime;
        this.showModalMovie = false;
        const index = this.showtimes.findIndex(showtime => showtime.id === this.showtimeSelected?.id);
        if (index !== -1) {
          this.showtimes[index] = showtime;
          this.renderSelectTime(this.showtimes, showtime.id);
        }
      }).catch((error: any) => {
        toastr.error(error.message);
      });

  },
  clearShowtimeMovie() {
    this.showtimeSelected?.id &&
      showtimeService.clearShowtimeMovie(this.showtimeSelected?.id)
        .then(() => {
          toastr.success('Gỡ phim thành công');
          if (this.showtimeSelected?.movie) {
            this.showtimeSelected.movie = null;
            this.showtimeSelected.movie_id = null;
          }
        }).catch((error: any) => {
          toastr.error(error.message);
        });
  },
  addShowtime() {
    if (!moment(this.dateSelected).isValid()) {
      toastr.error('Ngày không hợp lệ vui lòng chọn ngày');
      return false;
    }
    if (!$("#start_time").inputmask('isComplete') || !$("#end_time").inputmask('isComplete')) {
      toastr.error('Thời gian không hợp lệ');
      return false;
    }

    const startTime = moment(`${this.dateSelected} ${$("#start_time").val()}`, 'YYYY-MM-DD HH:mm').format();
    const endTime = moment(`${this.dateSelected} ${$("#end_time").val()}`, 'YYYY-MM-DD HH:mm').format();

    if (moment(startTime).isAfter(endTime)) {
      toastr.error('Thời gian kết thúc phải lớn hơn thời gian bắt đầu');
      return false;
    }

    if (this.checkTimeRangeExists(startTime, endTime)) {
      toastr.error('Khoảng thời gian đã tồn tại');
      return false;
    }



    showtimeService.postShowtime({
      room_id: roomId,
      movie_id: null,
      start_time: startTime,
      end_time: endTime,
    }).then((res) => {
      this.showtimes.push(res);
      this.renderSelectTime(this.showtimes);
      toastr.success('Thêm suất chiếu thành công');
    }).catch((error: any) => {
      toastr.error(error.message);
    });

    return true;
  },
  checkTimeRangeExists(startTime: string, endTime: string) {
    const isTimeRangeExists = this.showtimes.some(showtime => {
      const existingStart = moment(showtime.start_time);
      const existingEnd = moment(showtime.end_time);
      return (moment(startTime).isBetween(existingStart, existingEnd, null, '[)') ||
        moment(endTime).isBetween(existingStart, existingEnd, null, '(]') ||
        (moment(startTime).isSameOrBefore(existingStart) && moment(endTime).isSameOrAfter(existingEnd)));
    });
    return isTimeRangeExists;
  },
  deleteShowtime() {
    swal.fire({
      title: 'Bạn có chắc không?',
      text: "Bạn sẽ không thể hoàn tác điều này!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Tiếp tục',
      cancelButtonText: 'Hủy bỏ',
      reverseButtons: true
    }).then((result: any) => {
      if (result.isConfirmed) {
        if (!this.showtimeSelected?.id) return;
        showtimeService.deleteShowtime(this.showtimeSelected.id)
          .then(() => {
            toastr.success('Xóa suất chiếu thành công');
            this.showtimes = this.showtimes.filter(showtime => showtime.id !== this.showtimeSelected?.id);
            this.showtimeSelected = null;
            this.renderSelectTime(this.showtimes);
          }).catch((error: any) => {
            toastr.error(error.message);
          });
      }
    });
  }
}));
