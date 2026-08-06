<script setup lang="ts">
import FlashMessage from '@/components/FlashMessage.vue';
import SeoHead from '@/components/SeoHead.vue';
import SiteFooter from '@/components/SiteFooter.vue';
import SiteHeader from '@/components/SiteHeader.vue';

defineProps<{
    title?: string;
    description?: string;
    keywords?: string;
    image?: string;
}>();
</script>

<template>
    <div class="flex min-h-screen flex-col">
        <SeoHead :title="title" :description="description" :keywords="keywords" :image="image" />
        <SiteHeader />
        <main class="flex-1">
            <slot />
        </main>
        <SiteFooter />
        <FlashMessage />
    </div>
</template>
