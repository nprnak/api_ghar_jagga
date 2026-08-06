<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const page = usePage();
const settings = computed(() => page.props.siteSettings);
const services = computed(() => page.props.navigationServices || []);
const mobileOpen = ref(false);
const servicesOpen = ref(false);
const scrolled = ref(false);

const onScroll = () => {
    scrolled.value = window.scrollY > 24;
};

onMounted(() => {
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', onScroll);
});

const closeMobile = () => {
    mobileOpen.value = false;
    servicesOpen.value = false;
};

const isActive = (path: string) => {
    const url = page.url.split('?')[0];
    if (path === '/') return url === '/';
    return url === path || url.startsWith(`${path}/`);
};
</script>

<template>
    <header
        class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
        :class="
            scrolled
                ? 'border-b border-line/80 bg-white/95 shadow-sm backdrop-blur-md'
                : 'bg-transparent'
        "
    >
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-5 py-3 md:px-8">
            <Link href="/" class="group flex items-center gap-3" @click="closeMobile">
                <img
                    src="/images/logo.png"
                    alt="Api Ghar Jagga"
                    class="h-12 w-12 rounded-sm object-contain shadow-sm ring-1 ring-white/40 transition group-hover:scale-[1.02] md:h-14 md:w-14"
                />
                <div class="leading-tight">
                    <p
                        class="font-display text-base font-bold tracking-tight md:text-lg"
                        :class="scrolled ? 'text-brand-500' : 'text-white'"
                    >
                        Api Ghar
                        <span :class="scrolled ? 'text-accent-green' : 'text-emerald-300'">Jagga</span>
                    </p>
                    <p
                        class="hidden text-[11px] tracking-wide sm:block"
                        :class="scrolled ? 'text-ink-muted' : 'text-white/75'"
                    >
                        {{ settings?.tagline_np || 'विश्वासिलो घर–जग्गा समाधान' }}
                    </p>
                </div>
            </Link>

            <nav class="hidden items-center gap-1 lg:flex">
                <Link
                    href="/"
                    class="rounded-sm px-3 py-2 text-sm font-medium transition"
                    :class="
                        isActive('/')
                            ? scrolled
                                ? 'text-brand-500'
                                : 'text-accent-gold'
                            : scrolled
                              ? 'text-ink-muted hover:text-brand-500'
                              : 'text-white/85 hover:text-white'
                    "
                >
                    Home
                </Link>
                <Link
                    href="/about"
                    class="rounded-sm px-3 py-2 text-sm font-medium transition"
                    :class="
                        isActive('/about')
                            ? scrolled
                                ? 'text-brand-500'
                                : 'text-accent-gold'
                            : scrolled
                              ? 'text-ink-muted hover:text-brand-500'
                              : 'text-white/85 hover:text-white'
                    "
                >
                    About
                </Link>

                <div class="relative" @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false">
                    <button
                        type="button"
                        class="flex items-center gap-1 rounded-sm px-3 py-2 text-sm font-medium transition"
                        :class="
                            isActive('/services')
                                ? scrolled
                                    ? 'text-brand-500'
                                    : 'text-accent-gold'
                                : scrolled
                                  ? 'text-ink-muted hover:text-brand-500'
                                  : 'text-white/85 hover:text-white'
                        "
                    >
                        Services
                        <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div
                        v-show="servicesOpen"
                        class="absolute top-full left-0 z-50 min-w-[240px] border border-line bg-white py-2 shadow-xl"
                    >
                        <Link
                            href="/services"
                            class="block px-4 py-2.5 text-sm font-semibold text-brand-500 hover:bg-brand-50"
                        >
                            All Services
                        </Link>
                        <Link
                            v-for="service in services"
                            :key="service.id"
                            :href="`/services/${service.slug}`"
                            class="block px-4 py-2 text-sm text-ink-muted hover:bg-surface hover:text-brand-500"
                        >
                            {{ service.title }}
                        </Link>
                    </div>
                </div>

                <Link
                    href="/projects"
                    class="rounded-sm px-3 py-2 text-sm font-medium transition"
                    :class="
                        isActive('/projects')
                            ? scrolled
                                ? 'text-brand-500'
                                : 'text-accent-gold'
                            : scrolled
                              ? 'text-ink-muted hover:text-brand-500'
                              : 'text-white/85 hover:text-white'
                    "
                >
                    Projects
                </Link>
                <Link
                    href="/news"
                    class="rounded-sm px-3 py-2 text-sm font-medium transition"
                    :class="
                        isActive('/news')
                            ? scrolled
                                ? 'text-brand-500'
                                : 'text-accent-gold'
                            : scrolled
                              ? 'text-ink-muted hover:text-brand-500'
                              : 'text-white/85 hover:text-white'
                    "
                >
                    News
                </Link>
                <Link
                    href="/contact"
                    class="rounded-sm px-3 py-2 text-sm font-medium transition"
                    :class="
                        isActive('/contact')
                            ? scrolled
                                ? 'text-brand-500'
                                : 'text-accent-gold'
                            : scrolled
                              ? 'text-ink-muted hover:text-brand-500'
                              : 'text-white/85 hover:text-white'
                    "
                >
                    Contact
                </Link>
            </nav>

            <div class="hidden items-center gap-3 lg:flex">
                <Link
                    href="/inquiry"
                    class="rounded-sm bg-accent-green px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-accent-green-dark"
                >
                    Inquire Now
                </Link>
            </div>

            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-sm border lg:hidden"
                :class="
                    scrolled
                        ? 'border-line text-ink'
                        : 'border-white/30 text-white'
                "
                aria-label="Toggle menu"
                @click="mobileOpen = !mobileOpen"
            >
                <svg v-if="!mobileOpen" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div v-if="mobileOpen" class="border-t border-line bg-white lg:hidden">
            <div class="mx-auto flex max-w-6xl flex-col px-5 py-4">
                <Link href="/" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Home</Link>
                <Link href="/about" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">About</Link>
                <Link href="/vision-mission" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">
                    Vision & Mission
                </Link>
                <Link href="/services" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Services</Link>
                <Link
                    v-for="service in services"
                    :key="service.id"
                    :href="`/services/${service.slug}`"
                    class="py-2 pl-4 text-sm text-ink-muted"
                    @click="closeMobile"
                >
                    {{ service.title }}
                </Link>
                <Link href="/projects" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Projects</Link>
                <Link href="/team" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Our Team</Link>
                <Link href="/testimonials" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">
                    Testimonials
                </Link>
                <Link href="/careers" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Careers</Link>
                <Link href="/news" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">News & Blogs</Link>
                <Link href="/gallery" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Gallery</Link>
                <Link href="/documents" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Documents</Link>
                <Link href="/contact" class="py-2.5 text-sm font-medium text-ink" @click="closeMobile">Contact</Link>
                <Link
                    href="/inquiry"
                    class="mt-3 rounded-sm bg-brand-500 px-4 py-3 text-center text-sm font-semibold text-white"
                    @click="closeMobile"
                >
                    Inquire Now
                </Link>
            </div>
        </div>
    </header>
</template>
