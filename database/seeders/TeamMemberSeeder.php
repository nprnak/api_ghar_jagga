<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Rajesh Adhikari',
                'position' => 'Managing Director',
                'bio' => 'Rajesh leads Api Ghar Jagga with over 15 years of experience in Nepal’s real estate and property advisory sector. He focuses on client trust, trustworthy valuations, and long-term relationships with banks and developers.',
                'photo' => 'images/team/rajesh-adhikari.jpg',
                'email' => 'rajesh@apigharjagga.com.np',
                'phone' => '+977-9801234567',
                'linkedin_url' => 'https://linkedin.com/in/rajesh-adhikari',
                'sort_order' => 1,
            ],
            [
                'name' => 'Sita Gurung',
                'position' => 'Senior Property Valuer',
                'bio' => 'Sita specializes in residential and commercial valuation reports for financing institutions. She brings strong market knowledge of Kathmandu Valley neighborhoods and a meticulous approach to documentation.',
                'photo' => 'images/team/sita-gurung.jpg',
                'email' => 'sita@apigharjagga.com.np',
                'phone' => '+977-9801234568',
                'linkedin_url' => 'https://linkedin.com/in/sita-gurung',
                'sort_order' => 2,
            ],
            [
                'name' => 'Bikash Shrestha',
                'position' => 'Lead Survey Engineer',
                'bio' => 'Bikash manages land survey operations, from boundary demarcation to topographic mapping. He is experienced with cadastral processes and field coordination across the Bagmati Province.',
                'photo' => 'images/team/bikash-shrestha.jpg',
                'email' => 'bikash@apigharjagga.com.np',
                'phone' => '+977-9801234569',
                'linkedin_url' => 'https://linkedin.com/in/bikash-shrestha',
                'sort_order' => 3,
            ],
            [
                'name' => 'Anisha Magar',
                'position' => 'GIS & Planning Specialist',
                'bio' => 'Anisha develops GIS maps, spatial inventories, and planning layers that help clients understand land portfolios and project sites with clarity.',
                'photo' => 'images/team/anisha-magar.jpg',
                'email' => 'anisha@apigharjagga.com.np',
                'phone' => '+977-9801234570',
                'linkedin_url' => 'https://linkedin.com/in/anisha-magar',
                'sort_order' => 4,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::query()->create($member);
        }
    }
}
