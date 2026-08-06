<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'title' => 'Company Profile',
                'description' => 'Overview of Api Ghar Jagga services, experience, and contact information.',
                'file_path' => 'documents/api-ghar-jagga-company-profile.pdf',
                'file_type' => 'application/pdf',
                'file_size' => '1.2 MB',
                'category' => 'Company',
                'sort_order' => 1,
            ],
            [
                'title' => 'Service Brochure',
                'description' => 'Summary brochure covering valuation, survey, engineering, supervision, real estate, and GIS mapping.',
                'file_path' => 'documents/api-ghar-jagga-service-brochure.pdf',
                'file_type' => 'application/pdf',
                'file_size' => '850 KB',
                'category' => 'Services',
                'sort_order' => 2,
            ],
            [
                'title' => 'Inquiry Form Template',
                'description' => 'Printable inquiry form for clients who prefer offline submission.',
                'file_path' => 'documents/inquiry-form-template.pdf',
                'file_type' => 'application/pdf',
                'file_size' => '120 KB',
                'category' => 'Forms',
                'sort_order' => 3,
            ],
        ];

        foreach ($documents as $document) {
            Document::query()->create($document);
        }
    }
}
