<template>
    <div class="space-x-2 tracking-wider text-lg text-navy w-full">
        <label for="cars">Page length:</label>
        <select
            name="pagelength"
            id="pageLength"
            class="py-2 px-3 rounded-lg bg-gray-50 border-2 border-gray-400"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            @change="$emit('changePageLength', $event.target.value)"
        >
            <option
                v-for="(selection, index) in options"
                :key="index"
                :value="index"
            >
                {{ selection }}
            </option>
        </select>
        rows
    </div>
</template>

<script>
export default {
    setup() {
        return {};
    },
    props: ["options", "modelValue"],
};
</script>

<style lang="scss" scoped></style>
