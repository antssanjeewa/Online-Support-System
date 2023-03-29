<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  search: "",
});

function searchTicket() {
  form.post(route("tickets.create"));
}
</script>
<template>
  <div class="p-5 rounded shadow">
    <div class="text-center my-3 text-xl">Find Your Ticket Status</div>
    <div>
      <input
        v-model="form.search"
        type="text"
        placeholder="Enter Your Reference Number"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
      />
    </div>

    <div v-if="form.errors?.search" class="text-red-500 text-sm font-bold mt-1">
      {{ form.errors?.search[0] }}
    </div>

    <button class="w-full bg-blue-500 text-white py-2 my-4" @click="searchTicket">
      Find
    </button>
  </div>
</template>
