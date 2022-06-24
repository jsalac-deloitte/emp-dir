<template>
    <Head>
        <title>{{ pageTitle }}</title>
        <meta name="description" content="Company" />
    </Head>

    <div class="max-w-[98%] mx-auto bg-network bg-no-repeat bg-center bg-cover">
        <h1 class="w-full text-2xl font-bold text-secondary text-center mt-2">
            {{ pageTitle }}
        </h1>
        <div class="w-full flex justify-center">
            <div class="flex w-full max-w-2xl text-gray-700 mt-12 space-y-4">
                <form @submit.prevent="submit" class="w-full space-y-8 px-2">
                    <div
                        class="bg-gray-50 rounded-xl px-6 py-8 space-y-4 text-navy"
                    >
                        <InputField
                            type="text"
                            name="company_name"
                            label="Company name"
                            placeholder="Company"
                            helper="Registered business"
                            v-model="form.company_name"
                            :errorMessage="errors.company_name"
                            required="true"
                        />

                        <InputField
                            type="text"
                            name="address"
                            label="Address"
                            placeholder="Company address"
                            helper="St., Brgy., Mucipality, City"
                            v-model="form.address"
                            :errorMessage="errors.address"
                        />

                        <InputField
                            type="text"
                            name="contact_person"
                            label="Contact person"
                            placeholder="Contact person"
                            helper="Secretary or Manager"
                            v-model="form.contact_person"
                            :errorMessage="errors.contact_person"
                        />

                        <InputField
                            type="number"
                            name="contact_no"
                            label="Contact no."
                            placeholder="Mobile No./Tel No."
                            helper="Mobile or Land line no."
                            v-model="form.contact_no"
                            :errorMessage="errors.contact_no"
                        />

                        <InputField
                            type="email"
                            name="email"
                            label="Company email"
                            placeholder="Company email address"
                            helper="Please use valid email"
                            v-model="form.email"
                            :errorMessage="errors.email"
                        />
                    </div>
                    <div class="flex justify-end space-x-1 px-4">
                        <Button
                            class="bg-navy hover:bg-navy-lilght items-center"
                        >
                            Submit
                        </Button>
                        <Link href="/companies">
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
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

//COMPONENTS
import InputField from "../components/InputField";
import Button from "../components/Button";
import mainLayout from "../layout/main-layout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    layout: mainLayout,
    components: { InputField, Button, Link },
    name: "Category Form",
    props: {
        record: Object,
        errors: Object,
    },
    setup(props) {
        const pageTitle = ref("New Company");
        const form = useForm({
            company_name: "",
            address: "",
            contact_no: "",
            contact_person: "",
            email: "",
            id: null,
        });

        onMounted(() => {
            if (props.record) {
                pageTitle.value = "Editing Company";
                form.id = props.record.data.id;
                form.company_name = props.record.data.company_name;
                form.address = props.record.data.address;
                form.contact_person = props.record.data.contact_person;
                form.contact_no = props.record.data.contact_no;
                form.email = props.record.data.email;
            } else {
                pageTitle.value = "New Company";
            }
        });

        function submit() {
            console.log(form);
            if (form.id == null) save();
            else update();
        }

        function update() {
            form.patch(`/companies/${form.id}`, {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            });
        }

        function save() {
            form.post("/companies", form, {
                onSuccess: () => form.reset(),
            });
        }

        return { form, pageTitle, submit };
    },
};
</script>
<style lang=""></style>
