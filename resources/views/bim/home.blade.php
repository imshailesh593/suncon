@extends('bim.layout')

@section('title', 'Suncon BIM — Architectural BIM Modeling & Coordination Services India')
@section('description', 'Architectural BIM modeling, Revit-based LOD 100–500 documentation, MEP coordination, and clash detection by Suncon Engineers. 25+ years, 500+ projects, Pune India.')

@section('content')

{{-- ── HERO ─────────────────────────────────────────────────────────────────── --}}
<section class="min-h-screen relative flex flex-col" data-dark style="background:#0A0A0A;">

  {{-- Subtle dot grid --}}
  <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle,rgba(255,255,255,0.045) 1px,transparent 1px);background-size:32px 32px;"></div>

  {{-- Bottom vignette --}}
  <div class="absolute inset-0 pointer-events-none" style="background:linear-gradient(to top,#0A0A0A 0%,transparent 40%);"></div>

  {{-- Content fills height --}}
  <div class="relative flex-1 flex flex-col max-w-screen-xl mx-auto w-full px-6 lg:px-12">

    {{-- Top badge --}}
    <div class="pt-36 pb-0" data-reveal>
      <div class="inline-flex items-center gap-2.5">
        <span class="w-1.5 h-1.5 rounded-full" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.35em]" style="color:#4E4A47;">Suncon Engineers — BIM Division</span>
      </div>
    </div>

    {{-- Massive headline --}}
    <div class="flex-1 flex flex-col justify-end pb-14">
      <h1 class="font-display leading-none mb-0" style="font-weight:200;font-size:clamp(5rem,17vw,15rem);letter-spacing:-0.04em;color:#F2EFE9;" data-reveal>
        Architectural
      </h1>
      <h1 class="font-display leading-none" style="font-weight:200;font-style:italic;font-size:clamp(5rem,17vw,15rem);letter-spacing:-0.04em;color:#B5451B;" data-reveal>
        BIM.
      </h1>

      {{-- Rule + description + CTAs --}}
      <div class="mt-10 pt-10 flex flex-col md:flex-row md:items-end justify-between gap-8" style="border-top:1px solid rgba(255,255,255,0.07);" data-reveal>
        <p class="text-base leading-relaxed max-w-lg" style="color:#6B6560;">
          Precision Revit modeling, intelligent MEP coordination, and LOD 100–500 documentation — from concept to construction. Backed by 25 years of architectural practice.
        </p>
        <div class="flex flex-wrap gap-3 shrink-0">
          <a href="{{ route('bim.contact') }}"
             class="text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-colors duration-250"
             style="background:#B5451B;color:#fff;"
             onmouseover="this.style.background='#8B3414'"
             onmouseout="this.style.background='#B5451B'">
            Request a Quote
          </a>
          <a href="{{ route('bim.services') }}"
             class="text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-all duration-250"
             style="border:1px solid rgba(255,255,255,0.16);color:#6B6560;"
             onmouseover="this.style.borderColor='rgba(255,255,255,0.5)';this.style.color='#F2EFE9'"
             onmouseout="this.style.borderColor='rgba(255,255,255,0.16)';this.style.color='#6B6560'">
            Explore Services
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- LOD badge strip --}}
  <div style="border-top:1px solid rgba(255,255,255,0.05);">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-4 flex gap-2 overflow-x-auto">
      @foreach(['LOD 100 — Concept','LOD 200 — Schematic','LOD 300 — Detailed','LOD 400 — Fabrication','LOD 500 — As-Built'] as $lod)
        <span class="shrink-0 text-[8px] uppercase tracking-[0.22em] px-4 py-1.5" style="border:1px solid rgba(255,255,255,0.08);color:#4E4A47;">{{ $lod }}</span>
      @endforeach
    </div>
  </div>
</section>

