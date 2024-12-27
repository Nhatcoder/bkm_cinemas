import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class Booking extends BaseService {
  //#region Food Type
  async getBookings() {
    const response = await apiBase.get('/bookings');
    return response.data;
  }

  async getBooking(id: string) {
    const response = await apiBase.get(`/bookings/${id}`);
    return response.data;
  }

  async postBooking(data: any) {
    const response = await apiBase.post('/bookings', data);
    return response.data;
  }

  async putBooking(id: string, data: any) {
    const response = await apiBase.put(`/bookings/${id}`, data);
    return response.data;
  }

  async deleteBooking(id: string) {
    const response = await apiBase.delete(`/bookings/${id}`);
    return response.data;
  }
  //#endregion
}

export const bookingService: Booking = Booking.getInstance();