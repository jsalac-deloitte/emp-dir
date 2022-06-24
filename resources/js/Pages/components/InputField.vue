<template>
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
        <input
            :type="type"
            :placeholder="placeholder"
            class="w-full px-4 py-3 placeholder-gray-400 bg-white border border-gray-500 rounded-xl focus:outline-none shadow-lg"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :required="required"
        />
        <p v-if="errorMessage ?? null" class="text-red-600 mt-2">
            {{ errorMessage }}
        </p>
    </div>
</template>

<script>
export default {
    setup() {},
    props: [
        "modelValue",
        "placeholder",
        "label",
        "type",
        "helper",
        "errorMessage",
        "name",
        "type",
        "required",
    ],
};
</script>
