<template lang="">
    <div
        class="flex flex-col h-full py-4 px-2 bg-network bg-no-repeat bg-cover bg-center"
    >
        <h1 class="w-full text-2xl font-bold text-secondary text-center">
            Dashboard
        </h1>
        <div class="grow px-4 py-2">
            <ul class="w-full flex flex-col space-y-2">
                <li
                    v-for="nav in NAVIGATIONS"
                    :key="nav.title"
                    class="flex items-center w-full h-24 rounded-xl bg-primary backdrop-blur-sm bg-opacity-60 px-4 shadow-lg border-2 cursor-pointer hover:bg-yellow-200"
                >
                    <component
                        :is="nav.icon"
                        class="h-12 w-12 text-secondary"
                    ></component>
                    <Link
                        :href="nav.link"
                        class="grow text-secondary text-center uppercase text-xl font-semibold tracking-wider"
                    >
                        {{ nav.label }}
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import mainLayout from "./layout/main-layout";
import collectionIcon from "./icons/collection-icon";
import groupIcon from "./icons/group-icon";
import userIcon from "./icons/user-icon";
import profileIcon from "./icons/profile-icon";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    layout: mainLayout,
    components: { collectionIcon, groupIcon, userIcon, profileIcon, Link },
    setup() {
        const NAVIGATIONS = [
            {
                icon: groupIcon,
                link: "/departments",
                title: "Department list",
                label: "Departments",
            },
            {
                icon: collectionIcon,
                link: "/companies",
                title: "Company list",
                label: "Companies",
            },
            {
                icon: groupIcon,
                link: "/employees",
                title: "Employee list",
                label: "Employees",
            },
            {
                icon: userIcon,
                link: "/users",
                title: "User list",
                label: "Users",
            },
            {
                icon: profileIcon,
                link: "/profile",
                title: "Profile info",
                label: "Profile",
            },
        ];
        return { NAVIGATIONS };
    },
};
</script>
<style lang=""></style>
