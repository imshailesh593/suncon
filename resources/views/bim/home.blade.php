@extends('bim.layout')
@php use Illuminate\Support\Str; @endphp

@section('title', 'Suncon BIM — Architectural BIM Modeling & Coordination Services India')
@section('description', 'Architectural BIM modeling, Revit-based LOD 100–500 documentation, MEP coordination, and clash detection by Suncon Engineers. 25+ years, 500+ projects, Pune India.')

@section('content')

{{-- ── HERO ─────────────────────────────────────────────────────────────────── --}}
<section class="min-h-screen relative flex flex-col" style="background:var(--bim-base);overflow:hidden;">

  {{-- Left 3px lime rail --}}
  <div class="absolute left-0 top-0 bottom-0 w-[3px]" style="background:#7EC8E8;z-index:2;"></div>

  {{-- Engineering grid overlay --}}
  <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(126,200,232,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(126,200,232,0.025) 1px,transparent 1px);background-size:64px 64px;"></div>

  {{-- Content --}}
  <div class="relative flex-1 flex flex-col max-w-screen-xl mx-auto w-full px-8 lg:px-16" style="z-index:1;">

    {{-- Eyebrow --}}
    <div class="pt-32 pb-0">
      <div class="inline-flex items-center gap-3">
        <span class="w-2 h-2 rounded-full" style="background:#7EC8E8;"></span>
        <span class="dm text-[9px] uppercase tracking-[0.38em]" style="color:var(--bim-muted);">Suncon Engineers — BIM Division</span>
      </div>
    </div>

    {{-- Main headline --}}
    <div class="flex-1 flex flex-col justify-end pb-14">
      <p class="dm text-[9px] uppercase tracking-[0.4em] mb-5" style="color:#7EC8E8;">Architectural</p>
      <h1 class="sg font-bold leading-[0.88] mb-0" style="font-size:clamp(4rem,14vw,12.5rem);letter-spacing:-0.03em;color:var(--bim-text);">
        BIM<span style="color:#7EC8E8;">.</span>
      </h1>

      <div class="mt-10 pt-10 flex flex-col md:flex-row md:items-end justify-between gap-8" style="border-top:1px solid var(--bim-border);">
        <p class="dm text-base leading-relaxed max-w-lg" style="color:var(--bim-muted);font-weight:300;">
          Precision Revit modeling, intelligent MEP coordination, and LOD 100–500 documentation — from concept to construction. Backed by 25 years of architectural practice.
        </p>
        <div class="flex flex-wrap gap-3 shrink-0">
          <a href="{{ route('bim.contact') }}"
             class="sg font-bold text-[10px] uppercase tracking-[0.2em] px-8 py-3.5 transition-opacity duration-200"
             style="background:#7EC8E8;color:var(--bim-text);"
             onmouseover="this.style.opacity='0.82'" onmouseout="this.style.opacity='1'">Request a Quote</a>
          <a href="{{ route('bim.services') }}"
             class="dm text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-all duration-200"
             style="border:1px solid var(--bim-border-lg);color:var(--bim-muted);"
             onmouseover="this.style.borderColor='var(--bim-muted)';this.style.color='var(--bim-text)'"
             onmouseout="this.style.borderColor='var(--bim-border-lg)';this.style.color='#6B7280'">Explore Services</a>
        </div>
      </div>
    </div>
  </div>

  {{-- LOD badge strip --}}
  <div style="border-top:1px solid var(--bim-border-sm);">
    <div class="max-w-screen-xl mx-auto px-8 lg:px-16 py-4 flex gap-2 overflow-x-auto">
      @foreach(['LOD 100 — Concept','LOD 200 — Schematic','LOD 300 — Detailed','LOD 400 — Fabrication','LOD 500 — As-Built'] as $lod)
        <span class="shrink-0 dm text-[8px] uppercase tracking-[0.28em] px-4 py-1.5" style="border:1px solid rgba(126,200,232,0.12);color:#3A4050;">{{ $lod }}</span>
      @endforeach
    </div>
  </div>
