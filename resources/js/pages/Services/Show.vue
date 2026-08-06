<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Service } from '@/types';

defineProps<{
    service: Service;
    relatedServices: Service[];
}>();
</script>

<template>
    <SiteLayout
        :title="service.seo_title || `${service.title} | Api Ghar Jagga`"
        :description="service.seo_description || service.short_description"
    >
        <PageHero
            eyebrow="Service"
            :title="service.title"
            :subtitle="service.short_description"
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr]">
                <div>
                    <div class="aspect-[16/10] overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(service.image, 'service')"
                            :alt="service.title"
                            class="h-full w-full object-cover"
                            @error="onImageError($event, 'service')"
                        />
                    </div>
                    <div class="mt-10 whitespace-pre-line text-base leading-relaxed text-ink-muted">
                        {{ service.description }}
                    </div>
                </div>

                <aside>
                    <div v-if="service.features?.length" class="border border-line bg-surface p-6">
                        <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                            Key Features
                        </p>
                        <ul class="mt-5 space-y-3">
                            <li
                                v-for="(feature, index) in service.features"
                                :key="index"
                                class="border-l-2 border-accent-green pl-4 text-sm text-ink-muted"
                            >
                                {{ feature }}
                            </li>
                        </ul>
                    </div>
                    <Link
                        href="/inquiry"
                        class="mt-6 inline-flex w-full items-center justify-center bg-brand-500 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-brand-700"
                    >
                        Inquire About This Service
                    </Link>
                    <Link
                        href="/services"
                        class="mt-3 inline-flex w-full items-center justify-center border border-line px-5 py-3.5 text-sm font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500"
                    >
                        All Services
                    </Link>
                </aside>
            </div>
        </section>

        <section v-if="relatedServices.length" class="border-t border-line bg-surface">
            <div class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-20">
                <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Related</p>
                <h2 class="font-display mt-3 text-2xl font-bold text-ink">Other services</h2>
                <div class="mt-8 divide-y divide-line border-y border-line">
                    <Link
                        v-for="item in relatedServices"
                        :key="item.id"
                        :href="`/services/${item.slug}`"
                        class="group flex items-center justify-between gap-4 py-5"
                    >
                        <div>
                            <h3 class="font-display text-lg font-semibold text-ink group-hover:text-brand-500">
                                {{ item.title }}
                            </h3>
                            <p class="mt-1 text-sm text-ink-muted">{{ item.short_description }}</p>
                        </div>
                        <span class="shrink-0 text-sm font-semibold text-accent-green">→</span>
                    </Link>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
