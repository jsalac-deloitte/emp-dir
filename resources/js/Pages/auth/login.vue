<template lang="">
    <div class="grow bg-white rounded-xl py-10 px-4 max-w-2xl xl:max-w-lg">
        <div class="flex flex-col space-y-6 w-full items-center text-navy">
            <img src="/images/mylogo.png" alt="my logo" />
            <form @submit.prevent="submit" class="w-full max-w-md">
                <div class="flex flex-col px-4 w-full space-y-2 mt-4">
                    <InputField
                        label="Email"
                        name="email"
                        type="email"
                        placeholder="Enter your email.."
                        v-model="credential.email"
                        :errorMessage="errors.email"
                    />
                </div>
                <div class="flex flex-col px-4 w-full space-y-2 mt-4">
                    <PasswordField
                        label="Password"
                        name="password"
                        placeholder="Enter your password.."
                        v-model="credential.password"
                    />
                </div>
                <div class="flex flex-col px-4 mt-20">
                    <button
                        type="submit"
                        class="bg-navy text-white px-2 py-3 rounded-xl tracking-wider text-xl"
                    >
                        Log in
                    </button>
                </div>
            </form>
            <div>
                <p class="text-center">
                    Forgot your password?
                    <Link href="forgot-password" class="text-navy underline"
                        >Click here</Link
                    >
                </p>
            </div>
        </div>
    </div>
</template>
<script>
import AuthLayout from "../layout/auth-layout";
import PasswordField from "../components/PasswordField";
import InputField from "../components/InputField";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    layout: AuthLayout,
    components: {
        PasswordField,
        InputField,
    },
    props: {
        flash: Object,
        errors: Object,
    },
    setup() {
        const credential = useForm({
            email: "",
            password: "",
        });
        function submit() {
            const response = credential.post("/login", credential);
        }
        return { submit, credential };
    },
};
</script>
<style lang=""></style>
