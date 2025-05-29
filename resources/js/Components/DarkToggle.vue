<template>
  <button @click="toggleTheme"
    class="text-sm px-3 py-1 rounded border border-gray-400 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100">
    {{ isDark ? '🌙 Dark' : '☀️ Light' }}
  </button>
</template>

<script setup>
import { useTheme } from '/resources/Composables/useTheme.js'

const { isDark, toggleTheme } = useTheme()
</script>
