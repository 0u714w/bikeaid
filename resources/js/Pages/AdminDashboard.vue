<template>
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Bookings</h1>
    <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
      <thead class="bg-gray-100 dark:bg-gray-800 text-left">
        <tr>
          <th class="p-3">Name</th>
          <th class="p-3">Service</th>
          <th class="p-3">Date</th>
          <th class="p-3">Price</th>
          <th class="p-3">Duration</th>
          <th class="p-3">Notes</th>
          <th class="p-3">Location</th>
          <th class="p-3">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="booking in bookings" :key="booking.id" class="border-t border-gray-200 dark:border-gray-700">
          <td class="p-3">{{ booking.customer_name }}</td>
          <td class="p-3">{{ booking.service_type }}</td>
          <td class="p-3">{{ booking.appointment_time }}</td>
          <td class="p-3">${{ booking.price }}</td>
          <td class="p-3">{{ booking.duration }}</td>
          <td class="p-3">{{ booking.notes }}</td>
          <td class="p-3">{{ booking.location }}</td>
          <td class="p-3 capitalize">{{ booking.status }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

const bookings = ref([])

const fetchBookings = async () => {
  const response = await axios.get('/api/bookings')
  bookings.value = response.data.data
}

onMounted(fetchBookings)
</script>