{{-- ── STATS ────────────────────────────────────────────────────────────────── --}}
<section style="background:#111111;border-top:1px solid rgba(255,255,255,0.05);border-bottom:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-2 md:grid-cols-4">
      @foreach([
        ['25+',  'Years of practice'],
        ['500+', 'BIM projects delivered'],
        ['50+',  'BIM professionals'],
        ['15+',  'Software platforms'],
      ] as $i => [$num, $label])
        <div class="px-8 lg:px-14 py-16 {{ $i > 0 ? 'border-l' : '' }}" style="{{ $i > 0 ? 'border-color:rgba(255,255,255,0.06);' : '' }}" data-reveal>
          <div class="font-display font-light leading-none mb-3" style="font-size:clamp(2.8rem,6vw,5.5rem);color:#F2EFE9;">{{ $num }}</div>
          <div class="text-[9px] uppercase tracking-[0.25em]" style="color:#4E4A47;">{{ $label }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── SERVICES (editorial list) ────────────────────────────────────────────── --}}
<section style="background:#0A0A0A;padding:100px 0;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-5">
          <span class="w-6 h-px" style="background:#B5451B;"></span>
          <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">What we deliver</span>
        </div>
        <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">BIM Services</h2>
      </div>
      <a href="{{ route('bim.services') }}" class="text-[10px] uppercase tracking-[0.25em] transition-colors duration-200" style="color:#4E4A47;" onmouseover="this.style.color='#F2EFE9'" onmouseout="this.style.color='#4E4A47'">All Services →</a>
    </div>

    {{-- Service rows --}}
    @php
      $services = [
        ['01', 'Architectural BIM Modeling', 'Revit-based 3D models from concept through construction documentation. LOD 100–400 delivered on schedule.', route('bim.services').'#arch-bim'],
        ['02', 'Structural BIM',             'RC and steel structure modeling with precise detailing for coordination and fabrication.',                   route('bim.services').'#structural'],
        ['03', 'MEP Coordination',           'Mechanical, Electrical, and Plumbing modeling with multi-discipline clash detection via Navisworks.',        route('bim.services').'#mep'],
        ['04', 'Scan to BIM',                'Point cloud data converted to accurate as-is Revit models for renovation and heritage projects.',            route('bim.services').'#scan'],
        ['05', 'CAD to BIM Migration',       'Legacy 2D AutoCAD drawings upgraded to fully coordinated, data-rich 3D BIM models.',                         route('bim.services').'#cad'],
        ['06', 'Construction Documentation', 'Shop drawings, as-built documentation, and coordination packages ready for site.',                           route('bim.services').'#docs'],
      ];
    @endphp

    @foreach($services as $svc)
      <a href="{{ $svc[3] }}" class="group block" data-reveal>
        <div class="flex items-center gap-6 py-7 transition-colors duration-250" style="border-top:1px solid rgba(255,255,255,0.06);"
             onmouseover="this.style.borderTopColor='rgba(181,69,27,0.5)'"
             onmouseout="this.style.borderTopColor='rgba(255,255,255,0.06)'">
          <span class="font-display font-light text-sm shrink-0 w-8" style="color:rgba(255,255,255,0.18);">{{ $svc[0] }}</span>
          <div class="flex-1 min-w-0 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-center">
            <div>
              <h3 class="font-display font-light text-xl md:text-2xl leading-tight transition-colors duration-250" style="color:#F2EFE9;" onmouseover="this.style.color='#B5451B'" onmouseout="this.style.color='#F2EFE9'">{{ $svc[1] }}</h3>
              <p class="text-sm mt-1.5 leading-relaxed" style="color:#4E4A47;">{{ $svc[2] }}</p>
            </div>
            <span class="shrink-0 text-sm transition-all duration-250 opacity-0 group-hover:opacity-100 translate-x-0 group-hover:translate-x-1" style="color:#B5451B;">→</span>
          </div>
        </div>
      </a>
    @endforeach
    {{-- Final border --}}
    <div style="border-top:1px solid rgba(255,255,255,0.06);"></div>
  </div>
</section>

