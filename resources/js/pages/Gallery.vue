<script setup lang="ts">
import { computed, ref } from 'vue';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { GalleryItem } from '@/types';

const props = defineProps<{
    items: GalleryItem[];
}>();

const activeCategory = ref<string>('all');

const categories = computed(() => {
    const set = new Set<string>();
    for (const item of props.items) {
        if (item.category) {
            set.add(item.category);
        }
    }
    return ['all', ...Array.from(set)];
});

const filteredItems = computed(() => {
    if (activeCategory.value === 'all') {
        return props.items;
    }
    return props.items.filter((item) => item.category === activeCategory.value);
});
</script>

<template>
    <SiteLayout
        title="Gallery | Api Ghar Jagga"
        description="Photos from surveys, site visits, construction supervision, and GIS work across Nepal."
    >
        <PageHero
            eyebrow="Visuals"
            title="Gallery"
            subtitle="Moments from the field—surveys, sites, mapping, and team work across Kathmandu Valley."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="flex flex-wrap gap-2 border-b border-line pb-6">
                <button
                    v-for="category in categories"
                    :key="category"
                    type="button"
                    class="border px-4 py-2 text-xs font-semibold tracking-wide uppercase transition"
                    :class="
                        activeCategory === category
                            ? 'border-brand-500 bg-brand-500 text-white'
                            : 'border-line text-ink-muted hover:border-brand-500 hover:text-brand-500'
                    "
                    @click="activeCategory = category"
                >
                    {{ category === 'all' ? 'All' : category }}
                </button>
            </div>

            <div class="mt-10 columns-1 gap-4 sm:columns-2 lg:columns-3">
                <figure
                    v-for="item in filteredItems"
                    :key="item.id"
                    class="mb-4 break-inside-avoid"
                >
                    <div class="overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(item.image, 'gallery')"
                            :alt="item.title || item.caption || 'Gallery image'"
                            class="w-full object-cover"
                            @error="onImageError($event, 'gallery')"
                        />
                    </div>
                    <figcaption class="mt-3 border-l-2 border-accent-gold pl-3">
                        <p v-if="item.category" class="text-xs font-semibold tracking-wide text-accent-green uppercase">
                            {{ item.category }}
                        </p>
                        <p v-if="item.title" class="font-display mt-1 text-base font-semibold text-ink">
                            {{ item.title }}
                        </p>
                        <p v-if="item.caption" class="mt-1 text-sm text-ink-muted">{{ item.caption }}</p>
                    </figcaption>
                </figure>
            </div>

            <p v-if="!filteredItems.length" class="mt-10 text-sm text-ink-muted">
                No gallery items in this category.
            </p>
        </section>
    </SiteLayout>
</template>
