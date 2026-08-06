<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::query()->create([
            'company_name' => 'Api Ghar Jagga',
            'company_name_np' => 'अपि घर जग्गा',
            'tagline' => 'Reliable Realty Solution',
            'tagline_np' => 'विश्वासिलो घर–जग्गा समाधान',
            'about_short' => 'Api Ghar Jagga is a Kathmandu-based real estate and engineering consultancy delivering trusted valuation, survey, construction supervision, and GIS mapping services across Nepal.',
            'about_full' => <<<'TXT'
Api Ghar Jagga (अपि घर जग्गा) is a professional real estate and engineering services company based in Kathmandu, Nepal. We specialize in property valuation, land survey, engineering consultancy, construction supervision, real estate advisory, and GIS mapping.

With a multidisciplinary team of valuers, surveyors, engineers, and GIS specialists, we help individuals, banks, developers, and institutions make confident decisions about land and property. Our work is grounded in technical accuracy, regulatory compliance, and transparent client communication.

Whether you are buying a plot in Lalitpur, financing a commercial building in Kathmandu Valley, or planning infrastructure outside the valley, Api Ghar Jagga provides end-to-end support—from site assessment and documentation to project oversight and mapping.
TXT,
            'phone' => '01-5919981, 9851247262',
            'email' => 'gharjagga.karobar.api@gmail.com',
            'address' => 'Thapathali Height, Babarmahal, Pipal Chautra, Hasanpur, Dhangadhi',
            'address_np' => 'थापाथली हाइट, बबरमहल, पिपल चौतारा, हसनपुर, धनगढी',
            'facebook_url' => 'https://facebook.com/apigharjagga', // keep if unchanged
            'instagram_url' => 'https://instagram.com/apigharjagga', // keep if unchanged
            'linkedin_url' => 'https://linkedin.com/company/apigharjagga', // keep if unchanged
            'youtube_url' => 'https://youtube.com/@apigharjagga', // keep if unchanged
            'tiktok_url' => 'https://tiktok.com/@apigharjagga', // keep if unchanged
            'google_map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.5123456789!2d85.3420!3d27.6915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a917af4d6eb!2sNew%20Baneshwor%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1700000000000!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'google_map_lat' => 27.6915000,
            'google_map_lng' => 85.3420000,
            'seo_title' => 'Api Ghar Jagga | Reliable Realty Solution in Kathmandu',
            'seo_description' => 'Trusted property valuation, land survey, engineering consultancy, construction supervision, real estate services, and GIS mapping in Kathmandu, Nepal.',
            'seo_keywords' => 'property valuation Nepal, land survey Kathmandu, real estate Kathmandu, GIS mapping Nepal, Api Ghar Jagga',
            'logo_path' => 'images/logo.png',
            'favicon_path' => 'images/logo.png',
            'hero_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80',
            'hero_headline' => 'Reliable Realty Solution',
            'hero_headline_np' => 'विश्वासिलो घर–जग्गा समाधान',
            'hero_subheadline' => 'Valuation, survey, engineering, and GIS expertise for land and property decisions across Nepal.',
            'hero_cta_text' => 'Get a Free Consultation',
            'hero_cta_link' => '/inquiry',
            'vision' => 'To be Nepal’s most trusted partner for land, property, and built-environment solutions—known for accuracy, integrity, and practical expertise that strengthens communities and investments.',
            'mission' => 'To deliver reliable valuation, survey, engineering, construction supervision, real estate advisory, and GIS mapping services that help clients make informed decisions, reduce risk, and unlock the true value of their land and property assets.',
            'objectives' => [
                'Provide accurate, regulation-aligned property valuation for banks, owners, and institutions.',
                'Deliver precise land survey and cadastral documentation across Kathmandu Valley and beyond.',
                'Support clients with practical engineering consultancy for residential and commercial projects.',
                'Ensure quality construction supervision that protects timelines, budgets, and standards.',
                'Offer transparent real estate advisory for buying, selling, and development decisions.',
                'Apply modern GIS mapping to improve planning, analysis, and spatial decision-making.',
            ],
        ]);
    }
}