{{-- ── SOFTWARE & TOOLS ─────────────────────────────────────────────────────── --}}
<section style="background:#111111;padding:100px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-20">

      <div data-reveal>
        <div class="flex items-center gap-3 mb-5">
          <span class="w-6 h-px" style="background:#B5451B;"></span>
          <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Technology</span>
        </div>
        <h2 class="font-display font-light text-display-md leading-none mb-6" style="color:#F2EFE9;">Software<br>&amp; Tools</h2>
        <p class="text-sm leading-relaxed" style="color:#4E4A47;">We work with the industry's leading BIM authoring, coordination, and documentation platforms.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4" data-reveal>
        @php
          $tools = [
            ['Autodesk Revit',      'BIM authoring'],
            ['Navisworks',          'Clash detection'],
            ['AutoCAD',             'CAD conversion'],
            ['BIM 360 / ACC',       'Cloud collaboration'],
            ['Dynamo',              'Visual programming'],
            ['Civil 3D',            'Site & infrastructure'],
            ['Bluebeam Revu',       'Markup & documentation'],
            ['Rhino + Grasshopper', 'Parametric geometry'],
          ];
        @endphp
        @foreach($tools as $i => $tool)
          @php
            $col = $i % 4;
            $row = intdiv($i, 4);
          @endphp
          <div class="px-6 py-8
                      {{ $col > 0 ? 'border-l' : '' }}
                      {{ $row > 0 ? 'border-t' : '' }}"
               style="{{ $col > 0 ? 'border-left-color:rgba(255,255,255,0.06);' : '' }}{{ $row > 0 ? 'border-top-color:rgba(255,255,255,0.06);' : '' }}">
            <p class="text-sm font-medium mb-1" style="color:#F2EFE9;">{{ $tool[0] }}</p>
            <p class="text-[10px]" style="color:#4E4A47;">{{ $tool[1] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── LOD FRAMEWORK ────────────────────────────────────────────────────────── --}}
