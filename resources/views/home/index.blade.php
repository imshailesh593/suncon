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

  <div id="hero-bg" class="absolute inset-0 will-change-transform">
    <video autoplay muted loop playsinline
           poster="{{ asset('images/hero-bg.jpg') }}"
           class="w-full h-full object-cover"
           preload="auto">
      <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
      {{-- Fallback for browsers without video support --}}
      <img src="{{ asset('images/hero-bg.jpg') }}" alt="{{ $settings['site.name'] ?? 'Suncon Engineers' }}" class="w-full h-full object-cover">
    </video>
    <div class="absolute inset-0 bg-gradient-to-b from-[#1C1C1C]/65 via-[#1C1C1C]/30 to-[#1C1C1C]/78"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#1C1C1C]/30 to-transparent"></div>
  </div>

  <div class="relative z-10 max-w-screen-xl mx-auto w-full px-6 lg:px-12 pb-16 md:pb-20">
    <p class="text-[10px] uppercase tracking-[0.3em] text-white/60 mb-8" data-reveal>
      Selected Work — {{ $settings['site.founded'] ?? '1999' }} to Present
    </p>
    <h1 class="font-display font-light leading-[0.9] tracking-tight mb-10" data-reveal>
      <span class="block text-display-xl text-white word-split">{{ $settings['homepage.hero_line1'] ?? 'Architecture' }}</span>
      <span class="block text-display-xl font-bold text-[#B5451B] word-split">{{ $settings['homepage.hero_line2'] ?? '& Design.' }}</span>
    </h1>
    <div class="flex flex-wrap items-center gap-3 sm:gap-6" data-reveal>
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

</section>


{{-- ─── STUDIO STATEMENT (scroll-fill) ─────────────────────────────────── --}}
@php
  $statement = $settings['homepage.statement']
    ?? 'Suncon Engineers is an ISO-certified multidisciplinary design practice, founded in Pune in 1999. For over 25 years we have shaped architecture, landscape, interiors and infrastructure that respond to context, climate, and the people who inhabit them.';
  $fillWords = preg_split('/\s+/', trim($statement));
@endphp
<section class="scroll-fill-section bg-[#FAF7F3] px-6 lg:px-12 py-28 md:py-44">
  <div class="max-w-[1040px] mx-auto">
    <p class="scroll-fill font-display font-light text-center" style="font-size:clamp(1.55rem,3.7vw,3rem);line-height:1.3;">
      @foreach($fillWords as $w)<span class="fill-word">{{ $w }}</span>{{ ' ' }}@endforeach
    </p>
  </div>
