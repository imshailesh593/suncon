@extends('bim.layout')

@section('title', 'BIM Services — Revit Modeling, MEP Coordination, Scan to BIM | Suncon BIM')
@section('description', 'Architectural BIM, Structural BIM, MEP coordination, Scan to BIM, CAD to BIM, and construction documentation services by Suncon Engineers. LOD 100–500 across India.')

@section('content')

{{-- ── PAGE HEADER ──────────────────────────────────────────────────────────── --}}
<section class="pt-[100px] md:pt-[140px] pb-14 md:pb-20" style="background:var(--bim-base);position:relative;overflow:hidden;">
  {{-- Left lime rail --}}
  <div class="absolute left-0 top-0 bottom-0 w-[3px]" style="background:#7EC8E8;"></div>
  {{-- Engineering grid --}}
  <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(126,200,232,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(126,200,232,0.02) 1px,transparent 1px);background-size:64px 64px;"></div>
  <div class="relative max-w-screen-xl mx-auto px-8 lg:px-16">
    <div class="flex items-center gap-4 mb-6">
      <span class="w-[3px] h-4 shrink-0" style="background:#7EC8E8;"></span>
      <span class="dm text-[9px] uppercase tracking-[0.35em]" style="color:var(--bim-muted);">What we deliver</span>
    </div>
    <h1 class="sg font-bold leading-none" style="font-size:clamp(3rem,8vw,7rem);color:var(--bim-text);letter-spacing:-0.03em;">Our Services</h1>
    <p class="dm mt-8 text-lg leading-relaxed max-w-2xl" style="color:var(--bim-muted);font-weight:300;">
      A full-stack BIM practice backed by 25 years of architectural expertise. Every service is delivered in-house by our Pune-based team, with a project-specific BIM Execution Plan on every engagement.
    </p>
  </div>
</section>

{{-- ── SERVICE SECTIONS ─────────────────────────────────────────────────────── --}}
@php
  $defaultImages = [
    'architectural-bim-modeling' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=900&q=85&auto=format&fit=crop',
    'structural-bim'             => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=900&q=85&auto=format&fit=crop',
    'mep-bim-coordination'       => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=85&auto=format&fit=crop',
    'scan-to-bim'                => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=85&auto=format&fit=crop',
    'cad-to-bim-migration'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=85&auto=format&fit=crop',
    'construction-documentation' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=900&q=85&auto=format&fit=crop',
  ];

  $fallbackServices = collect([
    ['id'=>'arch-bim','number'=>'01','title'=>'Architectural BIM Modeling','lead'=>'Revit-based 3D architectural models at any LOD — from concept massing through permit and construction documentation.','body'=>'Our architectural BIM team produces coordinated Revit models that serve as the single source of truth for your project. Starting from schematic 2D drawings, point clouds, or design intent sketches, we develop models that evolve with your project — from LOD 100 concept massing through LOD 400 construction-ready documentation.','delivers'=>['LOD 100–400 Revit models','Coordinated floor plans, sections & elevations','3D sections and interior views','Model-based quantity extraction','IFC & DWG export packages'],'formats'=>'Input: DWG, PDF, SKP, IFC, point cloud. Output: RVT, IFC, DWG, PDF.','image'=>$defaultImages['architectural-bim-modeling'],'imgAlt'=>'Architectural technical drawings'],
    ['id'=>'structural','number'=>'02','title'=>'Structural BIM','lead'=>'Reinforced concrete and structural steel modeling with precise detailing for design coordination and fabrication.','body'=>'Working from structural engineer\'s calculation packages and design drawings, we produce fully detailed Revit structural models that integrate seamlessly with architectural and MEP disciplines. Our structural models support clash detection, reinforcement scheduling, and formwork calculation.','delivers'=>['RC column, beam & slab modeling','Steel framing and connection details','Foundation and pile cap modeling','Reinforcement LOD 300–400','Structural quantity take-off reports'],'formats'=>'Input: DWG, PDF structural GAs. Output: RVT, IFC, DWG.','image'=>$defaultImages['structural-bim'],'imgAlt'=>'Structural steel building frame'],
    ['id'=>'mep','number'=>'03','title'=>'MEP BIM Coordination','lead'=>'Mechanical, Electrical, and Plumbing modeling with multi-discipline clash detection using Navisworks Manage.','body'=>'MEP coordination is where BIM delivers its greatest ROI — catching clashes before they become site problems. We produce discipline-specific Revit MEP models and federate them with architectural and structural models. Navisworks clash reports are issued at agreed milestones with RFI logs for resolution tracking.','delivers'=>['HVAC duct and pipe routing models','Electrical containment and cable tray','Plumbing and drainage systems','Navisworks clash detection reports','RFI log and coordination drawings'],'formats'=>'Input: DWG, PDF schematic drawings. Output: RVT, NWC, IFC, clash PDF.','image'=>$defaultImages['mep-bim-coordination'],'imgAlt'=>'MEP building systems'],
    ['id'=>'scan','number'=>'04','title'=>'Scan to BIM','lead'=>'Point cloud data from laser scanners converted to accurate as-is Revit models for renovation, retrofit, and heritage projects.','body'=>'We process raw scan data through registration and clean-up, then model architectural elements, structural members, and MEP systems with survey-grade accuracy. Ideal for building owners, renovators, and facility managers who need a reliable as-built record.','delivers'=>['Point cloud registration & clean-up','As-is Revit model (LOD 300–500)','As-built floor plans & sections','Deviation analysis reports','Heritage documentation packages'],'formats'=>'Input: RCP, E57, PTX, LAS point clouds. Output: RVT, IFC, DWG, PDF.','image'=>$defaultImages['scan-to-bim'],'imgAlt'=>'Survey and scanning equipment'],
    ['id'=>'cad','number'=>'05','title'=>'CAD to BIM Migration','lead'=>'Legacy 2D AutoCAD drawings upgraded to fully coordinated, data-rich 3D BIM models — preserving your existing design intent.','body'=>'Whether you have a library of historic drawings or a current project in 2D CAD, we extract and rebuild geometry in Revit with full data attribution. Our workflows follow client BIM Execution Plans and Revit standards.','delivers'=>['2D CAD to 3D Revit conversion','Custom family creation','Shared parameter assignment','Standards-compliant modeling','LOD 200–300 output packages'],'formats'=>'Input: DWG, DXF, PDF, DGN. Output: RVT, IFC, DWG.','image'=>$defaultImages['cad-to-bim-migration'],'imgAlt'=>'Technical drafting workspace'],
    ['id'=>'docs','number'=>'06','title'=>'Construction Documentation','lead'=>'Shop drawings, as-built documentation, and coordination packages — extracted directly from BIM models.','body'=>'Model-based construction documentation eliminates drift between design and site. We produce sheet sets, shop drawing packages, and as-built documentation extracted directly from coordinated Revit models. All drawings carry model-consistent dimensions.','delivers'=>['Permit-ready drawing sets','Shop drawing packages','As-built model & drawings','Annotated coordination plans','PDF & DWG documentation sets'],'formats'=>'Input: Existing RVT or DWG files. Output: RVT, DWG, PDF drawing sets.','image'=>$defaultImages['construction-documentation'],'imgAlt'=>'Construction site documentation'],
  ]);

  $serviceList = $bimServices->count() ? $bimServices : $fallbackServices;
