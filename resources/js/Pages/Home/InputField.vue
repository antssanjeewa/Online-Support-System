<script setup>
import InputError from "@/Components/InputError.vue";
import { onMounted, ref, useAttrs } from "vue";

const props = defineProps({
  modelValue: String,
  type: {
    type: String,
    default: "text",
  },
  label: String,
  error: String,
});

defineEmits(["update:modelValue"]);
const attrs = useAttrs();

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>
<template>
  <div class="mb-3">
    <label class="block font-medium text-sm text-gray-700">
      <span v-if="label">{{ label }}</span>
      <span v-else><slot /></span>
    </label>
    <input
      ref="input"
      v-bind="attrs"
      :type="type"
      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />

    <div v-show="error">
      <p class="mt-1 text-sm text-red-600">
        {{ error }}
      </p>
    </div>
  </div>
</template>
