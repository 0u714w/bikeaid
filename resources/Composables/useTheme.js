import { ref, onMounted } from 'vue'

const isDark = ref(false)

export function useTheme() {
  onMounted(() => {
    isDark.value = localStorage.theme === 'dark'
    updateTheme()
  })

  const toggleTheme = () => {
    isDark.value = !isDark.value
    updateTheme()
  }

  const updateTheme = () => {
    const html = document.documentElement
    if (isDark.value) {
      html.classList.add('dark')
      localStorage.theme = 'dark'
    } else {
      html.classList.remove('dark')
      localStorage.theme = 'light'
    }
  }

  return { isDark, toggleTheme }
}
