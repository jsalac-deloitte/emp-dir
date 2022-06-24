<template lang="">
    <div class="flex flex-col h-screen w-full bg-primary">
        <Header></Header>
        <div class="grow w-full">
            <slot></slot>
        </div>
    </div>
</template>
<script>
import Header from "../components/Header";
export default {
    components: { Header },
    setup() {},
};
</script>
<style lang=""></style>
