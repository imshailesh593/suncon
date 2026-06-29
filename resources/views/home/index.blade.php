@extends('layouts.app')

@section('title', 'Suncon Engineers | Architecture, Landscape & Interior Design')
@section('description', 'A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.')

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="relative min-h-screen flex flex-col justify-end bg-[#FAF7F3] px-6 lg:px-12 pt-32 pb-16 overflow-hidden">

  {{-- Background decorative line --}}
  <div class="absolute top-0 right-[12%] w-px h-full bg-[#E8E0D4]/60 pointer-events-none"></div>

  <div class="relative z-10 max-w-screen-xl mx-auto w-full">

    {{-- Label --}}
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-10" data-reveal>Selected Work — 1999 to Present</p>

    {{-- Headline --}}
    <h1 class="font-display font-light leading-[0.9] tracking-tight mb-10" data-reveal>
      <span class="block text-display-xl text-[#1C1C1C] word-split">Architecture</span>
      <span class="block text-display-xl italic text-[#B5451B] word-split">&amp; Design.</span>
    </h1>

    {{-- Bottom row: subtitle + CTAs --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-10" data-reveal>
      <p class="max-w-md text-[#8B8275] text-sm leading-relaxed font-light">
        A multidisciplinary consultancy delivering architecture,<br class="hidden sm:block">
        landscape &amp; interior design across India since 1999.
      </p>
      <div class="flex items-center gap-6 shrink-0">
        <a href="{{ url('/projects') }}"
           class="text-[10px] uppercase tracking-[0.2em] bg-[#B5451B] text-white px-7 py-3.5 hover:bg-[#9a3a17] transition-colors duration-300">
          View Our Work →
        </a>
        <a href="{{ url('/services') }}"
           class="text-[10px] uppercase tracking-[0.2em] border border-[#1C1C1C]/30 px-7 py-3.5 hover:border-[#B5451B] hover:text-[#B5451B] transition-all duration-300">
          Our Services
        </a>
      </div>
    </div>
  </div>

  {{-- Scroll indicator --}}
  <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
    <div class="w-px h-12 bg-[#1C1C1C] origin-top animate-[scrollLine_1.6s_ease-in-out_infinite]"></div>
    <p class="text-[8px] uppercase tracking-[0.28em] text-[#8B8275]">Scroll</p>
  </div>
</section>

{{-- ─── RECENT PROJECTS ─────────────────────────────────────────────────── --}}
<section class="py-20 bg-[#FAF7F3]">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    {{-- Section header --}}
    <div class="flex items-end justify-between mb-12" data-reveal>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Recent Projects</h2>
      <a href="{{ url('/projects') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        View All Projects
      </a>
    </div>
  </div>

  {{-- Horizontal scroll track --}}
  <div id="projects-section" class="overflow-hidden">
    <div id="projects-track"
         class="flex gap-5 px-6 lg:px-12 pb-4 overflow-x-auto snap-x snap-mandatory md:overflow-visible"
         style="width: max-content">
      @forelse($projects as $i => $project)
        <a href="{{ url('/projects/'.$project->slug) }}"
           class="group shrink-0 w-[72vw] sm:w-[50vw] md:w-[30vw] lg:w-[26vw] snap-start">
          <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4] mb-4">
            @if($project->image)
              <img src="{{ asset($project->image) }}"
                   alt="{{ $project->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
          </div>
          <div class="border-t border-[#1C1C1C]/10 pt-4">
            <div class="flex items-center justify-between mb-3">
              <span class="text-[9px] uppercase tracking-[0.22em] text-[#8B8275]">
                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} — {{ $project->discipline ?? 'Architecture' }}
              </span>
              <span class="text-[9px] text-[#8B8275]">{{ $project->year ?? '' }}</span>
            </div>
            <h3 class="font-display font-light text-lg text-[#1C1C1C] leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
              {{ $project->title }}
            </h3>
          </div>
        </a>
      @empty
        @for($i = 1; $i <= 5; $i++)
          <div class="shrink-0 w-[72vw] sm:w-[50vw] md:w-[30vw] lg:w-[26vw]">
            <div class="aspect-[3/4] bg-[#E8E0D4] mb-4 animate-pulse"></div>
            <div class="border-t border-[#1C1C1C]/10 pt-4">
              <div class="flex items-center justify-between mb-3">
                <span class="text-[9px] uppercase tracking-[0.22em] text-[#8B8275]">0{{ $i }} — Architecture</span>
              </div>
              <div class="h-5 bg-[#E8E0D4] rounded w-3/4 animate-pulse"></div>
            </div>
          </div>
        @endfor
      @endforelse
    </div>
  </div>

  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 mt-8 md:hidden" data-reveal>
    <a href="{{ url('/projects') }}"
       class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5">
      View All Projects
    </a>
  </div>
</section>

