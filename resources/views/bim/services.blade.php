@extends('bim.layout')

@section('title', 'BIM Services — Revit Modeling, MEP Coordination, Scan to BIM | Suncon BIM')
@section('description', 'Architectural BIM, Structural BIM, MEP coordination, Scan to BIM, CAD to BIM, and construction documentation services by Suncon Engineers. LOD 100–500 across India.')

@section('content')

{{-- ── PAGE HEADER ──────────────────────────────────────────────────────────── --}}
<section style="background:#0A0A0A;padding-top:140px;padding-bottom:80px;" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="flex items-center gap-3 mb-6" data-reveal>
      <span class="w-6 h-px" style="background:#B5451B;"></span>
      <span class="text-[9px] uppercase tracking-[0.3em]" style="color:#4E4A47;">What we deliver</span>
    </div>
    <h1 class="font-display font-light text-display-lg leading-none" style="color:#F2EFE9;" data-reveal>Our Services</h1>
    <p class="mt-8 text-lg leading-relaxed max-w-2xl" style="color:#6B6560;" data-reveal>
      A full-stack BIM practice backed by 25 years of architectural expertise. Every service is delivered in-house by our Pune-based team, with a project-specific BIM Execution Plan on every engagement.
    </p>
  </div>
</section>

{{-- ── SERVICE SECTIONS ─────────────────────────────────────────────────────── --}}
@php
  // Default Unsplash images keyed by slug for when no custom image is set
  $defaultImages = [
    'architectural-bim-modeling' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=900&q=85&auto=format&fit=crop',  // architectural drawings
    'structural-bim'             => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=900&q=85&auto=format&fit=crop',  // construction steel frame
    'mep-bim-coordination'       => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=85&auto=format&fit=crop',  // modern building interior/technical
    'scan-to-bim'                => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=85&auto=format&fit=crop',  // glass building facade (point-cloud feel)
    'cad-to-bim-migration'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=85&auto=format&fit=crop',  // technical workspace
    'construction-documentation' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=900&q=85&auto=format&fit=crop',  // architectural drawings/blueprints
  ];

  // Fallback static list if no DB records exist yet
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
  // Normalise DB model vs fallback array to same keys
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
@endphp

{{-- Full-bleed section: content side + image side --}}
<section id="{{ $id }}" style="background:{{ $i%2===0?'#0A0A0A':'#111111' }};border-top:1px solid rgba(255,255,255,0.05);" data-dark>
  <div class="flex flex-col {{ $i%2===0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }}">

    {{-- Content half --}}
    <div class="flex-1 min-w-0 flex flex-col justify-center px-6 lg:px-0">
      <div class="{{ $i%2===0 ? 'lg:pl-12 xl:pl-20 lg:pr-16' : 'lg:pr-12 xl:pr-20 lg:pl-16' }} py-20 max-w-2xl {{ $i%2===0 ? 'lg:ml-auto' : 'lg:mr-auto' }}">

        <div class="flex items-center gap-5 mb-8" data-reveal>
          <span class="font-display font-light" style="font-size:clamp(3rem,8vw,7rem);line-height:1;color:rgba(255,255,255,0.04);">{{ $number }}</span>
          <div style="width:48px;height:1px;background:rgba(181,69,27,0.5);"></div>
        </div>

        <h2 class="font-display font-light text-display-md leading-tight mb-5" style="color:#F2EFE9;" data-reveal>{{ $title }}</h2>
        @if($lead)<p class="text-base leading-relaxed mb-6" style="color:#6B6560;" data-reveal>{{ $lead }}</p>@endif
        @if($body)<p class="text-sm leading-relaxed mb-10" style="color:#4E4A47;" data-reveal>{{ $body }}</p>@endif

        @if(count($delivers))
        <div style="border-top:1px solid rgba(255,255,255,0.06);padding-top:28px;" data-reveal>
          <p class="text-[9px] uppercase tracking-[0.3em] mb-5" style="color:#4E4A47;">Key deliverables</p>
          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-8 mb-8">
            @foreach($delivers as $item)
              <li class="flex items-center gap-3">
                <span class="w-1 h-1 rounded-full shrink-0" style="background:#B5451B;"></span>
                <span class="text-sm" style="color:#F2EFE9;">{{ $item }}</span>
              </li>
            @endforeach
          </ul>
          @if($formats)<p class="text-[10px] leading-relaxed mb-8" style="color:#4E4A47;">{{ $formats }}</p>@endif
        </div>
        @endif

        <a href="{{ route('bim.contact') }}?service={{ urlencode($title) }}"
           class="inline-block text-[10px] uppercase tracking-[0.22em] px-8 py-3.5 transition-all duration-250"
           style="border:1px solid rgba(255,255,255,0.16);color:#6B6560;"
           onmouseover="this.style.background='#B5451B';this.style.borderColor='#B5451B';this.style.color='#fff'"
           onmouseout="this.style.background='transparent';this.style.borderColor='rgba(255,255,255,0.16)';this.style.color='#6B6560'"
           data-reveal>
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
