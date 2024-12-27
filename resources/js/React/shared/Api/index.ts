import axios from 'axios';
import { getRecoil, setRecoil } from 'recoil-nexus';
import environment from '../../environment';
import { RefreshTokenAction, logout } from '@/React/shared/services/authencation.service';
import { tokenSelectorState, userState } from '@/React/state';
import { IUser } from '@/React/shared/interfaces/user.interface';

const ApiBase = axios.create({
  baseURL: environment.baseUrl,
  timeout: 10000
});

let isRefreshing = false;
let refreshSubscribers: any = [];

// check request
ApiBase.interceptors.request.use(
  async (config: any) => {
    const token = getRecoil(tokenSelectorState);

    if (token?.JwtToken) config.headers.Authorization = 'Bearer ' + token.JwtToken;
    return config;
  },
  (error: any) => {
    return Promise.reject(error.response);
  }
);

// check response
ApiBase.interceptors.response.use(
  (response) => {
    return response;
  },
  async (error: any) => {
    if (error.response?.status === 401) {
      console.warn('Token expired');
      console.log('Refreshing token...');
      if (!isRefreshing) {
        try {
          isRefreshing = true;
          const res = await RefreshTokenAction();
          if (res.data?.JwtToken) {
            setRecoil(userState, {
              ...getRecoil(userState),
              JwtToken: res.data?.JwtToken
            } as IUser);
            console.log('Refresh token success');
            isRefreshing = false;
            // thử lại yêu cầu gốc
            const originalRequest = error.config;
            originalRequest.headers.Authorization = 'Bearer ' + res.data?.JwtToken;
            return await ApiBase(originalRequest);
          } else {
            throw error; // re-throw the error if token refresh fails
          }
        } catch (err) {
          logout();
          throw err; // re-throw the error if token refresh fails
        }
      } else {
        throw error; // re-throw the error if already refreshing token
      }
    } else {
      throw error; // re-throw the error if not a 401 error
    }
  }
);

export default ApiBase;
