import { apiBase } from "@/api/api-base";
import { BaseService } from "./base.service";

class Food extends BaseService {
  //#region Food
  async getFoods() {
    const response = await apiBase.get('/foods');
    return response.data;
  }

  async getFood(id: string) {
    const response = await apiBase.get(`/foods/${id}`);
    return response.data;
  }

  async postFood(data: any) {
    const response = await apiBase.post('/foods', data);
    return response.data;
  }

  async putFood(id: string, data: any) {
    const response = await apiBase.put(`/foods/${id}`, data);
    return response.data;
  }

  async deleteFood(id: string) {
    const response = await apiBase.delete(`/foods/${id}`);
    return response.data;
  }
  //#endregion

  //#region Food Type
  async getFoodTypes() {
    const response = await apiBase.get('/food-types');
    return response.data;
  }

  async getFoodType(id: string) {
    const response = await apiBase.get(`/food-types/${id}`);
    return response.data;
  }

  async postFoodType(data: any) {
    const response = await apiBase.post('/food-types', data);
    return response.data;
  }

  async putFoodType(id: string, data: any) {
    const response = await apiBase.put(`/food-types/${id}`, data);
    return response.data;
  }

  async deleteFoodType(id: string) {
    const response = await apiBase.delete(`/food-types/${id}`);
    return response.data;
  }
  //#endregion
}

export const foodService: Food = Food.getInstance();