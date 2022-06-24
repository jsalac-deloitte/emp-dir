<template lang="">
    <Head>
        <title>Users</title>
        <meta name="description" content="User listing" />
    </Head>
    <div
        class="flex flex-col h-full py-4 px-2 bg-network bg-no-repeat bg-cover bg-center"
    >
        <h1 class="w-full text-2xl font-bold text-secondary text-center">
            USERS
        </h1>
        <div class="grow px-4 py-2">
            <DataTable
                :data="list"
                haveActionButton="true"
                :actionButtons="actionButtons"
                :dataFields="dtColumns"
                :dataHeaders="['Name', 'Email', 'Company', 'User Type']"
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
                        <div class="w-full flex lg:flex-1">
                            <Link
                                href="/users/form/add"
                                class="flex px-4 py-4 text-lg bg-navy hover:bg-navy-light shadow-lg rounded-lg text-white space-x-4 items-center"
                            >
                                <span class="tracking-wider">Add User</span>
                            </Link>
                        </div>

                        <DtSearch
                            class="flex-1 border-b border-gray-500"
                            @search="filterList"
                            @refresh="refreshList"
                            placeholder="Search User"
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

        let currentUrl = ref("/users?page=1");
        let rowCounts = ref(5);
        let lookUp = ref("");
        let selectedRows = ref([]);
        let list = ref([]);

        let dtOptions = reactive({
            params: {
                paginate: 5,
                search: "",
                orderBy: "name",
            },
        });

        const actionButtons = [
            {
                icon: "EditIcon",
                color: "text-white",
                action: "edit",
                route: "/users/",
            },
            {
                icon: "RemoveIcon",
                color: "text-white",
                action: "remove",
                route: "",
            },
        ];

        const dtColumns = ["name", "email", "company", "user_type"];

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
            // Inertia.get("/users/get-list/all", dtOptions);
            apiService
                .get("/users/get-list/all", dtOptions)
                .then((response) => {
                    store.dispatch("loadUserList", response.data);
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
                    store.dispatch("loadUserList", response.data);
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
            list.value = store.getters.getUserList;
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
                .get("/users/get-list/all", dtOptions)
                .then((response) => {
                    store.dispatch("loadUserList", response.data);
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
            if (auth.user?.id === record.id) {
                return Swal.fire({
                    title: "Opps",
                    text: `You cannot remove your own account`,
                    icon: "warning",
                });
            }

            Swal.fire({
                title: "Are you sure you want to remove this?",
                html: `User : <b>${record.name} </b>`,
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
            Inertia.delete(`users/${record.id}`);
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

        return {
            actionButtons,
            dtColumns,
            list: computed(() => store.getters.getUserList),
            meta: computed(() => store.getters.getUserMeta),
            links: computed(() => store.getters.getUserLinks),
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
        };
    },
};
</script>
<style lang=""></style>
