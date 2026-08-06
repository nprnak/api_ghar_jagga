<template>
  <div class="min-h-screen bg-gray-50">
    <Header />

    <main class="container mx-auto px-4 py-12">
      <h1 class="text-3xl font-bold text-blue-700">Our Services</h1>
      <div class="grid md:grid-cols-3 gap-6 mt-6">
        <div v-for="s in services" :key="s.id" class="bg-white p-6 rounded shadow">
          <h3 class="text-lg font-semibold text-blue-700">{{ s.title }}</h3>
          <p class="mt-2 text-gray-600">{{ s.excerpt }}</p>
          <a :href="`/services/${s.id}`" class="mt-3 inline-block text-blue-600">Read more →</a>
        </div>
      </div>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '../../Shared/Header.vue'
import Footer from '../../Shared/Footer.vue'
defineProps(['services'])
</script>
