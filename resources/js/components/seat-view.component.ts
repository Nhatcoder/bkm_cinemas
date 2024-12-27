import Alpine from "alpinejs";
import $ from "jquery";
import "../jquery-plugin/seat-view.plugin";
import { ISeatType } from "@/types/seat-type.interface";
import { ISeat } from "@/types/seat.interface";
import { IShowtime } from "@/types/showtime.interface";
import { showtimeService } from "@/services/showtime.service";
import { IFoodType } from "@/types/food-type.interface";
import { foodService } from "@/services/food.service";
import { price, redirect } from "@/utils/common";
import { IMovie } from "@/types/movie.interface";
import moment from "moment";
import { ICinema } from "@/types/cinema.interface";
import { authService } from "@/services/auth.service";
import { IUser } from "@/types/user.interface";
import { IRoom } from "@/types/room.interface";
import { SEAT_STATUS } from "@/define/seat.define";
import { IFood } from "@/types/food.interface";
import { IBooking } from "@/types/booking.interfaces";
import { paymentService } from "@/services/payment.service";
import { bookingService } from "@/services/booking.service";
import { echo } from "@/echo/Echo";
import { Status } from "@/define/status";
import Swal from "sweetalert2";
import { IVoucher } from "@/types/voucher.interface";
import { voucherService } from "@/services/voucher.service";

