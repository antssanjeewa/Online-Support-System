<script setup>
import { watch, reactive } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import DataTable from "./DataTable.vue";

const props = defineProps({
  items: Object,
  form_filters: Object,
  success: String,
});

const filters = reactive({
  page: props.form_filters.page || 1,
  count: props.form_filters.count || "15",
  status: props.form_filters.status || null,
  search: props.form_filters.search || null,
});

const headers = [
  { text: "ID", value: "id" },
  { text: "Ref Number", value: "ref_number" },
  { text: "Name", value: "customer_name" },
  { text: "Mobile", value: "phone_number" },
  { text: "Email", value: "email" },
  { text: "Status", value: "status" },
];

watch(
  () => filters,
  throttle(() => {
    router.get(route("dashboard"), pickBy(filters), {
      preserveState: true,
    });
  }, 300),
  { deep: true }
);

function reset() {
  filters.page = 1;
  filters.count = "15";
  filters.search = null;
  filters.status = null;
}
</script>

<template>
  <AppLayout title="Dashboard">
    <div
      v-if="success"
      class="bg-green-100 text-green-700 py-3 text-center rounded flex justify-between"
    >
      <span></span>
      {{ success }}
      <span class="px-5 cursor-pointer" @click="success = null">X</span>
    </div>
    <!-- Title -->
    <div class="text-3xl mb-4">Ticket List</div>
    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
      <div class="p-5">
        <!-- Search Field -->
        <div class="flex max-w-md mr-4 mb-3">
          <select
            v-model="filters.count"
            class="rounded-none rounded-l-md border-r-0 border-gray-300 block appearance-none bg-white text-gray-500 py-2 px-4 pr-8 leading-tight focus:outline-none"
          >
            <option value="5">5</option>
            <option value="15">15</option>
            <option value="25">25</option>
            <option value="50">50</option>
          </select>

          <select
            v-model="filters.status"
            class="rounded-none border-r-0 border-gray-300 block appearance-none bg-white text-gray-500 py-2 px-4 pr-8 leading-tight focus:outline-none"
          >
            <option :value="null">All Status</option>
            <option value="pending">Pending</option>
            <option value="checked">Checked</option>
          </select>

          <div class="flex items-center">
            <div class="w-64 relative">
              <input
                class="pl-8 rounded-r-md focus:border-white border-gray-300 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                autocomplete="off"
                v-model="filters.search"
                type="text"
                name="search"
                placeholder="Search ..."
              />
            </div>

            <!-- Reset Button -->
            <button
              class="ml-3 text-sm text-gray-700 hover:text-gray-400 focus:text-black focus:outline-none"
              type="button"
              @click="reset"
            >
              Reset
            </button>
          </div>
        </div>

        <!-- Data Table -->
        <DataTable :headers="headers" :items="items" :filters="filters" />
      </div>
    </div>
  </AppLayout>
</template>
