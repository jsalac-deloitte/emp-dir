const UserStore = {
    state: {
        userList: [],
        userMeta: {},
        userLinks: {},
        userErrors: null,
        user: {},
    },
    mutations: {
        setUserList: (state, userList) => (state.userList = userList),

        setUserMeta: (state, userMeta) => (state.userMeta = userMeta),

        setUserLink: (state, userLinks) => (state.userLinks = userLinks),

        setUserErrors: (state, userErrors) => (state.userErrors = userErrors),

        setUser: (state, user) => (state.user = user),
    },
    actions: {
        loadUserList: ({ commit }, payload) => {
            commit("setUserList", payload.data);
            commit("setUserMeta", payload.meta);
            commit("setUserLink", payload.links);
        },
    },
    getters: {
        getUserList: (state) => state.userList,

        getUserMeta: (state) => state.userMeta,

        getUserLinks: (state) => state.userLinks,

        getUser: (state) => state.user,
    },
};

export default UserStore;
