<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function show()
    {
        return Inertia::render('Contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        Inquiry::create($data);

        return redirect()->route('contact.show')->with('success','Your inquiry was submitted.');
    }
}
