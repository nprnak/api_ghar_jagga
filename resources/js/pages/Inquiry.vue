<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import PageHero from '@/components/PageHero.vue';
import SiteLayout from '@/layouts/SiteLayout.vue';
import type { NavService } from '@/types';

defineProps<{
    services: NavService[];
}>();

const form = useForm({
    name: '',
    email: '',
    phone: '',
    subject: '',
    service_interest: '',
    message: '',
});

function submit(): void {
    form.post('/inquiry', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <SiteLayout
        title="Inquiry | Api Ghar Jagga"
        description="Send an inquiry for property valuation, land survey, engineering, or real estate support."
    >
        <PageHero
            eyebrow="Start a Conversation"
            title="Online Inquiry"
            subtitle="Tell us about your property need. We respond during business hours."
        />

        <section class="mx-auto max-w-6xl px-5 py-16 md:px-8 md:py-24">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr]">
                <aside class="border-l-2 border-accent-green pl-5">
                    <p class="text-xs font-semibold tracking-[0.22em] text-accent-green uppercase">
                        How It Works
                    </p>
                    <ol class="mt-5 space-y-4 text-sm text-ink-muted">
                        <li>1. Share your details and the service you need.</li>
                        <li>2. Our team reviews your request during office hours.</li>
                        <li>3. We follow up by phone or email with next steps.</li>
                    </ol>
                    <p class="mt-8 text-sm text-ink-muted">
                        Prefer to visit?
                        <a href="/contact" class="font-semibold text-brand-500 hover:text-brand-700">
                            See contact details →
                        </a>
                    </p>
                </aside>

                <form class="border border-line bg-surface p-6 md:p-8" @submit.prevent="submit">
                    <div class="grid gap-5 md:grid-cols-2">
                        <label class="block md:col-span-1">
                            <span class="text-sm font-semibold text-ink">Full Name *</span>
                            <input
                                v-model="form.name"
                                type="text"
                                required
                                autocomplete="name"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                            />
                            <span v-if="form.errors.name" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.name }}
                            </span>
                        </label>

                        <label class="block md:col-span-1">
                            <span class="text-sm font-semibold text-ink">Email *</span>
                            <input
                                v-model="form.email"
                                type="email"
                                required
                                autocomplete="email"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                            />
                            <span v-if="form.errors.email" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.email }}
                            </span>
                        </label>

                        <label class="block md:col-span-1">
                            <span class="text-sm font-semibold text-ink">Phone</span>
                            <input
                                v-model="form.phone"
                                type="tel"
                                autocomplete="tel"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                            />
                            <span v-if="form.errors.phone" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.phone }}
                            </span>
                        </label>

                        <label class="block md:col-span-1">
                            <span class="text-sm font-semibold text-ink">Subject</span>
                            <input
                                v-model="form.subject"
                                type="text"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                            />
                            <span v-if="form.errors.subject" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.subject }}
                            </span>
                        </label>

                        <label class="block md:col-span-2">
                            <span class="text-sm font-semibold text-ink">Service Interest</span>
                            <select
                                v-model="form.service_interest"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                            >
                                <option value="">Select a service (optional)</option>
                                <option
                                    v-for="service in services"
                                    :key="service.id"
                                    :value="service.title"
                                >
                                    {{ service.title }}
                                </option>
                            </select>
                            <span v-if="form.errors.service_interest" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.service_interest }}
                            </span>
                        </label>

                        <label class="block md:col-span-2">
                            <span class="text-sm font-semibold text-ink">Message *</span>
                            <textarea
                                v-model="form.message"
                                required
                                rows="6"
                                class="mt-2 w-full border border-line bg-white px-3 py-2.5 text-sm text-ink outline-none transition focus:border-brand-500"
                                placeholder="Describe your property, location, and what you need help with..."
                            />
                            <span v-if="form.errors.message" class="mt-1 block text-xs text-red-600">
                                {{ form.errors.message }}
                            </span>
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="mt-6 bg-brand-500 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-brand-700 disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Sending…' : 'Submit Inquiry' }}
                    </button>
                </form>
            </div>
        </section>
    </SiteLayout>
</template>
