<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Field Survey in Bhaktapur',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Land Survey',
                'caption' => 'Boundary demarcation work near Suryabinayak.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Commercial Site Visit, Baneshwor',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Property Valuation',
                'caption' => 'Valuation inspection of a multi-storey commercial building.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Apartment Supervision, Lalitpur',
                'image' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Construction Supervision',
                'caption' => 'Quality check during structural casting.',
                'sort_order' => 3,
            ],
            [
                'title' => 'GIS Mapping Workspace',
                'image' => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1200&q=80',
                'category' => 'GIS Mapping',
                'caption' => 'Preparing parcel layers for a Kathmandu Valley portfolio.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Team at New Baneshwor Office',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Company',
                'caption' => 'Api Ghar Jagga team at our Kathmandu office.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Hillside Plot Assessment, Kirtipur',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Engineering Consultancy',
                'caption' => 'Site feasibility walkthrough for a hillside residence.',
                'sort_order' => 6,
            ],
        ];

        foreach ($items as $item) {
            GalleryItem::query()->create($item);
        }
    }
}
