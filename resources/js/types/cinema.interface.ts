export interface ICinema {
  id: string;
  area_id: string;
  name: string;
  image: string | null;
  address: string;
  phone: string;
  email: string;
  map: string;
  description: string | null;
  active: number;
  created_at: string;
  updated_at: string;
  deleted_at: string | null;
}