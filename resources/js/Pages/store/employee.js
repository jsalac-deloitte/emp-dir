const EmployeeStore = {
    state: {
        employeeList: [],
        employeeMeta: {},
        employeeLinks: {},
        employeeErrors: null,
        employee: {},
    },
    mutations: {
        setEmployeeList: (state, employeeList) =>
            (state.employeeList = employeeList),

        setEmployeeMeta: (state, employeeMeta) =>
            (state.employeeMeta = employeeMeta),

        setEmployeeLink: (state, employeeLinks) =>
            (state.employeeLinks = employeeLinks),

        setEmployeeErrors: (state, employeeErrors) =>
            (state.employeeErrors = employeeErrors),

        setEmployee: (state, employee) => (state.employee = employee),
    },
    actions: {
        loadEmployeeList: ({ commit }, payload) => {
            commit("setEmployeeList", payload.data);
            commit("setEmployeeMeta", payload.meta);
            commit("setEmployeeLink", payload.links);
        },
    },
    getters: {
        getEmployeeList: (state) => state.employeeList,

        getEmployeeMeta: (state) => state.employeeMeta,

        getEmployeeLinks: (state) => state.employeeLinks,

        getEmployee: (state) => state.employee,
    },
};

export default EmployeeStore;
