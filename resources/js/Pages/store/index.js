import { createStore } from "vuex";
import CompanyStore from "./company";
import UserStore from "./user";
import EmployeeStore from "./employee";
import DepartmentStore from "./department";

export default createStore({
    modules: {
        CompanyStore,
        UserStore,
        EmployeeStore,
        DepartmentStore,
    },
});
