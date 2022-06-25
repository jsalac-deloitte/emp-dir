import axios from "axios";

const apiHttp = axios.create({
    baseURL: "http://seph-vilt.herokuapp.com",
    headers: {
        "X-Requested-With": "XMLHttpRequest",
    },
});

export default apiHttp;
