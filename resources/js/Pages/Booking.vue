<template>
    <div class="max-w-md mx-auto p-6 bg-white shadow-md rounded">
      <h2 class="text-2xl font-bold mb-6 text-center">Book a Bike Repair</h2>
      <form @submit.prevent="submitBooking" class="space-y-4">
        <input v-model="form.customer_name" type="text" placeholder="Your Name"
          class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
  
        <input v-model="form.service_type" type="text" placeholder="Service Type"
          class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
  
        <input v-model="form.appointment_time" type="datetime-local"
          class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500" />
  
        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
          Submit Booking
        </button>
      </form>
      <p v-if="success" class="text-green-600 mt-4 text-center">Booking submitted!</p>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import axios from 'axios'
  
  const form = ref({ customer_name: '', service_type: '', appointment_time: '' })
  const success = ref(false)
  
  const submitBooking = async () => {
    await axios.post('/api/bookings', form.value)
    success.value = true
    form.value = { customer_name: '', service_type: '', appointment_time: '' }
  }
  </script>
  
  