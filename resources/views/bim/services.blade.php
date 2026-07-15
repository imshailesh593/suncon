@extends('bim.layout')

@section('title', 'BIM Services — Building, Infrastructure, Digital Engineering & Reality Capture | Suncon BIM')
@section('description', 'Explore Suncon BIM services: Building Information Modeling, Infrastructure BIM, Digital Engineering & BIM, and Reality Capture & Scan-to-BIM. Data-rich 3D models across India.')

@php
  $pool = [
    'photo-1503387762-592deb58ef4e', 'photo-1541888946425-d81bb19240f5',
    'photo-1486325212027-8081e485255e', 'photo-1524758631624-e2822e304c36',
  ];
@endphp

@section('content')

{{-- ── PAGE HEADER ──────────────────────────────────────────────────────────── --}}
<section class="pt-[100px] md:pt-[140px] pb-14 md:pb-20" style="background:var(--bim-base);position:relative;overflow:hidden;">
  <div class="absolute left-0 top-0 bottom-0 w-[3px]" style="background:var(--bim-accent);"></div>
  <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(var(--bim-border-sm) 1px,transparent 1px),linear-gradient(90deg,var(--bim-border-sm) 1px,transparent 1px);background-size:64px 64px;"></div>
  <div class="relative max-w-screen-xl mx-auto px-8 lg:px-16">
    <div class="flex items-center gap-4 mb-6">
      <span class="w-[3px] h-4 shrink-0" style="background:var(--bim-accent);"></span>
      <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">What we deliver</span>
    </div>
    <h1 class="sg font-bold leading-none" style="font-size:clamp(3rem,8vw,7rem);color:var(--bim-text);letter-spacing:-0.03em;">Our Services</h1>
    <p class="dm mt-8 text-lg leading-relaxed max-w-2xl" style="color:var(--bim-muted);font-weight:300;">
      A full-stack BIM practice backed by 25 years of engineering expertise — spanning buildings, infrastructure, digital delivery, and reality capture. Every engagement is delivered in-house by our Pune-based team with a project-specific BIM Execution Plan.
    </p>
  </div>
</section>

{{-- ── CATEGORY CARDS ───────────────────────────────────────────────────────── --}}
<section class="px-6 lg:px-12 py-14 md:py-20" style="background:var(--bim-surface);">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
    @foreach($categories as $slug => $cat)
      <a href="{{ route('bim.services.category', $slug) }}"
         class="bim-cat-card group relative flex flex-col overflow-hidden rounded-lg transition-all duration-300"
         style="background:var(--bim-lift);border:1px solid var(--bim-border);">

        <div class="relative overflow-hidden aspect-[16/7]" style="background:var(--bim-dim);">
          <img src="https://images.unsplash.com/{{ $pool[$loop->index % count($pool)] }}?w=1100&q=80&auto=format&fit=crop"
               alt="{{ $cat['name'] }}"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
          <div class="absolute inset-0" style="background:linear-gradient(180deg,rgba(11,18,32,0.15) 0%,rgba(11,18,32,0.72) 100%);"></div>
          <div class="absolute top-4 left-4 flex items-center justify-center w-12 h-12 rounded-md" style="background:var(--bim-accent);color:#0B1220;">
            @include('bim.partials.service-icon', ['icon' => $cat['icon'], 'class' => 'w-6 h-6'])
          </div>
          <div class="absolute bottom-4 left-4 right-4">
            <h2 class="sg font-bold leading-tight text-white" style="font-size:clamp(1.25rem,2.4vw,1.7rem);">{{ $cat['name'] }}</h2>
          </div>
        </div>

        <div class="flex flex-col flex-1 p-6">
          <p class="sg text-sm font-medium mb-2" style="color:var(--bim-accent);">{{ $cat['tagline'] }}</p>
          <p class="dm text-[13px] leading-relaxed mb-5" style="color:var(--bim-muted);">{{ \Illuminate\Support\Str::limit($cat['description'], 160) }}</p>

          <div class="flex flex-wrap gap-x-4 gap-y-1.5 mb-6">
            @foreach(array_slice($cat['services'], 0, 4) as $svc)
              <span class="dm text-[11px]" style="color:var(--bim-muted);">• {{ $svc['title'] }}</span>
            @endforeach
            @if(count($cat['services']) > 4)
              <span class="dm text-[11px]" style="color:var(--bim-accent);">+{{ count($cat['services']) - 4 }} more</span>
            @endif
          </div>

          <p class="dm text-[10px] uppercase tracking-[0.22em] mt-auto" style="color:var(--bim-accent);">
            View {{ count($cat['services']) }} services
            <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">→</span>
          </p>
        </div>
      </a>
    @endforeach
  </div>
</section>

<style>
  .bim-cat-card:hover { border-color: var(--bim-accent) !important; transform: translateY(-3px); }
</style>

@endsection
