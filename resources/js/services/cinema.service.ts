import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class Cinema extends BaseService {
  //#region Food Type
  async getCinemas() {
    const response = await apiBase.get('/cinemas');
    return response.data;
  }

  async getCinema(id: string) {
    const response = await apiBase.get(`/cinemas/${id}`);
    return response.data;
  }

  async postCinema(data: any) {
    const response = await apiBase.post('/cinemas', data);
    return response.data;
  }

  async putCinema(id: string, data: any) {
    const response = await apiBase.put(`/cinemas/${id}`, data);
    return response.data;
  }

  async deleteCinema(id: string) {
    const response = await apiBase.delete(`/cinemas/${id}`);
    return response.data;
  }
  //#endregion
}

export const cinemaService: Cinema = Cinema.getInstance();