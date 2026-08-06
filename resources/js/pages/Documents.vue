<script setup lang="ts">
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { DocumentItem } from '@/types';

defineProps<{
    documents: DocumentItem[];
}>();
</script>

<template>
    <SiteLayout
        title="Documents | Api Ghar Jagga"
        description="Download company profiles, brochures, and forms from Api Ghar Jagga."
    >
        <PageHero
            eyebrow="Resources"
            title="Documents"
            subtitle="Company materials and downloadable resources for clients and partners."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div v-if="documents.length" class="divide-y divide-line border-y border-line">
                <article
                    v-for="document in documents"
                    :key="document.id"
                    class="flex flex-col justify-between gap-4 py-7 md:flex-row md:items-center"
                >
                    <div>
                        <p v-if="document.category" class="text-xs font-semibold tracking-wide text-accent-green uppercase">
                            {{ document.category }}
                        </p>
                        <h2 class="font-display mt-1 text-xl font-semibold text-ink">
                            {{ document.title }}
                        </h2>
                        <p v-if="document.description" class="mt-2 max-w-2xl text-sm text-ink-muted">
                            {{ document.description }}
                        </p>
                        <p class="mt-2 text-xs text-ink-muted">
                            {{ [document.file_type, document.file_size].filter(Boolean).join(' · ') }}
                        </p>
                    </div>
                    <a
                        :href="`/documents/${document.id}/download`"
                        class="inline-flex shrink-0 items-center justify-center border border-brand-500 px-5 py-2.5 text-sm font-semibold text-brand-500 transition hover:bg-brand-500 hover:text-white"
                    >
                        Download
                    </a>
                </article>
            </div>
            <p v-else class="border-l-2 border-line pl-5 text-sm text-ink-muted">
                No documents are available for download yet.
            </p>
        </section>
    </SiteLayout>
</template>
