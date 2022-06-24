<template>
    <button
        :type="type"
        class="flex justify-center py-2 px-4 border border-transparent shadow-sm rounded-md text-white tracking-widest"
    >
        <slot />
    </button>
</template>

<script>
export default {
    props: ["type"],
    setup() {
        return {};
    },
};
</script>

<style scoped></style>
