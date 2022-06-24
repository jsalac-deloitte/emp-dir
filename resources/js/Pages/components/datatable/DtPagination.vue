<template>
    <div class="flex" v-if="pages.total > 0">
        <div v-for="(page, index) in pages.links" :key="index">
            <button
                class="flex items-center px-4 py-2 mx-1 bg-gray-300 rounded-md dark:bg-navy dark:text-white h-12 text-lg w-auto"
                @click="changePage(page.url)"
                v-bind:disabled="page.active || page.url == null"
                v-html="page.label"
                :class="
                    page.url == null
                        ? 'cursor-not-allowed text-gray-400'
                        : page.active
                        ? 'bg-navy text-white cursor-not-allowed font-semibold'
                        : 'text-shite hover:bg-navy   hover:text-white  dark:hover:bg-navy-light'
                "
            ></button>
        </div>
    </div>
</template>

<script>
import { computed } from "vue";

export default {
    setup(props, context) {
        function changePage(url) {
            context.emit("changePage", url);
        }

        const pageLength = computed(() => {
            return props.meta.links.length;
        });

        return { pages: computed(() => props.meta), changePage, pageLength };
    },
    props: ["meta"],
};
</script>

<style lang="scss" scoped></style>
