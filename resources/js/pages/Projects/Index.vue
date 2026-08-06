<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Project } from '@/types';

defineProps<{
    projects: Project[];
}>();
</script>

<template>
    <SiteLayout
        title="Projects | Api Ghar Jagga"
        description="Selected valuation, survey, construction, and GIS projects across Kathmandu Valley and Nepal."
    >
        <PageHero
            eyebrow="Portfolio"
            title="Our Projects"
            subtitle="Field-tested work across Kathmandu Valley—from valuations and surveys to supervision and GIS."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-6 md:grid-cols-2">
                <Link
                    v-for="project in projects"
                    :key="project.id"
                    :href="`/projects/${project.slug}`"
                    class="group relative block overflow-hidden"
                >
                    <div class="aspect-[16/11] overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(project.featured_image, 'project')"
                            :alt="project.title"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                            @error="onImageError($event, 'project')"
                        />
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-900/90 via-brand-900/25 to-transparent" />
                    <div class="absolute inset-x-0 bottom-0 p-6">
                        <p class="text-xs tracking-wide text-accent-gold uppercase">
                            {{ [project.category, project.location].filter(Boolean).join(' · ') }}
                        </p>
                        <h2 class="font-display mt-2 text-xl font-semibold text-white md:text-2xl">
                            {{ project.title }}
                        </h2>
                        <p v-if="project.client" class="mt-1 text-sm text-white/75">
                            Client: {{ project.client }}
                        </p>
                    </div>
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
