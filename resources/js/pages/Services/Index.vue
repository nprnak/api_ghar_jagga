<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Service } from '@/types';

defineProps<{
    services: Service[];
}>();
</script>

<template>
    <SiteLayout
        title="Services | Api Ghar Jagga"
        description="Property valuation, engineering consultancy, land survey, construction supervision, real estate, and GIS mapping."
    >
        <PageHero
            eyebrow="What We Offer"
            title="Our Services"
            subtitle="End-to-end expertise across valuation, survey, engineering, supervision, real estate, and GIS mapping."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="divide-y divide-line border-y border-line">
                <Link
                    v-for="(service, index) in services"
                    :key="service.id"
                    :href="`/services/${service.slug}`"
                    class="group grid gap-4 py-8 transition md:grid-cols-[4rem_1fr_auto] md:items-center"
                >
                    <span class="font-display text-2xl font-bold text-brand-200 transition group-hover:text-brand-500">
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <div>
                        <h2 class="font-display text-2xl font-semibold text-ink group-hover:text-brand-500">
                            {{ service.title }}
                        </h2>
                        <p class="mt-2 max-w-3xl text-sm leading-relaxed text-ink-muted md:text-base">
                            {{ service.short_description }}
                        </p>
                    </div>
                    <span
                        class="text-sm font-semibold text-accent-green opacity-0 transition group-hover:opacity-100 md:justify-self-end"
                    >
                        Details →
                    </span>
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
