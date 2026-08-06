<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Project } from '@/types';

defineProps<{
    project: Project;
    relatedProjects: Project[];
}>();
</script>

<template>
    <SiteLayout
        :title="`${project.title} | Projects | Api Ghar Jagga`"
        :description="project.description || undefined"
        :image="mediaUrl(project.featured_image, 'project')"
    >
        <PageHero
            eyebrow="Project"
            :title="project.title"
            :subtitle="[project.category, project.location].filter(Boolean).join(' · ')"
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="aspect-[16/9] overflow-hidden bg-brand-100">
                <img
                    :src="mediaUrl(project.featured_image, 'project')"
                    :alt="project.title"
                    class="h-full w-full object-cover"
                    @error="onImageError($event, 'project')"
                />
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Overview</p>
                    <p class="mt-4 whitespace-pre-line text-base leading-relaxed text-ink-muted">
                        {{ project.description || 'Project details coming soon.' }}
                    </p>
                </div>
                <dl class="divide-y divide-line border-y border-line text-sm">
                    <div v-if="project.client" class="flex justify-between gap-4 py-4">
                        <dt class="font-semibold text-ink">Client</dt>
                        <dd class="text-right text-ink-muted">{{ project.client }}</dd>
                    </div>
                    <div v-if="project.location" class="flex justify-between gap-4 py-4">
                        <dt class="font-semibold text-ink">Location</dt>
                        <dd class="text-right text-ink-muted">{{ project.location }}</dd>
                    </div>
                    <div v-if="project.category" class="flex justify-between gap-4 py-4">
                        <dt class="font-semibold text-ink">Category</dt>
                        <dd class="text-right text-ink-muted">{{ project.category }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 py-4">
                        <dt class="font-semibold text-ink">Status</dt>
                        <dd class="text-right text-accent-green capitalize">{{ project.status }}</dd>
                    </div>
                    <div v-if="project.completed_at" class="flex justify-between gap-4 py-4">
                        <dt class="font-semibold text-ink">Completed</dt>
                        <dd class="text-right text-ink-muted">{{ project.completed_at }}</dd>
                    </div>
                </dl>
            </div>

            <div v-if="project.gallery?.length" class="mt-14">
                <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Gallery</p>
                <div class="mt-6 grid gap-3 sm:grid-cols-2 md:grid-cols-3">
                    <div
                        v-for="(image, index) in project.gallery"
                        :key="index"
                        class="aspect-[4/3] overflow-hidden bg-brand-100"
                    >
                        <img
                            :src="mediaUrl(image, 'project')"
                            :alt="`${project.title} ${index + 1}`"
                            class="h-full w-full object-cover"
                            @error="onImageError($event, 'project')"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section v-if="relatedProjects.length" class="border-t border-line bg-blueprint">
            <div class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-20">
                <p class="text-xs font-semibold tracking-[0.22em] text-accent-gold uppercase">More Work</p>
                <h2 class="font-display mt-3 text-2xl font-bold text-white">Related projects</h2>
                <div class="mt-8 grid gap-5 md:grid-cols-3">
                    <Link
                        v-for="item in relatedProjects"
                        :key="item.id"
                        :href="`/projects/${item.slug}`"
                        class="group relative block overflow-hidden"
                    >
                        <div class="aspect-[4/3] overflow-hidden">
                            <img
                                :src="mediaUrl(item.featured_image, 'project')"
                                :alt="item.title"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                @error="onImageError($event, 'project')"
                            />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/90 to-transparent" />
                        <div class="absolute inset-x-0 bottom-0 p-4">
                            <h3 class="font-display text-base font-semibold text-white">{{ item.title }}</h3>
                        </div>
                    </Link>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
