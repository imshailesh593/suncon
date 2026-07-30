@extends('layouts.app')

@section('title', 'About | '.($settings['site.name'] ?? 'Suncon Engineers'))
@section('description', ($settings['site.seo_description'] ?? 'Suncon Engineers Pvt. Ltd. — 25+ years shaping India\'s built environment through architecture, landscape, interior design and infrastructure.'))

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-screen-xl mx-auto">
    <div class="max-w-3xl" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">About Suncon</p>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none mb-6">
        {{ $settings['about.hero_line1'] ?? 'Building for' }}<br>
        <span class="font-bold text-[#B5451B]">{{ $settings['about.hero_line2'] ?? 'People & Place' }}</span>
      </h1>
      <p class="text-[#1C1C1C] text-base leading-relaxed font-light">
        {{ $settings['about.intro_p1'] ?? 'Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India. Over 25 years we have delivered architecture, landscape, interior and infrastructure projects that thoughtfully respond to context, climate and the people who inhabit them.' }}
      </p>
    </div>
  </div>
</section>

{{-- ─── VIDEO ────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pb-0 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="relative w-full overflow-hidden bg-[#1C1C1C]" style="aspect-ratio:16/9;" data-reveal>
      @php $videoId = $settings['about.youtube_id'] ?? ''; @endphp
      @if($videoId)
        <iframe class="absolute inset-0 w-full h-full"
                src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&modestbranding=1"
                title="Suncon Engineers" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
      @else
        {{-- Placeholder until video URL is set in CMS --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#2A2420] to-[#1C1C1C] flex flex-col items-center justify-center gap-6">
          <div class="w-16 h-16 rounded-full border-2 border-white/20 flex items-center justify-center">
            <svg class="w-6 h-6 text-white/40 ml-1" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </div>
          <p class="text-white/30 text-[10px] uppercase tracking-[0.3em]">Studio Film — Add YouTube ID in CMS Settings</p>
        </div>
      @endif
    </div>

    {{-- Tagline relocated below video --}}
    <div class="border-l-2 border-[#B5451B] pl-6 py-4 mt-10 mb-0" data-reveal>
      <p class="font-display font-light text-xl text-[#1C1C1C] leading-relaxed">
        {{ $settings['about.intro_p2'] ?? 'Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.' }}
      </p>
    </div>
  </div>
</section>

{{-- ─── SUNCON FRAMEWORK (directly below video) ────────────────────────── --}}
<section class="bg-[#FAF7F3] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-center gap-3 mb-12" data-reveal>
      <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">The Suncon Framework</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[#E8E0D4]">
      @foreach([
        ['01','Research & Context','Every project begins with deep site reading — topography, climate, culture, and community. We listen before we draw.'],
        ['02','Integrated Design','Architecture, landscape, and interiors are resolved together, not in sequence. This reduces conflict and elevates coherence.'],
        ['03','Delivery Excellence','ISO-certified processes and an in-house BIM workflow ensure quality, traceability, and on-time handover at every scale.'],
      ] as [$num, $title, $desc])
      <div class="bg-[#FAF7F3] p-8 lg:p-10" data-reveal>
        <span class="font-display font-light text-5xl text-[#E8E0D4] leading-none block mb-6">{{ $num }}</span>
        <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-4">{{ $title }}</h3>
        <p class="text-[#8B8275] text-sm leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- spacer --}}
<div aria-hidden="true" class="h-px bg-[#E8E0D4]"></div>

{{-- ─── OUR APPROACH ────────────────────────────────────────────────────── --}}
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1fr_1.2fr] gap-16 items-center">
    <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4]" data-reveal>
      <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
    </div>
    <div data-reveal>
      <div class="flex items-center gap-3 mb-6">
        <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
        <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">Our Approach</p>
      </div>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-8">
        {{ $settings['about.philosophy_title'] ?? 'Design with intention.' }}
      </h2>
      <div class="flex flex-col gap-5 text-[#8B8275] text-sm leading-relaxed font-light">
        <p>{{ $settings['about.philosophy_p1'] ?? 'We believe great architecture begins with listening — to the site, the community, and the brief. Every project is an opportunity to contribute positively to its context while exceeding client expectations.' }}</p>
        <p>{{ $settings['about.philosophy_p2'] ?? 'Our practice spans residential towers and campuses, public parks and waterfronts, premium interiors and civic infrastructure. Across all scales, we apply the same rigour: contextual research, sustainable strategies, and meticulous detailing.' }}</p>
        <p>{{ $settings['about.philosophy_p3'] ?? 'Being ISO-certified reflects our commitment to quality management at every stage — from initial concept to project delivery and beyond.' }}</p>
      </div>
    </div>
  </div>
</section>

{{-- ─── STATS ───────────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-16 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
    @php
      $aboutStats = !empty($statistics) ? $statistics : [
        ['value'=>'25','suffix'=>'+','label'=>'Years of Practice'],
        ['value'=>'500','suffix'=>'+','label'=>'Projects Delivered'],
        ['value'=>'50','suffix'=>'+','label'=>'Professionals'],
        ['value'=>'100','suffix'=>'+','label'=>'Happy Clients'],
      ];
    @endphp
    @foreach($aboutStats as $stat)
      <div class="text-center" data-reveal>
        <div class="flex items-baseline justify-center gap-0.5 mb-2">
          <span class="font-display font-light text-display-lg text-[#FAF7F3] leading-none" data-counter data-target="{{ $stat['value'] }}">0</span>
          <span class="font-display font-light text-display-md text-[#B5451B] leading-none">{{ $stat['suffix'] }}</span>
        </div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.18em]">{{ $stat['label'] }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- ─── TEAM ───────────────────────────────────────────────────────────── --}}
<section id="team" class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-14" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">The People</p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Team</h2>
      </div>
      {{-- We are hiring CTA --}}
      <a href="{{ url('/contact') }}?subject=careers"
         class="hidden md:flex items-center gap-3 text-[10px] uppercase tracking-[0.22em] border border-[#B5451B] text-[#B5451B] px-6 py-3 hover:bg-[#B5451B] hover:text-white transition-all duration-300">
        We are hiring →
      </a>
    </div>

    {{-- Reduced photo size: aspect-square instead of 3/4 portrait --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
      @forelse($team as $member)
        <div class="group" data-reveal>
          <div class="overflow-hidden aspect-square bg-[#E8E0D4] mb-4">
            @if($member->imageUrl)
              <img src="{{ $member->imageUrl }}" alt="{{ $member->name }}"
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" loading="lazy">
            @else
              <div class="w-full h-full bg-gradient-to-b from-[#E8E0D4] to-[#c8bcad] flex items-end p-4">
                <span class="font-display font-light text-2xl text-[#8B8275] opacity-30">{{ substr($member->name, 0, 1) }}</span>
              </div>
            @endif
          </div>
          <h3 class="font-display font-light text-base text-[#1C1C1C] mb-0.5 leading-snug">{{ $member->name }}</h3>
          <p class="text-[9px] uppercase tracking-[0.18em] text-[#B5451B] mb-2">{{ $member->role }}</p>
          @if($member->linkedin)
            <a href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer"
               class="inline-block text-[9px] uppercase tracking-[0.18em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200">
              LinkedIn →
            </a>
          @endif
        </div>
      @empty
        @foreach([
          ['Ar. Sunita Wagh','Principal Architect'],
          ['Ar. Rahul Deshpande','Associate Director — Interiors'],
          ['Ar. Priya Kulkarni','Landscape Lead'],
          ['Ar. Vikram Joshi','Senior Architect'],
        ] as [$name,$role])
          <div class="group" data-reveal>
            <div class="overflow-hidden aspect-square bg-gradient-to-b from-[#E8E0D4] to-[#c8bcad] mb-4"></div>
            <h3 class="font-display font-light text-base text-[#1C1C1C] mb-0.5">{{ $name }}</h3>
            <p class="text-[9px] uppercase tracking-[0.18em] text-[#B5451B]">{{ $role }}</p>
          </div>
        @endforeach
      @endforelse
    </div>

    {{-- Mobile We are hiring --}}
    <div class="mt-12 md:hidden" data-reveal>
      <a href="{{ url('/contact') }}?subject=careers"
         class="flex items-center justify-center gap-3 text-[10px] uppercase tracking-[0.22em] border border-[#B5451B] text-[#B5451B] px-6 py-4 hover:bg-[#B5451B] hover:text-white transition-all duration-300 w-full">
        We are hiring →
      </a>
    </div>
  </div>
</section>

{{-- ─── OUR SECTORS ─────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-24 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-14" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-4">
          <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
          <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">Our Sectors</p>
        </div>
        <h2 class="font-display font-light text-display-md text-[#FAF7F3] leading-none">Where We Work</h2>
      </div>
      <a href="{{ url('/projects') }}"
         class="hidden md:flex items-center gap-3 text-[10px] uppercase tracking-[0.22em] bg-[#B5451B] text-white px-6 py-3 hover:bg-[#9a3a17] transition-colors duration-300">
        View Projects →
      </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-white/5">
      @foreach([
        ['Residential','Villas, row houses, apartment towers, and gated community masterplans.'],
        ['Commercial','Office campuses, retail environments, and mixed-use developments.'],
        ['Institutional','Schools, colleges, healthcare facilities, and civic buildings.'],
        ['Industrial','Manufacturing complexes, logistics parks, and warehousing.'],
        ['Hospitality','Hotels, resorts, and integrated tourism developments.'],
        ['Public & Infrastructure','Urban spaces, transport corridors, and smart city initiatives.'],
      ] as [$sector,$desc])
        <div class="bg-[#1C1C1C] p-8 group" data-reveal>
          <h3 class="font-display font-light text-lg text-[#FAF7F3] mb-3 group-hover:text-[#B5451B] transition-colors duration-300">{{ $sector }}</h3>
          <p class="text-[#5C5652] text-sm leading-relaxed mb-5">{{ $desc }}</p>
          <a href="{{ url('/projects') }}" class="text-[9px] uppercase tracking-[0.22em] text-[#B5451B] flex items-center gap-2 hover:gap-3 transition-all duration-300">
            View Projects <span>→</span>
          </a>
        </div>
      @endforeach
    </div>
    {{-- Mobile projects CTA --}}
    <div class="mt-8 md:hidden">
      <a href="{{ url('/projects') }}"
         class="flex items-center justify-center gap-3 text-[10px] uppercase tracking-[0.22em] bg-[#B5451B] text-white px-6 py-4 transition-colors duration-300 w-full">
        View Projects →
      </a>
    </div>
  </div>
</section>

{{-- ─── OUR VALUES ──────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-center gap-3 mb-14" data-reveal>
      <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">Our Values</p>
    </div>
    @php
      $values = [
        ['Contextual Design','We root every project in its physical and cultural environment — reading the land, the climate, and the community before drawing a line.'],
        ['Sustainability','We integrate passive strategies, material efficiency, and lifecycle thinking into the core of every design, not as an afterthought.'],
        ['Client Partnership','We treat every client relationship as a long-term collaboration — transparent in communication, rigorous in delivery, and responsive to evolving needs.'],
        ['Integrated Delivery','Architecture, landscape, interiors, and infrastructure resolved under one roof, eliminating coordination gaps and elevating design coherence.'],
      ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-12">
      @foreach($values as $i => [$title, $desc])
        <div class="flex gap-8 items-start" data-reveal>
          <span class="font-display font-light text-5xl text-[#E8E0D4] leading-none shrink-0 w-12">0{{ $i+1 }}</span>
          <div>
            <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-3">{{ $title }}</h3>
            <p class="text-[#8B8275] text-sm leading-relaxed">{{ $desc }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── CLIENTS & COLLABORATORS ─────────────────────────────────────────── --}}
<section class="bg-[#0F0E0C] py-24 overflow-hidden" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 mb-12" data-reveal>
    <div class="flex items-center gap-3 mb-4">
      <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">Trusted By</p>
    </div>
    <h2 class="font-display font-light text-display-md text-[#FAF7F3] leading-none">Clients & Collaborators</h2>
  </div>
  <div class="overflow-hidden mb-6">
    <div id="marquee-row1" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $c1 = $clients['row1'] ?? ['Tata Group','Godrej Properties','Mahindra Lifespaces','L&T Realty','Prestige Group','Brigade Group','Shapoorji Pallonji','Oberoi Realty'];
        $c1 = array_merge($c1, $c1);
      @endphp
      @foreach($c1 as $client)
        <span class="text-[#FAF7F3] text-3xl lg:text-5xl font-display font-light uppercase tracking-[0.1em] shrink-0">{{ $client }}</span>
        <span class="text-[#B5451B] text-2xl shrink-0">✦</span>
      @endforeach
    </div>
  </div>
  <div class="overflow-hidden">
    <div id="marquee-row2" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $c2 = $clients['row2'] ?? ['MHADA','Smart Cities Mission','NHAI','PWD Maharashtra','CPWD','Municipal Corporation','Kirloskar Group','Bajaj Auto'];
        $c2 = array_merge($c2, $c2);
      @endphp
      @foreach($c2 as $client)
        <span class="text-[#8B8275] text-xl lg:text-2xl font-display font-light tracking-[0.08em] shrink-0">{{ $client }}</span>
        <span class="text-[#8B8275] text-lg shrink-0">·</span>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── TESTIMONIALS ───────────────────────────────────────────────────── --}}
@if(isset($testimonials) && $testimonials->count())
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Client Voices</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">What They Say</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($testimonials as $t)
        <div class="bg-white p-8 flex flex-col" data-reveal>
          <div class="flex gap-1 mb-6">
            @for($s = 1; $s <= 5; $s++)
              <span class="{{ $s <= ($t->rating ?? 5) ? 'text-[#B5451B]' : 'text-[#E8E0D4]' }} text-sm">★</span>
            @endfor
          </div>
          <blockquote class="font-display font-light text-[1.05rem] leading-relaxed text-[#1C1C1C] mb-8 flex-1">
            "{{ $t->quote }}"
          </blockquote>
          <div class="flex items-center gap-4 border-t border-[#E8E0D4] pt-6">
            @if($t->imageUrl)
              <img src="{{ $t->imageUrl }}" alt="{{ $t->client_name }}" class="w-10 h-10 rounded-full object-cover shrink-0">
            @else
              <div class="w-10 h-10 rounded-full bg-[#E8E0D4] flex items-center justify-center shrink-0">
                <span class="font-display text-sm text-[#8B8275]">{{ substr($t->client_name, 0, 1) }}</span>
              </div>
            @endif
            <div>
              <p class="text-sm font-medium text-[#1C1C1C]">{{ $t->client_name }}</p>
              @if($t->role || $t->company)
                <p class="text-[9px] uppercase tracking-[0.18em] text-[#8B8275]">{{ implode(', ', array_filter([$t->role, $t->company])) }}</p>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ─── AWARDS ─────────────────────────────────────────────────────────── --}}
@if(isset($awards) && $awards->count())
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Recognition</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Awards & Honours</h2>
    </div>
    <div class="flex flex-col divide-y divide-[#E8E0D4]">
      @foreach($awards as $award)
        <div class="py-7 grid grid-cols-[auto_1fr_auto] gap-8 items-center" data-reveal>
          <span class="font-display font-light text-display-md text-[#E8E0D4] leading-none w-16 shrink-0">{{ $award->year }}</span>
          <div>
            <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-1">{{ $award->title }}</h3>
            <p class="text-[9px] uppercase tracking-[0.2em] text-[#8B8275]">{{ $award->organization }} — {{ $award->category }}</p>
          </div>
          @if($award->imageUrl)
            <img src="{{ $award->imageUrl }}" alt="{{ $award->title }}" class="w-14 h-14 object-contain shrink-0 opacity-60">
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
