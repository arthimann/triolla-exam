import axios from 'axios';

const baseUrl = import.meta.env.VITE_APP_BASE_URL
const apiVersion = import.meta.env.VITE_APP_VERSION

axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.baseURL = `${baseUrl}api/${apiVersion}/`;
