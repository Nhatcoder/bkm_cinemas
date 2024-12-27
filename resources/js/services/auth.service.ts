import { BaseService } from "./base.service";
import { IUser } from "@/types/user.interface";
import { apiBase } from "@/api/api-base";

class Auth extends BaseService {
  async getCurrentUser() {
    const response = await apiBase.get<IUser | null>('users/getCurrentUser');
    return response.data;
  }
}

export const authService: Auth = Auth.getInstance();