{{-- ─── STATISTICS ──────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-24 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto">

    <h2 class="font-display font-light text-display-md text-[#FAF7F3] mb-16 leading-none max-w-lg" data-reveal>
      Shaping India's<br><em class="italic text-[#B5451B]">Built Environment</em>
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12">
      @php
        $stats = $statistics ?? [
          ['value'=>'25','suffix'=>'+','label'=>'Years of Practice'],
          ['value'=>'500','suffix'=>'+','label'=>'Projects Delivered'],
          ['value'=>'50','suffix'=>'+','label'=>'Expert Professionals'],
          ['value'=>'15','suffix'=>'+','label'=>'States Across India'],
          ['value'=>'100','suffix'=>'+','label'=>'Satisfied Clients'],
          ['value'=>'3','suffix'=>'M+','label'=>'Sq. Ft. Designed'],
        ];
      @endphp
      @foreach($stats as $stat)
        <div data-reveal>
          <div class="flex items-baseline gap-0.5 mb-2">
            <span class="font-display font-light text-display-lg text-[#FAF7F3] leading-none"
                  data-counter
                  data-target="{{ $stat['value'] }}">0</span>
            <span class="font-display font-light text-display-md text-[#B5451B] leading-none">{{ $stat['suffix'] }}</span>
          </div>
          <p class="text-[#8B8275] text-xs uppercase tracking-[0.18em]">{{ $stat['label'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── DISCIPLINES / SERVICES TEASER ─────────────────────────────────── --}}
<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">What We Do</p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Disciplines</h2>
      </div>
      <a href="{{ url('/services') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Services
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @php
        $serviceCards = $services ?? [
          ['title'=>'Architecture', 'tagline'=>'From concept to completion, buildings that endure.', 'image'=>null, 'slug'=>'architecture'],
          ['title'=>'Interior Design', 'tagline'=>'Spaces that breathe — functional, material, human.', 'image'=>null, 'slug'=>'interior-design'],
          ['title'=>'Landscape & Infrastructure', 'tagline'=>'Connecting people to place through thoughtful landscape.', 'image'=>null, 'slug'=>'landscape'],
        ];
      @endphp
      @foreach($serviceCards as $svc)
        <a href="{{ url('/services') }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5">
            @if(!empty($svc['image']))
              <img src="{{ asset($svc->image) }}"
                   alt="{{ $svc['title'] }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#d4c9b8]"></div>
            @endif
          </div>
          <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-2 group-hover:text-[#B5451B] transition-colors duration-300">
            {{ is_array($svc) ? $svc['title'] : $svc->title }}
          </h3>
          <p class="text-[#8B8275] text-sm leading-relaxed mb-4">
            {{ is_array($svc) ? $svc['tagline'] : $svc->tagline }}
          </p>
          <span class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Explore →</span>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── FEATURED PROJECT ────────────────────────────────────────────────── --}}
@if($featuredProject ?? null)
<section class="bg-[#F2EDE4] py-0 overflow-hidden">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2">

    {{-- Image --}}
    <div class="aspect-[4/3] md:aspect-auto md:min-h-[600px] overflow-hidden bg-[#E8E0D4]">
      @if($featuredProject->image)
        <img src="{{ asset($featuredProject->image) }}"
             alt="{{ $featuredProject->title }}"
             class="w-full h-full object-cover"
             loading="lazy">
      @else
        <div class="w-full h-full bg-[#E8E0D4]"></div>
      @endif
    </div>

    {{-- Content --}}
    <div class="flex flex-col justify-center px-10 lg:px-16 py-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">Featured Project</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-6">
        {{ $featuredProject->title }}
      </h2>
      @if($featuredProject->location)
        <p class="text-[#8B8275] text-xs uppercase tracking-[0.18em] mb-4">{{ $featuredProject->location }}</p>
      @endif
      @if($featuredProject->description)
        <p class="text-[#8B8275] text-sm leading-relaxed mb-8 max-w-sm">
          {{ Str::limit($featuredProject->description, 200) }}
        </p>
      @endif
      <a href="{{ url('/projects/'.$featuredProject->slug) }}"
         class="inline-flex items-center gap-3 text-[10px] uppercase tracking-[0.2em] border border-[#1C1C1C]/30 text-[#1C1C1C] px-7 py-3.5 self-start hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
        View Project →
      </a>
    </div>
  </div>
</section>
@endif

{{-- ─── NEWS / JOURNAL TEASER ──────────────────────────────────────────── --}}
<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">From the Studio</p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Latest Insights</h2>
      </div>
      <a href="{{ url('/journal') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Articles
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      @forelse($articles ?? [] as $article)
        <a href="{{ url('/journal/'.$article->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5">
            @if($article->image)
              <img src="{{ asset($article->image) }}"
                   alt="{{ $article->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
          </div>
          @if($article->category)
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B] mb-2">{{ $article->category }}</p>
          @endif
          <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-2 leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $article->title }}
          </h3>
          <p class="text-[#8B8275] text-xs">
            {{ $article->published_at ? $article->published_at->format('d M Y') : '' }}
          </p>
          <p class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B] mt-4">Read More →</p>
        </a>
      @empty
        @for($i = 0; $i < 3; $i++)
          <div class="block" data-reveal>
            <div class="aspect-[4/3] bg-[#E8E0D4] mb-5 animate-pulse"></div>
            <div class="h-3 bg-[#E8E0D4] rounded w-1/3 mb-3 animate-pulse"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-full mb-2 animate-pulse"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-2/3 mb-3 animate-pulse"></div>
            <p class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B] mt-4">Read More →</p>
          </div>
        @endfor
      @endforelse
    </div>
  </div>
</section>

@endsection
