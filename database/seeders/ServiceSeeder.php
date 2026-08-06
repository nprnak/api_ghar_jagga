<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Property Valuation',
                'slug' => 'property-valuation',
                'short_description' => 'Bankable market valuations for residential, commercial, and land assets across Nepal.',
                'description' => <<<'TXT'
Our certified valuation team prepares detailed property valuation reports suitable for bank financing, insurance, acquisition, and dispute resolution. We assess location, legal status, market comparables, physical condition, and development potential to determine fair market value.

We serve homeowners, developers, cooperatives, and financial institutions throughout Kathmandu Valley and major urban centers of Nepal.
TXT,
                'icon' => 'scale',
                'image' => 'images/services/property-valuation.jpg',
                'features' => [
                    'Residential and commercial valuation',
                    'Bank and mortgage valuation reports',
                    'Land and building assessment',
                    'Market comparable analysis',
                    'Insurance and litigation support',
                ],
                'sort_order' => 1,
                'is_featured' => true,
                'seo_title' => 'Property Valuation Services in Kathmandu | Api Ghar Jagga',
                'seo_description' => 'Professional property valuation for banks, buyers, and owners in Kathmandu and across Nepal.',
            ],
            [
                'title' => 'Engineering Consultancy',
                'slug' => 'engineering-consultancy',
                'short_description' => 'Practical civil and structural consultancy for homes, commercial buildings, and site development.',
                'description' => <<<'TXT'
Api Ghar Jagga provides engineering consultancy covering feasibility studies, design review, structural guidance, and site development planning. Our engineers collaborate with architects, contractors, and owners to ensure safe, efficient, and code-aware project outcomes.

From hillside plots in Kirtipur to dense urban sites in Baneshwor, we help translate technical requirements into buildable solutions.
TXT,
                'icon' => 'blueprint',
                'image' => 'images/services/engineering-consultancy.jpg',
                'features' => [
                    'Feasibility and site assessment',
                    'Design and drawing review',
                    'Structural guidance',
                    'Municipal compliance support',
                    'Cost and constructability advice',
                ],
                'sort_order' => 2,
                'is_featured' => true,
                'seo_title' => 'Engineering Consultancy Kathmandu | Api Ghar Jagga',
                'seo_description' => 'Civil and structural engineering consultancy for residential and commercial projects in Nepal.',
            ],
            [
                'title' => 'Land Survey',
                'slug' => 'land-survey',
                'short_description' => 'Accurate boundary, topographic, and cadastral surveys for clear land documentation.',
                'description' => <<<'TXT'
Our land survey services establish clear boundaries, elevations, and site conditions for ownership, development, and dispute prevention. Using modern survey equipment and local cadastral knowledge, we prepare reliable maps and reports that support registration, design, and construction.

We work with private owners, developers, and institutions across Kathmandu, Lalitpur, Bhaktapur, and surrounding districts.
TXT,
                'icon' => 'map',
                'image' => 'images/services/land-survey.jpg',
                'features' => [
                    'Boundary and cadastral survey',
                    'Topographic survey',
                    'Plot demarcation',
                    'Contour and level mapping',
                    'Survey documentation for authorities',
                ],
                'sort_order' => 3,
                'is_featured' => true,
                'seo_title' => 'Land Survey Services Nepal | Api Ghar Jagga',
                'seo_description' => 'Boundary, topographic, and cadastral land survey services in Kathmandu Valley and Nepal.',
            ],
            [
                'title' => 'Construction Supervision',
                'slug' => 'construction-supervision',
                'short_description' => 'On-site quality control and progress monitoring to keep builds on track.',
                'description' => <<<'TXT'
Construction supervision from Api Ghar Jagga helps owners protect quality, schedule, and budget. Our supervisors monitor materials, workmanship, safety practices, and contractor progress, then report clearly so you can make timely decisions.

Ideal for residential homes, apartment blocks, and small-to-mid commercial projects in Kathmandu Valley.
TXT,
                'icon' => 'hard-hat',
                'image' => 'images/services/construction-supervision.jpg',
                'features' => [
                    'Daily and weekly site inspection',
                    'Material and workmanship checks',
                    'Progress and quality reporting',
                    'Contractor coordination support',
                    'Handover readiness review',
                ],
                'sort_order' => 4,
                'is_featured' => true,
                'seo_title' => 'Construction Supervision Kathmandu | Api Ghar Jagga',
                'seo_description' => 'Professional construction supervision and quality control for building projects in Nepal.',
            ],
            [
                'title' => 'Real Estate Services',
                'slug' => 'real-estate-services',
                'short_description' => 'Advisory support for buying, selling, leasing, and developing property with confidence.',
                'description' => <<<'TXT'
We guide clients through Nepal’s real estate process with practical market insight and due diligence. From identifying suitable plots and verifying documentation to advising on pricing and development potential, Api Ghar Jagga helps you move with clarity.

Our advisory is tailored for first-time buyers, investors, and institutions seeking reliable local expertise.
TXT,
                'icon' => 'home',
                'image' => 'images/services/real-estate-services.jpg',
                'features' => [
                    'Buyer and seller advisory',
                    'Document due diligence support',
                    'Market pricing guidance',
                    'Plot and property sourcing',
                    'Development potential assessment',
                ],
                'sort_order' => 5,
                'is_featured' => true,
                'seo_title' => 'Real Estate Services Kathmandu | Api Ghar Jagga',
                'seo_description' => 'Trusted real estate advisory for buying, selling, and developing property in Kathmandu, Nepal.',
            ],
            [
                'title' => 'GIS Mapping',
                'slug' => 'gis-mapping',
                'short_description' => 'Spatial data, maps, and analysis for planning, inventory, and decision support.',
                'description' => <<<'TXT'
Our GIS mapping services turn location data into actionable insight. We create base maps, land-use layers, asset inventories, and analytical outputs that support planning, monitoring, and reporting for private and institutional clients.

Whether you need project site mapping in Kathmandu or multi-parcel analysis for a development portfolio, we deliver clear spatial products.
TXT,
                'icon' => 'layers',
                'image' => 'images/services/gis-mapping.jpg',
                'features' => [
                    'Base map and layer preparation',
                    'Land-use and parcel mapping',
                    'Asset and infrastructure inventory',
                    'Spatial analysis and reporting',
                    'Custom map outputs for planning',
                ],
                'sort_order' => 6,
                'is_featured' => true,
                'seo_title' => 'GIS Mapping Services Nepal | Api Ghar Jagga',
                'seo_description' => 'Professional GIS mapping and spatial analysis for land planning and project decision-making in Nepal.',
            ],
        ];

        foreach ($services as $service) {
            Service::query()->create($service);
        }
    }
}
