@extends('layouts.app')

@section('title', ($settings['site.seo_title'] ?? 'Suncon Engineers | Architecture, Landscape & Interior Design'))
@section('description', ($settings['site.seo_description'] ?? 'A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.'))

@push('schema')
@php $homeSchema = ['@context'=>'https://schema.org','@type'=>'WebPage','@id'=>url('/').'/#webpage','url'=>url('/'),'name'=>$settings['site.seo_title']??'Suncon Engineers','description'=>$settings['site.seo_description']??'','isPartOf'=>['@id'=>url('/').'/#website'],'about'=>['@id'=>url('/').'/#organization']]; @endphp
<script type="application/ld+json">{!! json_encode($homeSchema,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="relative h-screen min-h-[680px] max-h-[1060px] overflow-hidden flex flex-col justify-end" data-dark>

  <div id="hero-bg" class="absolute inset-0 scale-[1.12] will-change-transform">
    <img src="{{ asset('images/hero-bg.jpg') }}"
         alt="{{ $settings['site.name'] ?? 'Suncon Engineers' }}"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-[#1C1C1C]/65 via-[#1C1C1C]/30 to-[#1C1C1C]/78"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#1C1C1C]/30 to-transparent"></div>
  </div>

  <div class="relative z-10 max-w-screen-xl mx-auto w-full px-6 lg:px-12 pb-16 md:pb-20">
    <div class="w-10 h-px bg-[#B5451B] mb-8 origin-left" data-reveal></div>
    <p class="text-[10px] uppercase tracking-[0.3em] text-white/60 mb-8" data-reveal>
      Selected Work — {{ $settings['site.founded'] ?? '1999' }} to Present
    </p>
    <h1 class="font-display font-light leading-[0.9] tracking-tight mb-10" data-reveal>
      <span class="block text-display-xl text-white word-split">{{ $settings['homepage.hero_line1'] ?? 'Architecture' }}</span>
      <span class="block text-display-xl italic text-[#B5451B] word-split">{{ $settings['homepage.hero_line2'] ?? '& Design.' }}</span>
    </h1>
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-10" data-reveal>
      <p class="max-w-md text-white/60 text-sm leading-relaxed font-light">
        {{ $settings['homepage.hero_subtitle'] ?? 'A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.' }}
      </p>
      <div class="flex flex-wrap items-center gap-3 sm:gap-6">
        <a href="{{ url('/projects') }}"
           class="text-[10px] uppercase tracking-[0.2em] bg-[#B5451B] text-white px-7 py-3.5 hover:bg-[#9a3a17] transition-colors duration-300">
          {{ $settings['homepage.cta_primary'] ?? 'View Our Work' }} →
        </a>
        <a href="{{ url('/services') }}"
           class="text-[10px] uppercase tracking-[0.2em] border border-white/30 text-white px-7 py-3.5 hover:border-[#B5451B] hover:text-[#B5451B] transition-all duration-300">
          {{ $settings['homepage.cta_secondary'] ?? 'Our Services' }}
        </a>
      </div>
    </div>
  </div>

  {{-- Bottom info strip --}}
  <div class="absolute bottom-0 left-0 right-0 border-t border-white/[0.08] hidden md:grid grid-cols-3">
    <div class="border-r border-white/[0.08] px-6 lg:px-12 py-3.5 flex items-center gap-2.5">
      <span class="w-1 h-1 rounded-full bg-[#B5451B] shrink-0"></span>
      <span class="text-[8px] uppercase tracking-[0.28em] text-white/35">Pune, Maharashtra</span>
    </div>
    <div class="border-r border-white/[0.08] px-6 py-3.5 flex items-center gap-2.5">
      <span class="w-1 h-1 rounded-full bg-[#B5451B] shrink-0"></span>
      <span class="text-[8px] uppercase tracking-[0.28em] text-white/35">Est. {{ $settings['site.founded'] ?? '1999' }}</span>
    </div>
    <div class="px-6 py-3.5 flex items-center gap-2.5">
      <span class="w-1 h-1 rounded-full bg-[#B5451B] shrink-0"></span>
      <span class="text-[8px] uppercase tracking-[0.28em] text-white/35">500+ Projects Delivered</span>
    </div>
  </div>
</section>

{{-- ─── DISCIPLINE MARQUEE ──────────────────────────────────────────────── --}}
@php $mItems = ['Architecture Design', 'Landscape Design', 'Interior Design', 'Urban Design', 'Architectural BIM', 'PMC']; @endphp
<div class="bg-[#1C1C1C] overflow-hidden py-3" data-dark>
  <div id="discipline-marquee" class="flex items-center whitespace-nowrap">
    @foreach(array_merge($mItems, $mItems) as $item)
      <span class="text-[8px] uppercase tracking-[0.3em] text-white/25 px-7 shrink-0">{{ $item }}</span>
      <span class="text-[#B5451B]/35 shrink-0">·</span>
    @endforeach
  </div>
</div>

{{-- ─── RECENT PROJECTS ─────────────────────────────────────────────────── --}}
<section id="projects-section" class="bg-white overflow-hidden">

  <div class="px-6 lg:px-12 pt-14 md:pt-20 pb-12 flex items-end justify-between">
    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B] mb-4">
        {{ $settings['homepage.projects_eyebrow'] ?? 'Selected Work' }}
      </p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
        {{ $settings['homepage.projects_title'] ?? 'Recent Projects' }}
      </h2>
    </div>
    <div class="hidden md:flex items-center gap-4">
      <a href="{{ url('/projects') }}"
         class="flex items-center gap-3 text-[9px] uppercase tracking-[0.24em] text-[#1C1C1C]/40 hover:text-[#1C1C1C] transition-colors duration-300 group pb-1 mr-4">
        <span>View All</span>
        <span class="w-6 h-px bg-current group-hover:w-10 transition-all duration-300"></span>
      </a>
      <button id="projects-prev" aria-label="Previous"
              class="w-10 h-10 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
        ←
      </button>
      <button id="projects-next" aria-label="Next"
              class="w-10 h-10 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
        →
      </button>
    </div>
  </div>

  <div class="pb-20">
    <div id="projects-track"
         class="flex gap-4 pl-6 lg:pl-12"
         style="padding-right: 3rem; overflow-x: auto; scroll-snap-type: x mandatory;">

      @php
        $disciplineMap = ['architecture'=>'Architecture','interior'=>'Interior Design','landscape'=>'Landscape Design','urban'=>'Urban Design','bim'=>'Architectural BIM','pmc'=>'PMC'];
      @endphp

      @forelse($projects as $project)
        @php
          $cardW      = $loop->first ? 'w-[78vw] sm:w-[56vw] lg:w-[42vw]' : 'w-[68vw] sm:w-[44vw] lg:w-[30vw]';
          $discipline = $disciplineMap[$project->discipline] ?? ucfirst($project->discipline ?? 'Architecture');
          $index      = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
        @endphp
        <a href="{{ url('/projects/'.$project->slug) }}" class="group shrink-0 {{ $cardW }}" style="scroll-snap-align: start;">
          <div class="relative overflow-hidden w-full mb-5" style="height: clamp(220px, 34vw, 480px)">
            @if($project->imageUrl)
              <img src="{{ $project->imageUrl }}" alt="{{ $project->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
            <span class="absolute bottom-4 left-5 font-display font-light text-[3.5rem] leading-none text-white/[0.12] select-none pointer-events-none">{{ $index }}</span>
          </div>
          <div class="px-1">
            <div class="flex items-center justify-between mb-3">
              <span class="text-[9px] uppercase tracking-[0.22em] text-[#8B8275]">{{ $index }} — {{ $discipline }}</span>
              <span class="text-[9px] font-display italic text-[#8B8275]">{{ $project->year }}</span>
            </div>
            <div class="w-full h-px bg-[#1C1C1C]/15 mb-4 group-hover:bg-[#B5451B]/60 transition-colors duration-500"></div>
            <h3 class="font-display font-light text-[1.2rem] leading-snug text-[#1C1C1C] group-hover:text-[#B5451B] transition-colors duration-300 mb-2">
              {{ $project->title }}
            </h3>
            @if($project->location)
              <p class="text-[9px] uppercase tracking-[0.16em] text-[#8B8275]">{{ $project->location }}</p>
            @endif
          </div>
        </a>
      @empty
        @for($i = 1; $i <= 4; $i++)
          <div class="shrink-0 w-[68vw] sm:w-[44vw] lg:w-[30vw]">
            <div class="bg-[#E8E0D4] animate-pulse mb-5" style="height: clamp(220px, 34vw, 480px)"></div>
            <div class="h-3 bg-[#E8E0D4] rounded w-1/3 animate-pulse mb-3"></div>
            <div class="h-px bg-[#E8E0D4] mb-4"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-3/4 animate-pulse"></div>
          </div>
        @endfor
      @endforelse
    </div>
  </div>

  <div class="px-6 pb-8 flex items-center justify-between md:hidden">
    <a href="{{ url('/projects') }}" class="text-[9px] uppercase tracking-[0.24em] text-[#8B8275]">View All →</a>
    <div class="flex items-center gap-3">
      <button onclick="document.getElementById('projects-prev').click()"
              class="w-9 h-9 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] text-sm">←</button>
      <button onclick="document.getElementById('projects-next').click()"
              class="w-9 h-9 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] text-sm">→</button>
    </div>
  </div>
</section>

{{-- spacer --}}
<div aria-hidden="true" class="h-2 bg-[#E8E0D4]"></div>

{{-- ─── STATISTICS ──────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C]" data-dark>
  @php
    $stats = !empty($statistics) ? $statistics : [
      ['value'=>'25','suffix'=>'+','label'=>'Years of Practice'],
      ['value'=>'500','suffix'=>'+','label'=>'Projects Delivered'],
      ['value'=>'50','suffix'=>'+','label'=>'Expert Professionals'],
      ['value'=>'15','suffix'=>'+','label'=>'States Across India'],
      ['value'=>'100','suffix'=>'+','label'=>'Satisfied Clients'],
      ['value'=>'3','suffix'=>'M+','label'=>'Sq. Ft. Designed'],
    ];
  @endphp
  <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-3" id="stats-grid">
    @foreach($stats as $stat)
      <div class="px-5 sm:px-8 lg:px-14 py-10 md:py-16" data-reveal>
        <div class="flex items-baseline gap-1 mb-3">
          <span class="font-display font-light text-display-xl text-[#FAF7F3] leading-none stat-num" data-counter data-target="{{ $stat['value'] }}">0</span>
          <span class="font-display font-light text-display-md text-[#B5451B] leading-none stat-suf">{{ $stat['suffix'] }}</span>
        </div>
        <p class="text-[#5C5652] text-[9px] uppercase tracking-[0.22em]">{{ $stat['label'] }}</p>
      </div>
    @endforeach
  </div>
  <style>
    #stats-grid > div:nth-child(2n)   { border-left:  1px solid rgba(255,255,255,0.07); }
    #stats-grid > div:nth-child(n+3)  { border-top:   1px solid rgba(255,255,255,0.07); }
    @media (min-width: 768px) {
      #stats-grid > div                             { border: none; }
      #stats-grid > div:not(:nth-child(3n+1))       { border-left:  1px solid rgba(255,255,255,0.07); }
      #stats-grid > div:nth-child(n+4)              { border-top:   1px solid rgba(255,255,255,0.07); }
    }
    @media (max-width: 479px) {
      .stat-num { font-size: clamp(1.8rem, 9vw, 3rem) !important; letter-spacing: -0.02em; }
      .stat-suf { font-size: clamp(1.2rem, 5vw, 2rem) !important; }
    }
  </style>
</section>

{{-- spacer --}}
<div aria-hidden="true" class="h-2 bg-[#E8E0D4]"></div>

{{-- ─── SERVICES GRID ────────────────────────────────────────────────────── --}}
@php
  $fallbackServices = [
    ['title'=>'Architecture Design','tagline'=>'From concept to completion — buildings that endure.','slug'=>'architectural-design'],
    ['title'=>'Landscape Design','tagline'=>'Connecting people to place through thoughtful design.','slug'=>'landscape-design'],
    ['title'=>'Interior Design','tagline'=>'Spaces that breathe — functional, material, human.','slug'=>'interior-design'],
    ['title'=>'Urban Design','tagline'=>'Shaping cities, neighbourhoods, and public spaces.','slug'=>'urban-design'],
    ['title'=>'Architectural BIM','tagline'=>'Intelligent 3D models that cut cost and error.','slug'=>'architectural-bim'],
    ['title'=>'PMC','tagline'=>'From tender to handover — delivering on time.','slug'=>'pmc'],
  ];
  $svcList = $services->isNotEmpty() ? $services : collect($fallbackServices);
@endphp

<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-4">
          <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
          <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">{{ $settings['homepage.services_eyebrow'] ?? 'What We Do' }}</p>
        </div>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
          {{ $settings['homepage.services_title'] ?? 'Our Disciplines' }}
        </h2>
      </div>
      <a href="{{ url('/services') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Services
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      @foreach($svcList as $svc)
        @php
          $isArr   = is_array($svc);
          $title   = $isArr ? $svc['title']   : $svc->title;
          $tagline = $isArr ? $svc['tagline']  : ($svc->tagline ?? '');
          $slug    = $isArr ? $svc['slug']    : $svc->slug;
          $imgUrl  = $isArr ? null            : ($svc->imageUrl ?? null);
          $index   = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
        @endphp
        <a href="{{ route('services.show', $slug) }}" class="group block" data-reveal>

          {{-- Index --}}
          <p class="text-[9px] uppercase tracking-[0.28em] text-[#8B8275] mb-3">{{ $index }}</p>

          {{-- Tall portrait image --}}
          <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4] relative">
            @if($imgUrl)
              <img src="{{ $imgUrl }}" alt="{{ $title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
            {{-- Subtle terracotta tint on hover --}}
            <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-[0.07] transition-opacity duration-500"
                 style="background:#B5451B;"></div>
          </div>

          {{-- Animated sweep line --}}
          <div class="relative h-px bg-[#E8E0D4] mt-0 mb-5 overflow-hidden">
            <div class="absolute inset-y-0 left-0 bg-[#B5451B] transition-all duration-500 ease-out"
                 style="width:0;" data-sweep></div>
          </div>

          <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-2 leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $title }}
          </h3>
          @if($tagline)
            <p class="text-[#8B8275] text-xs leading-relaxed mb-4">{{ $tagline }}</p>
          @endif
          <p class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B] flex items-center gap-2">
            Explore
            <span class="inline-block transition-transform duration-300 group-hover:translate-x-1.5">→</span>
          </p>
        </a>
      @endforeach
    </div>

    <style>
      .group:hover [data-sweep] { width: 100% !important; }
    </style>

  </div>
