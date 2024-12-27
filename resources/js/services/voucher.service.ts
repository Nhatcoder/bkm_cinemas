import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class Voucher extends BaseService {
  async getVouchers() {
    const response = await apiBase.get('/vouchers');
    return response.data;
  }

  async getVoucher(id: string) {
    const response = await apiBase.get(`/vouchers/${id}`);
    return response.data;
  }

  async getUserVouchers() {
    const response = await apiBase.get(`/vouchers/getUserVouchers`);
    return response.data;
  }

  async getVoucherByCode(code: string) {
    const response = await apiBase.get(`/vouchers/getVoucherByCode/${code}`);
    return response.data;
  }
}

export const voucherService: Voucher = Voucher.getInstance();