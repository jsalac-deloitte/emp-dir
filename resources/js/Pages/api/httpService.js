import axios from "axios";

const apiHttp = axios.create({
    baseURL: "http://localhost:8000",
    headers: {
        "X-Requested-With": "XMLHttpRequest",
    },
});

export default apiHttp;
