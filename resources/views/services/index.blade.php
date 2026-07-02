@extends('layouts.app')

@section('title', 'Services | Suncon Engineers')
@section('description', 'Architecture, interior design, landscape, BIM and infrastructure services by Suncon Engineers.')

@section('content')

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-20 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2 items-end gap-12">
    <div>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>What We Do</p>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>Services</h1>
    </div>
    <p class="text-[#8B8275] text-sm leading-relaxed font-light" data-reveal>
      From initial concept to project delivery, our multidisciplinary team provides integrated design services across architecture, landscape, interiors and infrastructure.
    </p>
  </div>
</section>

{{-- Services --}}
@php
  $serviceList = ($services && $services->count()) ? $services : [
    [
      'title'    => 'Architectural Design',
      'slug'     => 'architectural-design',
      'tagline'  => 'Functional, aesthetic structures built to last.',
      'image'    => null,
      'description' => 'Suncon Architecture is an independent consultancy firm providing architectural design services across residential, commercial, hospitality, healthcare, industrial, and educational typologies. We balance client vision, safety codes, structural rigour, and environmental responsiveness at every stage of the design process.',
      'features' => ['Concept & Schematic Design','Working Drawings & Detailed Documentation','Town Planning & Layout Approvals','Structural Coordination','Construction Administration & Site Supervision','Project Types: Residential, Commercial, Hospitality, Healthcare, Industrial, Educational'],
    ],
    [
      'title'    => 'Landscape Design',
      'slug'     => 'landscape-design',
      'tagline'  => 'Outdoor spaces as thoughtful as the buildings they surround.',
      'image'    => null,
      'description' => 'Our landscape design practice integrates outdoor planning with architecture to enhance aesthetics, ecology, and functionality in a unified environment. We design landscapes for townships, campuses, resorts, industrial premises, and public spaces — creating outdoor environments that are site-responsive and resilient.',
      'features' => ['Landscape Master Planning','Site Analysis & Ecological Assessment','Planting Design & Species Selection','Hardscape, Water Features & Pathways','Township & Campus Landscapes','Resort & Hospitality Grounds'],
    ],
    [
      'title'    => 'Interior Design',
      'slug'     => 'interior-design',
      'tagline'  => 'Environments shaped for how people really live and work.',
      'image'    => null,
      'description' => 'Our interior design studio enhances indoor spaces through strategic arrangement of furnishings, colour palettes, and materials to achieve both utility and visual appeal. From healthcare imaging centres to luxury resorts and corporate offices, we begin with a careful reading of how a space will actually be occupied.',
      'features' => ['Interior Architecture & Space Planning','Furniture, Joinery & Fixture Design','Material & Finish Specification','Lighting Design & Mood','Healthcare & Specialised Interiors','Hospitality, Resort & Residential Interiors'],
    ],
    [
      'title'    => 'Urban Design',
      'slug'     => 'urban-design',
      'tagline'  => 'Shaping cities, neighbourhoods, and public spaces.',
      'image'    => null,
      'description' => 'Suncon's urban design practice works at the intersection of planning, architecture, and infrastructure — delivering master plans, streetscape strategies, and DPRs for municipalities and civic bodies across India. We translate complex urban data into built environments that are efficient, equitable, and resilient.',
      'features' => ['Urban Master Planning','Integrated Storm Water Drainage (SWD) DPRs','Topographic Survey & Hydrological Modelling','Streetscape & Public Realm Design','Environmental Impact Analysis','Municipal & Civic Infrastructure'],
    ],
    [
      'title'    => 'Architectural BIM',
      'slug'     => 'architectural-bim',
      'tagline'  => 'Intelligent 3D models that reduce risk and improve delivery.',
      'image'    => null,
      'description' => 'Our BIM practice creates, manages, and co-ordinates intelligent digital representations of buildings and infrastructure — embedding geometry, material data, cost, and schedule information into a single federated model. We provide BIM services from LOD 100 concept through to LOD 500 as-built.',
      'features' => ['3D Architectural & Structural Modelling (Revit)','Clash Detection & Multi-disciplinary Coordination','4D Construction Sequencing','5D Cost Estimation & BOQ Extraction','Scan to BIM (Laser Survey to Digital Twin)','BIM Drafting & Construction-Ready Shop Drawings'],
    ],
    [
      'title'    => 'Project Management Consultancy',
      'slug'     => 'pmc',
      'tagline'  => 'From tender to handover — accountability at every stage.',
      'image'    => null,
      'description' => 'Suncon's PMC division provides end-to-end project management for construction and infrastructure projects — covering tender preparation, contractor supervision, quality assurance, billing, and final documentation. Our structured seven-phase process ensures projects are delivered on time, within budget, and to specification.',
      'features' => ['Tender Document Preparation & Review','Design & Cost Analysis','Layout Survey & Lineout','Contract Administration','Quality Assurance & Site Monitoring','Running Bills, Final Bills & As-Built Drawings'],
    ],
  ];
