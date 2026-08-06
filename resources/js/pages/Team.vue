<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { TeamMember } from '@/types';

defineProps<{
    team: TeamMember[];
}>();
</script>

<template>
    <SiteLayout
        title="Our Team | Api Ghar Jagga"
        description="Meet the valuers, surveyors, engineers, and GIS specialists at Api Ghar Jagga."
    >
        <PageHero
            eyebrow="People"
            title="Our Team"
            subtitle="Multidisciplinary professionals dedicated to accurate, practical property solutions."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="divide-y divide-line border-y border-line">
                <article
                    v-for="member in team"
                    :key="member.id"
                    class="grid gap-6 py-10 md:grid-cols-[10rem_1fr] md:items-start lg:grid-cols-[12rem_1fr]"
                >
                    <div class="aspect-square overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(member.photo, 'team')"
                            :alt="member.name"
                            class="h-full w-full object-cover"
                            @error="onImageError($event, 'team')"
                        />
                    </div>
                    <div>
                        <h2 class="font-display text-2xl font-semibold text-ink">{{ member.name }}</h2>
                        <p class="mt-1 text-sm font-semibold text-accent-green">{{ member.position }}</p>
                        <p v-if="member.bio" class="mt-4 max-w-3xl text-base leading-relaxed text-ink-muted">
                            {{ member.bio }}
                        </p>
                        <div class="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-sm">
                            <a
                                v-if="member.email"
                                :href="`mailto:${member.email}`"
                                class="text-brand-500 hover:text-brand-700"
                            >
                                {{ member.email }}
                            </a>
                            <a
                                v-if="member.phone"
                                :href="`tel:${member.phone}`"
                                class="text-ink-muted hover:text-brand-500"
                            >
                                {{ member.phone }}
                            </a>
                            <a
                                v-if="member.linkedin_url"
                                :href="member.linkedin_url"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-ink-muted hover:text-brand-500"
                            >
                                LinkedIn
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <div class="mt-12 border-l-2 border-accent-gold pl-5">
                <p class="text-base text-ink-muted">
                    Interested in joining the team?
                    <Link href="/careers" class="font-semibold text-brand-500 hover:text-brand-700">
                        View open roles →
                    </Link>
                </p>
            </div>
        </section>
    </SiteLayout>
</template>
