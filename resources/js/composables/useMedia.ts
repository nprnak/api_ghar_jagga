const FALLBACKS: Record<string, string> = {
    hero: 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80',
    service: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
    project: 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80',
    team: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80',
    news: 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
    gallery: 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1200&q=80',
};

/** Old seeder paths that were never uploaded as real files. */
const MISSING_SEED_PATH =
    /^images\/(hero\.jpg|projects\/|services\/|news\/|gallery\/|team\/)/i;

/** Filament FileUpload directories on the public disk. */
const STORAGE_DIRS =
    /^(services|projects|team|testimonials|careers|posts|gallery|documents|settings|site)\//i;

export function mediaUrl(
    path: string | null | undefined,
    fallback: keyof typeof FALLBACKS = 'hero',
): string {
    if (!path) {
        return FALLBACKS[fallback];
    }

    if (path.startsWith('http://') || path.startsWith('https://')) {
        return path;
    }

    const normalizedPath = path.trim().replace(/^\/+/, '');

    if (path.startsWith('/storage/') || path.startsWith('/images/')) {
        return path;
    }

    if (MISSING_SEED_PATH.test(normalizedPath)) {
        return FALLBACKS[fallback];
    }

    if (STORAGE_DIRS.test(normalizedPath) || normalizedPath.startsWith('storage/')) {
        const normalized = normalizedPath.replace(/^storage\//, '');
        return /storage/${normalized};
    }

    return path.startsWith('/') ? path : /${normalizedPath};
}

export function onImageError(event: Event, fallback: keyof typeof FALLBACKS = 'hero'): void {
    const target = event.target as HTMLImageElement | null;
    if (target && target.src !== FALLBACKS[fallback]) {
        target.src = FALLBACKS[fallback];
    }
}