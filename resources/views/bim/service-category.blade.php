@extends('bim.layout')

@section('title', $data['name'].' — BIM Services | Suncon BIM')
@section('description', \Illuminate\Support\Str::limit(strip_tags($data['description']), 155))

@php
  // Rotate through the known-good image pool; offset per category so grids differ.
  $pool = [
    'photo-1503387762-592deb58ef4e', 'photo-1541888946425-d81bb19240f5',
    'photo-1497366811353-6870744d04b2', 'photo-1486325212027-8081e485255e',
    'photo-1497366216548-37526070297c', 'photo-1524758631624-e2822e304c36',
    'photo-1545324418-cc1a3fa10c00',
  ];
  $seed = crc32($slug) % count($pool);
  $img  = fn ($i) => 'https://images.unsplash.com/'.$pool[($i + $seed) % count($pool)].'?w=900&q=80&auto=format&fit=crop';
@endphp

@section('content')

{{-- ── HERO ─────────────────────────────────────────────────────────────────── --}}
<section class="pt-[92px] md:pt-[128px] pb-14 md:pb-20 relative overflow-hidden" style="background:var(--bim-base);">
  <div class="absolute left-0 top-0 bottom-0 w-[3px]" style="background:var(--bim-accent);"></div>
  <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(var(--bim-border-sm) 1px,transparent 1px),linear-gradient(90deg,var(--bim-border-sm) 1px,transparent 1px);background-size:64px 64px;"></div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-16">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 mb-8 dm text-[10px] uppercase tracking-[0.22em]" style="color:var(--bim-muted);">
      <a href="{{ route('bim.home') }}" class="hover:opacity-70 transition-opacity">Home</a>
      <span style="color:var(--bim-dim);">/</span>
      <a href="{{ route('bim.services') }}" class="hover:opacity-70 transition-opacity">Services</a>
      <span style="color:var(--bim-dim);">/</span>
      <span style="color:var(--bim-accent);">{{ $data['name'] }}</span>
    </nav>

    <div class="grid lg:grid-cols-[1.15fr_1fr] gap-10 lg:gap-16 items-center">
      {{-- Left: title block --}}
      <div>
        <div class="flex items-center justify-center w-14 h-14 mb-7 rounded-lg" style="background:var(--bim-adim);color:var(--bim-accent);">
          @include('bim.partials.service-icon', ['icon' => $data['icon'], 'class' => 'w-7 h-7'])
        </div>
        <h1 class="sg font-bold leading-[0.95]" style="font-size:clamp(2.4rem,6vw,4.6rem);color:var(--bim-text);letter-spacing:-0.03em;">{{ $data['name'] }}</h1>
        <p class="sg mt-5 text-lg md:text-xl font-medium" style="color:var(--bim-accent);">{{ $data['tagline'] }}</p>
        <p class="dm mt-6 text-[15px] leading-relaxed max-w-xl" style="color:var(--bim-muted);font-weight:300;">{{ $data['description'] }}</p>
      </div>

      {{-- Right: hero image --}}
      <div class="relative hidden lg:block">
        <div class="overflow-hidden rounded-lg aspect-[4/3]" style="border:1px solid var(--bim-border);">
          <img src="{{ $img(0) }}" alt="{{ $data['name'] }}" class="w-full h-full object-cover" loading="eager">
        </div>
        <div class="absolute -bottom-3 -left-3 w-20 h-20 -z-0" style="border-left:3px solid var(--bim-accent);border-bottom:3px solid var(--bim-accent);"></div>
      </div>
    </div>

    {{-- Value props --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-px mt-14 md:mt-20" style="background:var(--bim-border);">
      @foreach($data['value_props'] as $vp)
        <div class="flex flex-col gap-3 p-6" style="background:var(--bim-base);">
          <span style="color:var(--bim-accent);">@include('bim.partials.service-icon', ['icon' => $vp['icon'], 'class' => 'w-6 h-6'])</span>
          <p class="sg text-sm font-semibold" style="color:var(--bim-text);">{{ $vp['title'] }}</p>
          <p class="dm text-xs leading-relaxed" style="color:var(--bim-muted);">{{ $vp['text'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── SERVICES GRID ────────────────────────────────────────────────────────── --}}
<section class="px-6 lg:px-12 py-14 md:py-20 lg:py-[80px]" style="background:var(--bim-surface);">
  <div class="max-w-screen-xl mx-auto">
    <div class="text-center mb-12 md:mb-16">
      <h2 class="sg font-bold" style="font-size:clamp(1.6rem,3.5vw,2.5rem);color:var(--bim-text);">Our {{ $data['name'] }} Services</h2>
      <span class="inline-block w-16 h-[3px] mt-4" style="background:var(--bim-accent);"></span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-7">
      @foreach($data['services'] as $i => $svc)
        <a href="{{ route('bim.contact') }}?service={{ urlencode($data['name'].' — '.$svc['title']) }}"
           class="bim-cat-card group flex flex-col overflow-hidden rounded-lg transition-all duration-300"
           style="background:var(--bim-lift);border:1px solid var(--bim-border);">

          {{-- Image + icon badge --}}
          <div class="relative overflow-hidden aspect-[16/10]" style="background:var(--bim-dim);">
            <img src="{{ $img($i + 1) }}" alt="{{ $svc['title'] }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
            <div class="absolute inset-0 pointer-events-none" style="background:linear-gradient(180deg,transparent 55%,rgba(0,0,0,0.35));"></div>
            <div class="absolute top-3 left-3 flex items-center justify-center w-11 h-11 rounded-md shadow-sm" style="background:var(--bim-accent);color:#0B1220;">
              @include('bim.partials.service-icon', ['icon' => $svc['icon'], 'class' => 'w-6 h-6'])
            </div>
          </div>

          {{-- Body --}}
          <div class="flex flex-col flex-1 p-5">
            <div class="flex items-baseline gap-2 mb-1.5">
              <span class="dm text-[10px] font-medium" style="color:var(--bim-accent);">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
              <h3 class="sg font-semibold leading-snug bim-cat-title transition-colors duration-300" style="font-size:1.02rem;color:var(--bim-text);">{{ $svc['title'] }}</h3>
            </div>
            <p class="dm text-xs leading-relaxed mb-4" style="color:var(--bim-muted);">{{ $svc['text'] }}</p>

            <ul class="flex flex-col gap-2 mt-auto">
              @foreach($svc['points'] as $pt)
                <li class="flex items-start gap-2 dm text-[11.5px] leading-snug" style="color:var(--bim-muted);">
                  <svg viewBox="0 0 24 24" fill="none" stroke="var(--bim-accent)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 mt-[1px] shrink-0"><circle cx="12" cy="12" r="9" stroke-width="1.4"/><path d="M8.5 12.2l2.3 2.3 4.6-4.8"/></svg>
                  <span>{{ $pt }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- ── WHY CHOOSE ───────────────────────────────────────────────────────────── --}}
<section class="px-6 lg:px-12 py-14 md:py-20" style="background:var(--bim-base);">
  <div class="max-w-screen-xl mx-auto rounded-xl p-8 md:p-12" style="background:var(--bim-surface);border:1px solid var(--bim-border);">
    <div class="grid lg:grid-cols-[1fr_2.4fr] gap-10 lg:gap-14 items-center">
      <div>
        <h2 class="sg font-bold leading-tight" style="font-size:clamp(1.4rem,2.6vw,2rem);color:var(--bim-text);">Why Choose Our<br>{{ $data['why_label'] ?? 'BIM' }} Services?</h2>
        <span class="inline-block w-12 h-[3px] mt-4" style="background:var(--bim-accent);"></span>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-8">
        @foreach($data['why'] as $w)
          <div class="flex flex-col items-start gap-3">
            <span style="color:var(--bim-accent);">@include('bim.partials.service-icon', ['icon' => $w['icon'], 'class' => 'w-7 h-7'])</span>
            <p class="dm text-xs leading-snug" style="color:var(--bim-text);">{{ $w['text'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── EXPLORE OTHER CATEGORIES ─────────────────────────────────────────────── --}}
<section class="px-6 lg:px-12 pb-16 md:pb-24" style="background:var(--bim-base);">
  <div class="max-w-screen-xl mx-auto">
    <p class="dm text-[10px] uppercase tracking-[0.3em] mb-6" style="color:var(--bim-muted);">Explore more services</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
      @foreach($others as $o)
        <a href="{{ route('bim.services.category', $o['slug']) }}"
           class="bim-cat-card group flex items-center gap-4 p-5 rounded-lg transition-all duration-300"
           style="background:var(--bim-surface);border:1px solid var(--bim-border);">
          <span class="flex items-center justify-center w-11 h-11 rounded-md shrink-0" style="background:var(--bim-adim);color:var(--bim-accent);">
            @include('bim.partials.service-icon', ['icon' => $o['icon'], 'class' => 'w-6 h-6'])
          </span>
          <span class="sg text-sm font-semibold leading-snug bim-cat-title transition-colors duration-300" style="color:var(--bim-text);">{{ $o['name'] }}</span>
          <span class="ml-auto transition-transform duration-300 group-hover:translate-x-1" style="color:var(--bim-accent);">→</span>
        </a>
      @endforeach
    </div>
  </div>
</section>

<style>
  .bim-cat-card:hover              { border-color: var(--bim-accent) !important; transform: translateY(-3px); }
  .bim-cat-card:hover .bim-cat-title { color: var(--bim-accent) !important; }
</style>

@endsection
