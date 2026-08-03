@extends('layouts.app')

@section('title', 'About | '.($settings['site.name'] ?? 'Suncon Engineers'))
@section('description', ($settings['site.seo_description'] ?? 'Suncon Engineers Pvt. Ltd. — 25+ years shaping India\'s built environment through architecture, landscape, interior design and infrastructure.'))

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-screen-xl mx-auto flex flex-col lg:flex-row lg:items-center gap-10">

    {{-- Text --}}
    <div class="lg:flex-1 max-w-2xl" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">Est. 1999</p>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none mb-6">
        About Us
      </h1>
      <p class="text-[#1C1C1C] text-base leading-relaxed font-light">
        {{ $settings['about.intro_p1'] ?? 'For over 25 years, our Pune-based studio has shaped buildings, landscapes, and interiors that are rooted in place — ISO-certified, people-first, and delivered to last.' }}
      </p>
    </div>

    {{-- Decorative overlapping-circles graphic --}}
    <div class="hidden lg:block lg:flex-none" aria-hidden="true" style="width:460px;margin-right:-90px;">
      <svg width="460" height="460" viewBox="0 0 480 480" fill="none" xmlns="http://www.w3.org/2000/svg">

        {{-- Terracotta blob in the intersection area --}}
        <path d="M 244,160 C 318,152 348,192 338,246 C 328,302 294,322 244,316 C 192,310 154,280 160,226 C 167,177 172,168 244,160 Z"
              fill="#B5451B" opacity="0.88"/>

        {{-- Large circle — long-dash, charcoal --}}
        <circle cx="165" cy="195" r="162" stroke="#1C1C1C" stroke-width="1.5" stroke-dasharray="10 7" opacity="0.22"/>

        {{-- Medium circle — solid, charcoal --}}
        <circle cx="320" cy="195" r="148" stroke="#1C1C1C" stroke-width="1.5" opacity="0.32"/>

        {{-- Lower circle — dotted, stone --}}
        <circle cx="244" cy="322" r="136" stroke="#8B8275" stroke-width="1.5" stroke-dasharray="3 7" opacity="0.40"/>

        {{-- Small inner ring — dash-dot, terracotta --}}
        <circle cx="244" cy="238" r="52" stroke="#B5451B" stroke-width="1" stroke-dasharray="5 8" opacity="0.55"/>

        {{-- Tiny spiral curl — decorative accent --}}
        <path d="M 388,108 C 395,98 408,97 414,106 C 421,116 414,130 402,132 C 390,134 381,124 383,114 C 385,106 393,102 400,105"
              stroke="#B5451B" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.55"/>

      </svg>
    </div>

  </div>
</section>

