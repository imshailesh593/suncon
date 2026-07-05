@extends('bim.layout')

@section('title', 'BIM Services — Revit Modeling, MEP Coordination, Scan to BIM | Suncon BIM')
@section('description', 'Architectural BIM, Structural BIM, MEP coordination, Scan to BIM, CAD to BIM, and construction documentation services by Suncon Engineers. LOD 100–500 delivery across India.')

@section('content')

{{-- ── PAGE HEADER ──────────────────────────────────────────────────────────── --}}
<section style="background:#060F1E;padding-top:140px;padding-bottom:80px;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex items-center gap-3 mb-6" data-reveal>
      <span class="w-6 h-px" style="background:#B5451B;"></span>
      <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4A6A8A;">What We Deliver</span>
    </div>
    <h1 class="font-display font-light text-display-lg leading-none" style="color:#EEF3FF;" data-reveal>Our Services</h1>
    <p class="mt-8 text-lg leading-relaxed max-w-2xl" style="color:#8BA3C4;" data-reveal>
      A full-stack BIM practice backed by 25 years of architectural expertise. Every service is delivered in-house by our Pune-based team.
    </p>
  </div>
</section>

{{-- ── SERVICES DETAIL ──────────────────────────────────────────────────────── --}}
@php
  $services = [
    [
      'id'       => 'arch-bim',
      'number'   => '01',
      'title'    => 'Architectural BIM Modeling',
      'lead'     => 'Revit-based 3D architectural models delivered at any LOD — from concept massing through permit and construction documentation.',
      'body'     => 'Our architectural BIM team produces coordinated Revit models that serve as the single source of truth for your project. Starting from schematic 2D drawings, point clouds, or design intent sketches, we develop models that evolve with your project — from LOD 100 concept massing through LOD 400 construction-ready documentation.',
      'delivers' => ['LOD 100–400 Revit models','Coordinated floor plans, sections & elevations','3D sections and interior views','Model-based quantity extraction','IFC & DWG export packages'],
      'formats'  => 'Input: DWG, PDF, SKP, IFC, point cloud. Output: RVT, IFC, DWG, PDF.',
    ],
    [
      'id'       => 'structural',
      'number'   => '02',
      'title'    => 'Structural BIM',
      'lead'     => 'Reinforced concrete and structural steel modeling with precise detailing for design coordination and fabrication.',
      'body'     => 'Working from structural engineer\'s calculation packages and design drawings, we produce fully detailed Revit structural models that integrate seamlessly with architectural and MEP disciplines. Our structural models support clash detection, reinforcement scheduling, and formwork calculation.',
      'delivers' => ['RC column, beam & slab modeling','Steel framing and connection details','Foundation and pile cap modeling','Reinforcement LOD 300–400','Structural quantity take-off reports'],
      'formats'  => 'Input: DWG, PDF structural GAs. Output: RVT, IFC, DWG.',
    ],
    [
      'id'       => 'mep',
      'number'   => '03',
      'title'    => 'MEP BIM Coordination',
      'lead'     => 'Mechanical, Electrical, and Plumbing modeling with multi-discipline clash detection using Navisworks Manage.',
      'body'     => 'MEP coordination is where BIM delivers its greatest ROI — catching clashes before they become site problems. We produce discipline-specific Revit MEP models and federate them with the architectural and structural models. Navisworks clash reports are issued at agreed milestones with RFI logs for resolution tracking.',
      'delivers' => ['HVAC duct and pipe routing models','Electrical containment and cable tray','Plumbing and drainage systems','Navisworks clash detection reports','RFI log and coordination drawings'],
      'formats'  => 'Input: DWG, PDF schematic drawings. Output: RVT, NWC, IFC, clash PDF reports.',
    ],
    [
      'id'       => 'scan',
      'number'   => '04',
      'title'    => 'Scan to BIM',
      'lead'     => 'Point cloud data from terrestrial laser scanners converted to accurate, as-is Revit models for renovation, retrofit, and heritage projects.',
      'body'     => 'Existing building documentation is one of BIM\'s most powerful applications. We process raw scan data (RCP, E57, PTX) through registration and clean-up, then model architectural elements, structural members, and MEP systems with survey-grade accuracy. Ideal for building owners, renovators, and facility managers.',
      'delivers' => ['Point cloud registration & clean-up','As-is Revit model (LOD 300–500)','As-built floor plans & sections','Deviation analysis reports','Heritage documentation packages'],
      'formats'  => 'Input: RCP, E57, PTX, LAS point clouds. Output: RVT, IFC, DWG, PDF.',
    ],
    [
      'id'       => 'cad',
      'number'   => '05',
      'title'    => 'CAD to BIM Migration',
      'lead'     => 'Legacy 2D AutoCAD drawings upgraded to fully coordinated, data-rich 3D BIM models — preserving your existing design intent.',
      'body'     => 'Whether you have a library of historic drawings or a current project delivered in 2D CAD, we extract and re-build geometry in Revit with full data attribution. Our CAD-to-BIM workflows follow client BIM execution plans and Revit standards for naming, families, and shared parameters.',
      'delivers' => ['2D CAD to 3D Revit conversion','Custom family creation','Shared parameter assignment','Standards-compliant modeling','LOD 200–300 output packages'],
      'formats'  => 'Input: DWG, DXF, PDF, DGN. Output: RVT, IFC, DWG.',
    ],
    [
      'id'       => 'docs',
      'number'   => '06',
      'title'    => 'Construction Documentation',
      'lead'     => 'Shop drawings, as-built documentation, and coordination packages — produced directly from BIM models for accuracy and consistency.',
      'body'     => 'Model-based construction documentation eliminates the drift between design and site. We produce sheet sets, shop drawing packages, and as-built documentation extracted directly from coordinated Revit models. All drawings carry model-consistent dimensions and annotations for audit-ready deliverables.',
      'delivers' => ['Permit-ready drawing sets','Shop drawing packages','As-built model & drawings','Annotated coordination plans','PDF & DWG documentation sets'],
      'formats'  => 'Input: Existing RVT or DWG files. Output: RVT, DWG, PDF drawing sets.',
    ],
  ];