</section>

{{-- ── STATS ────────────────────────────────────────────────────────────────── --}}
@php
  $statItems = $stats->count()
    ? $stats->map(fn($s) => [$s->value.($s->suffix ?? ''), $s->label])->values()->all()
    : [['25+','Years of practice'],['500+','BIM projects delivered'],['50+','BIM professionals'],['15+','Software platforms']];
@endphp
<section style="background:var(--bim-surface);border-top:3px solid #7EC8E8;">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-2 md:grid-cols-4">
      @foreach($statItems as $i => [$num,$label])
        @php
          $cls = match($i) {
            0 => 'px-6 sm:px-10 lg:px-14 py-12 md:py-16',
            1 => 'px-6 sm:px-10 lg:px-14 py-12 md:py-16 border-l',
            2 => 'px-6 sm:px-10 lg:px-14 py-12 md:py-16 border-t md:border-t-0 md:border-l',
            3 => 'px-6 sm:px-10 lg:px-14 py-12 md:py-16 border-t md:border-t-0 border-l',
            default => 'px-6 sm:px-10 lg:px-14 py-12 md:py-16 border-l',
          };
        @endphp
        <div class="{{ $cls }}" style="border-color:var(--bim-border-sm);">
          <div class="sg font-bold leading-none mb-3" style="font-size:clamp(2.2rem,5vw,5rem);color:var(--bim-text);letter-spacing:-0.03em;">{{ $num }}</div>
          <div class="dm text-[9px] uppercase tracking-[0.28em]" style="color:var(--bim-muted);">{{ $label }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── SERVICES (editorial list) ────────────────────────────────────────────── --}}
<section style="background:var(--bim-base);padding:100px 0;">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
      <div>
        <div class="flex items-center gap-4 mb-5">
          <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
          <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">What we deliver</span>
        </div>
        <h2 class="sg font-bold leading-none" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">BIM Services</h2>
      </div>
      <a href="{{ route('bim.services') }}"
         class="dm text-[10px] uppercase tracking-[0.28em] transition-colors duration-200"
         style="color:var(--bim-muted);"
         onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='#6B7280'">All Services →</a>
    </div>

    @php
      $fallbackServices = [
        ['01','Architectural BIM Modeling','Revit-based 3D models from concept through construction documentation. LOD 100–400 delivered on schedule.','#arch-bim'],
        ['02','Structural BIM','RC and steel structure modeling with precise detailing for coordination and fabrication.','#structural'],
        ['03','MEP Coordination','Mechanical, Electrical, and Plumbing modeling with multi-discipline clash detection via Navisworks.','#mep'],
        ['04','Scan to BIM','Point cloud data converted to accurate as-is Revit models for renovation and heritage projects.','#scan'],
        ['05','CAD to BIM Migration','Legacy 2D AutoCAD drawings upgraded to fully coordinated, data-rich 3D BIM models.','#cad'],
        ['06','Construction Documentation','Shop drawings, as-built documentation, and coordination packages ready for site.','#docs'],
      ];
    @endphp

    @if($bimServices->count())
      @foreach($bimServices as $svc)
        <a href="{{ route('bim.services').'#'.$svc->slug }}" class="group block">
          <div class="flex items-center gap-6 py-7 bim-svc-row" style="border-top:1px solid var(--bim-border-sm);">
            <span class="dm text-[10px] shrink-0 w-8" style="color:var(--bim-ghost);">{{ str_pad($loop->iteration,2,'0',STR_PAD_LEFT) }}</span>
            <div class="flex-1 min-w-0 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-center">
              <div>
                <h3 class="sg font-semibold text-xl md:text-2xl leading-tight transition-colors duration-200" style="color:var(--bim-text);" onmouseover="this.style.color='#7EC8E8'" onmouseout="this.style.color='var(--bim-text)'">{{ $svc->title }}</h3>
                <p class="dm text-sm mt-1.5 leading-relaxed" style="color:var(--bim-muted);">{{ $svc->tagline ?? Str::limit($svc->description, 100) }}</p>
              </div>
              <span class="shrink-0 text-lg transition-all duration-200 opacity-0 group-hover:opacity-100" style="color:#7EC8E8;">→</span>
            </div>
          </div>
        </a>
      @endforeach
    @else
      @foreach($fallbackServices as $svc)
        <a href="{{ route('bim.services').$svc[3] }}" class="group block">
          <div class="flex items-center gap-6 py-7 bim-svc-row" style="border-top:1px solid var(--bim-border-sm);">
            <span class="dm text-[10px] shrink-0 w-8" style="color:var(--bim-ghost);">{{ $svc[0] }}</span>
            <div class="flex-1 min-w-0 grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-center">
              <div>
                <h3 class="sg font-semibold text-xl md:text-2xl leading-tight transition-colors duration-200" style="color:var(--bim-text);" onmouseover="this.style.color='#7EC8E8'" onmouseout="this.style.color='var(--bim-text)'">{{ $svc[1] }}</h3>
                <p class="dm text-sm mt-1.5 leading-relaxed" style="color:var(--bim-muted);">{{ $svc[2] }}</p>
              </div>
              <span class="shrink-0 text-lg transition-all duration-200 opacity-0 group-hover:opacity-100" style="color:#7EC8E8;">→</span>
            </div>
          </div>
        </a>
      @endforeach
    @endif
    <div style="border-top:1px solid var(--bim-border-sm);"></div>
  </div>
