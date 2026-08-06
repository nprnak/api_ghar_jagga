<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Career } from '@/types';

defineProps<{
    career: Career;
}>();
</script>

<template>
    <SiteLayout
        :title="`${career.title} | Careers | Api Ghar Jagga`"
        :description="`Apply for ${career.title} at Api Ghar Jagga.`"
    >
        <PageHero
            eyebrow="Open Role"
            :title="career.title"
            :subtitle="[career.department, career.location, career.employment_type].filter(Boolean).join(' · ')"
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.25fr_0.75fr]">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                        Role Description
                    </p>
                    <div class="mt-5 whitespace-pre-line text-base leading-relaxed text-ink-muted">
                        {{ career.description }}
                    </div>

                    <div v-if="career.requirements?.length" class="mt-12">
                        <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                            Requirements
                        </p>
                        <ul class="mt-5 divide-y divide-line border-y border-line">
                            <li
                                v-for="(requirement, index) in career.requirements"
                                :key="index"
                                class="py-4 text-sm leading-relaxed text-ink-muted"
                            >
                                {{ requirement }}
                            </li>
                        </ul>
                    </div>
                </div>

                <aside class="border border-line bg-surface p-6 h-fit">
                    <dl class="space-y-4 text-sm">
                        <div v-if="career.department">
                            <dt class="font-semibold text-ink">Department</dt>
                            <dd class="mt-1 text-ink-muted">{{ career.department }}</dd>
                        </div>
                        <div v-if="career.location">
                            <dt class="font-semibold text-ink">Location</dt>
                            <dd class="mt-1 text-ink-muted">{{ career.location }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">Employment</dt>
                            <dd class="mt-1 capitalize text-ink-muted">{{ career.employment_type }}</dd>
                        </div>
                        <div v-if="career.deadline">
                            <dt class="font-semibold text-ink">Deadline</dt>
                            <dd class="mt-1 text-ink-muted">{{ career.deadline }}</dd>
                        </div>
                    </dl>
                    <Link
                        href="/inquiry"
                        class="mt-8 inline-flex w-full items-center justify-center bg-brand-500 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-brand-700"
                    >
                        Apply / Inquire
                    </Link>
                    <Link
                        href="/careers"
                        class="mt-3 inline-flex w-full items-center justify-center border border-line px-5 py-3.5 text-sm font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500"
                    >
                        All Openings
                    </Link>
                </aside>
            </div>
        </section>
    </SiteLayout>
</template>
