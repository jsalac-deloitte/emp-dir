<template lang="">
    <div
        class="flex w-auto h-24 px-6 py-4 bg-white items-center justify-between xl:h-32"
    >
        <!-- brandd -->
        <Link
            href="/"
            class="cursor-pointer"
            title="click to go back to home page"
        >
            <img
                src="/images/mylogo.png"
                alt="my logo"
                class="h-16 xl:h-20 object-scale-down"
            />
        </Link>

        <div class="flex">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10 cursor-pointer text-navy hover:text-navy-light"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
                title="Click to logout"
                @click="logout"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
            </svg>
        </div>
    </div>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { Link },
    setup() {
        function logout() {
            Inertia.post("/logout");
        }
        return {
            logout,
        };
    },
};
</script>
<style lang=""></style>
