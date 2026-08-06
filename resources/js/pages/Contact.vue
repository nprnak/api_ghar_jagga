<template>
  <div class="min-h-screen bg-gray-50">
    <Header />

    <main class="container mx-auto px-4 py-12">
      <h1 class="text-3xl font-bold text-blue-700">Contact Us</h1>
      <div class="mt-6 bg-white p-6 rounded shadow max-w-2xl">
        <form @submit.prevent="submit" class="grid gap-4">
          <input v-model="form.name" placeholder="Your name" class="border p-2 rounded" />
          <input v-model="form.email" placeholder="Email" class="border p-2 rounded" />
          <input v-model="form.phone" placeholder="Phone" class="border p-2 rounded" />
          <input v-model="form.subject" placeholder="Subject" class="border p-2 rounded" />
          <textarea v-model="form.message" placeholder="Message" rows="6" class="border p-2 rounded"></textarea>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Message</button>
        </form>
      </div>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '../Shared/Header.vue'
import Footer from '../Shared/Footer.vue'
import { reactive } from 'vue'

const form = reactive({ name: '', email: '', phone: '', subject: '', message: '' })

async function submit() {
  const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
  await fetch(route('contact.store'), {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': token || ''
    },
    body: JSON.stringify(form),
  })
  window.location = window.location.pathname
}
</script>