@endphp

@foreach($services as $i => $svc)
  <section id="{{ $svc['id'] }}" style="background:{{ $i % 2 === 0 ? '#0B1828' : '#060F1E' }};padding:80px 0;border-top:1px solid rgba(42,110,212,0.12);" data-dark>
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr] gap-16">

        {{-- Left: number + title --}}
        <div data-reveal>
          <div class="font-display font-light text-7xl leading-none mb-4" style="color:rgba(42,110,212,0.2);">{{ $svc['number'] }}</div>
          <h2 class="font-display font-light text-display-md leading-tight" style="color:#EEF3FF;">{{ $svc['title'] }}</h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#8BA3C4;">{{ $svc['lead'] }}</p>
          <div class="mt-8 text-[10px] leading-relaxed" style="color:#4A6A8A;">{{ $svc['formats'] }}</div>
        </div>

        {{-- Right: body + deliverables --}}
        <div data-reveal>
          <p class="text-base leading-relaxed mb-10" style="color:#8BA3C4;">{{ $svc['body'] }}</p>

          <div style="border-top:1px solid rgba(42,110,212,0.18);padding-top:32px;">
            <p class="text-[9px] uppercase tracking-[0.3em] mb-6" style="color:#4A6A8A;">Key Deliverables</p>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              @foreach($svc['delivers'] as $item)
                <li class="flex items-center gap-3">
                  <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background:#2A6ED4;"></span>
                  <span class="text-sm" style="color:#EEF3FF;">{{ $item }}</span>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="mt-10">
            <a href="{{ route('bim.contact') }}?service={{ urlencode($svc['title']) }}"
               class="inline-block text-[11px] uppercase tracking-[0.22em] px-8 py-3.5 transition-colors duration-300"
               style="border:1px solid rgba(42,110,212,0.35);color:#8BA3C4;"
               onmouseover="this.style.background='#B5451B';this.style.borderColor='#B5451B';this.style.color='#fff'"
               onmouseout="this.style.background='transparent';this.style.borderColor='rgba(42,110,212,0.35)';this.style.color='#8BA3C4'">
              Enquire about this service
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach

@endsection