@endphp

<section class="px-6 lg:px-12 py-12 md:py-16 lg:py-[80px]" style="background:var(--bim-surface);">
  <div class="max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">

      @foreach($serviceList as $i => $svc)
      @php
        if ($svc instanceof \App\Models\Service) {
          $id     = $svc->slug;
          $number = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
          $title  = $svc->title;
          $lead   = $svc->tagline ?? '';
          $imgSrc = $svc->image ? $svc->imageUrl : ($defaultImages[$svc->slug] ?? null);
          $imgAlt = $svc->title;
        } else {
          $id     = $svc['id'];
          $number = $svc['number'];
          $title  = $svc['title'];
          $lead   = $svc['lead'];
          $imgSrc = $svc['image'];
          $imgAlt = $svc['imgAlt'];
        }
      @endphp

      <a href="{{ route('bim.contact') }}?service={{ urlencode($title) }}"
         class="bim-svc-card group block">

        {{-- Index --}}
        <p class="dm text-[9px] uppercase tracking-[0.3em] mb-3"
           style="color:var(--bim-muted);">{{ $number }}</p>

        {{-- Tall portrait image --}}
        <div class="overflow-hidden aspect-[3/4] relative" style="background:var(--bim-lift);">
          @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="{{ $imgAlt }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                 loading="lazy">
          @else
            <div class="w-full h-full flex items-end p-6"
                 style="background:linear-gradient(150deg,var(--bim-surface) 0%,var(--bim-dim) 100%);">
              <span class="sg font-bold" style="font-size:5rem;line-height:1;color:var(--bim-adim);">{{ $number }}</span>
            </div>
          @endif
          {{-- Accent tint on hover --}}
          <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-[0.07] transition-opacity duration-500"
               style="background:var(--bim-accent);"></div>
        </div>

        {{-- Animated sweep line --}}
        <div class="relative h-px mt-0 mb-4 overflow-hidden" style="background:var(--bim-border);">
          <div class="bim-sweep absolute inset-y-0 left-0 transition-all duration-500 ease-out"
               style="width:0;background:var(--bim-accent);"></div>
        </div>

        <h3 class="sg font-semibold mb-2 leading-snug bim-svc-title transition-colors duration-300"
            style="font-size:1.05rem;color:var(--bim-text);">{{ $title }}</h3>

        @if($lead)
          <p class="dm text-xs leading-relaxed mb-4" style="color:var(--bim-muted);">{{ $lead }}</p>
        @endif

        <p class="dm text-[9px] uppercase tracking-[0.22em]" style="color:var(--bim-accent);">
          Enquire
          <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">→</span>
        </p>
      </a>
      @endforeach

    </div>
  </div>
</section>

<style>
  .bim-svc-card:hover .bim-sweep        { width: 100% !important; }
  .bim-svc-card:hover .bim-svc-title    { color: var(--bim-accent) !important; }
</style>

@endsection
