<template>
  <div class="min-h-screen bg-gray-50">
    <Header />

    <main class="container mx-auto px-4 py-12">
      <h1 class="text-3xl font-bold text-blue-700">About Us</h1>
      <p class="mt-4 text-gray-700">{{ settings['company.description'] ?? 'Company description goes here.' }}</p>

      <div class="mt-8 grid md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow">
          <h3 class="font-semibold">Vision</h3>
          <p class="mt-2 text-gray-600">{{ settings['company.vision'] ?? '' }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <h3 class="font-semibold">Mission</h3>
          <p class="mt-2 text-gray-600">{{ settings['company.mission'] ?? '' }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <h3 class="font-semibold">Objectives</h3>
          <p class="mt-2 text-gray-600">Deliver exceptional real estate services and technical consultancy.</p>
        </div>
      </div>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '../Shared/Header.vue'
import Footer from '../Shared/Footer.vue'
defineProps(['settings'])
</script>
