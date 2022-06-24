<template lang="">
    <div class="flex w-full space-x-4 justify-center">
        <div v-for="(actionButton, index) in actionButtons" :key="index">
            <div v-if="actionButton.action === 'edit'">
                <Link :href="`${actionButton.route}${row.id}`">
                    <component
                        :is="actionButton.icon"
                        :class="actionButton.color"
                    />
                </Link>
            </div>
            <div v-if="actionButton.action === 'remove'">
                <button
                    :title="'click to ' + actionButton.action"
                    @click="$emit(actionButton.action, { ...row })"
                >
                    <component
                        :is="actionButton.icon"
                        :class="actionButton.color"
                    />
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import EditIcon from "../../icons/EditIcon.vue";
import RemoveIcon from "../../icons/RemoveIcon";
export default {
    props: ["row", "actionButtons"],
    components: { Link, EditIcon, RemoveIcon },
    emits: ["remove", "edit"],
};
</script>
<style lang=""></style>
