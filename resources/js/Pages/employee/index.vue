<template lang="">
    <Head>
        <title>Employees</title>
        <meta name="description" content="Employee listing" />
    </Head>
    <div
        class="flex flex-col h-full py-4 px-2 bg-network bg-no-repeat bg-cover bg-center"
    >
        <h1 class="w-full text-2xl font-bold text-secondary text-center">
            EMPLOYEES
        </h1>
        <div class="flex w-full px-4" v-if="showSms">
            <div
                class="space-y-4 w-full h-auto px-4 py-4 border border-400 rounded-xl max-w-xl bg-gray-100"
            >
                <InputField
                    type="text"
                    name="message"
                    label="Message"
                    placeholder="Type your message here..."
                    helper=""
                    v-model="sms.message"
                />
                <Button @click="sendSms" type="submit" class="bg-navy-light"
                    >Send</Button
                >
            </div>
        </div>
        <div class="grow px-4 py-2">
            <DataTable
                :data="list"
                haveActionButton="true"
                :actionButtons="actionButtons"
                :dataFields="dtColumns"
                :dataHeaders="[
                    'Emp. Code',
                    'Name',
                    'Position',
                    'Mobile no.',
                    'Department',
                    'Company',
                ]"
                id="id"
                @selectAll="selectAll"
                @selectRow="selectRow"
                v-model="selectedRows"
                @remove="removeConfirmation"
            >
                <!-- filter records -->
                <template v-slot:search>
                    <div
                        class="flex flex-col lg:flex-row w-full items-center space-y-2"
                    >
                        <div class="w-full flex lg:flex-1 space-x-2">
                            <Link
                                href="/employees/form/add"
                                class="flex px-4 py-4 text-lg bg-navy hover:bg-navy-light shadow-lg rounded-lg text-white space-x-4 items-center"
                            >
                                <span class="tracking-wider">Add Employee</span>
                            </Link>
                            <Button
                                href="/employee/form/add"
                                class="flex px-4 py-4 text-lg bg-navy hover:bg-navy-light shadow-lg rounded-lg text-white space-x-4 items-center"
                                @click="toggleSms"
                            >
                                <span
                                    class="tracking-wider"
                                    v-html="showSms ? 'Hide SMS' : 'Send SMS'"
                                ></span>
                            </Button>
                        </div>

                        <DtSearch
                            class="flex-1 border-b border-gray-500"
                            @search="filterList"
                            @refresh="refreshList"
                            placeholder="Search Employee"
                            v-model="lookUp"
                        />
                    </div>
                </template>
                <template v-slot:pagination>
                    <!-- pagination -->
                    <div
                        class="flex flex-col space-y-2 items-center lg:space-y-0 lg:flex-row lg:justify-between"
                    >
                        <!-- page limit -->
                        <div class="space-x-">
                            <div class="flex space-x-4 text-xs">
                                <DtPageLimit
                                    :options="PAGE_LIMIT"
                                    v-model="rowCounts"
                                    @changePageLength="changePageLength"
                                />
                                <!-- <export-to v-model="exportTo" @exportList="exportList" /> -->
                            </div>
                        </div>
                        <!-- pagination -->
                        <DtPagination :meta="meta" @changePage="changePage" />
                    </div>
                </template>
                <template #action-button="{ row }">
                    <!-- action buttons -->
                    <DtButton
                        :row="row"
                        :actionButtons="actionButtons"
                        @remove="removeConfirmation"
                    />
                </template>
            </DataTable>
        </div>
    </div>
</template>
<script>
import mainLayout from "../layout/main-layout";
import { Head } from "@inertiajs/inertia-vue3";

import Swal from "sweetalert2";
import { useStore } from "vuex";
import DataTable from "../components/datatable/DataTable";
import DtPagination from "../components/datatable/DtPagination";
import DtButton from "../components/datatable/DtButton";
import DtSearch from "../components/datatable/DtSearch";
import DtPageLimit from "../components/datatable/DtPageLimit";
import { ref, reactive, onMounted, computed } from "vue";
import { PAGE_LIMIT } from "../constants";
import Button from "../components/Button";
import InputField from "../components/InputField";

import apiService from "../api/httpService.js";
import { Inertia } from "@inertiajs/inertia";

