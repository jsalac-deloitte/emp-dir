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

        <div
            className="flex items-center  bg-white border border-gray-500 rounded-xl px-2 py-1 relative marker:focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
        >
            <input
                id="password"
                ref="inputPass"
                type="password"
                :placeholder="placeholder"
                class="w-full px-2 py-2 placeholder-gray-300 focus:outline-none focus:no-underline"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :required="required"
            />
            <div
                className=" absolute right-2"
                title="click to show or hide password"
            >
                <span
                    class="eye-open"
                    @click="togglePassword"
                    :class="!showPassword && 'hidden'"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path
                            fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </span>
                <span
                    class="eye-close"
                    :class="showPassword && 'hidden'"
                    @click="togglePassword"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                            clip-rule="evenodd"
                        />
                        <path
                            d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
                        />
                    </svg>
                </span>
            </div>
        </div>

        <p v-if="errorMessage ?? null" class="text-red-600 mt-2">
            {{ errorMessage }}
        </p>
    </div>
</template>

<script>
import { ref } from "vue";
export default {
    setup() {
        const inputPass = ref(null);
        const showPassword = ref(false);
        function togglePassword() {
            if (inputPass.value.type === "password") {
                inputPass.value.type = "text";
            } else {
                inputPass.value.type = "password";
            }
            showPassword.value = !showPassword.value;
        }

        return { inputPass, togglePassword, showPassword };
    },
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
