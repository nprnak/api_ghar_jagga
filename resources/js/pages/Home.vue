<template>
  <div class="min-h-screen bg-gray-50">
    <Header />

    <main class="container mx-auto px-4 py-12">
      <section class="grid md:grid-cols-2 gap-8 items-center">
        <div>
          <h1 class="text-4xl font-extrabold text-blue-700">{{ settings['site.title'] ?? 'Api Ghar Jagga' }}</h1>
          <p class="mt-4 text-gray-700">{{ settings['site.tagline'] ?? 'Reliable realty, valuation, surveying and engineering consultancy.' }}</p>
          <a href="/contact" class="inline-block mt-6 bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700">Get an Inquiry</a>
        </div>

        <div>
          <img src="/images/hero-placeholder.jpg" alt="hero" class="rounded-lg shadow" />
        </div>
      </section>

      <section class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800">Our Services</h2>
        <div class="grid md:grid-cols-3 gap-6 mt-6">
          <div v-for="s in services" :key="s.id" class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-blue-700">{{ s.title }}</h3>
            <p class="mt-2 text-gray-600">{{ s.excerpt }}</p>
            <a :href="`/services/${s.id}`" class="inline-block mt-4 text-blue-600">Read more →</a>
          </div>
        </div>
      </section>

      <section class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800">Projects</h2>
        <div class="grid md:grid-cols-3 gap-6 mt-6">
          <div v-for="p in projects" :key="p.id" class="bg-white rounded-lg shadow overflow-hidden">
            <img :src="p.image || '/images/project-placeholder.jpg'" alt="project" class="w-full h-44 object-cover" />
            <div class="p-4">
              <h3 class="font-semibold">{{ p.title }}</h3>
              <p class="text-sm text-gray-600 mt-2">{{ p.excerpt }}</p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '../Shared/Header.vue'
import Footer from '../Shared/Footer.vue'
defineProps(['services','projects','team','testimonials','posts','gallery','settings'])
</script>
