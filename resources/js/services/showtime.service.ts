import { IShowtime } from "@/types/showtime.interface";
import { BaseService } from "./base.service";
import { ISeat } from "@/types/seat.interface";
import { apiBase } from "@/api/api-base";


class Showtime extends BaseService {
  async getShowtimes() {
    const response = await apiBase.get<IShowtime[]>('/showtimes');
    return response.data;
  }

  async getShowtime(id: string) {
    const response = await apiBase.get<IShowtime>(`/showtimes/${id}`);
    return response.data;
  }

  async postShowtime(data: IShowtime) {
    const response = await apiBase.post<IShowtime>('/showtimes', data);
    return response.data;
  }

  async putShowtime(id: string, data: IShowtime) {
    const response = await apiBase.put<IShowtime>(`/showtimes/${id}`, data);
    return response.data;
  }

  async deleteShowtime(id: string) {
    const response = await apiBase.delete(`/showtimes/${id}`);
    return response.data;
  }

  async getShowtimesByDayAndRoomId(startDate: string, roomId: string): Promise<IShowtime[]> {
    const response = await apiBase.get<IShowtime[]>('/showtimes/getShowtimesByDayAndRoomId', {
      params: {
        start_date: startDate,
        room_id: roomId
      }
    });
    return response.data;
  }

  async getShowtimeDetailById(id: string) {
    const response = await apiBase.get<IShowtime>(`/showtimes/${id}/detail`);
    return response.data;
  }

  async clearShowtimeMovie(id: string) {
    const response = await apiBase.put<IShowtime>(`/showtimes/${id}/clear-movie`);
    return response.data;
  }

  async updateShowtimeMovie(id: string, movieId: string) {
    const response = await apiBase.put<IShowtime>(`/showtimes/${id}/update-movie`, { movie_id: movieId });
    return response.data;
  }

  async bookSeat(id: string, seatNumber: string) {
    const response = await apiBase.post(`/showtimes/${id}/book-seat`, {
      seat_number: seatNumber
    })
  }

  async getShowtimeDetailForMovie(data: any) {
    const response = await apiBase.get<IShowtime[]>('/showtimes/getShowtimeDetailForMovie', {
      params: data
    });
    return response.data;
  }
}


export const showtimeService: Showtime = Showtime.getInstance();