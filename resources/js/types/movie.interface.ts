import { IActor } from "./actor.interfaces";
import { IGenre } from "./genre";
import { IShowtime } from "./showtime.interface";

export interface IMovie {
  id: string;
  title: string;
  slug: string;
  image?: string;
  banner_movie?: string;
  description?: string;
  content?: string;
  duration: number; // Thời lượng phim
  director: string; // Đạo diễn
  trailer_url: string; // Trailer
  format: string; // Định dạng phim: 2D, 3D,...
  age: number;
  release_date: string; // Ngày phát hành
  premiere_date: string; // Ngày khởi chiếu
  country: string; // Quốc gia
  language: string; // 1: Vietsub, 2: No Vietsub
  order: number;
  hot: number;
  active: number;
  created_at: string;
  updated_at: string;
  deleted_at?: string | null;
  actors: IActor[];
  movie_genre: IGenre[],
  showtimes: IShowtime[],
}