</section>

{{-- spacer --}}
<div aria-hidden="true" class="h-2 bg-[#D4C9BB]"></div>

{{-- ─── FEATURED PROJECT ────────────────────────────────────────────────── --}}
@if($featuredProject ?? null)
<section class="bg-[#F2EDE4] py-0 overflow-hidden">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2">
    <div class="aspect-[4/3] md:aspect-auto md:min-h-[600px] overflow-hidden bg-[#E8E0D4]">
      @if($featuredProject->imageUrl)
        <img src="{{ $featuredProject->imageUrl }}" alt="{{ $featuredProject->title }}"
             class="w-full h-full object-cover" loading="lazy">
      @else
        <div class="w-full h-full bg-[#E8E0D4]"></div>
      @endif
    </div>
    <div class="flex flex-col justify-center px-6 sm:px-10 lg:px-16 py-12 sm:py-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">Featured Project</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-6">{{ $featuredProject->title }}</h2>
      @if($featuredProject->location)
        <p class="text-[#8B8275] text-xs uppercase tracking-[0.18em] mb-4">{{ $featuredProject->location }}</p>
      @endif
      @if($featuredProject->description)
        <p class="text-[#8B8275] text-sm leading-relaxed mb-8 max-w-sm">{{ Str::limit($featuredProject->description, 200) }}</p>
      @endif
      <a href="{{ url('/projects/'.$featuredProject->slug) }}"
         class="inline-flex items-center gap-3 text-[10px] uppercase tracking-[0.2em] border border-[#1C1C1C]/30 text-[#1C1C1C] px-7 py-3.5 self-start hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
        View Project →
      </a>
    </div>
  </div>
