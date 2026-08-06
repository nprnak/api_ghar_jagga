<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Post } from '@/types';

defineProps<{
    post: Post;
    recentPosts: Post[];
}>();
</script>

<template>
    <SiteLayout
        :title="post.seo_title || `${post.title} | Api Ghar Jagga`"
        :description="post.seo_description || post.excerpt || undefined"
        :image="mediaUrl(post.featured_image, 'news')"
    >
        <PageHero
            :eyebrow="post.category"
            :title="post.title"
            :subtitle="[post.author_name, post.published_at].filter(Boolean).join(' · ')"
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.35fr_0.65fr]">
                <article>
                    <div class="aspect-[16/9] overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(post.featured_image, 'news')"
                            :alt="post.title"
                            class="h-full w-full object-cover"
                            @error="onImageError($event, 'news')"
                        />
                    </div>
                    <p
                        v-if="post.excerpt"
                        class="mt-8 border-l-2 border-accent-gold pl-5 text-lg leading-relaxed text-ink-muted"
                    >
                        {{ post.excerpt }}
                    </p>
                    <div class="mt-8 whitespace-pre-line text-base leading-relaxed text-ink-muted">
                        {{ post.content }}
                    </div>
                </article>

                <aside>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                        Recent Articles
                    </p>
                    <div class="mt-6 divide-y divide-line border-y border-line">
                        <Link
                            v-for="item in recentPosts"
                            :key="item.id"
                            :href="`/news/${item.slug}`"
                            class="group block py-5"
                        >
                            <p class="text-xs font-semibold tracking-wide text-accent-green uppercase">
                                {{ item.category }}
                            </p>
                            <h3 class="font-display mt-1 text-base font-semibold text-ink group-hover:text-brand-500">
                                {{ item.title }}
                            </h3>
                        </Link>
                    </div>
                    <Link
                        href="/news"
                        class="mt-6 inline-flex text-sm font-semibold text-brand-500 hover:text-brand-700"
                    >
                        All news →
                    </Link>
                </aside>
            </div>
        </section>
    </SiteLayout>
</template>
