import { IArea } from "./area.interface";

export interface ICity {
  id: string;
  name: string;
  created_at: Date | null;
  updated_at: Date | null;
  deleted_at: Date | null;
  areas: IArea[]
}