Alpine.data('SeatViewComponent', (showtimeId: string, endTime: string) => ({
  errors: {} as Record<string, string>,
  seatTable: null as JQuery<HTMLElement> | null,
  showModal: false,
  seatLayouts: null as any[] | null,
  seatTypes: [] as ISeatType[],
  showtimeDetail: null as IShowtime | null,
  vouchers: [] as IVoucher[],
  foodTypes: [] as IFoodType[],
  seatsSelected: [] as ISeat[],
  totalPriceSeats: 0,
  totalPriceFoods: 0,
  totalPrice: 0,
  price: price,
  movie: {} as IMovie,
  cinema: null as ICinema | null,
  room: null as IRoom | null,
  moment: moment,
  seatErrors: {
    typeError: true,
    quantityError: true,
    slotError: true,
  },
  user: null as IUser | null,
  step: 1,
  foodsSelected: [] as IFood[],
  seconds: 300,
  paymentMethod: '',
  booking: {} as IBooking,
  interval: null as ReturnType<typeof setInterval> | null,
  modalVoucher: false,
  async init() {
    this.countdownTimer(endTime);
    this.user = await authService.getCurrentUser();
    if (this.user) {
      window.user = this.user;
    }
    localStorage.setItem('currentUser', JSON.stringify(this.user));
    await this.getShowtimeDetailById();
    this.setSeatsSelected();
    this.renderSeatLayout();
    await this.getFoodTypes();
    this.addEventListeners();
  },
  async getShowtimeDetailById() {
    if (showtimeId) {
      this.showtimeDetail = await showtimeService.getShowtimeDetailById(showtimeId);
      this.seatTypes = this.showtimeDetail?.room?.seat_types ?? [];
      //@ts-ignore
      this.movie = this.showtimeDetail.movie ?? null;
      this.cinema = this.showtimeDetail.cinema ?? null;
      this.room = this.showtimeDetail.room ?? null;
    }
  },
  toggleModal() {
    this.showModal = !this.showModal;
  },
  async getFoodTypes() {
    this.foodTypes = await foodService.getFoodTypes();
    this.foodTypes.map(foodType => {
      foodType.foods.map(food => {
        food.quantity = 0;
      });
    });
  },
  async submit() {
    if (this.step == 1) {
      if (this.seatErrors.quantityError) return;
      if (this.seatErrors.slotError) {
        Swal.fire({
          icon: 'warning',
          title: 'Cảnh báo',
          text: 'Vui lòng không chừa 1 ghế trống bên trái hoặc bên phải của các ghế bạn đã chọn.!',
        });
        return;
      }
      if (this.seatErrors.typeError) {
        return;
      }
      this.foodsSelected = [];
      this.foodTypes.forEach(foodType => {
        foodType.foods.forEach(food => {
          if (food.quantity > 0) {
            this.foodsSelected.push(food);
          }
        })
      })
      try {
        this.booking = await bookingService.postBooking({
          seats: this.seatsSelected,
          foods: this.foodsSelected,
          movie_id: this.movie.id,
          showtime_id: showtimeId,
          payment_id: 1,
          cinema_id: this.showtimeDetail?.cinema?.id,
        });
        endTime = this.booking.endTime;
        this.countdownTimer(endTime);
        this.seatsSelected = this.booking.seats_booking.map(seat_booking => seat_booking.seat);
        this.calculateTotalPrice();
      } catch (error) {
        console.log(error);
        return;
      }
      this.step = 2;
      this.seconds = 180;
    } else if (this.step == 2) {
      if (!this.paymentMethod) {
        // toastr.error("Vưi lòng chọn phương thức thanh toán", "cảnh báo")
        Swal.fire({
          icon: 'warning',
          title: 'Cảnh báo',
          text: 'Vui lòng chọn phương thức thanh toán. Cảnh báo!',
        });
        return;
      }
      const res = await paymentService.processDeposit({
        payment: this.paymentMethod,
        booking_id: this.booking.id,
        voucher_id: this.voucherSelected?.id
      }) as unknown as any;

      if (res.payment_url) {
        window.location.href = res.payment_url;
      }
      if (res.status == Status.LOW) {
        Swal.fire({
          icon: 'warning',
          title: 'Cảnh báo',
          text: 'Lỗi giao dịch hoặc không đủ số dư vui lòng nạp thêm tiền vào tài khoản!',
        });
        return;
      }
      if (res.status == Status.COMPLETED) {
        Swal.fire({
          title: 'Giao dịch thành công.',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then(() => {
          redirect().to('/thanh-cong', {
            'code': res.code
          });
        });
      }
    }
  },
  renderSeatLayout() {
    if (this.room) {
      $("#seatingArea").seatview({
        col_count: this.room.col_count,
        row_count: this.room.row_count,
        seats: this.room.seats,
        seat_types: this.seatTypes,
        base_price: this.room.base_price,
      }, ({ seatErrors, seat }: { seatsSelected: ISeat[], seatErrors: any, seat: ISeat }) => {
        this.seatErrors = seatErrors;
        console.log(this.seatErrors);
        if (this.seatErrors.quantityError || this.seatErrors.typeError) {
          return;
        };
        showtimeService.bookSeat(showtimeId, seat?.seat_number);
        this.calculateTotalPrice();
      });
    }
  },
  addEventListeners() {
    if (this.user == null) {
      $("#seatingArea").addClass("event-none");
      $("#login").removeClass("tw-hidden");
      $("#combo").addClass("tw-hidden");
      Swal.fire({
        icon: 'warning',
        title: 'Cảnh báo',
        text: 'Bạn phải đăng nhập để đặt vé!',
      });
      redirect().to('/tai-khoan');
    } else {
      $("#seatingArea").removeClass("event-none");
      $("#login").addClass("tw-hidden");
      $("#combo").removeClass("tw-hidden");
    }
    $("#seatingArea").on("click", (e) => {
      if (this.user == null) {
        e.stopPropagation();
        e.preventDefault();
        $("#tab-combo").toggleClass("slide");
        return false;
      }
    });
    echo.join(`showtime.${showtimeId}`)
      .here((users: any) => {
        this.setSeatsSelected();
      })
      .joining((user: any) => {
      })
      .leaving((user: any) => {
      }).listen('BookSeat', (e: { showtimeId: string, seats: ISeat[] }) => {
        this.calculateTotalPrice();
        //@ts-ignore
        this.room.seats = this.room?.seats.map(seat => {
          const updatedSeat = e.seats?.find(updated => updated.seat_number === seat.seat_number);
          if (updatedSeat) {
            return updatedSeat;
          }
          return seat;
        });
        this.setSeatsSelected();
        this.renderSeatLayout();
      });
  },
  setSeatsSelected() {
    const seatsSelected = this.room?.seats?.filter(seat => seat.user_id == this.user?.id && seat.status == SEAT_STATUS.BOOKING) ?? [];
    this.seatsSelected = seatsSelected;
    this.calculateTotalPrice();
  },
  calculateTotalPrice() {
    this.totalPriceSeats = this.seatsSelected.reduce((total, seat) => {
      return total + Number(seat.price);
    }, 0);
    this.totalPriceFoods = this.foodTypes.reduce((total, foodType) => {
      return total + foodType.foods.reduce((sum, food) => sum + (Number(food.price) * Number(food.quantity)), 0);
    }, 0);
  },
  setStep(i: number) {
    this.step = i;
    if (this.step == 1) {
      setTimeout(() => {
        this.renderSeatLayout();
        this.addEventListeners();
      });
    }
  },
  showTabCombo: false,
  countdownTimer(et: string) {
    if (this.interval) {
      clearInterval(this.interval);
      this.interval = null;  // Reset interval
    }

    // Hàm này sẽ tính lại thời gian còn lại mỗi lần gọi, thay vì đếm ngược từng giây
    const updateTime = () => {
      const remainingTime = moment(et).diff(moment(), 'seconds');
      this.seconds = remainingTime > 0 ? remainingTime : 0;
      if (this.seconds <= 0) {
        if (this.interval) {
          clearInterval(this.interval);
          this.interval = null;
        }

        if (this.step === 1) {
          Swal.fire({
            icon: 'warning',
            title: 'Cảnh báo',
            text: 'Hết thời gian đặt ghế!',
          });
        } else if (this.step === 2) {
          Swal.fire({
            icon: 'warning',
            title: 'Cảnh báo',
            text: 'Hết thời gian đặt lịch!',
          });
        }

        redirect().to(`/phim/${this.movie.slug}`);
      }
    };
    updateTime();
    this.interval = setInterval(updateTime, 10);
  },
  formatMinuteSecond() {
    const minute = Math.floor(this.seconds / 60);
    const second = this.seconds % 60;
    return `${minute.toString().padStart(2, '0')}:${second.toString().padStart(2, '0')}`
  },
  voucherSelected: {} as IVoucher,
  voucherCode: '' as string,
  // voucherNotFound: false,
  discountPrice: 0,
  async getVouchers() {
    console.log(this.vouchers);
    if (this.vouchers.length > 0) return;
    this.vouchers = await voucherService.getUserVouchers();

  },
  voucherNotFound: false,
  choseVoucher(voucher: IVoucher) {
    if (voucher.id === this.voucherSelected.id) {
      this.voucherSelected = {} as IVoucher;
      this.discountPrice = 0;
    } else {
      this.voucherSelected = { ...voucher };
      this.discountPrice = this.calculatorVoucherPrice()[this.voucherSelected.discount_type]?.() ?? 0;
    }
    this.voucherNotFound = !this.voucherSelected?.name;
  },
  async applyVoucher() {
    try {
      this.voucherSelected = await voucherService.getVoucherByCode(this.voucherCode.toString());
      this.voucherNotFound = !this.voucherSelected?.name;
      this.discountPrice = this.calculatorVoucherPrice()[this.voucherSelected.discount_type]?.() ?? 0;
    } catch (error: any) {
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: error?.response?.data?.error || error?.message,
      });
      this.voucherNotFound = true;
    }

  },
  calculatorVoucherPrice() {
    return {
      money: () => parseInt(this.voucherSelected.discount_value),
      percentage: () => (this.totalPriceFoods + this.totalPriceSeats) * parseInt(this.voucherSelected.discount_value) / 100,
    }
  }

}));
