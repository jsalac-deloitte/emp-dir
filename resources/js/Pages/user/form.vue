<template>
    <Head>
        <title>{{ pageTitle }}</title>
        <meta name="description" content="Company" />
    </Head>

    <div
        class="max-w-[98%] mx-auto bg-network bg-no-repeat bg-center bg-cover h-full"
    >
        <h1 class="w-full text-2xl font-bold text-secondary text-center pt-2">
            {{ pageTitle }}
        </h1>
        <div class="w-full flex justify-center h-full pt-4">
            <div class="flex w-full max-w-2xl text-gray-700 space-y-4">
                <form @submit.prevent="submit" class="w-full space-y-4 px-2">
                    <div
                        class="bg-gray-50 rounded-xl px-6 py-4 space-y-4 text-navy"
                    >
                        <SelectBox
                            label="Company"
                            :options="companies"
                            placeholder="Select Company"
                            helper="Choose company for the user"
                            class="text-navy"
                            labelOption="company_name"
                            valueOption="id"
                            :defaultValue="form.company_id"
                            v-model="form.company_id"
                        />

                        <InputField
                            type="text"
                            name="name"
                            label="Fullname"
                            placeholder="Last name, First Name, M.I"
                            helper="Last name, First Name, M.I"
                            v-model="form.name"
                            :errorMessage="errors.name"
                        />

                        <InputField
                            type="text"
                            name="user_type"
                            label="User type"
                            placeholder="User type"
                            helper="Admin, Manager etc."
                            v-model="form.user_type"
                            :errorMessage="errors.user_type"
                        />

                        <InputField
                            type="email"
                            name="email"
                            label="Email"
                            placeholder="Email address"
                            helper="Valid email"
                            v-model="form.email"
                            :errorMessage="errors.email"
                            required="true"
                        />

                        <PasswordField
                            name="password"
                            label="Password"
                            placeholder="Password"
                            helper="min. 6 characters"
                            v-model="form.password"
                            :errorMessage="errors.password"
                        />

                        <PasswordField
                            name="confirm_password"
                            label="Confirm password"
                            placeholder="Confirm password"
                            helper="same with password"
                            v-model="form.confirm_password"
                            :errorMessage="errors.confirm_password"
                        />
                    </div>
                    <div class="flex justify-end space-x-1 px-4">
                        <Button
                            class="bg-navy hover:bg-navy-lilght items-center"
                        >
                            Submit
                        </Button>
                        <Link href="/users">
                            <button
                                type="submit"
                                class="px-4 py-3 text-white bg-red-500 rounded-md focus:bg-red-600 focus:outline-none hover:bg-red-600"
                                :disabled="form.processing"
                            >
                                Cancel
                            </button>
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, ref, reactive } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

//COMPONENTS
import InputField from "../components/InputField";
import PasswordField from "../components/PasswordField";
import SelectBox from "../components/SelectBox";
import Button from "../components/Button";
import mainLayout from "../layout/main-layout.vue";
import { Link } from "@inertiajs/inertia-vue3";

import apiService from "../api/httpService.js";
import Swal from "sweetalert2";

export default {
    layout: mainLayout,
    components: { InputField, Button, Link, PasswordField, SelectBox },
    name: "Category Form",
    props: {
        record: Object,
        errors: Object,
    },
    setup(props) {
        const pageTitle = ref("New User");
        let companies = ref([]);
        const form = useForm({
            name: "",
            email: "",
            password: "",
            confirm_password: "",
            user_type: "",
            id: null,
            company_id: "",
        });

        onMounted(async () => {
            apiService
                .get("/companies/get-all/no-pagination", {
                    params: { columns: "id, company_name" },
                })
                .then((response) => {
                    // Object.assign(companies, response.data);
                    companies.value = response.data;
                })
                .catch((errors) => {
                    console.log("Errors", errors);
                    Swal.fire({
                        title: "System Error",
                        text: `Please contact system administrator`,
                        icon: "warning",
                    });
                });

            if (props.record) {
                pageTitle.value = "Editing User";
                form.id = props.record.data.id;
                form.name = props.record.data.name;
                form.email = props.record.data.email;
                form.password = props.record.data.password;
                form.confirm_password = props.record.data.confirm_password;
                form.user_type = props.record.data.user_type;
                form.company_id = props.record.data.company_id;
            } else {
                pageTitle.value = "New User";
            }
        });

        function submit() {
            if (form.id == null) save();
            else update();
        }

        function update() {
            form.patch(`/users/${form.id}`, {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            });
        }

        function save() {
            form.post("/users", form, {
                onSuccess: () => form.reset(),
            });
        }

        return { form, pageTitle, submit, companies };
    },
};
</script>
<style lang=""></style>
