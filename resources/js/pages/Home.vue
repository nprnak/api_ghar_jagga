<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { Post, Project, Service, SiteSettings, Testimonial } from '@/types';

defineProps<{
    settings: SiteSettings | null;
    featuredServices: Service[];
    featuredProjects: Project[];
    testimonials: Testimonial[];
    latestPosts: Post[];
}>();
</script>

<template>
    <SiteLayout
        :title="settings?.seo_title || 'Api Ghar Jagga'"
        :description="settings?.seo_description || undefined"
        :keywords="settings?.seo_keywords || undefined"
    >
        <!-- Hero: one composition, brand-first, full-bleed -->
        <section class="relative min-h-[100svh] overflow-hidden">
            <div class="absolute inset-0">
                <img
                    :src="mediaUrl(settings?.hero_image, 'hero')"
                    alt=""
                    class="hero-media h-full w-full object-cover"
                    @error="onImageError($event, 'hero')"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-r from-brand-900/92 via-brand-800/78 to-brand-700/45"
                />
                <div class="bg-grain absolute inset-0 opacity-40" />
            </div>

            <div class="relative mx-auto flex min-h-[100svh] max-w-6xl flex-col justify-end px-5 pb-20 pt-32 md:px-8 md:pb-28">
                <div class="max-w-2xl">
                    <img
                        src="/images/logo.png"
                        alt="Api Ghar Jagga"
                        class="reveal mb-8 h-24 w-24 rounded-sm bg-white/95 object-contain p-1 shadow-lg ring-1 ring-white/30 md:h-28 md:w-28"
                    />
                    <p class="reveal reveal-delay-1 font-display text-sm font-semibold tracking-[0.28em] text-accent-gold uppercase">
                        {{ settings?.company_name_np || 'अपि घर जग्गा' }}
                    </p>
                    <h1 class="reveal reveal-delay-1 font-display mt-3 text-5xl font-extrabold tracking-tight text-white md:text-6xl lg:text-7xl">
                        Api Ghar
                        <span class="text-emerald-300">Jagga</span>
                    </h1>
                    <p class="reveal reveal-delay-2 mt-4 max-w-xl text-lg text-brand-100 md:text-xl">
                        {{ settings?.hero_headline_np || settings?.tagline_np }}
                    </p>
                    <p class="reveal reveal-delay-2 mt-3 max-w-lg text-base leading-relaxed text-white/80">
                        {{ settings?.hero_subheadline || settings?.about_short }}
                    </p>
                    <div class="reveal reveal-delay-3 mt-8 flex flex-wrap gap-3">
                        <Link
                            :href="settings?.hero_cta_link || '/inquiry'"
                            class="bg-accent-green px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-accent-green-dark"
                        >
                            {{ settings?.hero_cta_text || 'Get a Free Consultation' }}
                        </Link>
                        <Link
                            href="/services"
                            class="border border-white/35 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition hover:border-accent-gold hover:text-accent-gold"
                        >
                            Explore Services
                        </Link>
                    </div>
                </div>
            </div>

            <div class="absolute right-0 bottom-0 h-1 w-full bg-gradient-to-r from-accent-gold via-accent-green to-brand-300" />
        </section>

        <!-- About strip -->
        <section class="border-b border-line bg-surface">
            <div class="mx-auto grid max-w-6xl gap-10 px-5 py-20 md:grid-cols-[1.1fr_0.9fr] md:px-8 md:py-24">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">About Company</p>
                    <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                        Built on trust for Nepal’s land & property decisions
                    </h2>
                    <p class="mt-5 text-base leading-relaxed text-ink-muted">
                        {{ settings?.about_short }}
                    </p>
                    <Link
                        href="/about"
                        class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-brand-500 hover:text-brand-700"
                    >
                        Read our story
                        <span aria-hidden="true">→</span>
                    </Link>
                </div>
                <div class="grid grid-cols-2 gap-px bg-line">
                    <div class="bg-white p-6">
                        <p class="font-display text-3xl font-bold text-brand-500">6+</p>
                        <p class="mt-1 text-sm text-ink-muted">Core service lines</p>
                    </div>
                    <div class="bg-white p-6">
                        <p class="font-display text-3xl font-bold text-accent-green">Valley</p>
                        <p class="mt-1 text-sm text-ink-muted">Kathmandu & beyond</p>
                    </div>
                    <div class="bg-white p-6">
                        <p class="font-display text-3xl font-bold text-accent-gold">GIS</p>
                        <p class="mt-1 text-sm text-ink-muted">Modern mapping</p>
                    </div>
                    <div class="bg-white p-6">
                        <p class="font-display text-3xl font-bold text-brand-500">Bank</p>
                        <p class="mt-1 text-sm text-ink-muted">Ready valuations</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="mx-auto max-w-6xl px-5 py-20 md:px-8 md:py-24">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Services</p>
                    <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                        Expertise across the property lifecycle
                    </h2>
                </div>
                <Link href="/services" class="text-sm font-semibold text-brand-500 hover:text-brand-700">
                    View all services →
                </Link>
            </div>

            <div class="mt-12 divide-y divide-line border-y border-line">
                <Link
                    v-for="(service, index) in featuredServices"
                    :key="service.id"
                    :href="`/services/${service.slug}`"
                    class="group grid gap-4 py-7 transition md:grid-cols-[4rem_1fr_auto] md:items-center"
                >
                    <span class="font-display text-2xl font-bold text-brand-200 transition group-hover:text-brand-500">
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <div>
                        <h3 class="font-display text-xl font-semibold text-ink group-hover:text-brand-500">
                            {{ service.title }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm leading-relaxed text-ink-muted">
                            {{ service.short_description }}
                        </p>
                    </div>
                    <span class="text-sm font-semibold text-accent-green opacity-0 transition group-hover:opacity-100 md:justify-self-end">
                        Learn more →
                    </span>
                </Link>
            </div>
        </section>

        <!-- Projects -->
        <section class="bg-blueprint">
            <div class="mx-auto max-w-6xl px-5 py-20 md:px-8 md:py-24">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="text-xs font-semibold tracking-[0.22em] text-accent-gold uppercase">
                            Projects Portfolio
                        </p>
                        <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-white md:text-4xl">
                            Work that stands on site
                        </h2>
                    </div>
                    <Link href="/projects" class="text-sm font-semibold text-emerald-300 hover:text-white">
                        Browse portfolio →
                    </Link>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    <Link
                        v-for="project in featuredProjects"
                        :key="project.id"
                        :href="`/projects/${project.slug}`"
                        class="group relative block overflow-hidden"
                    >
                        <div class="aspect-[4/3] overflow-hidden">
                            <img
                                :src="mediaUrl(project.featured_image, 'project')"
                                :alt="project.title"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                @error="onImageError($event, 'project')"
                            />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/90 via-brand-900/20 to-transparent" />
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <p class="text-xs tracking-wide text-accent-gold uppercase">
                                {{ project.category || project.location }}
                            </p>
                            <h3 class="font-display mt-1 text-lg font-semibold text-white">
                                {{ project.title }}
                            </h3>
                        </div>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="mx-auto max-w-6xl px-5 py-20 md:px-8 md:py-24">
            <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Client Testimonials</p>
            <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                Words from people we’ve served
            </h2>

            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <blockquote
                    v-for="item in testimonials"
                    :key="item.id"
                    class="border-l-2 border-accent-gold pl-5"
                >
                    <p class="text-base leading-relaxed text-ink-muted">“{{ item.content }}”</p>
                    <footer class="mt-5">
                        <p class="font-semibold text-ink">{{ item.client_name }}</p>
                        <p class="text-sm text-ink-muted">
                            {{ [item.client_position, item.client_company].filter(Boolean).join(' · ') }}
                        </p>
                    </footer>
                </blockquote>
            </div>
            <Link
                href="/testimonials"
                class="mt-10 inline-flex text-sm font-semibold text-brand-500 hover:text-brand-700"
            >
                More testimonials →
            </Link>
        </section>

        <!-- News -->
        <section class="border-t border-line bg-surface">
            <div class="mx-auto max-w-6xl px-5 py-20 md:px-8 md:py-24">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">News & Blogs</p>
                        <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                            Insights from the field
                        </h2>
                    </div>
                    <Link href="/news" class="text-sm font-semibold text-brand-500 hover:text-brand-700">
                        All articles →
                    </Link>
                </div>

                <div class="mt-12 grid gap-8 md:grid-cols-3">
                    <Link
                        v-for="post in latestPosts"
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
                        <h3 class="font-display mt-2 text-lg font-semibold text-ink group-hover:text-brand-500">
                            {{ post.title }}
                        </h3>
                        <p class="mt-2 line-clamp-2 text-sm text-ink-muted">{{ post.excerpt }}</p>
                    </Link>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="relative overflow-hidden bg-brand-500">
            <div class="bg-grain absolute inset-0 opacity-30" />
            <div class="relative mx-auto flex max-w-6xl flex-col items-start justify-between gap-8 px-5 py-16 md:flex-row md:items-center md:px-8 md:py-20">
                <div>
                    <h2 class="font-display text-3xl font-bold text-white md:text-4xl">
                        Ready to discuss your property?
                    </h2>
                    <p class="mt-3 max-w-xl text-brand-100">
                        Send an inquiry for valuation, survey, consultancy, or real estate support. Our team responds during business hours.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <Link
                        href="/inquiry"
                        class="bg-white px-6 py-3.5 text-sm font-semibold text-brand-700 hover:bg-brand-50"
                    >
                        Online Inquiry Form
                    </Link>
                    <Link
                        href="/contact"
                        class="border border-white/40 px-6 py-3.5 text-sm font-semibold text-white hover:border-accent-gold hover:text-accent-gold"
                    >
                        Contact Office
                    </Link>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
