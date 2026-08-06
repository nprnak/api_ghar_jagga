<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Testimonial } from '@/types';

defineProps<{
    testimonials: Testimonial[];
}>();
</script>

<template>
    <SiteLayout
        title="Testimonials | Api Ghar Jagga"
        description="Client feedback on Api Ghar Jagga valuation, survey, and construction services."
    >
        <PageHero
            eyebrow="Client Voice"
            title="Testimonials"
            subtitle="Feedback from banks, homeowners, and developers we’ve partnered with."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-10 md:grid-cols-2">
                <blockquote
                    v-for="item in testimonials"
                    :key="item.id"
                    class="border-l-2 border-accent-gold pl-6"
                >
                    <div class="mb-3 flex gap-1 text-accent-gold" aria-label="Rating">
                        <span v-for="n in item.rating" :key="n">★</span>
                    </div>
                    <p class="text-lg leading-relaxed text-ink-muted">“{{ item.content }}”</p>
                    <footer class="mt-6">
                        <p class="font-display text-lg font-semibold text-ink">{{ item.client_name }}</p>
                        <p class="mt-1 text-sm text-ink-muted">
                            {{ [item.client_position, item.client_company].filter(Boolean).join(' · ') }}
                        </p>
                    </footer>
                </blockquote>
            </div>

            <div class="mt-16 flex flex-wrap gap-3">
                <Link
                    href="/inquiry"
                    class="bg-brand-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700"
                >
                    Share Your Project
                </Link>
                <Link
                    href="/projects"
                    class="border border-line px-5 py-3 text-sm font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500"
                >
                    View Projects
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
