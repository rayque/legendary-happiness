import axios from "axios";

const api = axios.create({
    baseURL: `http://${process.env.VUE_APP_BACKEND_HOST}:${process.env.VUE_APP_BACKEND_PORT}/api/`
});

export default api;
