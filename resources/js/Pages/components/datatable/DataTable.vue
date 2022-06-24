<template>
<slot name="search"> </slot>
  <div class="h-auto ">
    <div class="py-2">
      <div
        class="
          min-w-full
          overflow-hidden
          border-b border-gray-400
          shadow
          rounded-lg
          bg-gray-500
        "
      >
        <table class="min-w-full w-full ">
          <thead class="min-w-full flex w-full">
            <tr
              class="
                bg-navy
                text-white
                h-16
                text-left
                w-full
                flex
                items-center
                px-6
              "
            >
              <th class="grow lg:w-16 lg:grow-0">
                <label>
                  <input
                    type="checkbox"
                    class="checkbox bg-white "
                    @change="selectAll($event)"
                    id="selectAll"
                  />
                </label>
              </th>
              <th
                class="hidden lg:flex lg:flex-1 px-2  "
                v-for="(header, index) in dataHeaders"
                :key="index"
              >
                {{ header }}
              </th>
              <th class="w-32  text-center" v-if="haveActionButton == 'true'">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="flex w-full flex-col max-h-[10%] overflow-auto">

            <!-- show this when no data retrieve -->
            <NoData :dataHeaders="dataHeaders" :noData="data.length"/>

            <!-- display data here -->
            <tr
              v-for="(row, index) in data"
              :key="row[id]"
              class="w-full flex flex-col lg:flex-row hover:bg-yellow-50 text-xl border-b border-gray-200 text-gray-800  px-6 py-4 lg:py-1"
              :class="
                modelValue.includes(row[id])
                  ? 'bg-yellow-100'
                  : index % 2 == 0
                  ? 'bg-gray-50'
                  : 'bg-white'
              "
            >
              <td class="w-full lg:w-16 py-2  flex justify-between">
                <label>
                  <input
                    type="checkbox"
                    class="checkbox"
                    :id="row[id]"
                    :value="row[id]"
                    @click="selectRow(row[id], $event)"
                    v-model="modelValue"
                  />
                </label>
                <!-- slot for action button -->
                <div class="flex lg:hidden space-x-4 ">
                  <slot name="action-button" v-bind:row="row"> </slot>
                </div>
              </td>
              <td
                class="flex-1  flex items-center" 
                v-for="(column, index) in dataFields"
                :key="index"
              >
                <td v-if="column == 'primary_photo'" class="flex w-full justify-center lg:justify-start items-center ">
                  <img :src="row[column]" width="60" height="15" class="w-1/2 max-h-36">
                </td>
                <td v-else class=" w-full">
                  <span class="font-semibold lg:hidden"> {{ dataHeaders[index] }} : </span> {{ row[column] }}
                </td>
              </td>
              <td
                class="
                  py-2
                  space-x-4
                  lg:flex
                  w-32
                  justify-center
                  hidden
                "
                v-if="haveActionButton"
              >
              <!-- slot for action button -->
                <div class="flex w-full space-x-4 items-center">
                  <slot name="action-button" v-bind:row="row"> </slot>
                </div>
               <!-- slot for action button -->
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<slot name="pagination"> </slot>
</template>

<script>
import { watch } from "vue";
import EditIcon from "../../icons/EditIcon.vue";
import RemoveIcon from "../../icons/RemoveIcon";
import EyeIcon from "../../icons/EyeIcon";
import CheckIcon from "../../icons/CheckIcon";
import OpenIcon from "../../icons/OpenIcon";
import { Link } from "@inertiajs/inertia-vue3";
import NoData from "./nodata";

export default {
  components: { EditIcon, RemoveIcon, EyeIcon, CheckIcon, OpenIcon, Link, NoData },
  name: "Datatable",
  emits: ["selectRow", "selectAll", "remove", "editModal"],
  setup(props, context) {
    //holds the id of selected rows
    function selectRow(id, e) {
      context.emit("selectRow", { id: id, checked: e.target.checked });
    }

    function selectAll(e) {
      context.emit("selectAll", e.target.checked);
    }


    watch(
      () => props.data,
      () => {
        let selectedRows = props.modelValue;
        let list = props.data;
        let chkBox = document.getElementById("selectAll");

        chkBox.checked =  list.length > 0 ? true : false;
        list.forEach((item) => {
          const index = selectedRows.indexOf(item.id);
          if (index < 0) {
            chkBox.checked = false;
          }
        });
      }
    );

    return {
      selectRow,
      selectAll,
    };
  },
  props: {
    dataHeaders: { type: Array, required: true },
    data: { type: Array, required: true },
    haveActionButton: { type: String, required: true },
    dataFields: { type: Array, required: true },
    actionButtons: { type: Array, required: true },

    id: { type: String, required: true },
    modelValue: { type: Array, required: false },
  },
};
</script>

<style lang="css" scoped>
.header-style {
  @apply h-12 px-6 py-4  text-lg font-medium  leading-4  tracking-wider  text-left  uppercase  flex-grow;
}
</style>
