<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BimController extends Controller
{
    public function home()
    {
        $projects = Project::where('status', 'published')
            ->where('discipline', 'bim')
            ->latest()
            ->take(4)
            ->get();

        $bimServices = Service::where('section', 'bim')
            ->orderBy('sort_order')
            ->get();

        $stats = Statistic::where('section', 'bim')
            ->orderBy('sort_order')
            ->get();

        return view('bim.home', compact('projects', 'bimServices', 'stats'));
    }

    public function services()
    {
        $bimServices = Service::where('section', 'bim')
            ->orderBy('sort_order')
            ->get();

        return view('bim.services', compact('bimServices'));
    }

    public function contact()
    {
        return view('bim.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'company' => ['nullable', 'string', 'max:120'],
            'service' => ['nullable', 'string', 'max:80'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        ContactSubmission::create([
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'] ?? null,
            'project_type' => trim(($validated['company'] ?? '') . ' — ' . ($validated['service'] ?? '')),
            'message'      => $validated['message'],
        ]);

        try {
            Mail::raw(
                implode("\n", [
                    "New BIM enquiry from {$validated['name']}",
                    "",
                    "Name:    {$validated['name']}",
                    "Email:   {$validated['email']}",
                    "Phone:   " . ($validated['phone'] ?? '—'),
                    "Company: " . ($validated['company'] ?? '—'),
                    "Service: " . ($validated['service'] ?? '—'),
                    "",
                    "Message:",
                    $validated['message'],
                ]),
                function ($mail) use ($validated) {
                    $mail->to(Setting::get('site.email', 'bd@sunconengineers.com'))
                         ->replyTo($validated['email'], $validated['name'])
                         ->subject("BIM Enquiry — {$validated['name']}");
                }
            );
        } catch (\Exception $e) {
            logger()->error('BIM contact mail failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('bim.contact')
            ->with('success', 'Thank you, ' . $validated['name'] . '. We\'ve received your BIM enquiry and will respond within 24 hours.');
    }
}
