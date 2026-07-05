@extends('bim.layout')

@section('title', 'Suncon BIM — Architectural BIM Modeling & Coordination Services India')
@section('description', 'Architectural BIM modeling, Revit-based LOD 100–500 documentation, MEP coordination, and clash detection by Suncon Engineers. 25+ years, 500+ projects, Pune India.')

@section('content')

{{-- ── HERO ─────────────────────────────────────────────────────────────────── --}}
<section class="min-h-screen relative flex flex-col" data-dark style="background:#060F1E;">

  {{-- Technical grid overlay --}}
  <div class="absolute inset-0 pointer-events-none" style="
    background-image:
      linear-gradient(rgba(42,110,212,0.07) 1px, transparent 1px),
      linear-gradient(90deg, rgba(42,110,212,0.07) 1px, transparent 1px);
    background-size: 56px 56px;
  "></div>

  {{-- Radial glow --}}
  <div class="absolute inset-0 pointer-events-none" style="background:radial-gradient(ellipse 65% 55% at 65% 45%, rgba(30,91,173,0.18) 0%, transparent 70%);"></div>

  {{-- Content --}}
  <div class="relative flex-1 flex flex-col justify-center max-w-screen-xl mx-auto w-full px-6 lg:px-12 pt-32 pb-16">

    {{-- Badge --}}
    <div class="inline-flex items-center gap-3 mb-10 self-start" style="border:1px solid rgba(42,110,212,0.35);padding:8px 16px;" data-reveal>
      <span class="w-1.5 h-1.5 rounded-full" style="background:#B5451B;"></span>
      <span class="text-[9px] uppercase tracking-[0.32em]" style="color:#8BA3C4;">Powered by Suncon Engineers · Est. 1999</span>
    </div>

    {{-- Headline --}}
    <div class="max-w-4xl">
      <h1 class="font-display font-light text-display-xl leading-none mb-8 word-split" data-reveal style="color:#EEF3FF;">
        Architectural<br>
        <em class="font-light" style="color:#B5451B;">BIM Services</em>
      </h1>

      <p class="text-lg leading-relaxed max-w-2xl mb-12" style="color:#8BA3C4;" data-reveal>
        Precision Revit modeling, intelligent MEP coordination, and LOD 100–500 documentation — from concept to construction. Delivered by India's multidisciplinary design studio.
      </p>

      {{-- CTAs --}}
      <div class="flex flex-wrap gap-4" data-reveal>
        <a href="{{ route('bim.contact') }}"
           class="text-[11px] uppercase tracking-[0.22em] px-9 py-4 transition-colors duration-300"
           style="background:#B5451B;color:#fff;"
           onmouseover="this.style.background='#8B3414'"
           onmouseout="this.style.background='#B5451B'">
          Request a Quote
        </a>
        <a href="{{ route('bim.services') }}"
           class="text-[11px] uppercase tracking-[0.22em] px-9 py-4 transition-all duration-300"
           style="border:1px solid rgba(42,110,212,0.4);color:#8BA3C4;"
           onmouseover="this.style.borderColor='#EEF3FF';this.style.color='#EEF3FF'"
           onmouseout="this.style.borderColor='rgba(42,110,212,0.4)';this.style.color='#8BA3C4'">
          Explore Services
        </a>
      </div>
    </div>

    {{-- LOD badges --}}
    <div class="mt-16 flex flex-wrap gap-2" data-reveal>
      @foreach(['LOD 100','LOD 200','LOD 300','LOD 400','LOD 500'] as $lod)
        <span class="text-[8px] uppercase tracking-[0.25em] px-3 py-1.5" style="border:1px solid rgba(42,110,212,0.25);color:#4A6A8A;">{{ $lod }}</span>
      @endforeach
    </div>
  </div>

  {{-- Stats strip --}}
  <div class="relative" style="border-top:1px solid rgba(42,110,212,0.2);background:rgba(11,24,40,0.7);">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-2 md:grid-cols-4" style="divide:rgba(42,110,212,0.18);">
        @foreach([
          ['25+',  'Years Experience'],
          ['500+', 'BIM Projects'],
          ['50+',  'BIM Professionals'],
          ['15+',  'Software Tools'],
        ] as $i => [$num, $label])
          <div class="px-6 lg:px-10 py-7 text-center {{ $i > 0 ? 'border-l' : '' }}" style="{{ $i > 0 ? 'border-color:rgba(42,110,212,0.18);' : '' }}">
            <div class="font-display font-light text-4xl" style="color:#EEF3FF;">{{ $num }}</div>
            <div class="text-[8px] uppercase tracking-[0.25em] mt-1.5" style="color:#4A6A8A;">{{ $label }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── SERVICES ─────────────────────────────────────────────────────────────── --}}
