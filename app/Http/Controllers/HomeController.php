<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\GalleryImage;
use App\Models\Setting;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        $projects = Project::orderBy('created_at','desc')->take(6)->get();
        $team = TeamMember::orderBy('order')->get();
        $testimonials = Testimonial::orderBy('order')->get();
        $posts = Post::orderBy('published_at','desc')->take(3)->get();
        $gallery = GalleryImage::orderBy('order')->take(8)->get();
        $settings = Setting::all()->pluck('value','key');

        return Inertia::render('Home', [
            'services' => $services,
            'projects' => $projects,
            'team' => $team,
            'testimonials' => $testimonials,
            'posts' => $posts,
            'gallery' => $gallery,
            'settings' => $settings,
        ]);
    }

    public function about()
    {
        $settings = Setting::all()->pluck('value','key');
        return Inertia::render('About', [
            'settings' => $settings,
        ]);
    }
}
