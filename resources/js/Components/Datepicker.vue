<template>
  <div class="relative w-full">
    <Datepicker
      :model-value="modelValue"
      @update:model-value="$emit('update:modelValue', $event)"
      :enable-time-picker="true"
      :is24="true"
      :format="'yyyy-MM-dd HH:mm'"
      :placeholder="placeholder"
      type="datetime"
      style="--dp-input-padding: 50px; width: 100%;"
      input-class="form-input pr-10"
    />
    <span class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <rect x="3" y="4" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="2" />
        <path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
      </svg>
    </span>
  </div>
</template>

<script setup>
import Datepicker from 'vue3-datepicker'

defineProps({
  modelValue: Date,
  placeholder: {
    type: String,
    default: 'Select Date and Time'
  }
})

defineEmits(['update:modelValue'])
</script>

<style scoped>
/* Optional: Dark mode calendar popup styling */
:deep(.dp__menu) {
  background-color: #1f2937; /* dark gray */
  color: #f3f4f6;            /* light text */
  border-color: #4b5563;
}
</style>