{{-- ─── VIDEO ────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pb-0 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="relative w-full overflow-hidden bg-[#1C1C1C]" style="aspect-ratio:16/9;" data-reveal>
      <video autoplay muted loop playsinline
             poster="{{ asset('images/hero-bg.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover"
             preload="auto">
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-[#1C1C1C]/20 pointer-events-none"></div>
    </div>

    {{-- Tagline relocated below video --}}
    <div class="border-l-2 border-[#B5451B] pl-6 py-4 mt-10 mb-0" data-reveal>
      <p class="font-display font-light text-xl text-[#1C1C1C] leading-relaxed">
        {{ $settings['about.intro_p2'] ?? 'Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.' }}
      </p>
    </div>
  </div>
</section>

{{-- ─── SERVICES / DISCIPLINES ─────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] py-20 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-center gap-3 mb-14" data-reveal>
      <span class="w-6 h-px bg-[#B5451B] shrink-0"></span>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B]">What We Do</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-[#E8E0D4]">
      @foreach([
        ['Architecture & Design', [
          'Concept & Schematic Design',
          'Working Drawings & Documentation',
          'Town Planning & Layout Approvals',
          'Structural Coordination',
          'Construction Administration',
          'Residential, Commercial & Civic',
        ]],
        ['Landscape Architecture', [
          'Landscape Master Planning',
          'Site Analysis & Ecology',
          'Planting Design & Species Selection',
          'Hardscape, Water Features & Pathways',
          'Township & Campus Landscapes',
          'Resort & Hospitality Grounds',
        ]],
        ['Interior Design', [
          'Interior Architecture & Space Planning',
          'Furniture, Joinery & Fixture Design',
          'Material & Finish Specification',
          'Lighting Design & Mood',
          'Healthcare & Specialised Interiors',
          'Hospitality & Residential Interiors',
        ]],
        ['Urban Design', [
          'Urban Master Planning',
          'Integrated Storm Water DPRs',
          'Topographic Survey & Hydrological Modelling',
          'Streetscape & Public Realm',
          'Environmental Impact Analysis',
          'Municipal & Civic Infrastructure',
        ]],
        ['Architectural BIM', [
          '3D Architectural & Structural Modelling',
          'Clash Detection & Coordination',
          '4D Construction Sequencing',
          '5D Cost Estimation & BOQ Extraction',
          'Scan to BIM (Laser to Digital Twin)',
          'BIM Drafting & Shop Drawings',
        ]],
        ['Project Management', [
          'Tender Document Preparation & Review',
          'Design & Cost Analysis',
          'Layout Survey & Lineout',
          'Contract Administration',
          'Quality Assurance & Site Monitoring',
          'Running Bills & As-Built Drawings',
        ]],
      ] as [$discipline, $items])
      <div class="bg-[#FAF7F3] p-8 lg:p-10" data-reveal>
        <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-6 leading-snug">{{ $discipline }}</h3>
        <ul class="flex flex-col gap-2.5">
          @foreach($items as $item)
            <li class="flex items-start gap-3 text-sm text-[#8B8275] font-light">
              <span class="w-3 h-px bg-[#B5451B] shrink-0 mt-2.5"></span>
              {{ $item }}
            </li>
          @endforeach
        </ul>
      </div>
      @endforeach
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

{{-- ─── ARCHIPELAGO LOGO STRIP ─────────────────────────────────────────── --}}
<div class="bg-[#FAF7F3] pb-16 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto flex justify-center">
    <img src="{{ asset('images/archipelago.svg') }}" alt="Archipelago" class="h-14 opacity-60" loading="lazy">
  </div>
</div>

{{-- spacer --}}
<div aria-hidden="true" class="h-px bg-[#E8E0D4]"></div>

{{-- ─── OUR APPROACH ────────────────────────────────────────────────────── --}}
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1fr_1.2fr] gap-16 items-center">
    {{-- Left: key numbers --}}
    <div class="grid grid-cols-2 gap-px bg-[#E8E0D4]" data-reveal>
      @foreach([['25+','Years of\nPractice'],['500+','Projects\nDelivered'],['50+','Expert\nProfessionals'],['ISO','9001 Certified']] as [$val,$lbl])
      <div class="bg-[#F2EDE4] p-8 flex flex-col justify-between" style="min-height:140px">
        <span class="font-display font-light text-[2.8rem] text-[#1C1C1C] leading-none">{{ $val }}</span>
        <p class="text-[9px] uppercase tracking-[0.22em] text-[#8B8275] mt-4 leading-relaxed">{{ str_replace('\n',' ',$lbl) }}</p>
      </div>
      @endforeach
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

{{-- ─── OUR SECTORS ─────────────────────────────────────────────────────── --}}
<section class="bg-[#1C3016] py-24 px-6 lg:px-12" data-dark>
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
        ['Healthcare','Hospitals, clinics, diagnostic centres, and medical campuses.'],
        ['Commercial','Office parks, business districts, and commercial complexes.'],
        ['Residential','Villas, row houses, apartment towers, and gated community masterplans.'],
        ['Industrial','Manufacturing complexes, logistics parks, and warehousing facilities.'],
        ['Hospitality','Hotels, resorts, and integrated tourism developments.'],
        ['Education','Schools, colleges, universities, and research campuses.'],
        ['Retail','Shopping centres, high-street retail, and experiential spaces.'],
        ['Corporate','Headquarters, campuses, and workplace environments.'],
        ['Institutional','Civic buildings, cultural centres, and government facilities.'],
        ['Public Infrastructure','Urban spaces, transport corridors, and smart city initiatives.'],
        ['Mixed-Use','Integrated developments combining retail, residential, and commercial uses.'],
        ['Township Development','Large-scale masterplanned communities and township projects.'],
      ] as [$sector,$desc])
        <div class="bg-[#1C3016] p-8 group" data-reveal>
          <h3 class="font-display font-light text-lg text-[#FAF7F3] mb-3 group-hover:text-[#B5451B] transition-colors duration-300">{{ $sector }}</h3>
          <p class="text-white/45 text-sm leading-relaxed mb-5">{{ $desc }}</p>
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
        ['Contextual','We root every project in its physical and cultural environment — reading the land, the climate, and the community before drawing a line.'],
        ['Visionary','We push past the obvious solution, bringing creative thinking and evidence-based research together to arrive at something worth building.'],
        ['Integrated','Architecture, landscape, interiors, and infrastructure resolved under one roof — eliminating coordination gaps and elevating coherence.'],
        ['Sustainable','Passive strategies, material efficiency, and lifecycle thinking woven into the core of every design, not bolted on at the end.'],
        ['Rigorous','ISO-certified processes and an in-house BIM workflow ensure quality, traceability, and on-time delivery at every scale.'],
        ['Collaborative','We work as true partners — with clients, consultants, and communities — because the best outcomes emerge from genuine dialogue.'],
        ['Responsive','We listen before we draw. Every brief is read carefully and revisited often, so the design evolves with the client\'s needs.'],
        ['Authentic','We do not chase trends. Our work is grounded in place, material, and purpose — honest architecture that earns its context.'],
        ['Inclusive','We design for all users and all scales, from the individual room to the city block, always keeping people at the centre.'],
      ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[#E8E0D4]">
      @foreach($values as $i => [$title, $desc])
        <div class="bg-[#FAF7F3] p-8 lg:p-10" data-reveal>
          <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-4">{{ $title }}</h3>
          <p class="text-[#8B8275] text-sm leading-relaxed">{{ $desc }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ─── CLIENTS & COLLABORATORS ─────────────────────────────────────────── --}}
