<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Document;
use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function about(): Response
    {
        return Inertia::render('About', [
            'settings' => SiteSetting::query()->first(),
            'team' => TeamMember::query()->published()->ordered()->limit(4)->get(),
        ]);
    }

    public function visionMission(): Response
    {
        return Inertia::render('VisionMission', [
            'settings' => SiteSetting::query()->first(),
        ]);
    }

    public function services(): Response
    {
        return Inertia::render('Services/Index', [
            'services' => Service::query()->published()->ordered()->get(),
        ]);
    }

    public function serviceShow(string $slug): Response
    {
        $service = Service::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Services/Show', [
            'service' => $service,
            'relatedServices' => Service::query()
                ->published()
                ->ordered()
                ->where('id', '!=', $service->id)
                ->limit(3)
                ->get(),
        ]);
    }

    public function projects(): Response
    {
        return Inertia::render('Projects/Index', [
            'projects' => Project::query()->published()->ordered()->get(),
        ]);
    }

    public function projectShow(string $slug): Response
    {
        $project = Project::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Projects/Show', [
            'project' => $project,
            'relatedProjects' => Project::query()
                ->published()
                ->ordered()
                ->where('id', '!=', $project->id)
                ->limit(3)
                ->get(),
        ]);
    }

    public function team(): Response
    {
        return Inertia::render('Team', [
            'team' => TeamMember::query()->published()->ordered()->get(),
        ]);
    }

    public function testimonials(): Response
    {
        return Inertia::render('Testimonials', [
            'testimonials' => Testimonial::query()->published()->ordered()->get(),
        ]);
    }

    public function careers(): Response
    {
        return Inertia::render('Careers/Index', [
            'careers' => Career::query()->published()->ordered()->get(),
        ]);
    }

    public function careerShow(string $slug): Response
    {
        $career = Career::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Careers/Show', [
            'career' => $career,
        ]);
    }

    public function posts(): Response
    {
        return Inertia::render('News/Index', [
            'posts' => Post::query()->published()->ordered()->paginate(9),
        ]);
    }

    public function postShow(string $slug): Response
    {
        $post = Post::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('News/Show', [
            'post' => $post,
            'recentPosts' => Post::query()
                ->published()
                ->ordered()
                ->where('id', '!=', $post->id)
                ->limit(3)
                ->get(),
        ]);
    }

    public function gallery(): Response
    {
        return Inertia::render('Gallery', [
            'items' => GalleryItem::query()->published()->ordered()->get(),
        ]);
    }

    public function contact(): Response
    {
        return Inertia::render('Contact', [
            'settings' => SiteSetting::query()->first(),
            'services' => Service::query()->published()->ordered()->get(['id', 'title', 'slug']),
        ]);
    }

    public function inquiry(): Response
    {
        return Inertia::render('Inquiry', [
            'services' => Service::query()->published()->ordered()->get(['id', 'title', 'slug']),
        ]);
    }

    public function documents(): Response
    {
        return Inertia::render('Documents', [
            'documents' => Document::query()->published()->ordered()->get(),
        ]);
    }
}
