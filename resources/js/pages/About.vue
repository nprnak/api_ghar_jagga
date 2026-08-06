<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import { mediaUrl, onImageError } from '@/composables/useMedia';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { SiteSettings, TeamMember } from '@/types';

defineProps<{
    settings: SiteSettings | null;
    team: TeamMember[];
}>();
</script>

<template>
    <SiteLayout title="About Us | Api Ghar Jagga" :description="settings?.about_short || undefined">
        <PageHero
            eyebrow="About Company"
            title="Who we are"
            :subtitle="settings?.tagline_np || settings?.tagline || 'विश्वासिलो घर–जग्गा समाधान'"
        />

        <section class="border-b border-line bg-surface">
            <div class="mx-auto grid max-w-6xl gap-12 px-5 py-16 md:grid-cols-[1.15fr_0.85fr] md:px-8 md:py-24">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">
                        {{ settings?.company_name_np || 'अपि घर जग्गा' }}
                    </p>
                    <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                        {{ settings?.company_name || 'Api Ghar Jagga' }}
                    </h2>
                    <p class="mt-6 whitespace-pre-line text-base leading-relaxed text-ink-muted">
                        {{ settings?.about_full || settings?.about_short }}
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <Link
                            href="/vision-mission"
                            class="bg-brand-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-700"
                        >
                            Vision & Mission
                        </Link>
                        <Link
                            href="/inquiry"
                            class="border border-line px-5 py-3 text-sm font-semibold text-ink transition hover:border-brand-500 hover:text-brand-500"
                        >
                            Contact Us
                        </Link>
                    </div>
                </div>
                <aside class="border-l-2 border-accent-gold bg-white py-2 pl-6">
                    <p class="text-xs font-semibold tracking-[0.22em] text-accent-gold uppercase">Office</p>
                    <ul class="mt-5 space-y-4 text-sm text-ink-muted">
                        <li v-if="settings?.address">
                            <span class="block font-semibold text-ink">Address</span>
                            {{ settings.address }}
                            <span v-if="settings.address_np" class="mt-1 block text-ink-muted">{{ settings.address_np }}</span>
                        </li>
                        <li v-if="settings?.phone">
                            <span class="block font-semibold text-ink">Phone</span>
                            <a :href="`tel:${settings.phone}`" class="hover:text-brand-500">{{ settings.phone }}</a>
                        </li>
                        <li v-if="settings?.email">
                            <span class="block font-semibold text-ink">Email</span>
                            <a :href="`mailto:${settings.email}`" class="hover:text-brand-500">{{ settings.email }}</a>
                        </li>
                        <li v-if="settings?.working_hours">
                            <span class="block font-semibold text-ink">Hours</span>
                            {{ settings.working_hours }}
                        </li>
                    </ul>
                </aside>
            </div>
        </section>

        <section v-if="team.length" class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-xs font-semibold tracking-[0.22em] text-brand-500 uppercase">Leadership</p>
                    <h2 class="font-display mt-3 text-3xl font-bold tracking-tight text-ink md:text-4xl">
                        People behind the work
                    </h2>
                </div>
                <Link href="/team" class="text-sm font-semibold text-brand-500 hover:text-brand-700">
                    Full team →
                </Link>
            </div>

            <div class="mt-12 divide-y divide-line border-y border-line">
                <article
                    v-for="member in team"
                    :key="member.id"
                    class="grid gap-6 py-8 md:grid-cols-[8rem_1fr] md:items-start"
                >
                    <div class="aspect-square overflow-hidden bg-brand-100">
                        <img
                            :src="mediaUrl(member.photo, 'team')"
                            :alt="member.name"
                            class="h-full w-full object-cover"
                            @error="onImageError($event, 'team')"
                        />
                    </div>
                    <div>
                        <h3 class="font-display text-xl font-semibold text-ink">{{ member.name }}</h3>
                        <p class="mt-1 text-sm font-semibold text-accent-green">{{ member.position }}</p>
                        <p v-if="member.bio" class="mt-3 max-w-2xl text-sm leading-relaxed text-ink-muted">
                            {{ member.bio }}
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </SiteLayout>
</template>
