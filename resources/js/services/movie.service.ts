import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class Movie extends BaseService {
  async getMovies() {
    const response = await apiBase.get('/movies');
    return response.data;
  }

  async getMovie(id: string) {
    const response = await apiBase.get(`/movies/${id}`);
    return response.data;
  }

  async postMovie(data: FormData) {
    const response = await apiBase.post('/movies', data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
    return response.data;
  }

  async putMovie(id: number, data: FormData) {
    const response = await apiBase.put(`/movies/${id}`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
    return response.data;
  }

  async deleteMovie(id: number) {
    const response = await apiBase.delete(`/movies/${id}`);
    return response.data;
  }
}

export const movieService: Movie = Movie.getInstance();