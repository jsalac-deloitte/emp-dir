<template>
    <Head>
        <title>{{ pageTitle }}</title>
        <meta name="description" content="Company" />
    </Head>

    <div
        class="max-w-[98%] mx-auto bg-network bg-no-repeat bg-center bg-cover w-full h-full"
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
                            @change="getDepartments"
                        />

                        <SelectBox
                            label="Department"
                            :options="departments"
                            placeholder="Select Department"
                            helper="Choose department for the employee"
                            class="text-navy"
                            labelOption="department_name"
                            valueOption="id"
                            :defaultValue="form.department_id"
                            v-model="form.department_id"
                        />

                        <InputField
                            type="text"
                            name="emp_code"
                            label="Employee code"
                            placeholder="Employee code / number"
                            helper="e.g. 0001, 0002"
                            v-model="form.emp_code"
                            :errorMessage="errors.emp_code"
                            required="true"
                        />

                        <InputField
                            type="text"
                            name="last_name"
                            label="Last name"
                            placeholder="Lastname / Surname"
                            helper="fill up properly"
                            v-model="form.last_name"
                            :errorMessage="errors.last_name"
                            required="true"
                        />

                        <InputField
                            type="text"
                            name="first_name"
                            label="First name"
                            placeholder="First name / Given name"
                            helper="fill up properly"
                            v-model="form.first_name"
                            :errorMessage="errors.first_name"
                        />

                        <InputField
                            type="text"
                            name="middle_name"
                            label="Last name"
                            placeholder="Middle name"
                            helper="fillup properly"
                            v-model="form.middle_name"
                            :errorMessage="errors.middle_name"
                        />

                        <InputField
                            type="text"
                            name="position"
                            label="Position"
                            placeholder="Position"
                            helper="Consultant, Manager"
                            v-model="form.position"
                            :errorMessage="errors.position"
                        />

                        <InputField
                            type="number"
                            name="mobile_no"
                            label="Mobile no"
                            placeholder="Mobile no."
                            helper="11 digit mobile no."
                            v-model="form.mobile_no"
                            :errorMessage="errors.mobile_no"
                        />
                    </div>
                    <div class="flex justify-end space-x-1 px-4">
                        <Button
                            class="bg-navy hover:bg-navy-lilght items-center"
                        >
                            Submit
                        </Button>
                        <Link href="/employees">
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
        const pageTitle = ref("New Employee");
        let companies = reactive([]);
        let departments = reactive([]);
        const form = useForm({
            emp_code: "",
            first_name: "",
            last_name: "",
            middle_name: "",
            position: "",
            department_id: "",
            company_id: "",
            mobile_no: "",
            id: null,
        });

        onMounted(async () => {
            getCompanies();

            if (props.record) {
                pageTitle.value = "Editing Employee";
                form.id = props.record.data.id;
                form.emp_code = props.record.data.emp_code;
                form.first_name = props.record.data.first_name;
                form.last_name = props.record.data.last_name;
                form.middle_name = props.record.data.middle_name;
                form.position = props.record.data.position;
                form.mobile_no = props.record.data.mobile_no;
                form.department_id = props.record.data.department_id;
                form.company_id = props.record.data.company_id;
                getDepartments();
            } else {
                pageTitle.value = "New Employee";
            }
        });

        function getCompanies() {
            apiService
                .get("/companies/get-all/no-pagination", {
                    params: { columns: "id,company_name" },
                })
                .then((response) => {
                    Object.assign(companies, response.data);
                })
                .catch((errors) => {
                    console.log("Errors", errors);
                    Swal.fire({
                        title: "System Error",
                        text: `Please contact system administrator`,
                        icon: "warning",
                    });
                });
        }

        function getDepartments() {
            if (form.company_id === "") return;
            apiService
                .get("/departments/get-all/no-pagination/" + form.company_id, {
                    params: { columns: "id,department_name" },
                })
                .then((response) => {
                    Object.assign(departments, response.data);
                })
                .catch((errors) => {
                    console.log("Errors", errors);
                    Swal.fire({
                        title: "System Error",
                        text: `Please contact system administrator`,
                        icon: "warning",
                    });
                });
        }

        function submit() {
            if (form.id == null) save();
            else update();
        }

        function update() {
            form.patch(`/employees/${form.id}`, {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            });
        }

        function save() {
            form.post("/employees", form, {
                onSuccess: () => form.reset(),
            });
        }

        return {
            form,
            pageTitle,
            submit,
            companies,
            departments,
            getDepartments,
        };
    },
};
</script>
<style lang=""></style>
