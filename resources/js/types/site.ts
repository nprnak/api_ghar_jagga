export type SiteSettings = {
    id: number;
    company_name: string;
    company_name_np: string | null;
    tagline: string | null;
    tagline_np: string | null;
    about_short: string | null;
    about_full: string | null;
    phone: string | null;
    email: string | null;
    address: string | null;
    address_np: string | null;
    working_hours: string | null;
    facebook_url: string | null;
    instagram_url: string | null;
    linkedin_url: string | null;
    youtube_url: string | null;
    tiktok_url: string | null;
    google_map_embed: string | null;
    google_map_lat: string | null;
    google_map_lng: string | null;
    seo_title: string | null;
    seo_description: string | null;
    seo_keywords: string | null;
    logo_path: string | null;
    favicon_path: string | null;
    hero_image: string | null;
    hero_headline: string | null;
    hero_headline_np: string | null;
    hero_subheadline: string | null;
    hero_cta_text: string | null;
    hero_cta_link: string | null;
    vision: string | null;
    mission: string | null;
    objectives: string[] | null;
};

export type NavService = {
    id: number;
    title: string;
    slug: string;
};

export type Service = {
    id: number;
    title: string;
    slug: string;
    short_description: string;
    description: string;
    icon: string | null;
    image: string | null;
    features: string[] | null;
    sort_order: number;
    is_featured: boolean;
    is_published: boolean;
    seo_title: string | null;
    seo_description: string | null;
};

export type Project = {
    id: number;
    title: string;
    slug: string;
    description: string | null;
    location: string | null;
    client: string | null;
    category: string | null;
    status: string;
    featured_image: string | null;
    gallery: string[] | null;
    completed_at: string | null;
    sort_order: number;
    is_featured: boolean;
    is_published: boolean;
};

export type TeamMember = {
    id: number;
    name: string;
    position: string;
    bio: string | null;
    photo: string | null;
    email: string | null;
    phone: string | null;
    linkedin_url: string | null;
    sort_order: number;
    is_published: boolean;
};

export type Testimonial = {
    id: number;
    client_name: string;
    client_position: string | null;
    client_company: string | null;
    content: string;
    photo: string | null;
    rating: number;
    sort_order: number;
    is_published: boolean;
};

export type Career = {
    id: number;
    title: string;
    slug: string;
    department: string | null;
    location: string | null;
    employment_type: string;
    description: string;
    requirements: string[] | null;
    deadline: string | null;
    is_published: boolean;
};

export type Post = {
    id: number;
    title: string;
    slug: string;
    excerpt: string | null;
    content: string;
    featured_image: string | null;
    category: string;
    author_name: string | null;
    published_at: string | null;
    is_published: boolean;
    seo_title: string | null;
    seo_description: string | null;
};

export type GalleryItem = {
    id: number;
    title: string | null;
    image: string;
    category: string | null;
    caption: string | null;
    sort_order: number;
    is_published: boolean;
};

export type DocumentItem = {
    id: number;
    title: string;
    description: string | null;
    file_path: string;
    file_type: string | null;
    file_size: string | null;
    category: string | null;
    sort_order: number;
    is_published: boolean;
};

export type Paginated<T> = {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    links: Array<{
        url: string | null;
        label: string;
        active: boolean;
    }>;
};
