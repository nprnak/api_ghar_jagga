<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { SiteSettings } from '@/types';

defineProps<{
    settings: SiteSettings | null;
}>();
</script>

<template>
    <SiteLayout
        title="Vision & Mission | Api Ghar Jagga"
        description="Our vision, mission, and objectives for reliable realty solutions in Nepal."
    >
        <PageHero
            eyebrow="Purpose"
            title="Vision & Mission"
            subtitle="The principles that guide every valuation, survey, and project we deliver."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 md:grid-cols-2">
                <article class="border-t-2 border-accent-gold pt-8">
                    <p class="text-xs font-semibold tracking-[0.22em] text-accent-gold uppercase">Vision</p>
                    <h2 class="font-display mt-3 text-2xl font-bold text-ink md:text-3xl">Where we aim</h2>
                    <p class="mt-5 text-base leading-relaxed text-ink-muted">
                        {{ settings?.vision || 'Our vision will appear here once configured.' }}
                    </p>
                </article>
                <article class="border-t-2 border-accent-green pt-8">
                    <p class="text-xs font-semibold tracking-[0.22em] text-accent-green uppercase">Mission</p>
                    <h2 class="font-display mt-3 text-2xl font-bold text-ink md:text-3xl">How we serve</h2>
                    <p class="mt-5 text-base leading-relaxed text-ink-muted">
                        {{ settings?.mission || 'Our mission will appear here once configured.' }}
                    </p>
                </article>
            </div>
        </section>

        <section v-if="settings?.objectives?.length" class="border-t border-line bg-surface">
            <div class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
                <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Objectives</p>
                <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                    What we commit to deliver
                </h2>

                <ol class="mt-12 divide-y divide-line border-y border-line">
                    <li
                        v-for="(objective, index) in settings.objectives"
                        :key="index"
                        class="grid gap-4 py-6 md:grid-cols-[4rem_1fr] md:items-start"
                    >
                        <span class="font-display text-2xl font-bold text-brand-200">
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                        <p class="text-base leading-relaxed text-ink-muted">{{ objective }}</p>
                    </li>
                </ol>

                <Link
                    href="/services"
                    class="mt-10 inline-flex text-sm font-semibold text-brand-500 hover:text-brand-700"
                >
                    Explore our services →
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
