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
                            label="User"
                            :options="users"
                            placeholder="Select User"
                            helper="Choose User for the department"
                            class="text-navy"
                            labelOption="name"
                            valueOption="id"
                            :defaultValue="form.user_id"
                            v-model="form.user_id"
                            :errorMessage="errors.user_id"
                        />

                        <InputField
                            type="text"
                            name="department_name"
                            label="Department name"
                            placeholder="e.g. HR, IT, Accounting, Admin"
                            helper="HR,IT,Accounting"
                            v-model="form.department_name"
                            :errorMessage="errors.department_name"
                        />
                    </div>
                    <div class="flex justify-end space-x-1 px-4">
                        <Button
                            class="bg-navy hover:bg-navy-lilght items-center"
                        >
                            Submit
                        </Button>
                        <Link href="/departments">
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
        const pageTitle = ref("New Department");
        let users = reactive([]);
        const form = useForm({
            department_name: "",
            id: null,
            user_id: "",
        });

        onMounted(async () => {
            apiService
                .get("/users/get-all/no-pagination", {
                    params: { columns: "id, name" },
                })
                .then((response) => {
                    Object.assign(users, response.data);
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
                pageTitle.value = "Editing Department";
                form.id = props.record.data.id;
                form.department_name = props.record.data.department_name;
                form.user_id = props.record.data.user_id;
            } else {
                pageTitle.value = "New Department";
            }
        });

        function submit() {
            if (form.id == null) save();
            else update();
        }

        function update() {
            form.patch(`/departments/${form.id}`, {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            });
        }

        function save() {
            form.post("/departments", form, {
                onSuccess: () => form.reset(),
            });
        }

        return { form, pageTitle, submit, users };
    },
};
</script>
<style lang=""></style>
