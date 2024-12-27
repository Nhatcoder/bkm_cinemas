import { IFood } from "./food.interface";
import { ISeat } from "./seat.interface";

export interface IBooking {
  id: string;
  code: string;
  movie_id: number;
  cinema_id: number;
  showtime_id: number;
  user_id: number;
  payment_id: number;
  total_price: number;
  status: 'pending' | 'paid' | 'cancelled' | 'refunded';
  created_at: string | null;
  updated_at: string | null;
  deleted_at?: string | null;
  seats: ISeat[],
  foods: IFood[],
  seats_booking: any[],
  foods_booking: any[],
  endTime: string;
}