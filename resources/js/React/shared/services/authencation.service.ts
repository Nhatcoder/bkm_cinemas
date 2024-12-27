import { getRecoil, setRecoil } from 'recoil-nexus';
import environment from '@/React/environment';
import { tokenSelectorState, userState } from '@/React/state';
import { IUser } from '../interfaces/user.interface';
import { apiBase } from '@/api/api-base';

export const logout = () => {
  localStorage.clear();
  setRecoil(userState, undefined);
  window.location.href = '/login';
};

export const RefreshTokenAction = () => {
  const token = getRecoil(tokenSelectorState);
  const dataRequest = {
    refreshToken: token?.RefreshToken
  };
  return apiBase.post<{ JwtToken: string }>(`${environment.baseUrl}/refreshToken`, dataRequest);
};

export const login = (data: { email: string; password: string }) => {
  return apiBase.post<IUser>(`${environment.baseUrl}/login`, data);
};

export const registerAction = (data: { name: string; phone: string; email: string; password: string }) => {
  return apiBase.post(`${environment.baseUrl}/register`, data);
};