<section style="background:#0B1828;padding:96px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    {{-- Section header --}}
    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">What We Deliver</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">
        BIM Services
      </h2>
    </div>

    {{-- Services grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" style="gap:1px;background:rgba(42,110,212,0.12);">
      @php
        $services = [
          ['01', 'Architectural BIM Modeling', 'Revit-based 3D models from concept through construction documentation. LOD 100–400 delivered on schedule.', ['Revit 3D models','Floor plans & elevations','Sections & details','LOD documentation']],
          ['02', 'Structural BIM', 'Reinforced concrete and steel structure modeling with precise detailing for coordination and fabrication.', ['RC & steel framing','Foundation modeling','Reinforcement detailing','Structural reports']],
          ['03', 'MEP Coordination', 'Mechanical, Electrical, and Plumbing modeling with multi-discipline clash detection using Navisworks.', ['MEP Revit models','Clash detection reports','RFI management','Coordination drawings']],
          ['04', 'Scan to BIM', 'Point cloud data from laser scans converted to accurate, as-is Revit models for renovation and heritage projects.', ['Point cloud processing','As-built Revit models','LOD 300–500 accuracy','Survey-grade precision']],
          ['05', 'CAD to BIM Migration', 'Legacy 2D AutoCAD drawings upgraded to fully coordinated, data-rich 3D BIM models.', ['2D-to-3D conversion','Data enrichment','Family creation','Standards compliance']],
          ['06', 'Construction Documentation', 'Shop drawings, as-built documentation, and coordination packages ready for fabrication and site use.', ['Shop drawings','As-built models','RFI packages','Annotated plans']],
        ];
      @endphp

      @foreach($services as $svc)
        <div class="p-10 lg:p-12 flex flex-col group transition-all duration-300" style="background:#0B1828;" onmouseover="this.style.background='#0F2040'" onmouseout="this.style.background='#0B1828'" data-reveal>
          <div class="flex items-start justify-between mb-6">
            <span class="font-display font-light text-4xl" style="color:rgba(42,110,212,0.35);">{{ $svc[0] }}</span>
            <span class="w-5 h-px mt-3" style="background:rgba(181,69,27,0.5);transition:width 0.3s;"></span>
          </div>
          <h3 class="font-display font-light text-xl mb-4 leading-snug" style="color:#EEF3FF;">{{ $svc[1] }}</h3>
          <p class="text-sm leading-relaxed mb-8" style="color:#4A6A8A;">{{ $svc[2] }}</p>
          <ul class="mt-auto flex flex-col gap-2.5">
            @foreach($svc[3] as $item)
              <li class="flex items-center gap-2.5">
                <span class="w-1 h-1 rounded-full shrink-0" style="background:#2A6ED4;"></span>
                <span class="text-[11px] uppercase tracking-[0.15em]" style="color:#6B83A4;">{{ $item }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>

    <div class="mt-10 text-right">
      <a href="{{ route('bim.services') }}" class="text-[10px] uppercase tracking-[0.25em] transition-colors" style="color:#4A6A8A;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#4A6A8A'">All Services →</a>
    </div>
  </div>
</section>

{{-- ── SOFTWARE TOOLS ───────────────────────────────────────────────────────── --}}
<section style="background:#060F1E;padding:80px 0;border-top:1px solid rgba(42,110,212,0.12);border-bottom:1px solid rgba(42,110,212,0.12);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-start gap-16">

      {{-- Label --}}
      <div class="md:w-72 shrink-0" data-reveal>
        <div class="flex items-center gap-3 mb-5">
          <span class="w-6 h-px" style="background:#B5451B;"></span>
          <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">Technology</span>
        </div>
        <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">Software<br>&amp; Tools</h2>
        <p class="mt-6 text-sm leading-relaxed" style="color:#4A6A8A;">We work with the industry's leading BIM authoring, coordination, and documentation platforms.</p>
      </div>

      {{-- Tool grid --}}
      <div class="flex-1 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-px" style="background:rgba(42,110,212,0.1);" data-reveal>
        @php
          $tools = [
            ['Autodesk Revit',     'Primary BIM authoring'],
            ['Navisworks Manage',  'Clash detection & review'],
            ['AutoCAD',            'CAD conversion & drafting'],
            ['BIM 360 / ACC',      'Cloud collaboration'],
            ['Dynamo',             'Visual programming'],
            ['Civil 3D',           'Site & infrastructure'],
            ['Bluebeam Revu',      'Markup & documentation'],
            ['Rhino + Grasshopper','Parametric geometry'],
          ];
        @endphp
        @foreach($tools as $tool)
          <div class="px-6 py-7" style="background:#060F1E;">
            <p class="text-sm font-medium mb-1" style="color:#EEF3FF;">{{ $tool[0] }}</p>
            <p class="text-[10px]" style="color:#4A6A8A;">{{ $tool[1] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── LOD STRIP ────────────────────────────────────────────────────────────── --}}
<section style="background:#0B1828;padding:80px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="mb-14" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">Level of Development</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">We model at<br><em style="color:#B5451B;">every LOD</em></h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-5 gap-px" style="background:rgba(42,110,212,0.12);" data-reveal>
      @php
        $lods = [
          ['LOD 100', 'Concept', 'Basic massing and orientation. Area calculations and cost estimation.'],
          ['LOD 200', 'Schematic', 'Approximate size, shape, location, and quantity. Coordination begins.'],
          ['LOD 300', 'Detailed', 'Accurate geometry, specific assemblies. Permit and construction sets.'],
          ['LOD 400', 'Fabrication', 'Fabrication-ready detail. Shop drawings and sequencing information.'],
          ['LOD 500', 'As-Built', 'Verified in-place conditions. Facility management and maintenance data.'],
        ];
      @endphp
      @foreach($lods as $i => $lod)
        <div class="px-6 py-8 relative" style="background:#0B1828;">
          <div class="text-[8px] uppercase tracking-[0.3em] mb-3" style="color:#2A6ED4;">{{ $lod[0] }}</div>
          <div class="font-display font-light text-lg mb-3" style="color:#EEF3FF;">{{ $lod[1] }}</div>
          <p class="text-xs leading-relaxed" style="color:#4A6A8A;">{{ $lod[2] }}</p>
          @if($i < count($lods) - 1)
            <div class="hidden sm:block absolute right-0 top-1/2 -translate-y-1/2 text-[10px] translate-x-1/2 z-10" style="color:#2A6ED4;">›</div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── WHY SUNCON BIM ───────────────────────────────────────────────────────── --}}
<section style="background:#060F1E;padding:96px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">Our Advantage</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">Why Suncon BIM?</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px" style="background:rgba(42,110,212,0.12);" data-reveal>
      @php
        $pillars = [
          ['25 Years of Practice',      'Our BIM team operates from within a full-service architecture studio — every model is informed by real design and site experience.'],
          ['Single-Source Delivery',    'Architecture, structure, and MEP from one coordinated team. No hand-off gaps, no miscommunication.'],
          ['ISO-Certified Processes',   'Repeatable QA/QC workflows on every project. Consistent deliverables regardless of scale or complexity.'],
          ['India-wide Project Reach',  'Active projects across 15+ Indian states with experience in residential, commercial, institutional, and infrastructure typologies.'],
        ];
      @endphp
      @foreach($pillars as $i => $p)
        <div class="p-10 lg:p-12" style="background:#060F1E;" data-reveal>
          <div class="font-display font-light text-5xl mb-6" style="color:rgba(42,110,212,0.25);">0{{ $i + 1 }}</div>
          <h3 class="font-display font-light text-lg mb-4 leading-snug" style="color:#EEF3FF;">{{ $p[0] }}</h3>
          <p class="text-sm leading-relaxed" style="color:#4A6A8A;">{{ $p[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── PROJECTS ─────────────────────────────────────────────────────────────── --}}
@if(isset($projects) && $projects->count())
<section style="background:#0B1828;padding:96px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-5">
          <span class="w-6 h-px" style="background:#B5451B;"></span>
          <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">Portfolio</span>
        </div>
        <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">BIM Projects</h2>
      </div>
      <a href="{{ url('/projects?discipline=bim') }}" class="shrink-0 text-[10px] uppercase tracking-[0.25em] transition-colors" style="color:#4A6A8A;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#4A6A8A'">View All Projects →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($projects as $project)
        <a href="{{ url('/projects/'.$project->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] mb-4" style="background:#0F2040;">
            @if($project->image)
              <img src="{{ $project->imageUrl }}"
                   alt="{{ $project->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                   loading="lazy">
            @else
              <div class="w-full h-full" style="background:linear-gradient(135deg, #0F2040 0%, #1E3A60 100%);"></div>
            @endif
          </div>
          <h3 class="font-display font-light text-base leading-snug mb-1 transition-colors duration-300" style="color:#EEF3FF;" onmouseover="this.style.color='#B5451B'" onmouseout="this.style.color='#EEF3FF'">
            {{ $project->title }}
          </h3>
          @if($project->location)
            <p class="text-[9px] uppercase tracking-[0.15em]" style="color:#4A6A8A;">{{ $project->location }}</p>
          @endif
        </a>
      @endforeach
    </div>
  </div>
</section>
@else
{{-- Teaser if no BIM projects in DB yet --}}
<section style="background:#0B1828;padding:80px 0;border-top:1px solid rgba(42,110,212,0.12);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 text-center" data-reveal>
    <p class="text-[9px] uppercase tracking-[0.3em] mb-5" style="color:#4A6A8A;">Portfolio</p>
    <h2 class="font-display font-light text-display-md leading-none mb-6" style="color:#EEF3FF;">BIM Projects</h2>
    <p class="text-sm mb-10" style="color:#4A6A8A;">Explore our full portfolio of BIM work across architecture, structure, and MEP disciplines.</p>
    <a href="{{ url('/projects?discipline=bim') }}" class="inline-block text-[11px] uppercase tracking-[0.22em] px-10 py-4 transition-all duration-300" style="border:1px solid rgba(42,110,212,0.35);color:#8BA3C4;" onmouseover="this.style.borderColor='#EEF3FF';this.style.color='#EEF3FF'" onmouseout="this.style.borderColor='rgba(42,110,212,0.35)';this.style.color='#8BA3C4'">
      View BIM Portfolio
    </a>
  </div>
</section>
@endif

{{-- ── PROCESS ──────────────────────────────────────────────────────────────── --}}
<section style="background:#060F1E;padding:96px 0;border-top:1px solid rgba(42,110,212,0.12);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">How We Work</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#EEF3FF;">Our Process</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px" style="background:rgba(42,110,212,0.12);" data-reveal>
      @php
        $steps = [
          ['Brief & Scope',     'We review your drawings, point clouds, or existing models and agree on LOD, timeline, and deliverable format.'],
          ['BIM Execution Plan','A project-specific BEP is issued covering naming conventions, coordinate systems, clash avoidance zones, and handover milestones.'],
          ['Modeling & Review', 'Phased model delivery with clash reports and RFI logs at each milestone. Weekly coordination calls as required.'],
          ['Handover',          'Final native Revit files, IFC exports, linked PDFs, and as-built documentation — ready for facility management.'],
        ];
      @endphp
      @foreach($steps as $i => $step)
        <div class="px-8 py-10 relative" style="background:#060F1E;" data-reveal>
          <div class="font-display font-light text-5xl mb-6 leading-none" style="color:rgba(42,110,212,0.2);">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
          <h3 class="font-display font-light text-lg mb-4" style="color:#EEF3FF;">{{ $step[0] }}</h3>
          <p class="text-sm leading-relaxed" style="color:#4A6A8A;">{{ $step[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
