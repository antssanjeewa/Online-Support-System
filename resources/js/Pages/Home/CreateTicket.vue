<script setup>
import { useForm } from "@inertiajs/vue3";
import InputField from "./InputField.vue";

const props = defineProps({
  errors: Object,
});

const form = useForm({
  customer_name: "",
  description: "",
  email: "",
  phone_number: "",
});

const submit = () => {
  form.post(route("tickets.store"));
};
</script>

<template>
  <div class="p-5 rounded shadow">
    <div class="text-center text-xl my-3">Create Your Ticket</div>

    <form @submit.prevent="submit">
      <div>
        <InputField
          v-model="form.customer_name"
          :error="errors?.customer_name"
          type="text"
          label="Your Name"
          class="w-full"
        />

        <InputField
          v-model="form.email"
          :error="errors?.email"
          type="email"
          label="Email"
          class="w-full"
        />

        <InputField
          v-model="form.phone_number"
          :error="errors?.phone_number"
          type="text"
          label="Mobile Number"
          class="w-full"
        />

        <InputField
          v-model="form.description"
          :error="errors?.description"
          type="text"
          label="Describe Your Problem"
          class="w-full"
        />
      </div>

      <button
        class="bg-blue-500 text-white w-full rounded py-2 my-3 font-bold"
        :disabled="form.processing"
      >
        Submit
      </button>
    </form>
  </div>
</template>
