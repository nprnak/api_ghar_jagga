<template>
  <footer class="bg-gray-50 border-t mt-12">
    <div class="container mx-auto px-4 py-8 text-sm text-gray-600">
      <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
          <div class="font-semibold text-gray-800">Api Ghar Jagga</div>
          <div>Reliable Realty Solution</div>
        </div>
        <div class="text-gray-500">&copy; {{ year }} Api Ghar Jagga. All rights reserved.</div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref } from 'vue'
const year = new Date().getFullYear()
</script>
