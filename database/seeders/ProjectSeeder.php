<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Baneshwor Commercial Building Valuation',
                'slug' => 'baneshwor-commercial-building-valuation',
                'description' => 'Completed a detailed market valuation of a six-storey commercial building in New Baneshwor for bank financing, including floor-wise use analysis, rental comparables, and legal documentation review.',
                'location' => 'New Baneshwor, Kathmandu',
                'client' => 'Himalayan Trade Pvt. Ltd.',
                'category' => 'Property Valuation',
                'status' => 'completed',
                'featured_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=80',
                ],
                'completed_at' => '2025-11-18',
                'sort_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Bhaktapur Residential Land Survey',
                'slug' => 'bhaktapur-residential-land-survey',
                'description' => 'Boundary demarcation and topographic survey for a 12-aana residential plot near Suryabinayak, supporting municipal drawing submission and construction planning.',
                'location' => 'Suryabinayak, Bhaktapur',
                'client' => 'Private Landowner',
                'category' => 'Land Survey',
                'status' => 'completed',
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1464146072230-91cabc968266?auto=format&fit=crop&w=1200&q=80',
                ],
                'completed_at' => '2025-09-05',
                'sort_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'Lalitpur Apartment Construction Supervision',
                'slug' => 'lalitpur-apartment-construction-supervision',
                'description' => 'Provided construction supervision for a mid-rise apartment project in Balkumari, Lalitpur, with weekly quality reports, material checks, and contractor coordination through structural milestones.',
                'location' => 'Balkumari, Lalitpur',
                'client' => 'Valley Homes Developers',
                'category' => 'Construction Supervision',
                'status' => 'completed',
                'featured_image' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
                ],
                'completed_at' => '2026-02-20',
                'sort_order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'Kathmandu Valley Parcel GIS Inventory',
                'slug' => 'kathmandu-valley-parcel-gis-inventory',
                'description' => 'Developed a GIS parcel inventory and land-use overview for an institutional client managing multiple holdings across Kathmandu and Lalitpur, enabling clearer portfolio planning.',
                'location' => 'Kathmandu Valley',
                'client' => 'Valley Asset Management',
                'category' => 'GIS Mapping',
                'status' => 'completed',
                'featured_image' => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=1200&q=80',
                ],
                'completed_at' => '2026-01-12',
                'sort_order' => 4,
                'is_featured' => true,
            ],
            [
                'title' => 'Kirtipur Hillside Home Engineering Review',
                'slug' => 'kirtipur-hillside-home-engineering-review',
                'description' => 'Engineering consultancy for a hillside residence in Kirtipur, including site feasibility notes, retaining wall considerations, and design coordination with the project architect.',
                'location' => 'Kirtipur, Kathmandu',
                'client' => 'Private Homeowner',
                'category' => 'Engineering Consultancy',
                'status' => 'completed',
                'featured_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                'gallery' => null,
                'completed_at' => '2025-07-30',
                'sort_order' => 5,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->create($project);
        }
    }
}
