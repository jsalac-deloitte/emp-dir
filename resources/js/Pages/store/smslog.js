const SmsLogStore = {
    state: {
        smslogList: [],
        smslogMeta: {},
        smslogLinks: {},
        smslogErrors: null,
        smslog: {},
    },
    mutations: {
        setSmsLogList: (state, smslogList) => (state.smslogList = smslogList),

        setSmsLogMeta: (state, smslogMeta) => (state.smslogMeta = smslogMeta),

        setSmsLogLink: (state, smslogLinks) =>
            (state.smslogLinks = smslogLinks),

        setSmsLogErrors: (state, smslogErrors) =>
            (state.smslogErrors = smslogErrors),

        setSmsLog: (state, smslog) => (state.smslog = smslog),
    },
    actions: {
        loadSmsLogList: ({ commit }, payload) => {
            commit("setSmsLogList", payload.data);
            commit("setSmsLogMeta", payload.meta);
            commit("setSmsLogLink", payload.links);
        },
    },
    getters: {
        getSmsLogList: (state) => state.smslogList,

        getSmsLogMeta: (state) => state.smslogMeta,

        getSmsLogLinks: (state) => state.smslogLinks,

        getSmsLog: (state) => state.smslog,
    },
};

export default SmsLogStore;
