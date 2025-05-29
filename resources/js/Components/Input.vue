<template>
  <input
    :type="type"
    :placeholder="placeholder"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
           text-gray-800 dark:text-gray-100
           bg-white dark:bg-gray-700
           focus:outline-none focus:ring-2 focus:ring-blue-500"
  />
</template>

<script setup>
defineProps({
  modelValue: String,
  type: {
    type: String,
    default: 'text',
  },
  placeholder: {
    type: String,
    default: '',
  },
});
</script>