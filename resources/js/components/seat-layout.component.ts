import { roomService } from "@/services/room.service";
import Alpine from "alpinejs";
import { domToBlob, redirect } from "@/utils/common";
import $ from "jquery";
import "../jquery-plugin/seatmanager.plugin";
import { ISeatLayout } from "@/types/seat-layout.interface";
import * as yup from 'yup';
import { ISeatType } from "@/types/seat-type.interface";
import { ISeat } from "@/types/seat.interface";
const seatLayoutSchema = yup.object().shape({
  name: yup.string().required('Tên sơ đồ ghế là bắt buộc'),
  col_count: yup.number()
    .typeError('Số cột phải là một số và không được để trống')
    .min(1, 'Số cột phải lớn hơn hoặc bằng 1'),
  row_count: yup.number()
    .typeError('Số cột phải là một số và không được để trống')
    .min(1, 'Số hàng phải lớn hơn hoặc bằng 1'),
});

Alpine.data('SeatLayout', (seatLayoutId?: number) => ({
  formData: {
    id: null as any,
    name: '',
    col_count: 11,
    row_count: 10,
    seats: [] as ISeat[],
  } as ISeatLayout,
  seatTypes: [] as ISeatType[],
  errors: {} as Record<string, string>,
  seatTable: null as JQuery<HTMLElement> | null,
  showModal: false,
  seatLayouts: null as any[] | null,
  async init() {
    this.seatTypes = await roomService.getSeatTypesKeyByCode();
    this.seatLayouts = await roomService.getSeatLayouts();
    this.getSeatLayoutById();
    this.renderSeatLayout();
    if (seatLayoutId) {
      //@ts-ignore
      this.formData.id = seatLayoutId;
    }
  },
  async getSeatLayoutById() {
    const seatLayout = this.seatLayouts?.find((seatLayout: any) => seatLayout.id === seatLayoutId);
    if (seatLayout) {
      this.formData = { ...seatLayout } as any;
    }
  },
  async onSubmit() {
    try {
      await seatLayoutSchema.validate(this.formData, { abortEarly: false });
    } catch (error: any) {
      if (error instanceof yup.ValidationError) {
        const { inner } = error;
        inner.forEach((err: any) => {
          this.errors[err.path] = err.message;
        });
      }
      return;
    }
    const formData = new FormData();
    formData.set('name', this.formData.name);
    formData.set('col_count', this.formData.col_count.toString());
    formData.set('row_count', this.formData.row_count.toString());
    formData.set('seats', JSON.stringify(this.formData.seats));
    if (this.seatTable) {
      formData.set('image', await domToBlob(this.seatTable[0]));
    }
    try {
      if (seatLayoutId) {
        await roomService.putSeatLayout(seatLayoutId, formData);
      } else {
        await roomService.postSeatLayout(formData);
      }
      toastr.success('Thao tác thành công');
      setTimeout(() => {
        redirect().to('/admin/room-manager/seat-layouts');
      }, 500);
    } catch (error: any) {
      console.error(error);
      toastr.error(error.message);
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
}));