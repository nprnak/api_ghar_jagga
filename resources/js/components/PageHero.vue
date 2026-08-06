<script setup lang="ts">
defineProps<{
    title: string;
    subtitle?: string;
    eyebrow?: string;
}>();
</script>

<template>
    <section class="relative overflow-hidden bg-blueprint text-white">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-900/90 via-brand-700/80 to-brand-500/70" />
        <div class="bg-grain absolute inset-0 opacity-60" />
        <div class="relative mx-auto max-w-6xl px-5 pt-32 pb-20 md:px-8 md:pt-36 md:pb-28">
            <p
                v-if="eyebrow"
                class="reveal mb-4 text-xs font-semibold tracking-[0.22em] text-accent-gold uppercase"
            >
                {{ eyebrow }}
            </p>
            <h1 class="reveal reveal-delay-1 font-display max-w-3xl text-4xl font-bold tracking-tight md:text-5xl lg:text-6xl">
                {{ title }}
            </h1>
            <p
                v-if="subtitle"
                class="reveal reveal-delay-2 mt-5 max-w-2xl text-base leading-relaxed text-brand-100 md:text-lg"
            >
                {{ subtitle }}
            </p>
        </div>
        <div class="absolute right-0 bottom-0 h-1 w-full bg-gradient-to-r from-accent-gold via-accent-green to-brand-300" />
    </section>
</template>