</section>

{{-- ── SOFTWARE & TOOLS ─────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-surface);padding:100px 0;border-top:1px solid var(--bim-border-sm);border-bottom:1px solid var(--bim-border-sm);">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-20">

      <div>
        <div class="flex items-center gap-4 mb-5">
          <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
          <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Technology</span>
        </div>
        <h2 class="sg font-bold leading-none mb-6" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">Software<br>&amp; Tools</h2>
        <p class="dm text-sm leading-relaxed" style="color:var(--bim-muted);">The industry's leading BIM authoring, coordination, and documentation platforms.</p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4">
        @php
          $tools = [
            ['Autodesk Revit','BIM authoring'],
            ['Navisworks','Clash detection'],
            ['AutoCAD','CAD conversion'],
            ['BIM 360 / ACC','Cloud collaboration'],
            ['Dynamo','Visual programming'],
            ['Civil 3D','Site & infrastructure'],
            ['Bluebeam Revu','Markup & docs'],
            ['Rhino + Grasshopper','Parametric geometry'],
          ];
        @endphp
        @foreach($tools as $i => $tool)
          @php
            $col2 = $i % 2;
            $col4 = $i % 4;
            $row2 = intdiv($i, 2);
            $borderL = $col2 > 0 ? 'border-l' : '';
            $borderL4 = $col4 > 0 && $col2 === 0 ? 'sm:border-l' : '';
            $borderT = $row2 > 0 ? 'border-t' : '';
          @endphp
          <div class="px-5 sm:px-6 py-8 {{ $borderL }} {{ $borderL4 }} {{ $borderT }}"
               style="border-color:var(--bim-border-sm);">
            <p class="sg font-medium text-sm mb-1" style="color:var(--bim-text);">{{ $tool[0] }}</p>
            <p class="dm text-[10px]" style="color:var(--bim-muted);">{{ $tool[1] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ── LOD FRAMEWORK ────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-base);padding:100px 0;">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-16 items-center mb-16">
      <div>
        <div class="flex items-center gap-4 mb-5">
          <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
          <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Level of development</span>
        </div>
        <h2 class="sg font-bold leading-none" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">We model at<br><span style="color:#7EC8E8;">every LOD</span></h2>
      </div>
      <div class="overflow-hidden" style="aspect-ratio:16/9;">
        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=900&q=85&auto=format&fit=crop"
             alt="Architectural BIM model"
             class="w-full h-full object-cover" loading="lazy">
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5">
      @php
        $lods = [
          ['LOD 100','Concept','Massing, orientation, and rough area. Early cost estimation and feasibility.'],
          ['LOD 200','Schematic','Approximate geometry and quantity. Design coordination can begin.'],
          ['LOD 300','Detailed','Accurate geometry and assemblies. Permit and construction documentation.'],
          ['LOD 400','Fabrication','Fabrication-ready detail. Shop drawings and construction sequencing.'],
          ['LOD 500','As-Built','Verified in-place conditions. Facility management handover package.'],
        ];
      @endphp
      @foreach($lods as $i => $lod)
        @php
          $cls = 'px-6 py-10 border-t';
          if ($i === 0) $cls .= ' sm:border-t-0 lg:border-t';
          if ($i === 1) $cls .= ' sm:border-t-0 sm:border-l lg:border-t lg:border-l';
          if ($i === 2) $cls .= ' sm:border-l-0 lg:border-l';
          if ($i === 3) $cls .= ' sm:border-l lg:border-l';
          if ($i === 4) $cls .= ' sm:border-l-0 lg:border-l';
        @endphp
        <div class="{{ $cls }}" style="border-color:var(--bim-border-sm);">
          <div class="sg font-bold text-[10px] uppercase tracking-[0.3em] mb-4" style="color:#7EC8E8;">{{ $lod[0] }}</div>
          <div class="sg font-semibold text-lg mb-3" style="color:var(--bim-text);">{{ $lod[1] }}</div>
          <p class="dm text-xs leading-relaxed" style="color:var(--bim-muted);">{{ $lod[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── WHY SUNCON BIM ────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-surface);border-top:1px solid var(--bim-border-sm);">
  <div class="flex flex-col lg:flex-row">

    {{-- Image panel --}}
    <div class="lg:w-[42%] shrink-0 overflow-hidden" style="min-height:500px;">
      <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=900&q=85&auto=format&fit=crop"
           alt="Architecture studio interior"
           class="w-full h-full object-cover" loading="lazy">
    </div>

    {{-- Pillars --}}
    <div class="flex-1 px-8 lg:px-16 py-20">
      <div class="max-w-xl">
        <div class="flex items-center gap-4 mb-5">
          <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
          <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Our advantage</span>
        </div>
        <h2 class="sg font-bold leading-none mb-14" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">Why Suncon BIM?</h2>

        <div class="flex flex-col gap-0">
          @php
            $pillars = [
              ['25 Years of Architectural Practice','Every model is produced within a full-service design studio. Real building experience, not just BIM production.'],
              ['Single-Source Delivery','Architecture, structure, and MEP from one coordinated team. No gaps, no miscommunication between disciplines.'],
              ['ISO-Certified QA Processes','Repeatable quality frameworks on every project — consistent deliverables regardless of project scale.'],
              ['India-wide Reach','15+ states. Residential, commercial, institutional, infrastructure — delivered across every major typology.'],
            ];
          @endphp
          @foreach($pillars as $i => $p)
            <div class="py-7 {{ $i>0?'border-t':'' }}" style="{{ $i>0?'border-color:var(--bim-border-sm);':'' }}">
              <div class="flex items-start gap-5">
                <span class="sg font-bold text-sm shrink-0 mt-0.5" style="color:rgba(126,200,232,0.35);">0{{ $i+1 }}</span>
                <div>
                  <h3 class="sg font-semibold text-lg mb-2" style="color:var(--bim-text);">{{ $p[0] }}</h3>
                  <p class="dm text-sm leading-relaxed" style="color:var(--bim-muted);">{{ $p[1] }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── PROJECTS ─────────────────────────────────────────────────────────────── --}}
@if(isset($projects) && $projects->count())
<section style="background:var(--bim-base);padding:100px 0;border-top:1px solid var(--bim-border-sm);">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
      <div>
        <div class="flex items-center gap-4 mb-5">
          <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
          <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Portfolio</span>
        </div>
        <h2 class="sg font-bold leading-none" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">BIM Projects</h2>
      </div>
      <a href="{{ url('/projects?discipline=bim') }}"
         class="dm text-[10px] uppercase tracking-[0.28em] transition-colors duration-200"
         style="color:var(--bim-muted);"
         onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='#6B7280'">View All →</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach($projects as $project)
        <a href="{{ url('/projects/'.$project->slug) }}" class="group block">
          <div class="overflow-hidden aspect-[4/3] mb-4" style="background:var(--bim-lift);">
            @if($project->image)
              <img src="{{ $project->imageUrl }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" loading="lazy">
            @else
              <div class="w-full h-full" style="background:#1C2030;"></div>
            @endif
          </div>
          <h3 class="sg font-semibold text-base leading-snug mb-1 transition-colors duration-200" style="color:var(--bim-text);" onmouseover="this.style.color='#7EC8E8'" onmouseout="this.style.color='var(--bim-text)'">{{ $project->title }}</h3>
          @if($project->location)<p class="dm text-[9px] uppercase tracking-[0.15em]" style="color:var(--bim-muted);">{{ $project->location }}</p>@endif
        </a>
      @endforeach
    </div>
  </div>
</section>
@else
<section style="background:var(--bim-base);padding:80px 0;border-top:1px solid var(--bim-border-sm);">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row md:items-center justify-between gap-8">
    <div>
      <div class="flex items-center gap-4 mb-5">
        <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
        <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">Portfolio</span>
      </div>
      <h2 class="sg font-bold leading-none" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">BIM Projects</h2>
    </div>
    <a href="{{ url('/projects?discipline=bim') }}"
       class="dm shrink-0 text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-all duration-200"
       style="border:1px solid var(--bim-border-lg);color:var(--bim-muted);"
       onmouseover="this.style.borderColor='var(--bim-muted)';this.style.color='var(--bim-text)'"
       onmouseout="this.style.borderColor='var(--bim-border-lg)';this.style.color='#6B7280'">
      View BIM Portfolio
    </a>
  </div>
</section>
@endif

{{-- ── PROCESS ──────────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-surface);padding:100px 0;border-top:1px solid var(--bim-border-sm);">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="mb-16">
      <div class="flex items-center gap-4 mb-5">
        <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
        <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">How we work</span>
      </div>
      <h2 class="sg font-bold leading-none" style="font-size:clamp(2rem,4vw,3.5rem);color:var(--bim-text);letter-spacing:-0.02em;">Our Process</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
      @php
        $steps = [
          ['Brief & Scope','We review your drawings, point clouds, or models and agree on LOD, timeline, and deliverable format.'],
          ['BIM Execution Plan','A project-specific BEP covering naming conventions, coordinate systems, and handover milestones.'],
          ['Modeling & Review','Phased model delivery with clash reports and RFI logs at each milestone. Weekly coordination calls.'],
          ['Handover','Final Revit files, IFC exports, and as-built documentation — ready for facility management.'],
        ];
      @endphp
      @foreach($steps as $i => $step)
        @php
          $cls = 'px-8 lg:px-10 py-12 border-t';
          if ($i === 0) $cls .= ' md:border-t-0';
          if ($i === 1) $cls .= ' md:border-t-0 md:border-l lg:border-l';
          if ($i === 2) $cls .= ' md:border-l-0 lg:border-l';
          if ($i === 3) $cls .= ' md:border-l lg:border-l';
        @endphp
        <div class="{{ $cls }}" style="border-color:var(--bim-border-sm);">
          <div class="sg font-bold mb-8 leading-none" style="font-size:clamp(3rem,6vw,5rem);color:rgba(126,200,232,0.08);letter-spacing:-0.04em;">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</div>
          <h3 class="sg font-semibold text-lg mb-4" style="color:var(--bim-text);">{{ $step[0] }}</h3>
          <p class="dm text-sm leading-relaxed" style="color:var(--bim-muted);">{{ $step[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<style>
.bim-svc-row:hover { border-top-color: rgba(126,200,232,0.35) !important; }
</style>

@endsection
