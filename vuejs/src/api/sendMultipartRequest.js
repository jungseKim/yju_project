import axios from "axios";

const instance = axios.create({});

instance.interceptors.request.use(
        (config) => {
              const token = localStorage.getItem('accessToken')
              if (token)
                     config.headers.Authorization = token
              else
                     console.log('no-Token')
              config.headers['Content-Type'] = 'multipart/form-data';
              return config;
       },
       (error) => {
              console.log('에러입니다')
              return Promise.reject(error);
       }
);

instance.interceptors.response.use(
       (response) => {
              return response;
       },
       (error) => {
              return Promise.reject(error)
       }
);


export default instance