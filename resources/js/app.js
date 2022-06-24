import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import store from "./Pages/store";

import { ZiggyVue } from "ziggy";
import { Ziggy } from "./ziggy";

InertiaProgress.init();

createInertiaApp({
    resolve: async (name) => {
        return (await import(`./Pages/${name}`)).default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(store)
            .component("Link", Link)
            .component("Head", Head)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
