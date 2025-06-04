<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import { ref } from 'vue'

import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
  availabilities: Array
})

const events = ref(
  props.availabilities.map((a: any) => ({
    start: a.start_date,
    end: a.end_date,
    title: `${a.number_of_guests} guest${a.number_of_guests > 1 ? 's' : ''}`,
    class: a.number_of_guests > 0 ? 'booked-event' : ''

  }))
)


const form = useForm({
  start_date: '',
  end_date: '',
  number_of_guests: 1
})

function formatDate(date: string | Date) {
  const d = new Date(date)
  return d.toISOString().slice(0, 19).replace('T', ' ')
}

function submit() {
  const start = formatDate(form.start_date)
  const end = formatDate(form.end_date)

  form.start_date = start
  form.end_date = end

  form.post('/availability', {
    preserveScroll: true,
    onSuccess: () => {
      events.value.push({
        start,
        end,
        title: `${form.number_of_guests} guest${form.number_of_guests > 1 ? 's' : ''}`,
        class: form.number_of_guests > 0 ? 'booked-event' : ''
        })
      form.reset()
    }
  })
}

</script>

<template>
  <Head title="Dashboard" />

  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 py-8">
      <h1 class="text-2xl font-bold mb-6">Availability Manager</h1>

      <!-- Form -->
      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div>
          <label class="block text-sm font-medium">Start Date</label>
          <Datepicker
            v-model="form.start_date"
            :enable-time-picker="false"
            auto-apply
            calendar-class="border rounded"
            input-class="hidden"
          />
        </div>
        <div>
          <label class="block text-sm font-medium">End Date</label>
          <Datepicker
            v-model="form.end_date"
            :enable-time-picker="false"
            auto-apply
            calendar-class="border rounded"
            input-class="hidden"
          />
        </div>
        <div>
          <label class="block text-sm font-medium">Guests</label>
          <input
            type="number"
            min="1"
            v-model="form.number_of_guests"
            class="w-full mt-1 border rounded px-2 py-1"
            required
          />
        </div>
        <div class="flex items-end">
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded"
          >
            Add
          </button>
        </div>
      </form>
    </div>

        <vue-cal
            view="month"
            :views="['day', 'month']"
            :events="events"
            class="border rounded shadow"
        />
  </AppLayout>
</template>

<style>
.booked-event {
  background-color: #34d399 !important;
  color: black !important;
}
</style>
