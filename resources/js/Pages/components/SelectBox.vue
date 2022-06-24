<template lang="">
    <div class="w-full">
        <div class="w-full flex justify-between relative">
            <label :for="name" class="text-lg px-2">{{ label }}</label>
            <p
                v-if="helper"
                class="text-sm px-4 text-gray-500 absolute right-0 bottom-0"
            >
                {{ helper }}
            </p>
        </div>
        <select
            class="w-full px-2 py-3 border border-gray-500 rounded-lg shadow-lg outline-none"
            value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
        >
            <option
                v-for="option in options"
                :key="option[valueOption]"
                :value="option[valueOption]"
                :selected="option[valueOption] === defaultValue"
            >
                {{ option[labelOption] }}
            </option>
        </select>

        <p v-if="errorMessage ?? null" class="text-red-600 mt-2">
            {{ errorMessage }}
        </p>
    </div>
</template>
<script>
export default {
    props: [
        "label",
        "options",
        "modelValue",
        "placeholder",
        "name",
        "helper",
        "errorMessage",
        "labelOption",
        "valueOption",
        "defaultValue",
    ],
};
</script>
<style lang=""></style>
