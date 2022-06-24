import { createStore } from "vuex";
import CompanyStore from "./company";
import UserStore from "./user";
import EmployeeStore from "./employee";
import DepartmentStore from "./department";
import SmsLogStore from "./smslog";

export default createStore({
    modules: {
        CompanyStore,
        UserStore,
        EmployeeStore,
        DepartmentStore,
        SmsLogStore,
    },
});
