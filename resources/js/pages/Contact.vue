<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { NavService, SiteSettings } from '@/types';

defineProps<{
    settings: SiteSettings | null;
    services: NavService[];
}>();
</script>

<template>
    <SiteLayout
        title="Contact | Api Ghar Jagga"
        :description="`Reach ${settings?.company_name || 'Api Ghar Jagga'} in Kathmandu for valuation, survey, and realty support.`"
    >
        <PageHero
            eyebrow="Get in Touch"
            title="Contact Us"
            :subtitle="settings?.address || 'New Baneshwor, Kathmandu, Nepal'"
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                        Office Details
                    </p>
                    <h2 class="font-display mt-3 text-2xl font-bold text-ink">
                        {{ settings?.company_name || 'Api Ghar Jagga' }}
                    </h2>
                    <p v-if="settings?.company_name_np" class="mt-1 text-sm text-ink-muted">
                        {{ settings.company_name_np }}
                    </p>

                    <dl class="mt-8 space-y-5 text-sm">
                        <div v-if="settings?.address">
                            <dt class="font-semibold text-ink">Address</dt>
                            <dd class="mt-1 text-ink-muted">
                                {{ settings.address }}
                                <span v-if="settings.address_np" class="mt-1 block">{{ settings.address_np }}</span>
                            </dd>
                        </div>
                        <div v-if="settings?.phone">
                            <dt class="font-semibold text-ink">Phone</dt>
                            <dd class="mt-1">
                                <a :href="`tel:${settings.phone}`" class="text-brand-500 hover:text-brand-700">
                                    {{ settings.phone }}
                                </a>
                            </dd>
                        </div>
                        <div v-if="settings?.email">
                            <dt class="font-semibold text-ink">Email</dt>
                            <dd class="mt-1">
                                <a :href="`mailto:${settings.email}`" class="text-brand-500 hover:text-brand-700">
                                    {{ settings.email }}
                                </a>
                            </dd>
                        </div>
                        <div v-if="settings?.working_hours">
                            <dt class="font-semibold text-ink">Working Hours</dt>
                            <dd class="mt-1 text-ink-muted">{{ settings.working_hours }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <Link
                            href="/inquiry"
                            class="bg-brand-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700"
                        >
                            Online Inquiry
                        </Link>
                        <Link
                            href="/services"
                            class="border border-line px-5 py-3 text-sm font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500"
                        >
                            View Services
                        </Link>
                    </div>

                    <div
                        v-if="
                            settings?.facebook_url ||
                            settings?.instagram_url ||
                            settings?.linkedin_url ||
                            settings?.youtube_url ||
                            settings?.tiktok_url
                        "
                        class="mt-10 border-t border-line pt-6"
                    >
                        <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                            Social
                        </p>
                        <ul class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-sm">
                            <li v-if="settings?.facebook_url">
                                <a
                                    :href="settings.facebook_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-ink-muted hover:text-brand-500"
                                >
                                    Facebook
                                </a>
                            </li>
                            <li v-if="settings?.instagram_url">
                                <a
                                    :href="settings.instagram_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-ink-muted hover:text-brand-500"
                                >
                                    Instagram
                                </a>
                            </li>
                            <li v-if="settings?.linkedin_url">
                                <a
                                    :href="settings.linkedin_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-ink-muted hover:text-brand-500"
                                >
                                    LinkedIn
                                </a>
                            </li>
                            <li v-if="settings?.youtube_url">
                                <a
                                    :href="settings.youtube_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-ink-muted hover:text-brand-500"
                                >
                                    YouTube
                                </a>
                            </li>
                            <li v-if="settings?.tiktok_url">
                                <a
                                    :href="settings.tiktok_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-ink-muted hover:text-brand-500"
                                >
                                    TikTok
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div v-if="services.length" class="mt-10">
                        <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                            Ask About
                        </p>
                        <ul class="mt-4 divide-y divide-line border-y border-line">
                            <li v-for="service in services" :key="service.id">
                                <Link
                                    :href="`/services/${service.slug}`"
                                    class="block py-3 text-sm text-ink-muted transition hover:text-brand-500"
                                >
                                    {{ service.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                        Find Us
                    </p>
                    <div
                        v-if="settings?.google_map_embed"
                        class="mt-4 aspect-[16/9] w-full overflow-hidden border border-line bg-brand-50 [&>iframe]:h-full [&>iframe]:w-full"
                        v-html="settings.google_map_embed"
                    />
                    <div
                        v-else
                        class="mt-4 flex aspect-[16/9] items-center justify-center border border-line bg-surface text-sm text-ink-muted"
                    >
                        Map embed coming soon.
                    </div>
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
