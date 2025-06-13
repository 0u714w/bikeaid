<template>
  <button
    :disabled="loading"
    class="px-4 py-2 rounded text-white font-semibold hover:bg-blue-700 disabled:bg-blue-300 transition"
    style="background-color: #00e0fc;"
  >
    <slot />
  </button>
</template>

<script setup>
defineProps({ loading: Boolean })
</script>
