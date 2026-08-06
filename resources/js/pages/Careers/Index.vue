<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Career } from '@/types';

defineProps<{
    careers: Career[];
}>();
</script>

<template>
    <SiteLayout
        title="Careers | Api Ghar Jagga"
        description="Current job openings at Api Ghar Jagga in Kathmandu, Nepal."
    >
        <PageHero
            eyebrow="Join Us"
            title="Careers"
            subtitle="Build your career with a team focused on trustworthy land and property solutions."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div v-if="careers.length" class="divide-y divide-line border-y border-line">
                <Link
                    v-for="career in careers"
                    :key="career.id"
                    :href="`/careers/${career.slug}`"
                    class="group block py-8"
                >
                    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-start">
                        <div>
                            <h2 class="font-display text-2xl font-semibold text-ink group-hover:text-brand-500">
                                {{ career.title }}
                            </h2>
                            <p class="mt-2 text-sm text-ink-muted">
                                {{
                                    [career.department, career.location, career.employment_type]
                                        .filter(Boolean)
                                        .join(' · ')
                                }}
                            </p>
                        </div>
                        <div class="text-sm md:text-right">
                            <p v-if="career.deadline" class="text-ink-muted">
                                Deadline:
                                <span class="font-semibold text-ink">{{ career.deadline }}</span>
                            </p>
                            <span class="mt-2 inline-block font-semibold text-accent-green">View role →</span>
                        </div>
                    </div>
                </Link>
            </div>
            <div v-else class="border-l-2 border-line pl-5">
                <p class="text-base text-ink-muted">
                    No open positions right now. Send your interest via our
                    <Link href="/inquiry" class="font-semibold text-brand-500 hover:text-brand-700">inquiry form</Link>.
                </p>
            </div>
        </section>
    </SiteLayout>
</template>
