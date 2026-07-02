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
  $serviceList = $services ?? [
    [
      'title' => 'Architecture',
      'tagline' => 'Buildings that respond to context, climate and community.',
      'image' => null,
      'description' => 'Our architectural practice spans residential, commercial, hospitality, institutional and mixed-use typologies. We deliver from pre-design feasibility and concept design through to construction documentation, tender assistance and site supervision. Our ISO-certified quality management system ensures consistency across every stage.',
      'features' => ['Concept & Schematic Design','Design Development','Construction Documentation','Regulatory Approvals','Tender & Contract Administration','Site Supervision'],
    ],
    [
      'title' => 'Interior Design',
      'tagline' => 'Spaces that are functional, beautiful and deeply human.',
      'image' => null,
      'description' => 'We design interiors that go beyond aesthetics — every spatial decision is grounded in how people live, work and experience a room. Our interiors team works across residential apartments, corporate offices, hospitality suites, retail environments and public institutions.',
      'features' => ['Space Planning','Concept & Mood Development','Material & Finish Selection','Furniture Design & Procurement','Lighting Design','FF&E Coordination'],
    ],
    [
      'title' => 'Landscape & Infrastructure',
      'tagline' => 'Connecting people to place through thoughtful design.',
      'image' => null,
      'description' => 'Our landscape team designs outdoor environments at every scale — from private gardens and residential amenity decks to urban parks, streetscapes and large civic infrastructure. We integrate ecological thinking, stormwater management and community activation into every scheme.',
      'features' => ['Landscape Masterplanning','Planting Design','Hardscape & Paving','Urban Streetscapes','BIM Coordination','Project Management Consultancy'],
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
