<template>
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
      <table class="min-w-full table-auto bg-white shadow-md rounded overflow-hidden">
        <thead class="bg-gray-100 text-left">
          <tr>
            <th class="p-3">Name</th>
            <th class="p-3">Service</th>
            <th class="p-3">Date</th>
            <th class="p-3">Location</th>
            <th class="p-3">Status</th>
            <th class="p-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="booking in bookings" :key="booking.id" class="border-t">
            <td class="p-3">{{ booking.customer_name }}</td>
            <td class="p-3">{{ booking.service_type }}</td>
            <td class="p-3">{{ booking.appointment_time }}</td>
            <td class="p-3">{{ booking.location }}</td> 
            <td class="p-3 capitalize">{{ booking.status }}</td>
            <td class="p-3">
              <select v-model="booking.status" @change="updateStatus(booking)"
                class="border rounded px-2 py-1 focus:ring focus:ring-blue-400">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import axios from 'axios'
  
  const bookings = ref([])
  
  const fetchBookings = async () => {
    const response = await axios.get('/api/bookings')
    bookings.value = response.data.data
  }
  
  const updateStatus = async (booking) => {
    await axios.put(`/api/bookings/${booking.id}`, { status: booking.status })
  }
  
  onMounted(fetchBookings)
  </script>
  