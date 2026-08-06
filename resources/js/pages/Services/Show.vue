<template>
  <div>
    <h2>{{ service.title }}</h2>
    <div v-html="service.description"></div>
    <a href="/services">Back to services</a>
  </div>
</template>

<script setup>
defineProps(['service'])
</script>
