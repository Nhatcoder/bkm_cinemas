import { ISeatType } from "./seat-type.interface";
import { ISeat } from "./seat.interface";

export interface IRoom {
  id?: string | null;
  room_name: string;
  image: any;
  base_price: number;
  col_count: number;
  row_count: number;
  seats: ISeat[] | null;
  seat_types?: ISeatType[];

}