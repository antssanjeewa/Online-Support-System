<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  item: Object,
  replies: Object,
});
</script>
<template>
  <div class="relative min-h-screen bg-primary-100">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <div class="flex px-3">
        <Link
          :href="route('home')"
          class="mb-5 -mt-5 border px-4 py-1 rounded bg-gray-300"
          >Back</Link
        >
      </div>

      <div class="flex flex-wrap px-3">
        <div class="bg-white border w-full md:w-1/3 p-5 rounded">
          <!-- Ticket Details -->
          <div class="text-center text-xl">Ticket Details</div>
          <div class="divide-y mt-4">
            <div class="flex justify-between pt-3">
              <div>Reference Number</div>
              <div class="font-bold">{{ item.ref_number }}</div>
            </div>

            <div class="flex justify-between pt-3">
              <div>Status</div>
              <div class="font-bold">{{ item.status }}</div>
            </div>
          </div>
        </div>

        <div class="w-full md:w-2/3 max-sm:pt-4 md:px-5">
          <!-- Previous Replies -->
          <div class="my-4">
            <div>Recent Replies</div>
            <div v-if="replies?.length > 0" class="divide-y mt-1">
              <div
                v-for="reply in replies"
                :key="reply.id"
                class="flex justify-between pt-1 text-sm"
              >
                <div class="flex">
                  <div class="pr-5">{{ reply.id }}</div>
                  <div>{{ reply.message }}</div>
                </div>
                <div>{{ reply.created_at?.substr(0, 10) }}</div>
              </div>
            </div>
            <div v-else class="border p-2 text-gray-500">
              There Hasn't Recent Replies....
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