<section style="background:#0A0A0A;padding:100px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Level of development</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">We model at<br><em style="color:#B5451B;">every LOD</em></h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-5" data-reveal>
      @php
        $lods = [
          ['LOD 100', 'Concept',     'Massing, orientation, and rough area. Early cost estimation and feasibility.'],
          ['LOD 200', 'Schematic',   'Approximate geometry and quantity. Design coordination can begin.'],
          ['LOD 300', 'Detailed',    'Accurate geometry and assemblies. Permit and construction documentation.'],
          ['LOD 400', 'Fabrication', 'Fabrication-ready detail. Shop drawings and construction sequencing.'],
          ['LOD 500', 'As-Built',    'Verified in-place conditions. Facility management handover package.'],
        ];
      @endphp
      @foreach($lods as $i => $lod)
        <div class="px-6 py-10 {{ $i > 0 ? 'border-l' : '' }} border-t"
             style="{{ $i > 0 ? 'border-left-color:rgba(255,255,255,0.06);' : '' }}border-top-color:rgba(255,255,255,0.06);">
          <div class="text-[10px] uppercase tracking-[0.3em] mb-4 font-medium" style="color:#B5451B;">{{ $lod[0] }}</div>
          <div class="font-display font-light text-xl mb-3" style="color:#F2EFE9;">{{ $lod[1] }}</div>
          <p class="text-xs leading-relaxed" style="color:#4E4A47;">{{ $lod[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── WHY SUNCON BIM ───────────────────────────────────────────────────────── --}}
<section style="background:#111111;padding:100px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Our advantage</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">Why Suncon BIM?</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
      @php
        $pillars = [
          ['25 Years of<br>Architectural Practice', 'Every model is produced within a full-service design studio. Real building experience, not just BIM production.'],
          ['Single-Source<br>Delivery',              'Architecture, structure, and MEP from one coordinated team. No gaps, no miscommunication between disciplines.'],
          ['ISO-Certified<br>QA Processes',          'Repeatable quality frameworks on every project — consistent deliverables regardless of project scale.'],
          ['India-wide<br>Reach',                    '15+ states. Residential, commercial, institutional, infrastructure — we have delivered across every major typology.'],
        ];
      @endphp
      @foreach($pillars as $i => $p)
        <div class="px-8 lg:px-10 py-12 {{ $i > 0 ? 'border-l' : '' }} border-t"
             style="{{ $i > 0 ? 'border-left-color:rgba(255,255,255,0.06);' : '' }}border-top-color:rgba(255,255,255,0.06);"
             data-reveal>
          <div class="font-display font-light text-6xl leading-none mb-8" style="color:rgba(181,69,27,0.14);">0{{ $i+1 }}</div>
          <h3 class="font-display font-light text-xl leading-snug mb-4" style="color:#F2EFE9;">{!! $p[0] !!}</h3>
          <p class="text-sm leading-relaxed" style="color:#4E4A47;">{{ $p[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── PROJECTS ─────────────────────────────────────────────────────────────── --}}
@if(isset($projects) && $projects->count())
<section style="background:#0A0A0A;padding:100px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16" data-reveal>
      <div>
        <div class="flex items-center gap-3 mb-5">
          <span class="w-6 h-px" style="background:#B5451B;"></span>
          <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Portfolio</span>
        </div>
        <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">BIM Projects</h2>
      </div>
      <a href="{{ url('/projects?discipline=bim') }}" class="text-[10px] uppercase tracking-[0.25em] transition-colors duration-200" style="color:#4E4A47;" onmouseover="this.style.color='#F2EFE9'" onmouseout="this.style.color='#4E4A47'">View All →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach($projects as $project)
        <a href="{{ url('/projects/'.$project->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] mb-4" style="background:#181818;">
            @if($project->image)
              <img src="{{ $project->imageUrl }}" alt="{{ $project->title }}"
                   class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" loading="lazy">
            @else
              <div class="w-full h-full" style="background:#1C1C1C;"></div>
            @endif
          </div>
          <h3 class="font-display font-light text-base leading-snug mb-1 transition-colors duration-200" style="color:#F2EFE9;" onmouseover="this.style.color='#B5451B'" onmouseout="this.style.color='#F2EFE9'">{{ $project->title }}</h3>
          @if($project->location)<p class="text-[9px] uppercase tracking-[0.15em]" style="color:#4E4A47;">{{ $project->location }}</p>@endif
        </a>
      @endforeach
    </div>
  </div>
</section>
@else
<section style="background:#0A0A0A;padding:80px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row md:items-center justify-between gap-8" data-reveal>
    <div>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">Portfolio</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">BIM Projects</h2>
    </div>
    <a href="{{ url('/projects?discipline=bim') }}"
       class="shrink-0 text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-all duration-250"
       style="border:1px solid rgba(255,255,255,0.16);color:#6B6560;"
       onmouseover="this.style.borderColor='rgba(255,255,255,0.5)';this.style.color='#F2EFE9'"
       onmouseout="this.style.borderColor='rgba(255,255,255,0.16)';this.style.color='#6B6560'">
      View BIM Portfolio
    </a>
  </div>
</section>
@endif

{{-- ── PROCESS ──────────────────────────────────────────────────────────────── --}}
<section style="background:#111111;padding:100px 0;border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="mb-16" data-reveal>
      <div class="flex items-center gap-3 mb-5">
        <span class="w-6 h-px" style="background:#B5451B;"></span>
        <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">How we work</span>
      </div>
      <h2 class="font-display font-light text-display-md leading-none" style="color:#F2EFE9;">Our Process</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
      @php
        $steps = [
          ['Brief & Scope',      'We review your drawings, point clouds, or models and agree on LOD, timeline, and deliverable format.'],
          ['BIM Execution Plan', 'A project-specific BEP covering naming conventions, coordinate systems, and handover milestones.'],
          ['Modeling & Review',  'Phased model delivery with clash reports and RFI logs at each milestone. Weekly coordination calls.'],
          ['Handover',           'Final Revit files, IFC exports, and as-built documentation — ready for facility management.'],
        ];
      @endphp
      @foreach($steps as $i => $step)
        <div class="px-8 lg:px-10 py-12 {{ $i > 0 ? 'border-l' : '' }} border-t"
             style="{{ $i > 0 ? 'border-left-color:rgba(255,255,255,0.06);' : '' }}border-top-color:rgba(255,255,255,0.06);"
             data-reveal>
          <div class="font-display font-light text-6xl leading-none mb-8" style="color:rgba(255,255,255,0.05);">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</div>
          <h3 class="font-display font-light text-lg mb-4" style="color:#F2EFE9;">{{ $step[0] }}</h3>
          <p class="text-sm leading-relaxed" style="color:#4E4A47;">{{ $step[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
