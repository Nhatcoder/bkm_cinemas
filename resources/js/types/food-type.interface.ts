import { IFood } from "./food.interface";

export interface IFoodType {
  id: string;
  name: string;
  order: number;
  active: number;
  created_at: Date | null;
  updated_at: Date | null;
  deleted_at: Date | null;
  foods: IFood[];
}

