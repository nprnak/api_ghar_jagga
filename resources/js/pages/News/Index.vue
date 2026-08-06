<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Paginated, Post } from '@/types';

defineProps<{
    posts: Paginated<Post>;
}>();
</script>

<template>
    <SiteLayout
        title="News & Blogs | Api Ghar Jagga"
        description="Insights and updates on real estate, valuation, survey, and construction in Nepal."
    >
        <PageHero
            eyebrow="Insights"
            title="News & Blogs"
            subtitle="Field notes, market guidance, and company updates from Api Ghar Jagga."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                <Link
                    v-for="post in posts.data"
                    :key="post.id"
                    :href="`/news/${post.slug}`"
                    class="group"
                >
                    <div class="aspect-[16/10] overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(post.featured_image, 'news')"
                            :alt="post.title"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            @error="onImageError($event, 'news')"
                        />
                    </div>
                    <p class="mt-4 text-xs font-semibold tracking-wide text-accent-green uppercase">
                        {{ post.category }}
                    </p>
                    <h2 class="font-display mt-2 text-xl font-semibold text-ink group-hover:text-brand-500">
                        {{ post.title }}
                    </h2>
                    <p v-if="post.excerpt" class="mt-2 line-clamp-3 text-sm leading-relaxed text-ink-muted">
                        {{ post.excerpt }}
                    </p>
                    <p v-if="post.published_at" class="mt-3 text-xs text-ink-muted">
                        {{ post.published_at }}
                        <span v-if="post.author_name"> · {{ post.author_name }}</span>
                    </p>
                </Link>
            </div>

            <nav
                v-if="posts.links.length > 3"
                class="mt-14 flex flex-wrap items-center justify-center gap-2"
                aria-label="Pagination"
            >
                <template v-for="(link, index) in posts.links" :key="index">
                    <Link
                        v-if="link.url"
                        :href="link.url"
                        class="min-w-9 border px-3 py-2 text-center text-sm transition"
                        :class="
                            link.active
                                ? 'border-brand-500 bg-brand-500 text-white'
                                : 'border-line text-ink-muted hover:border-brand-500 hover:text-brand-500'
                        "
                        v-html="link.label"
                    />
                    <span
                        v-else
                        class="min-w-9 border border-line px-3 py-2 text-center text-sm text-ink-muted/50"
                        v-html="link.label"
                    />
                </template>
            </nav>
        </section>
    </SiteLayout>
</template>
