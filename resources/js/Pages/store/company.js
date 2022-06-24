const CompanyStore = {
    state: {
        companyList: [],
        companyMeta: {},
        companyLinks: {},
        companyErrors: null,
        company: {},
    },
    mutations: {
        setCompanyList: (state, companyList) =>
            (state.companyList = companyList),

        setCompanyMeta: (state, companyMeta) =>
            (state.companyMeta = companyMeta),

        setCompanyLinks: (state, companyLinks) =>
            (state.companyLinks = companyLinks),

        setDepartmentErrors: (state, companyErrors) =>
            (state.companyErrors = companyErrors),

        setDepartment: (state, company) => (state.company = company),
    },
    actions: {
        loadCompanyList: ({ commit }, payload) => {
            commit("setCompanyList", payload.data);
            commit("setCompanyMeta", payload.meta);
            commit("setCompanyLinks", payload.links);
        },
    },
    getters: {
        getCompanyList: (state) => state.companyList,

        getCompanyMeta: (state) => state.companyMeta,

        getCompanyLinks: (state) => state.companyLinks,

        getCompany: (state) => state.company,
    },
};

export default CompanyStore;
