@extends('layouts.app')

@section('title', ($settings['site.seo_title'] ?? 'Suncon Engineers | Architecture, Landscape & Interior Design'))
@section('description', ($settings['site.seo_description'] ?? 'A multidisciplinary consultancy delivering architecture, landscape & interior design across India since 1999.'))

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="relative h-screen min-h-[680px] max-h-[1060px] overflow-hidden flex flex-col justify-end">

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
      <div class="flex items-center gap-6 shrink-0">
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

  <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
    <div class="w-px h-12 bg-white origin-top animate-[scrollLine_1.6s_ease-in-out_infinite]"></div>
    <p class="text-[8px] uppercase tracking-[0.28em] text-white">Scroll</p>
  </div>
</section>

{{-- ─── RECENT PROJECTS ─────────────────────────────────────────────────── --}}
<section id="projects-section" class="bg-white overflow-hidden">

  <div class="px-6 lg:px-12 pt-20 pb-12 flex items-end justify-between">
    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B] mb-4">
        {{ $settings['homepage.projects_eyebrow'] ?? 'Selected Work' }}
      </p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
        {{ $settings['homepage.projects_title'] ?? 'Recent Projects' }}
      </h2>
    </div>
    <a href="{{ url('/projects') }}"
       class="hidden md:flex items-center gap-3 text-[9px] uppercase tracking-[0.24em] text-[#1C1C1C]/40 hover:text-[#1C1C1C] transition-colors duration-300 group pb-1">
      <span>View All Projects</span>
      <span class="w-6 h-px bg-current group-hover:w-10 transition-all duration-300"></span>
    </a>
  </div>

  <div class="overflow-hidden pb-20">
    <div id="projects-track"
         class="flex gap-4 pl-6 lg:pl-12 overflow-x-auto md:overflow-visible"
         style="width: max-content; padding-right: 3rem">

      @php
        $disciplineMap = ['architecture'=>'Architecture','interior'=>'Interior Design','landscape'=>'Landscape','urban'=>'Infrastructure'];
      @endphp

      @forelse($projects as $project)
        @php
          $cardW      = $loop->first ? 'w-[78vw] sm:w-[56vw] lg:w-[42vw]' : 'w-[68vw] sm:w-[44vw] lg:w-[30vw]';
          $discipline = $disciplineMap[$project->discipline] ?? ucfirst($project->discipline ?? 'Architecture');
          $index      = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
        @endphp
        <a href="{{ url('/projects/'.$project->slug) }}" class="group shrink-0 {{ $cardW }}">
          <div class="relative overflow-hidden w-full mb-5 rounded-xl" style="height: clamp(220px, 34vw, 480px)">
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
            <div class="bg-[#E8E0D4] animate-pulse mb-5 rounded-xl" style="height: clamp(220px, 34vw, 480px)"></div>
            <div class="h-3 bg-[#E8E0D4] rounded w-1/3 animate-pulse mb-3"></div>
            <div class="h-px bg-[#E8E0D4] mb-4"></div>
            <div class="h-5 bg-[#E8E0D4] rounded w-3/4 animate-pulse"></div>
          </div>
        @endfor
      @endforelse
    </div>
  </div>

  <div class="px-6 pb-6 md:hidden">
    <a href="{{ url('/projects') }}" class="text-[9px] uppercase tracking-[0.24em] text-[#8B8275]">
      View All Projects →
    </a>
  </div>
</section>

{{-- ─── STATISTICS ──────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-24 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto">
    <h2 class="font-display font-light text-xl text-[#FAF7F3] mb-16 leading-relaxed max-w-lg" data-reveal>
      {{ $settings['site.footer_tagline'] ?? "Shaping India's Built Environment" }}<br>
      <em class="italic text-[#B5451B]">Since {{ $settings['site.founded'] ?? '1999' }}</em>
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12">
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
      @foreach($stats as $stat)
        <div data-reveal>
          <div class="flex items-baseline gap-0.5 mb-2">
            <span class="font-display font-light text-display-lg text-[#FAF7F3] leading-none" data-counter data-target="{{ $stat['value'] }}">0</span>
            <span class="font-display font-light text-display-md text-[#B5451B] leading-none">{{ $stat['suffix'] }}</span>
          </div>
          <p class="text-[#8B8275] text-xs uppercase tracking-[0.18em]">{{ $stat['label'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── SERVICES TEASER ─────────────────────────────────────────────────── --}}
<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">
          {{ $settings['homepage.services_eyebrow'] ?? 'What We Do' }}
        </p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
          {{ $settings['homepage.services_title'] ?? 'Our Disciplines' }}
        </h2>
      </div>
      <a href="{{ url('/services') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Services
      </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @forelse($services->take(3) as $svc)
        <a href="{{ url('/services') }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5 rounded-lg">
            @if($svc->imageUrl)
              <img src="{{ $svc->imageUrl }}" alt="{{ $svc->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
            @else
              <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#d4c9b8] flex items-center justify-center">
                <span class="font-display font-light text-5xl text-[#8B8275]/30">0{{ $loop->iteration }}</span>
              </div>
            @endif
          </div>
          <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-2 group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $svc->title }}
          </h3>
          <p class="text-[#8B8275] text-sm leading-relaxed mb-4">{{ Str::limit($svc->tagline ?? $svc->description ?? '', 100) }}</p>
          <span class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Explore →</span>
        </a>
      @empty
        @foreach([['Architecture','From concept to completion, buildings that endure.'],['Interior Design','Spaces that breathe — functional, material, human.'],['Landscape','Connecting people to place through thoughtful design.']] as [$t,$d])
          <div class="block" data-reveal>
            <div class="aspect-[4/3] bg-[#E8E0D4] mb-5 rounded-lg"></div>
            <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-2">{{ $t }}</h3>
            <p class="text-[#8B8275] text-sm leading-relaxed mb-4">{{ $d }}</p>
            <span class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Explore →</span>
          </div>
        @endforeach
      @endforelse
    </div>
  </div>
</section>

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
    <div class="flex flex-col justify-center px-10 lg:px-16 py-16" data-reveal>
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

{{-- ─── JOURNAL TEASER ──────────────────────────────────────────────────── --}}
<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-16" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">
          {{ $settings['homepage.journal_eyebrow'] ?? 'From the Studio' }}
        </p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">
          {{ $settings['homepage.journal_title'] ?? 'Latest Insights' }}
        </h2>
      </div>
      <a href="{{ url('/journal') }}"
         class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] border-b border-[#8B8275]/40 pb-0.5 hover:text-[#B5451B] hover:border-[#B5451B] transition-all duration-300 hidden md:block">
        All Articles
      </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      @forelse($articles ?? [] as $article)
        <a href="{{ url('/journal/'.$article->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5 rounded-lg">
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
            <div class="aspect-[4/3] bg-[#E8E0D4] mb-5 rounded-lg animate-pulse"></div>
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
