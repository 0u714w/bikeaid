<template>
  <button
    :disabled="loading"
    class="px-4 py-2 rounded text-white font-semibold bg-blue-600 hover:bg-blue-700 disabled:bg-blue-300 transition"
  >
    <slot />
  </button>
</template>

<script setup>
defineProps({ loading: Boolean })
</script>
