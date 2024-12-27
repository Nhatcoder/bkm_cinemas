import { SEAT_STATUS } from "@/define/seat.define";
import { IBooking } from "./booking.interfaces";

export interface ISeat {
  id?: string | null;
  room_id?: number | null;
  seat_number: any;
  price?: number;
  type: string;
  slot: number;
  visible: any;
  merged_seats?: number[] | null;
  order: number;
  selected?: boolean;
  status: SEAT_STATUS_VALUES;
  user_id: string;
  selected_order: number;
  booking_id?: string;
  booking?: IBooking
}

export type SEAT_STATUS_VALUES =
  | typeof SEAT_STATUS.AVAILABLE
  | typeof SEAT_STATUS.SELECTED
  | typeof SEAT_STATUS.BOOKED
  | typeof SEAT_STATUS.BOOKING
