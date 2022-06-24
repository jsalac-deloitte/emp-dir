<template lang="">
    <div
        class="flex flex-col h-screen w-screen xl:flex-row items-center justify-center bg-login bg-no-repeat xl:bg-left bg-center xl:bg-start bg-gray-100"
    >
        <div
            class="flex w-full h-auto px-4 py-4 justify-center xl:justify-end xl:max-w-[90%] text-secondary"
        >
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
