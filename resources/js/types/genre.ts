export interface IGenre {
  id: number;
  name: string;
  slug: string;
  avatar?: string | null;
  description?: string | null;
  content?: string | null;
  order: number;
  position: number;
  parent_id: number;
  created_at?: string; // Timestamps in ISO 8601 format
  updated_at?: string; // Timestamps in ISO 8601 format
  deleted_at?: string | null; // Soft delete timestamp, nullable
}