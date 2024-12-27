export interface IActor {
  id: number;
  name?: string | null;
  image?: string | null;
  biography?: string | null;
  birth_date?: string | null;
  nationality?: string | null;
  created_at?: string;
  updated_at?: string;
  deleted_at?: string | null;
}