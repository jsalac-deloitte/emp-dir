<template lang="">
    <div class="flex w-auto h-24 px-6 py-4 bg-white justify-center">
        <!-- brandd -->
        <Link href="/" class="cursor-pointer">
            <img
                src="/images/mylogo.png"
                alt="my logo"
                class="h-16 object-scale-down"
            />
        </Link>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: { Link },
};
</script>
<style lang=""></style>
