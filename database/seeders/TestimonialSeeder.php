<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Prakash Karki',
                'client_position' => 'Branch Manager',
                'client_company' => 'Citizen Cooperative Bank',
                'content' => 'Api Ghar Jagga delivered a clear, bank-ready valuation for our client’s commercial property in Baneshwor. The report was detailed, timely, and easy for our credit committee to review.',
                'photo' => 'images/testimonials/prakash-karki.jpg',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Manju Tamang',
                'client_position' => 'Homeowner',
                'client_company' => null,
                'content' => 'We needed a proper land survey before building in Bhaktapur. The team was professional on site and explained every step. Our municipal drawings moved forward without boundary confusion.',
                'photo' => 'images/testimonials/manju-tamang.jpg',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Dipesh Maharjan',
                'client_position' => 'Project Director',
                'client_company' => 'Valley Homes Developers',
                'content' => 'Their construction supervision on our Lalitpur apartment project kept quality and progress visible every week. Communication was practical and reliable—exactly what a developer needs.',
                'photo' => 'images/testimonials/dipesh-maharjan.jpg',
                'rating' => 5,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->create($testimonial);
        }
    }
}
