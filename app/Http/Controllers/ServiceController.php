<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return Inertia::render('Services/Index', compact('services'));
    }

    public function show(Service $service)
    {
        return Inertia::render('Services/Show', compact('service'));
    }
}
