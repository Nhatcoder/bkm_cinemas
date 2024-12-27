import { IBooking } from "./booking.interfaces";
import { IFoodType } from "./food-type.interface";

export interface IFood {
  id: number;
  food_type_id: number;
  image: string;
  name: string;
  description: string | null;
  price: string;
  order: number;
  active: number;
  created_at: string;
  updated_at: string;
  deleted_at: string | null;
  type: IFoodType;
  quantity: number;
  booking_id?: string;
  booking?: IBooking
}
