<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $featuredServices = Service::query()
            ->published()
            ->featured()
            ->ordered()
            ->get();

        if ($featuredServices->isEmpty()) {
            $featuredServices = Service::query()
                ->published()
                ->ordered()
                ->get();
        }

        return Inertia::render('Home', [
            'settings' => SiteSetting::query()->first(),
            'featuredServices' => $featuredServices,
            'featuredProjects' => Project::query()
                ->published()
                ->featured()
                ->ordered()
                ->limit(6)
                ->get(),
            'testimonials' => Testimonial::query()
                ->published()
                ->ordered()
                ->limit(6)
                ->get(),
            'latestPosts' => Post::query()
                ->published()
                ->ordered()
                ->limit(3)
                ->get(),
        ]);
    }
}
