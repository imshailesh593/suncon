@extends('layouts.app')

@section('title', 'Contact | Suncon Engineers')
@section('description', 'Get in touch with Suncon Engineers. Start a project, ask a question, or visit our offices in Pune.')

@section('content')

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>Get in Touch</p>
    <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>Contact</h1>
  </div>
</section>

{{-- Flash message --}}
@if(session('success'))
  <div class="bg-[#B5451B] text-white px-6 lg:px-12 py-5">
    <div class="max-w-screen-xl mx-auto flex items-center gap-3">
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

      {{-- Head Office --}}
      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Head Office — Pune</p>
        <address class="not-italic text-sm text-[#1C1C1C] leading-relaxed font-light">
          P1/9, Sai Palace,<br>
          Near Lohia-Jain IT Park,<br>
          Bhusari Colony, Paud Road,<br>
          Kothrud, Pune — 411038
        </address>
      </div>

      {{-- Contacts --}}
      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Phone</p>
        <div class="flex flex-col gap-1">
          <a href="tel:+919371654387" class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light">+91 93716 54387</a>
          <a href="tel:+917420002915" class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light">+91 74200 02915</a>
        </div>
      </div>

      <div class="mb-10">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Email</p>
        <div class="flex flex-col gap-1">
          <a href="mailto:bd@sunconengineers.com" class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light break-all">bd@sunconengineers.com</a>
          <a href="mailto:hr@sunconengineers.com" class="text-sm text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 font-light break-all">hr@sunconengineers.com</a>
        </div>
      </div>

      {{-- Social links --}}
      <div>
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-4">Follow Us</p>
        <div class="flex flex-wrap gap-4">
          @foreach([
            ['Instagram','https://www.instagram.com/sunconengineers'],
            ['LinkedIn','https://www.linkedin.com/company/sunconengineers'],
            ['Facebook','https://www.facebook.com/sunconengineers'],
            ['YouTube','https://www.youtube.com/@SunconEngineers'],
          ] as $social)
            <a href="{{ $social[1] }}"
               target="_blank" rel="noopener noreferrer"
               class="text-[10px] uppercase tracking-[0.15em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200">
              {{ $social[0] }}
            </a>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Right: Contact form --}}
    <div data-reveal>
      <form action="{{ route('contact.submit') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        {{-- Name --}}
        <div>
          <label for="name" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Full Name *</label>
          <input type="text"
                 id="name"
                 name="name"
                 value="{{ old('name') }}"
                 required
                 placeholder="Rahul Sharma"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('name')
            <p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div>
          <label for="email" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Email Address *</label>
          <input type="email"
                 id="email"
                 name="email"
                 value="{{ old('email') }}"
                 required
                 placeholder="rahul@example.com"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('email')
            <p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Phone --}}
        <div>
          <label for="phone" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Phone Number</label>
          <input type="tel"
                 id="phone"
                 name="phone"
                 value="{{ old('phone') }}"
                 placeholder="+91 98765 43210"
                 class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light">
          @error('phone')
            <p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Project type --}}
        <div>
          <label for="project_type" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Project Type</label>
          <select id="project_type"
                  name="project_type"
                  class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light appearance-none cursor-pointer">
            <option value="" class="bg-[#FAF7F3]">Select a service…</option>
            <option value="Architecture" {{ old('project_type') === 'Architecture' ? 'selected' : '' }} class="bg-[#FAF7F3]">Architecture</option>
            <option value="Interior Design" {{ old('project_type') === 'Interior Design' ? 'selected' : '' }} class="bg-[#FAF7F3]">Interior Design</option>
            <option value="Landscape" {{ old('project_type') === 'Landscape' ? 'selected' : '' }} class="bg-[#FAF7F3]">Landscape</option>
            <option value="Infrastructure / PMC" {{ old('project_type') === 'Infrastructure / PMC' ? 'selected' : '' }} class="bg-[#FAF7F3]">Infrastructure / PMC</option>
            <option value="BIM Services" {{ old('project_type') === 'BIM Services' ? 'selected' : '' }} class="bg-[#FAF7F3]">BIM Services</option>
            <option value="Other" {{ old('project_type') === 'Other' ? 'selected' : '' }} class="bg-[#FAF7F3]">Other</option>
          </select>
        </div>

        {{-- Message --}}
        <div>
          <label for="message" class="block text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-2">Message *</label>
          <textarea id="message"
                    name="message"
                    rows="5"
                    required
                    placeholder="Tell us about your project — location, scale, timeline…"
                    class="w-full bg-transparent border-b border-[#E8E0D4] py-3 text-sm text-[#1C1C1C] placeholder-[#8B8275]/50 focus:outline-none focus:border-[#B5451B] transition-colors duration-200 font-light resize-none">{{ old('message') }}</textarea>
          @error('message')
            <p class="text-[#B5451B] text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Submit --}}
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

{{-- Map placeholder --}}
<section class="bg-[#E8E0D4] h-64 flex items-center justify-center overflow-hidden">
  <div class="text-center">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-2">Kothrud, Pune 411038</p>
    <a href="https://maps.google.com/?q=Bhusari+Colony+Paud+Road+Kothrud+Pune+411038"
       target="_blank" rel="noopener noreferrer"
       class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B] border-b border-[#B5451B] pb-0.5">
      Open in Maps →
    </a>
  </div>
</section>

@endsection