@php
  $aboutClients = [
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
    <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Clients & Collaborators</h2>
  </div>

  <div class="relative">
    <div class="absolute inset-y-0 left-0 w-28 z-10 pointer-events-none" style="background:linear-gradient(to right,#fff,transparent)"></div>
    <div class="absolute inset-y-0 right-0 w-28 z-10 pointer-events-none" style="background:linear-gradient(to left,#fff,transparent)"></div>

    <div class="flex gap-14 items-center about-client-marquee" style="background:#fff">
      @foreach([1,2] as $_)
        @foreach($aboutClients as $c)
          <div class="shrink-0 flex items-center justify-center about-client-logo" style="height:180px;min-width:240px;background:#fff;">
            <img src="{{ asset('images/clients/'.$c['file']) }}"
                 alt="{{ $c['name'] }}"
                 title="{{ $c['name'] }}"
                 style="max-height:150px;max-width:260px;width:auto;height:auto;object-fit:contain;mix-blend-mode:multiply;"
                 loading="lazy">
          </div>
        @endforeach
      @endforeach
    </div>
  </div>
</section>
<style>
  .about-client-marquee {
    animation: aboutClientScroll 55s linear infinite;
    width: max-content;
  }
  .about-client-marquee:hover { animation-play-state: paused; }
  .about-client-logo img { opacity: 0.8; transition: opacity 0.3s ease; }
  .about-client-logo:hover img { opacity: 1; }
  @keyframes aboutClientScroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
</style>

{{-- ─── TEAM ───────────────────────────────────────────────────────────── --}}
<section id="team" class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="flex items-end justify-between mb-14" data-reveal>
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">The People</p>
        <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Team</h2>
      </div>
      <a href="{{ url('/contact') }}?subject=careers"
         class="hidden md:flex items-center gap-3 text-[10px] uppercase tracking-[0.22em] border border-[#B5451B] text-[#B5451B] px-6 py-3 hover:bg-[#B5451B] hover:text-white transition-all duration-300">
        We are hiring →
      </a>
    </div>
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
    <div class="mt-12 md:hidden" data-reveal>
      <a href="{{ url('/contact') }}?subject=careers"
         class="flex items-center justify-center gap-3 text-[10px] uppercase tracking-[0.22em] border border-[#B5451B] text-[#B5451B] px-6 py-4 hover:bg-[#B5451B] hover:text-white transition-all duration-300 w-full">
        We are hiring →
      </a>
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

{{-- ─── JOIN THE TEAM ───────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-24 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-10" data-reveal>
    <div>
      <p class="text-[10px] uppercase tracking-[0.32em] text-[#B5451B] mb-4">Join Our Studio</p>
      <h2 class="font-display font-light text-display-md text-[#FAF7F3] leading-none mb-5">
        Build the future<br><em class="italic text-[#B5451B]">with us.</em>
      </h2>
      <p class="text-white/50 text-sm leading-relaxed max-w-lg">
        We are always looking for talented architects, designers, landscape architects, and BIM specialists to join our Pune studio. If you are passionate about design that makes a difference, we would love to hear from you.
      </p>
    </div>
    <a href="{{ url('/contact') }}?subject=careers"
       class="shrink-0 inline-block text-[10px] uppercase tracking-[0.22em] border border-white/30 text-white px-10 py-5 hover:bg-[#B5451B] hover:border-[#B5451B] transition-all duration-300">
      Join the Team →
    </a>
  </div>
</section>

@endsection
