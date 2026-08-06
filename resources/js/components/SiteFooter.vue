<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const settings = computed(() => page.props.siteSettings);
const services = computed(() => page.props.navigationServices || []);

const socials = computed(() =>
    [
        { label: 'Facebook', href: settings.value?.facebook_url },
        { label: 'Instagram', href: settings.value?.instagram_url },
        { label: 'LinkedIn', href: settings.value?.linkedin_url },
        { label: 'YouTube', href: settings.value?.youtube_url },
        { label: 'TikTok', href: settings.value?.tiktok_url },
    ].filter((item) => item.href),
);
</script>

<template>
    <footer class="bg-brand-900 text-white">
        <div class="mx-auto grid max-w-6xl gap-10 px-5 py-16 md:grid-cols-2 md:px-8 lg:grid-cols-4">
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3">
                    <img src="/images/logo.png" alt="Api Ghar Jagga" class="h-14 w-14 rounded-sm bg-white object-contain p-1" />
                    <div>
                        <p class="font-display text-lg font-bold">
                            Api Ghar <span class="text-emerald-400">Jagga</span>
                        </p>
                        <p class="text-xs text-brand-200">{{ settings?.company_name_np }}</p>
                    </div>
                </div>
                <p class="mt-4 text-sm leading-relaxed text-brand-100">
                    {{ settings?.tagline || 'Reliable Realty Solution' }}
                </p>
                <p class="mt-2 text-sm text-brand-200">{{ settings?.tagline_np }}</p>
                <div v-if="socials.length" class="mt-5 flex flex-wrap gap-2">
                    <a
                        v-for="social in socials"
                        :key="social.label"
                        :href="social.href!"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="border border-white/15 px-3 py-1.5 text-xs tracking-wide text-brand-100 transition hover:border-accent-gold hover:text-accent-gold"
                    >
                        {{ social.label }}
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-display text-sm font-semibold tracking-[0.16em] text-accent-gold uppercase">
                    Explore
                </h3>
                <ul class="mt-4 space-y-2 text-sm text-brand-100">
                    <li><Link href="/about" class="hover:text-white">About Company</Link></li>
                    <li><Link href="/vision-mission" class="hover:text-white">Vision & Mission</Link></li>
                    <li><Link href="/projects" class="hover:text-white">Projects Portfolio</Link></li>
                    <li><Link href="/team" class="hover:text-white">Our Team</Link></li>
                    <li><Link href="/careers" class="hover:text-white">Careers</Link></li>
                    <li><Link href="/news" class="hover:text-white">News & Blogs</Link></li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-sm font-semibold tracking-[0.16em] text-accent-gold uppercase">
                    Services
                </h3>
                <ul class="mt-4 space-y-2 text-sm text-brand-100">
                    <li v-for="service in services" :key="service.id">
                        <Link :href="`/services/${service.slug}`" class="hover:text-white">
                            {{ service.title }}
                        </Link>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-display text-sm font-semibold tracking-[0.16em] text-accent-gold uppercase">
                    Contact
                </h3>
                <ul class="mt-4 space-y-3 text-sm text-brand-100">
                    <li v-if="settings?.address">{{ settings.address }}</li>
                    <li v-if="settings?.phone">
                        <a :href="`tel:${settings.phone}`" class="hover:text-white">{{ settings.phone }}</a>
                    </li>
                    <li v-if="settings?.email">
                        <a :href="`mailto:${settings.email}`" class="hover:text-white">{{ settings.email }}</a>
                    </li>
                    <li v-if="settings?.working_hours">{{ settings.working_hours }}</li>
                </ul>
                <div class="mt-5 flex flex-col gap-2">
                    <Link
                        href="/inquiry"
                        class="inline-flex items-center justify-center bg-accent-green px-4 py-2.5 text-sm font-semibold text-white hover:bg-accent-green-dark"
                    >
                        Online Inquiry
                    </Link>
                    <Link
                        href="/documents"
                        class="inline-flex items-center justify-center border border-white/20 px-4 py-2.5 text-sm font-medium text-white hover:border-accent-gold hover:text-accent-gold"
                    >
                        Download Documents
                    </Link>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div
                class="mx-auto flex max-w-6xl flex-col gap-2 px-5 py-5 text-xs text-brand-200 md:flex-row md:items-center md:justify-between md:px-8"
            >
                <p>
                    © {{ new Date().getFullYear() }}
                    {{ settings?.company_name || 'Api Ghar Jagga' }}. All rights reserved.
                </p>
                <p>{{ settings?.tagline_np || 'विश्वासिलो घर–जग्गा समाधान' }}</p>
            </div>
        </div>
    </footer>
</template>
