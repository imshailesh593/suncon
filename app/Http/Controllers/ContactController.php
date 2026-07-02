<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $settings = array_merge(
            Setting::getGroup('contact.'),
            Setting::getGroup('site.'),
        );

        return view('contact.index', compact('settings'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'project_type' => ['nullable', 'string', 'max:100'],
            'message'      => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        ContactSubmission::create($validated);

        try {
            Mail::raw(
                implode("\n", [
                    "New project enquiry from {$validated['name']}",
                    "",
                    "Name:         {$validated['name']}",
                    "Email:        {$validated['email']}",
                    "Phone:        " . ($validated['phone'] ?? '—'),
                    "Project type: " . ($validated['project_type'] ?? '—'),
                    "",
                    "Message:",
                    $validated['message'],
                ]),
                function ($mail) use ($validated) {
                    $mail->to(Setting::get('site.email', 'bd@sunconengineers.com'))
                         ->replyTo($validated['email'], $validated['name'])
                         ->subject("Project Enquiry — {$validated['name']}");
                }
            );
        } catch (\Exception $e) {
            logger()->error('Contact mail failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('contact.index')
            ->with('success', 'Thank you, ' . $validated['name'] . '. We\'ve received your message and will be in touch shortly.');
    }
}
