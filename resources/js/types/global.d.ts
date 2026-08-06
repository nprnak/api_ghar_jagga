import type { Auth } from './auth';
import type { NavService, SiteSettings } from './site';

declare module '@inertiajs/core' {
    interface InertiaConfig {
        sharedPageProps: {
            name: string;
            auth: Auth;
            siteSettings: SiteSettings | null;
            navigationServices: NavService[];
            flash: {
                success: string | null;
                error: string | null;
            };
        };
    }
}

declare module 'vue' {
    interface ComponentCustomProperties {
        $page: import('@inertiajs/core').Page;
    }
}
