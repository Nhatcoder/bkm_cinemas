import { roomService } from "@/services/room.service";
import { ISeatType } from "@/types/seat-type.interface";
import { redirect } from "@/utils/common";
import Alpine from "alpinejs";
import $ from "jquery";
import * as yup from 'yup';

const seatTypeSchema = yup.object().shape({
  code: yup.string().required('Mã loại ghế là bắt buộc'),
  bonus_price: yup.number().required('Giá tiền thêm là bắt buộc').min(0, 'Giá tiền thêm phải lớn hơn 0'),
  text: yup.string().required('Tên loại ghế là bắt buộc'),
  color: yup.string().required('Màu sắc là bắt buộc'),
  icon: yup.string().required('Icon là bắt buộc'),
  is_system: yup.boolean().nullable(),
});

Alpine.data('SeatTypeComponent', (seatTypeId?: number) => ({
  //@ts-ignore
  formData: {
    id: null as number | null,
    code: '',
    bonus_price: 0,
    text: '',
    color: '#FFFFFF',
    icon: '',
    is_system: true,
  } as ISeatType,
  errors: {} as Record<string, string>,
  init() {
    this.getSeatTypeById();
  },
  async onSubmit() {
    // in ra lỗi
    try {
      await seatTypeSchema.validate(this.formData, { abortEarly: false });
    } catch (error: any) {
      if (error instanceof yup.ValidationError) {

        const { inner } = error;
        inner.forEach((err: any) => {
          this.errors[err.path] = err.message;
        });
      }
      return;
    }

    try {
      if (seatTypeId) {
        await roomService.putSeatType(seatTypeId, this.formData);
      } else {
        await roomService.postSeatType(this.formData);
      }
      toastr.success('Thao tác thành công');
      setTimeout(() => {
        redirect().to('admin/room-manager/seat-types');
      }, 500);
    } catch (error: any) {
      console.error(error);
      toastr.error(error.message);
    }
  },
  async getSeatTypeById() {
    if (seatTypeId) {
      const seatType = await roomService.getSeatType(seatTypeId);
      this.formData = seatType;
    }
  },
}));
