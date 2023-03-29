<script setup>
import Pagination from "./Pagination.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  headers: Array,
  filters: Object,
  items: {
    type: Object,
    required: true,
  },
});
</script>
<template>
  <div class="shadow sm:rounded">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 k">
          <div class="sm:rounded">
            <table class="min-w-full divide-y divide-gray-200">
              <!-- Table Header -->
              <thead>
                <tr>
                  <th
                    v-for="header in headers"
                    :key="header.value"
                    class="px-4 py-3 bg-gray-100 text-left text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider"
                  >
                    {{ header.text }}
                  </th>
                  <th
                    class="px-4 py-3 bg-gray-100 text-left text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider"
                  ></th>
                </tr>
              </thead>

              <!-- Table Body -->
              <tbody class="bg-white divide-y divide-gray-200">
                <tr
                  v-for="item in items.data"
                  :key="item.id"
                  class="hover:bg-gray-100"
                  :class="item.is_opened ? '' : 'bg-gray-200 font-bold'"
                >
                  <td class="px-4 py-2" v-for="header in headers" :key="header.value">
                    <div class="text-sm leading-5 text-gray-900">
                      {{ item[header.value] }}
                    </div>
                  </td>

                  <td>
                    <div
                      class="text-sm text-blue-500 border border-blue-600 text-center px-2"
                    >
                      <Link :href="route('tickets.show', item.id)">View</Link>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <p v-if="items.data.length == 0" class="text-center py-3 text-gray-400">
              No Data Available
            </p>

            <!-- Pagination Of Table -->
            <pagination :meta="items.meta" :links="items.links" :filters="filters" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
