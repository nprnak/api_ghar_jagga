<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps<{
    title?: string;
    description?: string;
    keywords?: string;
    image?: string;
}>();

const page = usePage();
const settings = computed(() => page.props.siteSettings);

const pageTitle = computed(
    () => props.title || settings.value?.seo_title || settings.value?.company_name || 'Api Ghar Jagga',
);

const pageDescription = computed(
    () =>
        props.description ||
        settings.value?.seo_description ||
        settings.value?.tagline ||
        'Reliable Realty Solution',
);

const pageKeywords = computed(
    () =>
        props.keywords ||
        settings.value?.seo_keywords ||
        'real estate, property valuation, land survey, GIS mapping, Nepal, Kathmandu',
);

const ogImage = computed(() => props.image || '/images/logo.png');
</script>

<template>
    <Head :title="pageTitle">
        <meta name="description" :content="pageDescription" />
        <meta name="keywords" :content="pageKeywords" />
        <meta property="og:title" :content="pageTitle" />
        <meta property="og:description" :content="pageDescription" />
        <meta property="og:image" :content="ogImage" />
        <meta property="og:type" content="website" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" :content="pageTitle" />
        <meta name="twitter:description" :content="pageDescription" />
    </Head>
</template>

