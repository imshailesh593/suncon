@extends('bim.layout')

@section('title', 'Request a BIM Quote — Suncon BIM')
@section('description', 'Get a quote for architectural BIM modeling, MEP coordination, scan to BIM, or CAD to BIM services from Suncon Engineers. Response within 24 hours.')

@section('content')

{{-- ── HEADER ───────────────────────────────────────────────────────────────── --}}
<section style="background:#060F1E;padding-top:140px;padding-bottom:64px;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex items-center gap-3 mb-6" data-reveal>
      <span class="w-6 h-px" style="background:#B5451B;"></span>
      <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">Get in Touch</span>
    </div>
    <h1 class="font-display font-light text-display-lg leading-none" style="color:#EEF3FF;" data-reveal>Request a Quote</h1>
  </div>
</section>

{{-- ── FORM + INFO ─────────────────────────────────────────────────────────── --}}
<section style="background:#0B1828;padding:80px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-16">

      {{-- Form --}}
      <div>
        @if(session('success'))
          <div class="mb-8 px-6 py-4 text-sm" style="background:rgba(42,110,212,0.12);border:1px solid rgba(42,110,212,0.3);color:#8BA3C4;" data-reveal>
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('bim.contact.submit') }}" class="flex flex-col gap-6" data-reveal>
          @csrf

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Full Name *</label>
              <input type="text" name="name" value="{{ old('name') }}" required
                     class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none"
                     style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;"
                     onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                     onblur="this.style.borderColor='rgba(42,110,212,0.25)'">
              @error('name') <p class="mt-1 text-xs" style="color:#B5451B;">{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Email Address *</label>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none"
                     style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;"
                     onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                     onblur="this.style.borderColor='rgba(42,110,212,0.25)'">
              @error('email') <p class="mt-1 text-xs" style="color:#B5451B;">{{ $message }}</p> @enderror
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Phone Number</label>
              <input type="tel" name="phone" value="{{ old('phone') }}"
                     class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none"
                     style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;"
                     onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                     onblur="this.style.borderColor='rgba(42,110,212,0.25)'">
            </div>

            <div>
              <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Company / Organisation</label>
              <input type="text" name="company" value="{{ old('company') }}"
                     class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none"
                     style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;"
                     onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                     onblur="this.style.borderColor='rgba(42,110,212,0.25)'">
            </div>
          </div>

          <div>
            <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Service Required</label>
            <select name="service"
                    class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none appearance-none cursor-pointer"
                    style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;background:#0B1828;"
                    onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                    onblur="this.style.borderColor='rgba(42,110,212,0.25)'">
              <option value="" style="background:#0B1828;">Select a service…</option>
              @foreach([
                'Architectural BIM Modeling',
                'Structural BIM',
                'MEP BIM Coordination',
                'Scan to BIM',
                'CAD to BIM Migration',
                'Construction Documentation',
                'Multiple / Not sure',
              ] as $opt)
                <option value="{{ $opt }}" {{ old('service') == $opt ? 'selected' : '' }} style="background:#0B1828;">{{ $opt }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block text-[9px] uppercase tracking-[0.25em] mb-2.5" style="color:#4A6A8A;">Project Description *</label>
            <textarea name="message" rows="6" required
                      placeholder="Describe your project: building type, approximate area, target LOD, file formats available, timeline…"
                      class="w-full px-4 py-3.5 text-sm bg-transparent transition-all duration-200 outline-none resize-none"
                      style="border:1px solid rgba(42,110,212,0.25);color:#EEF3FF;"
                      onfocus="this.style.borderColor='rgba(42,110,212,0.6)'"
                      onblur="this.style.borderColor='rgba(42,110,212,0.25)'">{{ old('message') }}</textarea>
            @error('message') <p class="mt-1 text-xs" style="color:#B5451B;">{{ $message }}</p> @enderror
          </div>

          <div>
            <button type="submit"
                    class="text-[11px] uppercase tracking-[0.22em] px-10 py-4 transition-colors duration-300"
                    style="background:#B5451B;color:#fff;"
                    onmouseover="this.style.background='#8B3414'"
                    onmouseout="this.style.background='#B5451B'">
              Send Enquiry
            </button>
          </div>
        </form>
      </div>

      {{-- Contact Info --}}
      <div class="flex flex-col gap-10" data-reveal>
        <div>
          <p class="text-[9px] uppercase tracking-[0.3em] mb-5" style="color:#4A6A8A;">Response Time</p>
          <p class="text-sm leading-relaxed" style="color:#8BA3C4;">We respond to all BIM enquiries within <strong style="color:#EEF3FF;">24 working hours</strong>. For urgent requirements, call us directly.</p>
        </div>

        <div style="border-top:1px solid rgba(42,110,212,0.18);padding-top:32px;">
          <p class="text-[9px] uppercase tracking-[0.3em] mb-5" style="color:#4A6A8A;">Contact</p>
          <ul class="flex flex-col gap-4">
            <li>
              <p class="text-[9px] uppercase tracking-[0.2em] mb-1" style="color:#4A6A8A;">Email</p>
              <a href="mailto:{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}" class="text-sm transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">
                {{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}
              </a>
            </li>
            <li>
              <p class="text-[9px] uppercase tracking-[0.2em] mb-1" style="color:#4A6A8A;">Phone</p>
              <a href="tel:+919371654387" class="text-sm transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">
                {{ $globalSettings['site.phone'] ?? '+91 93716 54387' }}
              </a>
            </li>
            <li>
              <p class="text-[9px] uppercase tracking-[0.2em] mb-1" style="color:#4A6A8A;">Office</p>
              <p class="text-sm leading-relaxed" style="color:#8BA3C4;">P1/9, Sai Palace, Bhusari Colony<br>Paud Road, Kothrud<br>Pune 411038, Maharashtra</p>
            </li>
          </ul>
        </div>

        <div style="border-top:1px solid rgba(42,110,212,0.18);padding-top:32px;">
          <p class="text-[9px] uppercase tracking-[0.3em] mb-5" style="color:#4A6A8A;">What to Include</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              'Building type and total area',
              'Target LOD (100–500)',
              'Available input files (CAD, point cloud, PDF)',
              'Project deadline / phasing',
              'Any BEP or client BIM standards',
            ] as $tip)
              <li class="flex items-start gap-3">
                <span class="w-1 h-1 rounded-full shrink-0 mt-2" style="background:#2A6ED4;"></span>
                <span class="text-sm" style="color:#8BA3C4;">{{ $tip }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
