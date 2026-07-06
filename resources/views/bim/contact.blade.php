@extends('bim.layout')

@section('title', 'Request a BIM Quote — Suncon BIM')
@section('description', 'Get a quote for architectural BIM modeling, MEP coordination, scan to BIM, or CAD to BIM services from Suncon Engineers. Response within 24 hours.')

@section('content')

{{-- ── HEADER ───────────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-base);padding-top:140px;padding-bottom:80px;position:relative;overflow:hidden;">
  {{-- Left lime rail --}}
  <div class="absolute left-0 top-0 bottom-0 w-[3px]" style="background:#7EC8E8;"></div>
  {{-- Engineering grid --}}
  <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(126,200,232,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(126,200,232,0.02) 1px,transparent 1px);background-size:64px 64px;"></div>
  <div class="relative max-w-screen-xl mx-auto px-8 lg:px-16">
    <div class="flex items-center gap-4 mb-6">
      <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
      <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Get in touch</span>
    </div>
    <h1 class="sg font-bold leading-none" style="font-size:clamp(3rem,8vw,7rem);color:var(--bim-text);letter-spacing:-0.03em;">
      Request a<br><span style="color:#7EC8E8;">Quote</span>
    </h1>
    <p class="dm mt-8 text-base leading-relaxed max-w-lg" style="color:var(--bim-muted);font-weight:300;">
      Send us your project brief. We'll review and respond with a scope, timeline, and fee estimate within 24 working hours.
    </p>
  </div>
</section>

{{-- ── FORM + INFO ─────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-surface);padding:80px 0;border-top:1px solid var(--bim-border-sm);">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-16">

      {{-- Form --}}
      <div>
        @if(session('success'))
          <div class="mb-8 px-6 py-4 text-sm" style="border-left:3px solid #7EC8E8;background:rgba(126,200,232,0.06);color:var(--bim-muted);">
            {{ session('success') }}
          </div>
        @endif

        <form method="POST" action="{{ route('bim.contact.submit') }}" class="flex flex-col gap-7">
          @csrf

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
            <div>
              <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Full Name *</label>
              <input type="text" name="name" value="{{ old('name') }}" required
                     class="w-full px-0 py-3 dm text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);"
                     onfocus="this.style.borderBottomColor='#7EC8E8'"
                     onblur="this.style.borderBottomColor='var(--bim-border-lg)'">
              @error('name')<p class="mt-1.5 text-xs" style="color:#7EC8E8;">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Email Address *</label>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full px-0 py-3 dm text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);"
                     onfocus="this.style.borderBottomColor='#7EC8E8'"
                     onblur="this.style.borderBottomColor='var(--bim-border-lg)'">
              @error('email')<p class="mt-1.5 text-xs" style="color:#7EC8E8;">{{ $message }}</p>@enderror
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
            <div>
              <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Phone Number</label>
              <input type="tel" name="phone" value="{{ old('phone') }}"
                     class="w-full px-0 py-3 dm text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);"
                     onfocus="this.style.borderBottomColor='#7EC8E8'"
                     onblur="this.style.borderBottomColor='var(--bim-border-lg)'">
            </div>
            <div>
              <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Company / Organisation</label>
              <input type="text" name="company" value="{{ old('company') }}"
                     class="w-full px-0 py-3 dm text-sm bg-transparent outline-none"
                     style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);"
                     onfocus="this.style.borderBottomColor='#7EC8E8'"
                     onblur="this.style.borderBottomColor='var(--bim-border-lg)'">
            </div>
          </div>

          <div>
            <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Service Required</label>
            <select name="service"
                    class="w-full px-0 py-3 dm text-sm bg-transparent outline-none appearance-none cursor-pointer"
                    style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);background:transparent;"
                    onfocus="this.style.borderBottomColor='#7EC8E8'"
                    onblur="this.style.borderBottomColor='var(--bim-border-lg)'">
              <option value="" style="background:var(--bim-surface);">Select a service…</option>
              @foreach([
                'Architectural BIM Modeling',
                'Structural BIM',
                'MEP BIM Coordination',
                'Scan to BIM',
                'CAD to BIM Migration',
                'Construction Documentation',
                'Multiple / Not sure',
              ] as $opt)
                <option value="{{ $opt }}" {{ old('service') == $opt ? 'selected' : '' }} style="background:var(--bim-surface);">{{ $opt }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block dm text-[9px] uppercase tracking-[0.28em] mb-3" style="color:var(--bim-muted);">Project Description *</label>
            <textarea name="message" rows="5" required
                      placeholder="Building type, area, target LOD, available input files, timeline…"
                      class="w-full px-0 py-3 dm text-sm bg-transparent outline-none resize-none"
                      style="border-bottom:1px solid var(--bim-border-lg);color:var(--bim-text);"
                      onfocus="this.style.borderBottomColor='#7EC8E8'"
                      onblur="this.style.borderBottomColor='var(--bim-border-lg)'">{{ old('message') }}</textarea>
            @error('message')<p class="mt-1.5 text-xs" style="color:#7EC8E8;">{{ $message }}</p>@enderror
          </div>

          <div class="pt-2">
            <button type="submit"
                    class="sg font-bold text-[10px] uppercase tracking-[0.2em] px-10 py-4 transition-opacity duration-200"
                    style="background:#7EC8E8;color:var(--bim-text);"
                    onmouseover="this.style.opacity='0.82'" onmouseout="this.style.opacity='1'">
              Send Enquiry
            </button>
          </div>
        </form>
      </div>

      {{-- Contact info sidebar --}}
      <div class="flex flex-col gap-10">

        <div>
          <p class="dm text-[9px] uppercase tracking-[0.28em] mb-4" style="color:#7EC8E8;">Response time</p>
          <p class="dm text-sm leading-relaxed" style="color:var(--bim-muted);">All BIM enquiries are responded to within <strong style="color:var(--bim-text);font-weight:500;">24 working hours.</strong> For urgent requirements, call us directly.</p>
        </div>

        <div style="border-top:1px solid var(--bim-border-sm);padding-top:36px;">
          <p class="dm text-[9px] uppercase tracking-[0.28em] mb-5" style="color:#7EC8E8;">Contact</p>
          <ul class="flex flex-col gap-5">
            <li>
              <p class="dm text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:var(--bim-muted);">Email</p>
              <a href="mailto:{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}" class="dm text-sm transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='#6B7280'">
                {{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}
              </a>
            </li>
            <li>
              <p class="dm text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:var(--bim-muted);">Phone</p>
              <a href="tel:+919371654387" class="dm text-sm transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='#6B7280'">
                {{ $globalSettings['site.phone'] ?? '+91 93716 54387' }}
              </a>
            </li>
            <li>
              <p class="dm text-[8px] uppercase tracking-[0.22em] mb-1.5" style="color:var(--bim-muted);">Office</p>
              <p class="dm text-sm leading-relaxed" style="color:var(--bim-muted);">P1/9, Sai Palace, Bhusari Colony<br>Paud Road, Kothrud<br>Pune 411038, Maharashtra</p>
            </li>
          </ul>
        </div>

        <div style="border-top:1px solid var(--bim-border-sm);padding-top:36px;">
          <p class="dm text-[9px] uppercase tracking-[0.28em] mb-5" style="color:#7EC8E8;">Helpful to include</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              'Building type and gross area',
              'Target LOD (100–500)',
              'Available input files (CAD, scan, PDF)',
              'Project deadline or phasing plan',
              'Client BIM standards or BEP (if any)',
            ] as $tip)
              <li class="flex items-start gap-3">
                <span class="w-1.5 h-1.5 rounded-full shrink-0 mt-2" style="background:#7EC8E8;"></span>
                <span class="dm text-sm" style="color:var(--bim-muted);">{{ $tip }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
