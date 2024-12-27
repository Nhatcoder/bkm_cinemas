import { ICity } from "./city.interface";

export interface IArea {
  id: string;
  city_id: string;
  name: string;
  created_at: Date | null;
  updated_at: Date | null;
  deleted_at: Date | null;
  city: ICity
}