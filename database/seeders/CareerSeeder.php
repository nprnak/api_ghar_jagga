<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Junior Land Surveyor',
                'slug' => 'junior-land-surveyor',
                'department' => 'Survey',
                'location' => 'Kathmandu, Nepal',
                'employment_type' => 'full-time',
                'description' => <<<'TXT'
We are hiring a Junior Land Surveyor to support field surveys, demarcation, and documentation across Kathmandu Valley projects.

You will work with senior survey engineers on boundary and topographic assignments, prepare field notes, and assist with map outputs for clients and municipal submissions.
TXT,
                'requirements' => [
                    'Diploma or bachelor’s degree in Geomatics, Survey Engineering, or related field',
                    'Familiarity with total station / GPS field workflows',
                    'Willingness to work on active construction and land sites',
                    'Basic AutoCAD or mapping software knowledge preferred',
                    'Valid motorcycle license is an advantage',
                ],
                'deadline' => '2026-09-30',
                'is_published' => true,
            ],
            [
                'title' => 'Property Valuation Associate',
                'slug' => 'property-valuation-associate',
                'department' => 'Valuation',
                'location' => 'Kathmandu, Nepal',
                'employment_type' => 'full-time',
                'description' => <<<'TXT'
Join our valuation team to support market research, site inspections, and report preparation for residential and commercial properties.

This role is ideal for someone who enjoys analyzing neighborhoods, reviewing documents, and producing clear client-facing valuation work under senior guidance.
TXT,
                'requirements' => [
                    'Bachelor’s degree in Civil Engineering, Architecture, Real Estate, or related field',
                    'Strong written Nepali and English communication',
                    'Interest in Kathmandu Valley property markets',
                    'Comfort with Excel and report formatting',
                    'Prior internship or valuation exposure preferred but not required',
                ],
                'deadline' => '2026-10-15',
                'is_published' => true,
            ],
        ];

        foreach ($careers as $career) {
            Career::query()->create($career);
        }
    }
}
