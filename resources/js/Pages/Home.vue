<template>
  <div class="max-w-xl mx-auto p-6 space-y-6">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold">BikeAid</h1>
      <DarkToggle />
    </div>

    <Card>
      <p class="text-gray-600">Welcome! Book a convenient repair service at your location.</p>
    </Card>

    <Card>
      <form @submit.prevent="submitBooking" class="space-y-4">
        <Input v-model="form.customer_name" placeholder="Your Name" />
        <select
          v-model="form.service_type"
          class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 w-full"
        >
          <option disabled value="">Select Service Type</option>
          <option>Tube/Tire</option>
          <option>Brakes</option>
          <option>Gears</option>
          <option>Other/Not Listed</option>
        </select>

        <Input v-model="form.location" placeholder="Your Location" />
        <p class="text-gray-500 text-sm mb-1">Select a Date/Time</p>
        <Input v-model="form.appointment_time" type="datetime-local" />

        <Button :loading="form.processing" class="w-full">
          {{ form.processing ? 'Submitting...' : 'Submit Booking' }}
        </Button>
      </form>

      <transition name="fade">
        <p v-if="success" class="text-green-600 mt-4 text-center">
          Booking submitted successfully!
        </p>
      </transition>
    </Card>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import DarkToggle from '../Components/DarkToggle.vue'
import Input from '../Components/Input.vue'
import Button from '../Components/Button.vue'
import Datepicker from '../Components/Datepicker.vue'

const form = ref({
  customer_name: '',
  service_type: '',
  location: '',
  appointment_time: '',
  processing: false,
})

const success = ref(false)

const submitBooking = async () => {
  success.value = false
  form.value.processing = true

  try {
    await axios.post('/api/bookings', {
      customer_name: form.value.customer_name,
      service_type: form.value.service_type,
      appointment_time: form.value.appointment_time,
      location: form.value.location,
    })

    success.value = true
    form.value.customer_name = ''
    form.value.service_type = ''
    form.value.location = ''
    form.value.appointment_time = ''
  } catch (error) {
    console.error('Error submitting booking:', error)
  } finally {
    form.value.processing = false
    setTimeout(() => (success.value = false), 3000)
  }
}
</script>
