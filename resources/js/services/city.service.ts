import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class City extends BaseService {
  async getCities() {
    const response = await apiBase.get('/cities');
    return response.data;
  }

  async getCity(id: string) {
    const response = await apiBase.get(`/cities/${id}`);
    return response.data;
  }

  async postCity(data: FormData) {
    const response = await apiBase.post('/cities', data)
    return response.data;
  }

  async putCity(id: number, data: FormData) {
    const response = await apiBase.put(`/cities/${id}`, data);
    return response.data;
  }

  async deleteCity(id: number) {
    const response = await apiBase.delete(`/cities/${id}`);
    return response.data;
  }
}

export const cityService: City = City.getInstance();