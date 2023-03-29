<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  item: Object,
  replies: Object,
  errors: Object,
});

const form = useForm({
  message: "",
});

function saveReply() {
  form.put(route("tickets.update", props.item.id));
}
</script>
<template>
  <AppLayout title="Ticket">
    <div class="flex px-3">
      <Link
        :href="route('dashboard')"
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
            <div>Customer Name</div>
            <div class="font-bold">{{ item.customer_name }}</div>
          </div>
          <div class="flex justify-between pt-3">
            <div>Customer Email</div>
            <div class="font-bold">{{ item.email }}</div>
          </div>
          <div class="flex justify-between pt-3">
            <div>Customer Mobile Number</div>
            <div class="font-bold">{{ item.phone_number }}</div>
          </div>
          <div class="pt-3">
            <div>Problem :</div>
            <div class="font-bold">{{ item.description }}</div>
          </div>
        </div>
      </div>

      <div class="w-full md:w-2/3 max-sm:pt-4 md:px-5">
        <!-- Reply Form -->
        <div>
          <div>Reply Message :</div>
          <textarea
            v-model="form.message"
            class="w-full border-gray-300"
            rows="3"
          ></textarea>
          <div v-if="errors?.message" class="text-red-600">{{ errors.message }}</div>
          <div class="flex justify-end">
            <button
              class="bg-blue-400 px-3 rounded text-white"
              @click="saveReply"
              :disabled="form.processing"
            >
              Send
            </button>
          </div>
        </div>

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
  </AppLayout>
</template>
