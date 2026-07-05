@extends('bim.layout')

@section('title', 'Request a BIM Quote — Suncon BIM')
@section('description', 'Get a quote for architectural BIM modeling, MEP coordination, scan to BIM, or CAD to BIM services from Suncon Engineers. Response within 24 hours.')

@section('content')

{{-- ── HEADER ───────────────────────────────────────────────────────────────── --}}
<section style="background:#0A0A0A;padding-top:140px;padding-bottom:80px;position:relative;overflow:hidden;" data-dark>
  {{-- Background image --}}
  <div class="absolute inset-0">
    <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=1600&q=80&auto=format&fit=crop"
         alt="" class="w-full h-full object-cover" loading="eager">
    <div class="absolute inset-0" style="background:linear-gradient(to right,rgba(10,10,10,0.95) 30%,rgba(10,10,10,0.65) 100%);"></div>
  </div>
  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex items-center gap-3 mb-6" data-reveal>
      <span class="w-6 h-px" style="background:#B5451B;"></span>
      <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Get in touch</span>
    </div>
    <h1 class="font-display font-light text-display-lg leading-none" style="color:#F2EFE9;" data-reveal>
      Request a<br><em style="color:#B5451B;">Quote</em>
    </h1>
    <p class="mt-8 text-base leading-relaxed max-w-lg" style="color:#6B6560;" data-reveal>
      Send us your project brief. We'll review and respond with a scope, timeline, and fee estimate within 24 working hours.
    </p>
  </div>
</section>

{{-- ── FORM + INFO ─────────────────────────────────────────────────────────── --}}
<section style="background:#111111;padding:80px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-16">

      {{-- Form --}}
      <div>
        @if(session('success'))
          <div class="mb-8 px-6 py-4 text-sm" style="border-left:3px solid #B5451B;background:rgba(181,69,27,0.06);color:#8C8680;" data-reveal>
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('bim.contact.submit') }}" class="flex flex-col gap-7" data-reveal>
          @csrf

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
            <div>
              <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Full Name *</label>
              <input type="text" name="name" value="{{ old('name') }}" required
                     class="w-full px-0 py-3 text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;"
                     onfocus="this.style.borderBottomColor='#B5451B'"
                     onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">
              @error('name')<p class="mt-1.5 text-xs" style="color:#B5451B;">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Email Address *</label>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full px-0 py-3 text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;"
                     onfocus="this.style.borderBottomColor='#B5451B'"
                     onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">
              @error('email')<p class="mt-1.5 text-xs" style="color:#B5451B;">{{ $message }}</p>@enderror
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
            <div>
              <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Phone Number</label>
              <input type="tel" name="phone" value="{{ old('phone') }}"
                     class="w-full px-0 py-3 text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;"
                     onfocus="this.style.borderBottomColor='#B5451B'"
                     onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">
            </div>
            <div>
              <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Company / Organisation</label>
              <input type="text" name="company" value="{{ old('company') }}"
                     class="w-full px-0 py-3 text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;"
                     onfocus="this.style.borderBottomColor='#B5451B'"
                     onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">
            </div>
          </div>

          <div>
            <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Service Required</label>
            <select name="service"
                    class="w-full px-0 py-3 text-sm bg-transparent outline-none appearance-none cursor-pointer"
                    style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;background:transparent;"
                    onfocus="this.style.borderBottomColor='#B5451B'"
                    onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">
              <option value="" style="background:#111111;">Select a service…</option>
              @foreach([
                'Architectural BIM Modeling',
                'Structural BIM',
                'MEP BIM Coordination',
                'Scan to BIM',
                'CAD to BIM Migration',
                'Construction Documentation',
                'Multiple / Not sure',
              ] as $opt)
                <option value="{{ $opt }}" {{ old('service') == $opt ? 'selected' : '' }} style="background:#111111;">{{ $opt }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block text-[9px] uppercase tracking-[0.28em] mb-3" style="color:#4E4A47;">Project Description *</label>
            <textarea name="message" rows="5" required
                      placeholder="Building type, area, target LOD, available input files, timeline…"
                      class="w-full px-0 py-3 text-sm bg-transparent outline-none resize-none"
                      style="border-bottom:1px solid rgba(255,255,255,0.1);color:#F2EFE9;"
                      onfocus="this.style.borderBottomColor='#B5451B'"
                      onblur="this.style.borderBottomColor='rgba(255,255,255,0.1)'">{{ old('message') }}</textarea>
            @error('message')<p class="mt-1.5 text-xs" style="color:#B5451B;">{{ $message }}</p>@enderror
          </div>

          <div class="pt-2">
            <button type="submit"
                    class="text-[10px] uppercase tracking-[0.22em] px-10 py-4 transition-colors duration-250"
                    style="background:#B5451B;color:#fff;"
                    onmouseover="this.style.background='#8B3414'"
                    onmouseout="this.style.background='#B5451B'">
              Send Enquiry
            </button>
          </div>
        </form>
      </div>

      {{-- Contact info sidebar --}}
      <div class="flex flex-col gap-10" data-reveal>

        <div>
          <p class="text-[9px] uppercase tracking-[0.28em] mb-4" style="color:#4E4A47;">Response time</p>
          <p class="text-sm leading-relaxed" style="color:#6B6560;">All BIM enquiries are responded to within <strong style="color:#F2EFE9;font-weight:400;">24 working hours.</strong> For urgent requirements, call us directly.</p>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.06);padding-top:36px;">
          <p class="text-[9px] uppercase tracking-[0.28em] mb-5" style="color:#4E4A47;">Contact</p>
          <ul class="flex flex-col gap-5">
            <li>
              <p class="text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:#4E4A47;">Email</p>
              <a href="mailto:{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}" class="text-sm transition-colors duration-200" style="color:#6B6560;" onmouseover="this.style.color='#F2EFE9'" onmouseout="this.style.color='#6B6560'">
                {{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}
              </a>
            </li>
            <li>
              <p class="text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:#4E4A47;">Phone</p>
              <a href="tel:+919371654387" class="text-sm transition-colors duration-200" style="color:#6B6560;" onmouseover="this.style.color='#F2EFE9'" onmouseout="this.style.color='#6B6560'">
                {{ $globalSettings['site.phone'] ?? '+91 93716 54387' }}
              </a>
            </li>
            <li>
              <p class="text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:#4E4A47;">Office</p>
              <p class="text-sm leading-relaxed" style="color:#6B6560;">P1/9, Sai Palace, Bhusari Colony<br>Paud Road, Kothrud<br>Pune 411038, Maharashtra</p>
            </li>
          </ul>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.06);padding-top:36px;">
          <p class="text-[9px] uppercase tracking-[0.28em] mb-5" style="color:#4E4A47;">Helpful to include</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              'Building type and gross area',
              'Target LOD (100–500)',
              'Available input files (CAD, scan, PDF)',
              'Project deadline or phasing plan',
              'Client BIM standards or BEP (if any)',
            ] as $tip)
              <li class="flex items-start gap-3">
                <span class="w-1 h-1 rounded-full shrink-0 mt-2" style="background:#B5451B;"></span>
                <span class="text-sm" style="color:#6B6560;">{{ $tip }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
