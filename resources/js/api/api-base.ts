import axios, { AxiosError } from "axios";



export const apiBase = axios.create({
  baseURL: "/api",
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') ?? '',
    "X-Requested-With": "XMLHttpRequest",
  },
});

// Thêm request interceptor cho instance mới
apiBase.interceptors.request.use(
  (config) => {
    const methodsToOverride = ['delete', 'put', 'patch'];

    if (methodsToOverride.includes(config.method ?? '')) {
      config.headers['X-HTTP-Method-Override'] = config.method;
      config.method = 'post';
    }

    return config;
  },
  (error) => {
    console.error('Request interceptor error:', error);
    return Promise.reject(error);
  }
);

// Thêm response interceptor cho instance mới
apiBase.interceptors.response.use(
  (response) => response,
  (error: AxiosError) => {
    if (error.response && error.response.status === 401) {
      localStorage.clear();
      console.error('Đăng nhập hết hạn. Vui lòng đăng nhập lại.');
    }
    return Promise.reject(error);
  }
);

export interface IErrorResponse {
  errors: { [key: string | number]: string[] };
  message: string;
}
