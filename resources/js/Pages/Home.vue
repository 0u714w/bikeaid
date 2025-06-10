<template>
  <div class="max-w-xl mx-auto p-6 space-y-6">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold">BikeAid</h1>
      <DarkToggle />
    </div>

    <Card>
      <p class="text-blue-600">Welcome! Book a convenient repair service at your location.</p>
    </Card>
    <Card>
      <form @submit.prevent="submitBooking" class="space-y-4">
        <Input v-model="form.customer_name" placeholder="Your Name" />

        <select v-model="form.service_type" class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 w-full">
          <option disabled value="">Select Service</option>
          <option v-for="option in serviceOptions" :key="option.name" :value="option.name">
            {{ option.name }} — ${{ option.price }} ({{ option.duration }})
          </option>
        </select>

        <Input v-model="form.location" placeholder="Your Location" />

        <textarea v-model="form.notes" placeholder="Additional Notes (e.g. noise, rush job?)"
          class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100"></textarea>
          <p class="text-gray-500 text-sm mb-1">Select a Date/Time</p>
        <Input v-model="form.appointment_time" type="datetime-local" />
        <br>
        <br>
        <Button :loading="form.processing" class="w-full">
          {{ form.processing ? 'Submitting...' : 'Submit Booking' }}
        </Button>
        <transition name="fade">
        <p v-if="form.processing" class="text-blue-600 dark:text-blue-400 mt-4 text-center">
            Processing your booking...
          </p>
          </transition>
          <transition>
        <p v-if="form.success" class="text-green-600 dark:text-green-400 mt-4 text-center">
            Booking successful! We will contact you shortly.
          </p>
          </transition>
     
       
      </form>
    </Card>
  </div>
</template>

<script setup>
import { watch, ref } from 'vue'
import Button from '../Components/Button.vue'
import Input from '../Components/Input.vue'
import Card from '../Components/Card.vue'
import Datepicker from '../Components/Datepicker.vue'
import DarkToggle from '../Components/DarkToggle.vue'

const serviceOptions = [
  { name: "Flat Tire Repair", price: 25, duration: "15 min" },
  { name: "Brake Tune-Up", price: 40, duration: "30 min" },
  { name: "Full Service", price: 100, duration: "90 min" }
]



const form = ref({
  customer_name: '',
  service_type: '',
  location: '',
  appointment_time: '',
  notes: '',
  price: null,
  duration: '',
  processing: false
})

watch(() => form.value.service_type, (selected) => {
  const match = serviceOptions.find(service => service.name === selected)
  if (match) {
    form.value.price = match.price
    form.value.duration = match.duration
    console.log("Auto-set price:", match.price, "duration:", match.duration)
  } else {
    form.value.price = null
    form.value.duration = ''
  }
})


const submitBooking = async () => {
  form.value.processing = true
  try {
    await axios.post('/api/bookings', {
        customer_name: form.value.customer_name,
        service_type: form.value.service_type,
        appointment_time: form.value.appointment_time,
        notes: form.value.notes,
        location: form.value.location,
        notes: form.value.notes,
        price: form.value.price,
        duration: form.value.duration

      })
    // Reset form or show success
  } catch (e) {
    console.error(e)
  } finally {
    form.value.processing = false
    form.value.success = true
  }
}
</script>