</section>
@endif

{{-- spacer --}}
<div aria-hidden="true" class="h-2 bg-[#E8E0D4]"></div>

{{-- ─── JOURNAL TEASER ──────────────────────────────────────────────────── --}}
<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-4">
          <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
          <p class="text-[10px] uppercase tracking-[0.3em] text-[#B5451B]">{{ $settings['homepage.journal_eyebrow'] ?? 'From the Studio' }}</p>
        </div>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
          {{ $settings['homepage.journal_title'] ?? 'Latest Insights' }}
        </h2>
      </div>
      <a href="{{ url('/journal') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Articles
      </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      @forelse($articles ?? [] as $article)
        <a href="{{ url('/journal/'.$article->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5 ">
            @if($article->imageUrl)
              <img src="{{ $article->imageUrl }}" alt="{{ $article->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
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
          <p class="text-[#8B8275] text-xs">{{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</p>
          <p class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B] mt-4">Read More →</p>
        </a>
      @empty
        @for($i = 0; $i < 3; $i++)
          <div class="block" data-reveal>
            <div class="aspect-[4/3] bg-[#E8E0D4] mb-5  animate-pulse"></div>
            <div class="h-3 bg-[#E8E0D4] rounded w-1/3 mb-3 animate-pulse"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-full mb-2 animate-pulse"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-2/3 mb-3 animate-pulse"></div>
          </div>
        @endfor
      @endforelse
    </div>
  </div>
</section>

@endsection
