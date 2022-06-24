const DepartmentStore = {
    state: {
        departmentList: [],
        departmentMeta: {},
        departmentLinks: {},
        departmentErrors: null,
        department: {},
    },
    mutations: {
        setDepartmentList: (state, departmentList) =>
            (state.departmentList = departmentList),

        setDepartmentMeta: (state, departmentMeta) =>
            (state.departmentMeta = departmentMeta),

        setDepartmentLink: (state, departmentLinks) =>
            (state.departmentLinks = departmentLinks),

        setDepartmentErrors: (state, departmentErrors) =>
            (state.departmentErrors = departmentErrors),

        setDepartment: (state, department) => (state.department = department),
    },
    actions: {
        loadDepartmentList: ({ commit }, payload) => {
            commit("setDepartmentList", payload.data);
            commit("setDepartmentMeta", payload.meta);
            commit("setDepartmentLink", payload.links);
        },
    },
    getters: {
        getDepartmentList: (state) => state.departmentList,

        getDepartmentMeta: (state) => state.departmentMeta,

        getDepartmentLInks: (state) => state.departmentLinks,

        getDepartment: (state) => state.department,
    },
};

export default DepartmentStore;