export default {
    layout: mainLayout,
    components: {
        Head,
        DataTable,
        DtPagination,
        DtButton,
        DtSearch,
        DtPageLimit,
        Button,
        InputField,
    },
    props: {
        auth: Object,
        errors: Object,
        flash: Object,
    },
    setup({ auth }) {
        /**
         * initialize state management
         */
        const store = useStore();

        let currentUrl = ref("/employees?page=1");
        let rowCounts = ref(5);
        let lookUp = ref("");
        let selectedRows = ref([]);
        let list = ref([]);

        let showSms = ref(false);

        let sms = ref({
            message: "",
            receiver: [],
        });

        let dtOptions = reactive({
            params: {
                paginate: 5,
                search: "",
                orderBy: "last_name",
            },
        });

        const actionButtons = [
            {
                icon: "EditIcon",
                color: "text-white",
                action: "edit",
                route: "/employees/",
            },
            {
                icon: "RemoveIcon",
                color: "text-white",
                action: "remove",
                route: "",
            },
        ];

        const dtColumns = [
            "emp_code",
            "fullname",
            "position",
            "mobile_no",
            "department",
            "company",
        ];

        /**
         * for sending sms
         */
        function toggleSms() {
            showSms.value = !showSms.value;
        }

        /**
         * api call on mounted
         */
        onMounted(() => {
            getList();
        });

        /**
         * API request to get list of record
         */
        function getList() {
            // Inertia.get("/employees/get-list/all", dtOptions);
            apiService
                .get("/employees/get-list/all", dtOptions)
                .then((response) => {
                    store.dispatch("loadEmployeeList", response.data);
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

        /**
         * change page
         */
        const changePage = (url) => {
            currentUrl.value = url;
            let nextPage = `${url}&paginate=${rowCounts.value}`;

            if (lookUp.value != "") {
                nextPage += "&search=" + lookUp.value;
            }

            apiService
                .get(nextPage)
                .then((response) => {
                    store.dispatch("loadEmployeeList", response.data);
                })
                .catch((errors) => {
                    console.log("Errores", errors);
                    Swal.fire({
                        title: "System Error",
                        text: `Please contact system administrator`,
                        icon: "warning",
                    });
                });
        };

        /**
         * select all rows in the page
         */
        const selectAll = (selectedAll) => {
            let selectAllRows = selectedAll;
            list.value = store.getters.getEmployeeList;
            list.value.forEach((item) => {
                const index = selectedRows.value.indexOf(item.id);
                if (selectAllRows) {
                    if (index < 0) {
                        selectedRows.value.push(item.id);
                    }
                } else {
                    if (index > -1) {
                        selectedRows.value.splice(index, 1);
                    }
                }
            });
        };
        /**
         * change page length or number of rows in the page
         */
        const changePageLength = () => {
            dtOptions.params.paginate = rowCounts.value;
            dtOptions.params.search = lookUp.value;
            getList();
        };

        /**
         * select row tick checkbox
         */
        const selectRow = (payload) => {
            const index = selectedRows.value.indexOf(payload.id);
            if (payload.checked) {
                if (index < 0) {
                    selectedRows.value.push(payload.id);
                }
            } else {
                if (index > -1) {
                    selectedRows.value.splice(index, 1);
                }
            }
        };

        /**
         * filter records on the list
         * server side processing
         */
        const filterList = () => {
            dtOptions.params.search = lookUp.value;
            apiService
                .get("/employees/get-list/all", dtOptions)
                .then((response) => {
                    store.dispatch("loadEmployeeList", response.data);
                })
                .catch((errors) => {
                    console.log("Errors", errors);
                    Swal.fire({
                        title: "System Error",
                        text: `Please contact system administrator`,
                        icon: "warning",
                    });
                });
        };

        /**
         * remove confirmation
         */
        const removeConfirmation = (record) => {
            Swal.fire({
                title: "Are you sure you want to remove this?",
                html: `Employee : <b>${record.first_name} ${record.last_name}</b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, remove it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    removeRecord(record);
                }
            });
        };

        /**
         *
         * remove category
         */
        function removeRecord(record) {
            Inertia.delete(`employees/${record.id}`);
            getList();
        }

        /**
         * refresh the list
         */
        const refreshList = () => {
            lookUp.value = "";
            selectedRows.value = [];
            filterList();
        };

        /**
         * functiont to send sms
         */
        function sendSms() {
            if (selectedRows.value.length < 1) {
                return Swal.fire({
                    title: "Opps",
                    text: `Please select employee receiver`,
                    icon: "warning",
                });
                return;
            }
            sms.receiver.value = selectedRows.value;

            Swal.fire({
                title: "Send SMS?",
                html: `All employees under the selected department(s) will receive message - continue?  </b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, send it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    apiService
                        .post("/employees/send-sms-to-employees", sms)
                        .then((response) => {
                            console.log("response", response);
                            showSms.value = false;
                            selectedRows.value = [];
                            return Swal.fire({
                                title: "SMS Processing",
                                text: `Running at the background`,
                                icon: "success",
                            });
                        })
                        .catch((errors) => {
                            console.log("errors", errors);
                        });
                }
            });
        }

        return {
            actionButtons,
            dtColumns,
            list: computed(() => store.getters.getEmployeeList),
            meta: computed(() => store.getters.getEmployeeMeta),
            links: computed(() => store.getters.getEmployeeLinks),
            selectAll,
            selectRow,
            changePageLength,
            changePage,
            filterList,
            refreshList,
            removeConfirmation,
            selectedRows,
            selectedRows,
            lookUp,
            PAGE_LIMIT,
            rowCounts,
            sms,
            showSms,
            toggleSms,
            sendSms,
        };
    },
};
</script>
<style lang=""></style>
