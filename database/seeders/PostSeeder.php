<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => '5 Things to Check Before Buying Land in Kathmandu Valley',
                'slug' => '5-things-to-check-before-buying-land-kathmandu-valley',
                'excerpt' => 'A practical checklist for buyers—from kitta matching and access roads to slope, utilities, and municipal constraints.',
                'content' => <<<'TXT'
Buying land in Kathmandu Valley can be rewarding, but due diligence is essential. Start by verifying ownership documents and matching kitta details with the physical site. Confirm road access, setbacks, and whether the plot falls under any restricted or road-expansion zones.

Next, assess topography and drainage—especially on hillside parcels in areas like Kirtipur or Budhanilkantha. Check nearby utilities, neighborhood development trends, and recent comparable sales. Finally, engage a professional survey and, when needed, a valuation so your purchase decision is based on facts rather than assumptions.

Api Ghar Jagga supports buyers with survey, valuation, and advisory services so land purchases begin on solid ground.
TXT,
                'featured_image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1200&q=80',
                'category' => 'blog',
                'author_name' => 'Sita Gurung',
                'published_at' => '2026-06-12 10:00:00',
                'is_published' => true,
                'seo_title' => 'Land Buying Checklist for Kathmandu Valley | Api Ghar Jagga',
                'seo_description' => 'Key checks before buying land in Kathmandu Valley: documents, access, slope, utilities, and professional survey tips.',
            ],
            [
                'title' => 'Api Ghar Jagga Completes GIS Inventory for Valley Portfolio',
                'slug' => 'api-ghar-jagga-completes-gis-inventory-valley-portfolio',
                'excerpt' => 'Our GIS team delivered a multi-parcel inventory to help an institutional client visualize holdings across Kathmandu and Lalitpur.',
                'content' => <<<'TXT'
Api Ghar Jagga recently completed a GIS mapping engagement for an institutional client managing land assets across Kathmandu Valley. The project consolidated parcel boundaries, land-use notes, and site context into a clear spatial inventory.

This type of mapping helps organizations prioritize development, track documentation status, and communicate portfolio decisions internally. We continue to expand GIS services alongside survey and valuation for clients who need both field accuracy and decision-ready maps.
TXT,
                'featured_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
                'category' => 'news',
                'author_name' => 'Anisha Magar',
                'published_at' => '2026-03-08 09:30:00',
                'is_published' => true,
                'seo_title' => 'GIS Inventory Project Completed | Api Ghar Jagga News',
                'seo_description' => 'Api Ghar Jagga completes a Kathmandu Valley GIS parcel inventory for institutional land portfolio planning.',
            ],
            [
                'title' => 'Why Construction Supervision Matters for Home Builders',
                'slug' => 'why-construction-supervision-matters-for-home-builders',
                'excerpt' => 'Independent site oversight protects quality and reduces costly surprises during residential construction.',
                'content' => <<<'TXT'
Many homeowners in Nepal invest life savings into a house, yet construction quality can vary widely without independent supervision. Regular inspections help catch material substitutions, poor workmanship, and schedule drift early—before they become expensive to fix.

A supervisor acts as your technical eyes on site: checking reinforcement, concrete practices, waterproofing details, and finishing standards. Combined with clear weekly reporting, supervision gives owners better control and peace of mind throughout the build.

If you are planning a home or small apartment project in Kathmandu Valley, Api Ghar Jagga offers practical construction supervision tailored to private owners and developers.
TXT,
                'featured_image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
                'category' => 'blog',
                'author_name' => 'Rajesh Adhikari',
                'published_at' => '2026-01-22 11:15:00',
                'is_published' => true,
                'seo_title' => 'Construction Supervision for Home Builders | Api Ghar Jagga',
                'seo_description' => 'Learn why independent construction supervision helps Kathmandu homeowners protect quality, schedule, and budget.',
            ],
        ];

        foreach ($posts as $post) {
            Post::query()->create($post);
        }
    }
}