@endphp

<section class="bg-[#FAF7F3] py-0">
  @foreach($serviceList as $i => $svc)
    @php $isEven = $i % 2 === 0; $svcSlug = is_array($svc) ? \Illuminate\Support\Str::slug($svc['title']) : $svc->slug; @endphp
    <div id="{{ $svcSlug }}" class="border-b border-[#E8E0D4] {{ $isEven ? 'bg-[#FAF7F3]' : 'bg-[#F2EDE4]' }}" style="scroll-margin-top:70px">
      <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-20 grid md:grid-cols-2 gap-16 items-center">

        {{-- Image --}}
        <div class="{{ $isEven ? 'order-first' : 'order-first md:order-last' }} overflow-hidden aspect-[4/3] bg-[#E8E0D4]" data-reveal>
          @if(!is_array($svc) && $svc->imageUrl)
            <img src="{{ $svc->imageUrl }}"
                 alt="{{ $svc->title }}"
                 class="w-full h-full object-cover"
                 loading="lazy">
          @else
            <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]
                        flex items-center justify-center">
              <span class="font-display font-light text-6xl text-[#8B8275] opacity-20">0{{ $i + 1 }}</span>
            </div>
          @endif
        </div>

        {{-- Content --}}
        <div class="{{ $isEven ? '' : 'order-last md:order-first' }}" data-reveal>
          <p class="text-[9px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">0{{ $i + 1 }}</p>
          <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none mb-3">
            {{ is_array($svc) ? $svc['title'] : $svc->title }}
          </h2>
          <p class="text-[#B5451B] text-sm font-light mb-6 italic font-display">
            {{ is_array($svc) ? $svc['tagline'] : $svc->tagline }}
          </p>
          <p class="text-[#8B8275] text-sm leading-relaxed font-light mb-8">
            {{ is_array($svc) ? $svc['description'] : $svc->description }}
          </p>

          @php $features = is_array($svc) ? ($svc['features'] ?? []) : ($svc->features ?? []); @endphp
          @if(count($features))
            <ul class="flex flex-col gap-2.5">
              @foreach($features as $feat)
                <li class="flex items-center gap-3 text-[10px] uppercase tracking-[0.15em] text-[#1C1C1C]">
                  <span class="w-4 h-px bg-[#B5451B] shrink-0"></span>
                  {{ $feat }}
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</section>

{{-- ─── FAQs ───────────────────────────────────────────────────────────── --}}
@if(isset($faqs) && $faqs->count())
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16 max-w-lg" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Common Questions</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Frequently Asked</h2>
    </div>
    <div class="max-w-3xl flex flex-col divide-y divide-[#E8E0D4]">
      @foreach($faqs as $faq)
        <details class="group py-6" data-reveal>
          <summary class="flex items-center justify-between cursor-pointer list-none">
            <h3 class="font-display font-light text-lg text-[#1C1C1C] group-open:text-[#B5451B] transition-colors duration-200 pr-8">
              {{ $faq->question }}
            </h3>
            <span class="shrink-0 w-6 h-6 border border-[#1C1C1C]/20 flex items-center justify-center text-[#8B8275] group-open:border-[#B5451B] group-open:text-[#B5451B] transition-all duration-200">
              <span class="group-open:hidden">+</span>
              <span class="hidden group-open:block">−</span>
            </span>
          </summary>
          <p class="mt-5 text-[#8B8275] text-sm leading-relaxed font-light">{{ $faq->answer }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- CTA --}}
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12 text-center" data-reveal>
  <div class="max-w-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">Ready to Begin?</p>
    <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none mb-8">
      Let's talk about<br><em class="italic text-[#B5451B]">your project.</em>
    </h2>
    <a href="{{ url('/contact') }}"
       class="inline-block text-[10px] uppercase tracking-[0.2em] bg-[#B5451B] text-white px-10 py-4 hover:bg-[#9a3a17] transition-colors duration-300">
      Start a Conversation →
    </a>
  </div>
</section>

@endsection