</section>
<style>.scroll-fill .fill-word{color:#DFC7BB;}</style>

{{-- ─── RECENT PROJECTS ─────────────────────────────────────────────────── --}}
<section id="projects-section" class="bg-white overflow-hidden">

  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 pt-14 md:pt-20 pb-12 flex items-end justify-between">
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
         class="flex gap-4"
         style="padding-left: max(1.5rem, calc((100vw - 80rem) / 2 + 3rem)); padding-right: max(1.5rem, calc((100vw - 80rem) / 2 + 3rem)); overflow-x: auto; scroll-snap-type: x mandatory;">

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
              <span class="text-[9px] font-display text-[#8B8275]">{{ $project->year }}</span>
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

  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 pb-8 flex items-center justify-between md:hidden">
    <a href="{{ url('/projects') }}" class="text-[9px] uppercase tracking-[0.24em] text-[#8B8275]">View All →</a>
    <div class="flex items-center gap-3">
      <button onclick="document.getElementById('projects-prev').click()"
              class="w-9 h-9 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] text-sm">←</button>
      <button onclick="document.getElementById('projects-next').click()"
              class="w-9 h-9 flex items-center justify-center border border-[#1C1C1C]/20 text-[#1C1C1C] text-sm">→</button>
    </div>
  </div>
</section>

{{-- ─── STATISTICS ──────────────────────────────────────────────────────── --}}
<section class="bg-[#3D4A28] relative" data-dark>
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
      <div class="px-5 sm:px-8 lg:px-14 py-16 md:py-28" data-reveal>
        <div class="flex items-baseline gap-1 mb-3">
          <span class="font-display font-light text-display-xl text-[#FAF7F3] leading-none stat-num" data-counter data-target="{{ $stat['value'] }}">0</span>
          <span class="font-display font-light text-display-md text-[#B5451B] leading-none stat-suf">{{ $stat['suffix'] }}</span>
        </div>
        <p class="text-[#A8B898] text-[9px] uppercase tracking-[0.22em]">{{ $stat['label'] }}</p>
      </div>
    @endforeach
  </div>
  <style>
    @media (max-width: 479px) {
      .stat-num { font-size: clamp(1.8rem, 9vw, 3rem) !important; letter-spacing: -0.02em; }
      .stat-suf { font-size: clamp(1.2rem, 5vw, 2rem) !important; }
    }
  </style>
</section>

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

<section class="py-24 bg-[#FAF7F3] px-6 lg:px-12 relative overflow-hidden">
  <div class="max-w-screen-xl mx-auto relative">

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

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
      @foreach($svcList as $svc)
        @php
          $isArr   = is_array($svc);
          $title   = $isArr ? $svc['title']   : $svc->title;
          $tagline = $isArr ? $svc['tagline']  : ($svc->tagline ?? '');
          $slug    = $isArr ? $svc['slug']    : $svc->slug;
          $imgUrl  = $isArr ? null            : ($svc->imageUrl ?? null);
          $index   = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);

          $catLabel = match(true) {
            str_contains($slug,'architecture') || str_contains($slug,'architectural') => 'Architecture',
            str_contains($slug,'landscape')    => 'Landscape',
            str_contains($slug,'interior')     => 'Interior',
            str_contains($slug,'urban')        => 'Urban',
            str_contains($slug,'bim')          => 'BIM',
            default                            => 'PMC',
          };
        @endphp

        <a href="{{ route('services.show', $slug) }}"
           class="group block relative overflow-hidden aspect-[3/4] bg-[#E8E0D4]" data-reveal>

          {{-- Background image --}}
          @if($imgUrl)
            <img src="{{ $imgUrl }}" alt="{{ $title }}"
                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                 loading="lazy">
          @else
            <div class="absolute inset-0 bg-gradient-to-br from-[#2A2420] to-[#1C1C1C]">
              <div class="arch-grid-light"></div>
            </div>
          @endif

          {{-- Permanent dark gradient from bottom --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/10"></div>

          {{-- Hover tint overlay --}}
          <div class="absolute inset-0 bg-[#B5451B]/0 group-hover:bg-[#B5451B]/10 transition-all duration-500"></div>

          {{-- Index — top right --}}
          <span class="absolute top-4 right-4 font-display text-[2.5rem] leading-none text-white/10 select-none">{{ $index }}</span>

          {{-- Content — bottom --}}
          <div class="absolute bottom-0 left-0 right-0 p-5">
            <h3 class="font-display font-light leading-tight text-white group-hover:text-[#F5C4A8] transition-colors duration-300"
                style="font-size:clamp(1.8rem,2.8vw,2.6rem);letter-spacing:0.01em;">
              {{ $title }}
            </h3>
          </div>
        </a>
      @endforeach
    </div>

  </div>
</section>

{{-- ─── DESIGN EXPERTISE ────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12 border-t border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

    {{-- Left: diagram --}}
    <div class="flex items-center justify-center" data-reveal>
      <img src="{{ asset('images/design-expertise.svg') }}" alt="Design Expertise Diagram"
           class="w-full max-w-lg" loading="lazy">
    </div>

    {{-- Right: content --}}
    <div data-reveal>
      <div class="flex items-center gap-3 mb-6">
        <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
        <p class="text-[10px] uppercase tracking-[0.32em] text-[#8B8275]">Suncon Architecture</p>
      </div>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-8">
        Design<br>Expertise.
      </h2>
      <p class="text-[#8B8275] text-sm leading-relaxed mb-10 max-w-md">
        Our strength lies in the overlap. Architecture, landscape, and interiors are resolved together — not handed off in sequence. This integrated approach eliminates conflict, reduces cost, and produces environments that feel whole.
      </p>
      <div class="flex flex-col gap-5">
        @foreach([
          ['Architecture Design',  'Buildings that respond to site, climate, and culture — from concept through construction documentation.'],
          ['Landscape Design',     'Ground-plane strategies that connect people to place, extend the brief, and sustain biodiversity.'],
          ['Interior Design',      'Material, light, and spatial sequences that make every internal environment purposeful and human.'],
        ] as [$disc, $desc])
        <div class="flex gap-4 border-t border-[#E8E0D4] pt-5">
          <span class="w-1.5 h-1.5 rounded-full bg-[#B5451B] shrink-0 mt-2"></span>
          <div>
            <p class="text-sm font-medium text-[#1C1C1C] mb-1">{{ $disc }}</p>
            <p class="text-xs text-[#8B8275] leading-relaxed">{{ $desc }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

{{-- spacer --}}
<div aria-hidden="true" class="h-2 bg-[#D4C9BB]"></div>

{{-- ─── FEATURED PROJECTS SHOWCASE ──────────────────────────────────────── --}}
@if($projects->count())
@php
  $dlabels = ['architecture'=>'Architecture Design','landscape'=>'Landscape Design','interior'=>'Interior Design','urban'=>'Urban Design','bim'=>'Architectural BIM','pmc'=>'PMC'];
@endphp
<section class="bg-[#F2EDE4] relative overflow-hidden" id="featured-showcase" style="height:calc(100vh - 60px)">

  {{-- Prev button --}}
  <button id="fp-prev" aria-label="Previous project"
          class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center bg-[#FAF7F3]/80 hover:bg-[#FAF7F3] border border-[#1C1C1C]/10 hover:border-[#1C1C1C]/30 transition-all duration-200 backdrop-blur-sm">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M10 3L5 8l5 5" stroke="#1C1C1C" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </button>

  {{-- Next button --}}
  <button id="fp-next" aria-label="Next project"
          class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center bg-[#FAF7F3]/80 hover:bg-[#FAF7F3] border border-[#1C1C1C]/10 hover:border-[#1C1C1C]/30 transition-all duration-200 backdrop-blur-sm">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M6 3l5 5-5 5" stroke="#1C1C1C" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </button>

  {{-- Slide counter --}}
  <div class="absolute bottom-6 right-6 z-10 flex items-center gap-2">
    <span id="fp-current" class="font-display font-light text-sm text-[#1C1C1C]/40">01</span>
    <span class="text-[#1C1C1C]/20">/</span>
    <span class="font-display font-light text-sm text-[#1C1C1C]/25">{{ str_pad($projects->count(), 2, '0', STR_PAD_LEFT) }}</span>
  </div>

  @foreach($projects as $i => $p)
  <div class="fp-slide h-full grid grid-cols-1 md:grid-cols-2"
       style="{{ $i !== 0 ? 'display:none' : '' }}"
       data-index="{{ $i }}">

    {{-- Left: Image --}}
    <div class="h-full overflow-hidden bg-[#E8E0D4]">
      @if($p->imageUrl)
        <img src="{{ $p->imageUrl }}" alt="{{ $p->title }}"
             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" loading="lazy">
      @else
        <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
      @endif
    </div>

    {{-- Right: Content --}}
    <div class="flex flex-col justify-center px-6 sm:px-10 lg:px-16 py-10 overflow-hidden">
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-3">
        {{ $dlabels[$p->discipline] ?? ucfirst($p->discipline ?? 'Project') }}
      </p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-5">{{ $p->title }}</h2>
      @if($p->location)
        <p class="text-[#8B8275] text-xs uppercase tracking-[0.18em] mb-4">{{ $p->location }}@if($p->year) · {{ $p->year }}@endif</p>
      @endif
      @if($p->description)
        <p class="text-[#8B8275] text-sm leading-relaxed mb-8 max-w-sm">{{ Str::limit($p->description, 200) }}</p>
      @endif
      <a href="{{ url('/projects/'.$p->slug) }}"
         class="inline-flex items-center gap-3 text-[10px] uppercase tracking-[0.2em] border border-[#1C1C1C]/30 text-[#1C1C1C] px-7 py-3.5 self-start hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
        View Project →
      </a>
    </div>
  </div>
  @endforeach

</section>

<script>
(function(){
  var slides  = document.querySelectorAll('.fp-slide');
  var prev    = document.getElementById('fp-prev');
  var next    = document.getElementById('fp-next');
  var counter = document.getElementById('fp-current');
  var section = document.getElementById('featured-showcase');
  if (!slides.length) return;

  var current = 0;
  var timer;

  function show(idx) {
    current = (idx + slides.length) % slides.length;
    slides.forEach(function(s, i) { s.style.display = i === current ? '' : 'none'; });
    if (counter) counter.textContent = String(current + 1).padStart(2, '0');
  }

  function startAuto() { timer = setInterval(function(){ show(current + 1); }, 5000); }
  function stopAuto()  { clearInterval(timer); }

  if (prev) prev.addEventListener('click', function() { stopAuto(); show(current - 1); startAuto(); });
  if (next) next.addEventListener('click', function() { stopAuto(); show(current + 1); startAuto(); });
  if (section) {
    section.addEventListener('mouseenter', stopAuto);
    section.addEventListener('mouseleave', startAuto);
  }

  startAuto();
})();
</script>
@endif

{{-- ─── CLIENT LOGOS MARQUEE ────────────────────────────────────────────── --}}
@php
  $clients = [
    ['file'=>'1.png',   'name'=>'Indian Railways'],
    ['file'=>'16.png',  'name'=>'Delhi Metro Rail Corporation'],
    ['file'=>'20.png',  'name'=>'Reliance'],
    ['file'=>'19.png',  'name'=>'Volkswagen'],
    ['file'=>'8.png',   'name'=>'Cadbury'],
    ['file'=>'13.png',  'name'=>'Castrol'],
    ['file'=>'7.png',   'name'=>'MIDC'],
    ['file'=>'15.png',  'name'=>'MSRDC'],
    ['file'=>'22.png',  'name'=>'PMRDA'],
    ['file'=>'10.png',  'name'=>'Thane Municipal Corporation'],
    ['file'=>'12.png',  'name'=>'Jalgaon City Municipal Corporation'],
    ['file'=>'5.png',   'name'=>'Coimbatore City Municipal Corporation'],
    ['file'=>'4.png',   'name'=>'Thoothukudi Municipal Corporation'],
    ['file'=>'3.png',   'name'=>'Lonavala Municipal Council'],
    ['file'=>'2.png',   'name'=>'Talegaon Municipal Council'],
    ['file'=>'11-1.png','name'=>'Beed Municipal Council'],
    ['file'=>'18.png',  'name'=>'Shrivardhan Municipal Council'],
    ['file'=>'14-1.png','name'=>'Kalyan Dombivali Municipal Corporation'],
    ['file'=>'23.png',  'name'=>'Municipal Corporation Bathinda'],
    ['file'=>'24.png',  'name'=>'Rural Water Supply & Sanitation Dept., Karnataka'],
    ['file'=>'17.png',  'name'=>'Public Works Department, Karnataka'],
    ['file'=>'6.png',   'name'=>'Tamil Nadu Urban Infrastructure Financial Services'],
    ['file'=>'9.png',   'name'=>'Road Construction Department'],
    ['file'=>'21.png',  'name'=>'IN-RIMT'],
  ];
@endphp
<section style="background:#fff;padding-top:3.5rem;padding-bottom:3.5rem;border-top:1px solid #E8E0D4;overflow:hidden;">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 mb-10 flex items-center justify-between" data-reveal>
    <div class="flex items-center gap-3">
      <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#8B8275]">Trusted By</p>
    </div>
    <p class="text-[9px] uppercase tracking-[0.2em] text-[#8B8275]/60">{{ count($clients) }}+ Clients Across India</p>
  </div>

  <div class="relative">
    <div class="absolute inset-y-0 left-0 w-28 z-10 pointer-events-none" style="background:linear-gradient(to right,#fff,transparent)"></div>
    <div class="absolute inset-y-0 right-0 w-28 z-10 pointer-events-none" style="background:linear-gradient(to left,#fff,transparent)"></div>

    <div class="flex gap-0 items-center client-marquee-track" style="background:#fff">
      @foreach([1,2] as $_)
        @foreach($clients as $c)
          <div class="shrink-0 flex items-center justify-center client-logo-item" style="height:140px;min-width:200px;background:#fff;">
            <img src="{{ asset('images/clients/'.$c['file']) }}"
                 alt="{{ $c['name'] }}"
                 title="{{ $c['name'] }}"
                 style="max-height:110px;max-width:180px;width:auto;height:auto;object-fit:contain;mix-blend-mode:multiply;filter:grayscale(100%);"
                 loading="lazy">
          </div>
        @endforeach
      @endforeach
    </div>
  </div>
</section>
<style>
  .client-marquee-track {
    animation: clientScroll 55s linear infinite;
    width: max-content;
  }
  .client-marquee-track:hover { animation-play-state: paused; }
  .client-logo-item img { opacity: 0.7; transition: opacity 0.3s ease, filter 0.3s ease; }
  .client-logo-item:hover img { opacity: 1; filter: grayscale(0%); }
  @keyframes clientScroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
</style>

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

{{-- ─── FAQ ─────────────────────────────────────────────────────────────────── --}}
@php
  $archFaqs = [
    ['What architectural services does Suncon Engineers offer?', 'Suncon Engineers provides a full suite of architectural services including conceptual and schematic design, working drawings, town planning and layout approvals, structural coordination, and construction administration. We serve residential, commercial, hospitality, healthcare, industrial, and educational project types.'],
    ['How long has Suncon Engineers been in practice?', 'Suncon Engineers was established in 1999 and has over 25 years of architectural practice across India. We are ISO 9001 certified and have delivered more than 500 projects across 15+ states.'],
    ['Do you offer BIM services alongside architectural design?', 'Yes. Our dedicated BIM division delivers Revit-based modeling, MEP coordination, clash detection, and LOD 100–500 documentation. Architecture and BIM are resolved under one roof, enabling seamless coordination from concept to construction.'],
    ['Which cities and states do you operate in?', 'Our head office is in Pune, Maharashtra with a branch in Coimbatore, Tamil Nadu. We have delivered projects across 15+ states including Maharashtra, Tamil Nadu, Karnataka, Delhi, Gujarat, Rajasthan, Telangana, and more.'],
    ['Do you take on residential design projects?', 'Yes. We handle the full range of residential typologies — individual villas, row houses, apartment towers, and large gated community masterplans. Our residential work spans affordable housing through premium developments.'],
    ['What is your process for a new project?', 'We begin with a site visit and brief review, followed by feasibility and concept design. After client approval, we proceed through schematic design, design development, working drawings, and construction administration. An ISO-certified QA process governs every stage.'],
  ];
@endphp
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12 border-t border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-6 lg:gap-20">
    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#B5451B] mb-4">FAQ</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-4">Frequently<br>Asked<br>Questions</h2>
      <a href="{{ url('/contact') }}" class="text-[9px] uppercase tracking-[0.22em] text-[#B5451B]">Ask us directly →</a>
    </div>
    <div class="flex flex-col divide-y divide-[#E8E0D4]">
      @foreach($archFaqs as $faq)
        <details class="group py-6" data-reveal>
          <summary class="flex items-start justify-between gap-6 cursor-pointer list-none">
            <h3 class="font-display font-light text-lg text-[#1C1C1C] group-open:text-[#B5451B] transition-colors duration-200 pr-4">{{ $faq[0] }}</h3>
            <span class="shrink-0 w-6 h-6 border border-[#1C1C1C]/20 flex items-center justify-center text-[#8B8275] group-open:border-[#B5451B] group-open:text-[#B5451B] transition-all duration-200 mt-0.5">
              <span class="group-open:hidden">+</span><span class="hidden group-open:block">−</span>
            </span>
          </summary>
          <p class="mt-4 text-[#8B8275] text-sm leading-relaxed font-light">{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>

@push('schema')
@php
  $archFaqSchema = ['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>collect($archFaqs)->map(fn($f)=>['@type'=>'Question','name'=>$f[0],'acceptedAnswer'=>['@type'=>'Answer','text'=>$f[1]]])->values()->all()];
@endphp
<script type="application/ld+json">{!! json_encode($archFaqSchema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@endsection
