<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  item: Object,
});
</script>

<template>
  <Head title="Welcome" />

  <div class="relative min-h-screen bg-primary-100">
    <div class="max-w-5xl mx-auto p-6 lg:p-8">
      <div class="text-4xl text-center mb-6 lg:my-16">Online Support System</div>
      <div class="bg-gray-200 rounded text-center p-10">
        <div class="text-3xl text-green-500 font-bold mb-5">
          You are Successfully Created Ticket
        </div>
        <div>Your Ticket Reference Number : {{ item.ref_number }}</div>

        <div class="mt-8">
          <Link
            :href="route('home')"
            class="bg-blue-400 text-white py-1 px-3 rounded font-bold"
            >Go Back</Link
          >
        </div>
      </div>
    </div>
  </div>
</template>
