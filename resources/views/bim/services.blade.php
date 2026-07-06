@extends('bim.layout')

@section('title', 'BIM Services — Revit Modeling, MEP Coordination, Scan to BIM | Suncon BIM')
@section('description', 'Architectural BIM, Structural BIM, MEP coordination, Scan to BIM, CAD to BIM, and construction documentation services by Suncon Engineers. LOD 100–500 across India.')

@section('content')

{{-- ── PAGE HEADER ──────────────────────────────────────────────────────────── --}}
<section style="background:var(--bim-base);padding-top:140px;padding-bottom:80px;position:relative;overflow:hidden;">
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

@foreach($serviceList as $i => $svc)
@php
  if ($svc instanceof \App\Models\Service) {
    $id       = $svc->slug;
    $number   = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
    $title    = $svc->title;
    $lead     = $svc->tagline ?? '';
    $body     = $svc->long_description ?? $svc->description ?? '';
    $delivers = $svc->features ?? [];
    $formats  = $svc->formats ?? '';
    $imgSrc   = $svc->image ? $svc->imageUrl : ($defaultImages[$svc->slug] ?? 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=900&q=85&auto=format&fit=crop');
    $imgAlt   = $svc->title;
  } else {
    $id       = $svc['id'];
    $number   = $svc['number'];
    $title    = $svc['title'];
    $lead     = $svc['lead'];
    $body     = $svc['body'];
    $delivers = $svc['delivers'];
    $formats  = $svc['formats'];
    $imgSrc   = $svc['image'];
    $imgAlt   = $svc['imgAlt'];
  }
  $bg = $i%2===0 ? 'var(--bim-base)' : 'var(--bim-surface)';
@endphp

<section id="{{ $id }}" style="background:{{ $bg }};border-top:1px solid var(--bim-border-sm);">
  <div class="flex flex-col {{ $i%2===0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }}">

    {{-- Content half --}}
    <div class="flex-1 min-w-0 flex flex-col justify-center px-6 lg:px-0">
      <div class="{{ $i%2===0 ? 'lg:pl-12 xl:pl-20 lg:pr-16' : 'lg:pr-12 xl:pr-20 lg:pl-16' }} py-20 max-w-2xl {{ $i%2===0 ? 'lg:ml-auto' : 'lg:mr-auto' }}">

        <div class="flex items-center gap-5 mb-8">
          <span class="sg font-bold leading-none" style="font-size:clamp(3rem,7vw,6rem);color:rgba(126,200,232,0.07);letter-spacing:-0.04em;">{{ $number }}</span>
          <div style="width:40px;height:2px;background:rgba(126,200,232,0.4);"></div>
        </div>

        <h2 class="sg font-bold leading-tight mb-5" style="font-size:clamp(1.75rem,3.5vw,2.75rem);color:var(--bim-text);letter-spacing:-0.02em;">{{ $title }}</h2>
        @if($lead)<p class="dm text-base leading-relaxed mb-6" style="color:var(--bim-muted);font-weight:300;">{{ $lead }}</p>@endif
        @if($body)<p class="dm text-sm leading-relaxed mb-10" style="color:var(--bim-muted);">{{ $body }}</p>@endif

        @if(count($delivers))
        <div style="border-top:1px solid var(--bim-border-sm);padding-top:28px;">
          <p class="dm text-[9px] uppercase tracking-[0.3em] mb-5" style="color:var(--bim-muted);">Key deliverables</p>
          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-8 mb-8">
            @foreach($delivers as $item)
              <li class="flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full shrink-0" style="background:#7EC8E8;"></span>
                <span class="dm text-sm" style="color:var(--bim-text);">{{ $item }}</span>
              </li>
            @endforeach
          </ul>
          @if($formats)<p class="dm text-[10px] leading-relaxed mb-8" style="color:var(--bim-muted);">{{ $formats }}</p>@endif
        </div>
        @endif

        <a href="{{ route('bim.contact') }}?service={{ urlencode($title) }}"
           class="bim-svc-cta sg font-bold inline-block text-[10px] uppercase tracking-[0.2em] px-8 py-3.5 transition-all duration-200"
           style="border:1px solid rgba(126,200,232,0.3);color:#7EC8E8;"
           onmouseover="this.style.background='#7EC8E8';this.style.borderColor='#7EC8E8';this.style.color='var(--bim-text)'"
           onmouseout="this.style.background='transparent';this.style.borderColor='rgba(126,200,232,0.3)';this.style.color='#7EC8E8'">
          Enquire about this service
        </a>
      </div>
    </div>

    {{-- Image half --}}
    <div class="w-full lg:w-[42%] shrink-0 overflow-hidden" style="min-height:360px;">
      <img src="{{ $imgSrc }}"
           alt="{{ $imgAlt }}"
           class="w-full h-full object-cover"
           style="min-height:360px;"
           loading="lazy">
    </div>

  </div>
</section>

@endforeach

@endsection
