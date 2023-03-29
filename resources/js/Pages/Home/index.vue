<script setup>
import { Head, Link } from "@inertiajs/vue3";
import CreateTicket from "./CreateTicket.vue";
import SearchTicket from "./SearchTicket.vue";

defineProps({
  errors: Object,
});
</script>

<template>
  <Head title="Welcome" />

  <div class="relative min-h-screen bg-primary-100">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <div class="text-4xl text-center lg:my-16">Online Support System</div>
      <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 max-sm:pt-5 md:pr-2">
          <SearchTicket />
        </div>
        <div class="w-full md:w-1/2 max-sm:pt-5 md:pl-2">
          <CreateTicket :errors="errors" />
        </div>
      </div>
    </div>
  </div>
</template>
