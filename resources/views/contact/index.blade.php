@extends('layouts.app')

@section('title', ($settings['contact.hero_title'] ?? 'Contact').' | '.($settings['site.name'] ?? 'Suncon Engineers'))
@section('description', ($settings['contact.hero_subtitle'] ?? 'Get in touch with Suncon Engineers. Start a project, ask a question, or visit our offices in Pune.'))

@section('content')

@if(session('success'))
  <div class="bg-[#B5451B] text-white px-6 lg:px-12 py-5 fixed top-[60px] left-0 right-0 z-40">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between">
      <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
  </div>
@endif

{{-- Split layout: Image left / Form right --}}
<div class="flex flex-col lg:flex-row" style="padding-top:60px">

  {{-- LEFT: Image with address overlay --}}
  <div class="relative lg:w-1/2 overflow-hidden bg-[#1C1C1C]" style="min-height:clamp(280px,60vw,100vh)">
    <img src="{{ asset('images/contact-bg.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover"
         alt="Suncon Engineers">
    <div class="absolute inset-0 bg-gradient-to-t from-[#1C1C1C] via-[#1C1C1C]/50 to-[#1C1C1C]/10 pointer-events-none"></div>

  </div>

  {{-- RIGHT: Contact form --}}
  <div class="lg:w-1/2 bg-[#FAF7F3] flex flex-col justify-center px-8 sm:px-14 lg:px-16 py-20">

    <p class="text-[9px] uppercase tracking-[0.3em] text-[#8B8275] mb-3">Start a Project</p>
    <h2 class="font-display font-light text-[clamp(1.8rem,3vw,2.6rem)] text-[#1C1C1C] leading-none mb-10">
      Tell us about<br>your vision.
    </h2>

    <form action="{{ route('contact.submit') }}" method="POST" class="flex flex-col gap-7">
      @csrf

      <div class="grid sm:grid-cols-2 gap-7">
        <div>
          <label for="name" class="block text-[9px] uppercase tracking-[0.25em] text-[#1C1C1C] font-medium mb-2.5">Full Name *</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Rahul Sharma"
                 class="w-full bg-transparent border-b-2 border-[#1C1C1C]/20 py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/60 focus:outline-none focus:border-[#B5451B] transition-colors duration-200">
          @error('name')<p class="text-[#B5451B] text-xs mt-1.5">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="email" class="block text-[9px] uppercase tracking-[0.25em] text-[#1C1C1C] font-medium mb-2.5">Email Address *</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="rahul@example.com"
                 class="w-full bg-transparent border-b-2 border-[#1C1C1C]/20 py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/60 focus:outline-none focus:border-[#B5451B] transition-colors duration-200">
          @error('email')<p class="text-[#B5451B] text-xs mt-1.5">{{ $message }}</p>@enderror
        </div>
      </div>

      <div class="grid sm:grid-cols-2 gap-7">
        <div>
          <label for="phone" class="block text-[9px] uppercase tracking-[0.25em] text-[#1C1C1C] font-medium mb-2.5">Phone Number</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210"
                 class="w-full bg-transparent border-b-2 border-[#1C1C1C]/20 py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/60 focus:outline-none focus:border-[#B5451B] transition-colors duration-200">
          @error('phone')<p class="text-[#B5451B] text-xs mt-1.5">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="project_type" class="block text-[9px] uppercase tracking-[0.25em] text-[#1C1C1C] font-medium mb-2.5">Project Type</label>
          <select id="project_type" name="project_type"
                  class="w-full bg-transparent border-b-2 border-[#1C1C1C]/20 py-3 text-sm text-[#1C1C1C] focus:outline-none focus:border-[#B5451B] transition-colors duration-200 appearance-none cursor-pointer">
            <option value="" class="bg-[#FAF7F3]">Select a service…</option>
            @foreach(['Architecture Design','Landscape Design','Interior Design','Urban Design','Architectural BIM','PMC','Other'] as $opt)
              <option value="{{ $opt }}" {{ old('project_type') === $opt ? 'selected' : '' }} class="bg-[#FAF7F3]">{{ $opt }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label for="message" class="block text-[9px] uppercase tracking-[0.25em] text-[#1C1C1C] font-medium mb-2.5">Message *</label>
        <textarea id="message" name="message" rows="5" required
                  placeholder="Tell us about your project — location, scale, timeline…"
                  class="w-full bg-transparent border-b-2 border-[#1C1C1C]/20 py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/60 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 resize-none">{{ old('message') }}</textarea>
        @error('message')<p class="text-[#B5451B] text-xs mt-1.5">{{ $message }}</p>@enderror
      </div>

      <div class="pt-2">
        <button type="submit"
                class="text-[10px] uppercase tracking-[0.22em] bg-[#B5451B] text-white px-10 py-4 hover:bg-[#9a3a17] transition-colors duration-300 w-full sm:w-auto">
          Send Message →
        </button>
      </div>
    </form>

  </div>
</div>

{{-- Map + Contact Details row --}}
<div class="flex flex-col lg:flex-row bg-[#1C1C1C]">

  {{-- Left: Map --}}
  <div class="lg:w-1/2" style="height:480px">
    @if(!empty($settings['contact.map_embed']))
      {!! strip_tags($settings['contact.map_embed'], '<iframe>') !!}
    @else
      <iframe
        src="https://maps.google.com/maps?q=Bhusari+Colony+Paud+Road+Kothrud+Pune+411038+Maharashtra&t=&z=15&ie=UTF8&iwloc=&output=embed"
        class="w-full h-full border-0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Suncon Engineers Office Location">
      </iframe>
    @endif
  </div>

  {{-- Right: Contact details --}}
  <div class="lg:w-1/2 flex flex-col justify-center px-10 lg:px-16 py-14">
    <p class="text-[9px] uppercase tracking-[0.3em] text-[#B5451B] mb-5">Get in Touch</p>
    <h2 class="font-display font-light text-[clamp(1.8rem,3vw,2.8rem)] text-white leading-none mb-10">
      Let's build<br><em class="italic text-[#B5451B]">something great.</em>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
      <div>
        <p class="text-[8px] uppercase tracking-[0.3em] text-white/40 mb-2">Head Office — Pune</p>
        <address class="not-italic text-sm text-white/80 leading-relaxed">
          {!! nl2br(e($settings['contact.address'] ?? "P1/9, Sai Palace, Near Lohia-Jain IT Park,\nBhusari Colony (Right Side),\nPaud Road, Kothrud,\nPune – 411038, Maharashtra, India.")) !!}
        </address>
      </div>

      @if(!empty($settings['contact.address2']))
      <div>
        <p class="text-[8px] uppercase tracking-[0.3em] text-white/40 mb-2">Branch — Coimbatore</p>
        <address class="not-italic text-sm text-white/80 leading-relaxed">
          {!! nl2br(e($settings['contact.address2'])) !!}
        </address>
      </div>
      @else
      <div>
        <p class="text-[8px] uppercase tracking-[0.3em] text-white/40 mb-2">Branch — Coimbatore</p>
        <address class="not-italic text-sm text-white/80 leading-relaxed">
          D.No.26, 3rd Street, 2nd Cross<br>Alamu Nagar, Sathy Road,<br>Coimbatore, Tamil Nadu 641 012.
        </address>
      </div>
      @endif

      <div>
        <p class="text-[8px] uppercase tracking-[0.3em] text-white/40 mb-2">Phone</p>
        <div class="flex flex-col gap-1">
          @foreach(array_filter([$settings['site.phone'] ?? '+91 93716 54387', $settings['site.phone2'] ?? '+91 74200 02915']) as $phone)
            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}"
               class="text-sm text-white/80 hover:text-[#B5451B] transition-colors duration-200">{{ $phone }}</a>
          @endforeach
        </div>
      </div>

      <div>
        <p class="text-[8px] uppercase tracking-[0.3em] text-white/40 mb-2">Email</p>
        <div class="flex flex-col gap-1">
          @foreach(array_filter([$settings['site.email'] ?? 'bd@sunconengineers.com', $settings['site.email_hr'] ?? 'hr@sunconengineers.com']) as $email)
            <a href="mailto:{{ $email }}"
               class="text-sm text-white/80 hover:text-[#B5451B] transition-colors duration-200 break-all">{{ $email }}</a>
          @endforeach
        </div>
      </div>
    </div>

    @if(!empty($settings['contact.office_hours']))
      <p class="mt-8 text-[8px] uppercase tracking-[0.25em] text-white/40">{{ $settings['contact.office_hours'] }}</p>
    @endif
  </div>

</div>

@endsection
