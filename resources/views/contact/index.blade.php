@extends('layouts.app')

@section('title', ($settings['contact.hero_title'] ?? 'Contact').' | '.($settings['site.name'] ?? 'Suncon Engineers'))
@section('description', ($settings['contact.hero_subtitle'] ?? 'Get in touch with Suncon Engineers. Start a project, ask a question, or visit our offices in Pune.'))

@section('content')

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>Get in Touch</p>
    <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>
      {{ $settings['contact.hero_title'] ?? 'Contact' }}
    </h1>
  </div>
</section>

@if(session('success'))
  <div class="bg-[#B5451B] text-white px-6 lg:px-12 py-5">
    <div class="max-w-screen-xl mx-auto">
      <span class="text-sm">{{ session('success') }}</span>
    </div>
  </div>
@endif

{{-- Main Content --}}
<section class="bg-[#FAF7F3] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1fr_1.4fr] gap-20">

    {{-- Left: offices + info --}}
    <div data-reveal>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none mb-12">
        Let's build<br><em class="italic text-[#B5451B]">something great.</em>
      </h2>

      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Head Office — Pune</p>
        <address class="not-italic text-sm text-[#1C1C1C] leading-relaxed font-light">
          {!! nl2br(e($settings['contact.address'] ?? "P1/9, Sai Palace, Near Lohia-Jain IT Park, Bhusari Colony (Right Side), Paud Road, Kothrud, Pune – 411038, Maharashtra, India.")) !!}
        </address>
      </div>

      @if(!empty($settings['contact.address2']))
      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Branch Office — Coimbatore</p>
        <address class="not-italic text-sm text-[#1C1C1C] leading-relaxed font-light">
          {!! nl2br(e($settings['contact.address2'])) !!}
        </address>
      </div>
      @endif

      @if(!empty($settings['contact.office_hours']))
      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Office Hours</p>
        <p class="text-sm text-[#1C1C1C] font-light">{{ $settings['contact.office_hours'] }}</p>
      </div>
      @endif

      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Phone</p>
        <div class="flex flex-col gap-1">
          @foreach(array_filter([$settings['site.phone'] ?? '+91 93716 54387', $settings['site.phone2'] ?? '+91 74200 02915']) as $phone)
            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}"
               class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light">{{ $phone }}</a>
          @endforeach
        </div>
      </div>

      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Email</p>
        <div class="flex flex-col gap-1">
          @foreach(array_filter([$settings['site.email'] ?? 'bd@sunconengineers.com', $settings['site.email_hr'] ?? 'hr@sunconengineers.com']) as $email)
            <a href="mailto:{{ $email }}"
               class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light break-all">{{ $email }}</a>
          @endforeach
        </div>
      </div>

      @php
        $socials = array_filter([
          'Instagram' => $settings['site.social_instagram'] ?? '',
          'LinkedIn'  => $settings['site.social_linkedin']  ?? '',
          'Facebook'  => $settings['site.social_facebook']  ?? '',
          'YouTube'   => $settings['site.social_youtube']   ?? '',
          'Twitter'   => $settings['site.social_twitter']   ?? '',
          'Behance'   => $settings['site.social_behance']   ?? '',
        ]);
      @endphp
      @if(count($socials))
      <div>
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Follow Us</p>
        <div class="flex flex-wrap gap-4">
          @foreach($socials as $label => $url)
            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
               class="text-[10px] uppercase tracking-[0.15em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200">
              {{ $label }}
            </a>
          @endforeach
        </div>
      </div>
      @endif
    </div>

    {{-- Right: form --}}
    <div data-reveal>
      <form action="{{ route('contact.submit') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <div>
          <label for="name" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Full Name *</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Rahul Sharma"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('name')<p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="email" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Email Address *</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="rahul@example.com"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('email')<p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="phone" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Phone Number</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('phone')<p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="project_type" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Project Type</label>
          <select id="project_type" name="project_type"
                  class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light appearance-none cursor-pointer">
            <option value="" class="bg-[#FAF7F3]">Select a service…</option>
            @foreach(['Architecture Design','Landscape Design','Interior Design','Urban Design','Architectural BIM','PMC','Other'] as $opt)
              <option value="{{ $opt }}" {{ old('project_type') === $opt ? 'selected' : '' }} class="bg-[#FAF7F3]">{{ $opt }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="message" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Message *</label>
          <textarea id="message" name="message" rows="5" required
                    placeholder="Tell us about your project — location, scale, timeline…"
                    class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light resize-none">{{ old('message') }}</textarea>
          @error('message')<p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="pt-4">
          <button type="submit"
                  class="text-[10px] uppercase tracking-[0.22em] bg-[#B5451B] text-white px-10 py-4 hover:bg-[#9a3a17] transition-colors duration-300 w-full sm:w-auto">
            Send Message →
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

{{-- Map --}}
@if(!empty($settings['contact.map_embed']))
  <div class="h-80 bg-[#E8E0D4] overflow-hidden">
    {!! strip_tags($settings['contact.map_embed'], '<iframe>') !!}
  </div>
@else
  <section class="bg-[#E8E0D4] h-64 flex items-center justify-center overflow-hidden">
    <div class="text-center">
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-2">
        {{ $settings['site.name'] ?? 'Suncon Engineers' }} — Kothrud, Pune
      </p>
      <a href="https://maps.google.com/?q=Bhusari+Colony+Paud+Road+Kothrud+Pune+411038"
         target="_blank" rel="noopener noreferrer"
         class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B] border-b border-[#B5451B] pb-0.5">
        Open in Maps →
      </a>
    </div>
  </section>
@endif

@endsection
