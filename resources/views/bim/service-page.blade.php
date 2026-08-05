@extends('bim.layout')

@section('title', $service['title'].' | Suncon BIM Services')
@section('description', $service['description'])

@push('schema')
@php
$pageUrl  = url()->current();
$svcSchema = [
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => $service['title'],
  'description' => $service['description'],
  'url'      => $pageUrl,
  'provider' => ['@id' => route('bim.home').'#organization'],
  'areaServed' => ['India','United Kingdom','United States','United Arab Emirates','Canada','Germany','Australia'],
  'serviceType' => $service['title'],
];
$breadcrumb = [
  '@context' => 'https://schema.org',
  '@type'    => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>route('bim.home')],
    ['@type'=>'ListItem','position'=>2,'name'=>'BIM Services','item'=>route('bim.services')],
    ['@type'=>'ListItem','position'=>3,'name'=>$service['title'],'item'=>$pageUrl],
  ],
];
$faqSchema = [
  '@context'   => 'https://schema.org',
  '@type'      => 'FAQPage',
  'mainEntity' => collect($service['faqs'])->map(fn($f)=>[
    '@type'         => 'Question',
    'name'          => $f[0],
    'acceptedAnswer'=> ['@type'=>'Answer','text'=>$f[1]],
  ])->values()->all(),
];
@endphp
<script type="application/ld+json">{!! json_encode($svcSchema,   JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumb,  JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema,   JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- Hero --}}
<section class="bg-[var(--bim-base)] pb-0 border-b border-[#D1D5DB] overflow-hidden">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-0 items-stretch">

    {{-- Left: breadcrumb + title + tagline + intro --}}
    <div class="flex flex-col justify-center pr-0 lg:pr-16" style="padding-top:calc(62px + 4rem);padding-bottom:4rem;">

      {{-- Breadcrumb --}}
      <nav class="flex items-center gap-2 text-[9px] uppercase tracking-[0.22em] text-[#6B7280] mb-10">
        <a href="{{ route('bim.home') }}" class="hover:text-[var(--bim-accent)] transition-colors">Home</a>
        <span class="opacity-40">/</span>
        <a href="{{ route('bim.services') }}" class="hover:text-[var(--bim-accent)] transition-colors">BIM Services</a>
        <span class="opacity-40">/</span>
        <span class="text-[var(--bim-text)]">{{ $service['title'] }}</span>
      </nav>

      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-4">BIM Services</p>
      <h1 class="text-4xl lg:text-5xl font-bold text-[var(--bim-text)] leading-tight mb-5">
        {{ $service['title'] }}
      </h1>
      <p class="text-lg text-[#4B5563] font-medium mb-6 leading-relaxed">{{ $service['tagline'] }}</p>
      <p class="text-[#6B7280] text-base leading-relaxed mb-10" style="max-width:480px;">{{ $service['description'] }}</p>
      <div class="flex flex-wrap gap-4">
        <a href="#enquiry" class="inline-block bg-[var(--bim-accent)] text-[var(--bim-text)] font-semibold text-sm px-8 py-4 hover:opacity-90 transition-opacity">
          Get a Free Quote →
        </a>
        <a href="{{ route('bim.contact') }}" class="inline-block border border-[var(--bim-text)] text-[var(--bim-text)] font-semibold text-sm px-8 py-4 hover:bg-[var(--bim-text)] hover:text-white transition-colors">
          Talk to an Expert
        </a>
      </div>
    </div>

    {{-- Right: hero image — fills full section height from top --}}
    <div class="relative overflow-hidden bg-[#D1D5DB]" style="min-height:clamp(420px,55vw,680px);">
      <img src="https://images.unsplash.com/{{ $service['hero_image'] }}?auto=format&fit=crop&w=900&q=80"
           alt="{{ $service['title'] }}"
           class="absolute inset-0 w-full h-full object-cover">
    </div>
  </div>
</section>

{{-- Stats bar --}}
<div class="bg-[var(--bim-text)] py-6">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 flex flex-wrap gap-8 justify-between items-center">
    <div class="flex items-center gap-3">
      <span class="text-[var(--bim-accent)] font-bold text-2xl">25+</span>
      <span class="text-white/70 text-sm">BIM Projects Delivered</span>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-[var(--bim-accent)] font-bold text-2xl">LOD 100–500</span>
      <span class="text-white/70 text-sm">Full LOD Range</span>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-[var(--bim-accent)] font-bold text-2xl">24hr</span>
      <span class="text-white/70 text-sm">Response Guarantee</span>
    </div>
    <div class="flex items-center gap-3">
      <span class="text-[var(--bim-accent)] font-bold text-2xl">ISO 9001</span>
      <span class="text-white/70 text-sm">Certified Quality</span>
    </div>
  </div>
</div>

{{-- Services grid --}}
<section class="bg-[var(--bim-surface)] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-12">
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">What We Deliver</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] leading-tight">
        {{ $service['title'] }} Services
      </h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($service['services'] as $svc)
        <div class="bg-white border border-[#E5E7EB] p-8 hover:border-[var(--bim-accent)] transition-colors group">
          <div class="w-8 h-1 bg-[var(--bim-accent)] mb-6 group-hover:w-16 transition-all duration-300"></div>
          <h3 class="text-base font-bold text-[var(--bim-text)] mb-3">{{ $svc[0] }}</h3>
          <p class="text-[#6B7280] text-sm leading-relaxed">{{ $svc[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Why Choose Suncon BIM --}}
<section class="bg-[var(--bim-text)] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-12">
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">Why Suncon BIM</p>
      <h2 class="text-3xl font-bold text-white leading-tight">Your Trusted BIM Partner</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($service['value_props'] as $vp)
        <div class="bg-white/5 border border-white/10 p-8 text-center hover:bg-white/10 transition-colors">
          <div class="w-12 h-12 bg-[var(--bim-accent)]/20 flex items-center justify-center mx-auto mb-4 rounded-full">
            <span class="text-[var(--bim-accent)] font-bold text-lg">✓</span>
          </div>
          <h3 class="text-white font-bold mb-2">{{ $vp['title'] }}</h3>
          <p class="text-white/60 text-sm leading-relaxed">{{ $vp['text'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Process --}}
<section class="bg-[var(--bim-base)] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-12">
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">How We Work</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] leading-tight">Our Delivery Process</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-0">
      @php
        $steps = [
          ['01','Brief & Scoping',      'Share your drawings, point cloud, or specifications. We review scope, confirm LOD, and agree timelines in a BIM Execution Plan.'],
          ['02','Modeling & Coordination','Our BIM team builds the model in Revit, running coordination checks against all disciplines at each milestone.'],
          ['03','QA & Review',          'Every deliverable goes through our ISO-certified QA process. You review and provide feedback via shared cloud environment.'],
          ['04','Delivery & Support',   'Final files issued in agreed formats (RVT, IFC, DWG, PDF). We provide post-delivery support during the construction phase.'],
        ];
      @endphp
      @foreach($steps as $i => $step)
        <div class="border border-[#D1D5DB] p-8 {{ $i < 3 ? 'border-r-0' : '' }}">
          <p class="text-5xl font-black text-[var(--bim-accent)]/20 leading-none mb-4">{{ $step[0] }}</p>
          <h3 class="font-bold text-[var(--bim-text)] mb-3">{{ $step[1] }}</h3>
          <p class="text-[#6B7280] text-sm leading-relaxed">{{ $step[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- FAQ --}}
<section class="bg-white py-20 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-12 lg:gap-20">
    <div>
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">FAQ</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] leading-tight">
        Frequently Asked Questions
      </h2>
    </div>
    <div class="flex flex-col divide-y divide-[#E5E7EB]">
      @foreach($service['faqs'] as $faq)
        <details class="group py-6">
          <summary class="flex items-start justify-between gap-6 cursor-pointer list-none">
            <h3 class="font-semibold text-[var(--bim-text)] group-open:text-[var(--bim-accent)] transition-colors duration-200 pr-4 leading-snug">{{ $faq[0] }}</h3>
            <span class="shrink-0 w-7 h-7 border border-[#D1D5DB] flex items-center justify-center text-[#6B7280] group-open:border-[var(--bim-accent)] group-open:text-[var(--bim-accent)] transition-all duration-200 mt-0.5 font-bold">
              <span class="group-open:hidden">+</span><span class="hidden group-open:block">−</span>
            </span>
          </summary>
          <p class="mt-4 text-[#6B7280] text-sm leading-relaxed">{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>

{{-- Other Services --}}
@if($others->isNotEmpty())
<section class="bg-[var(--bim-surface)] py-16 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[9px] uppercase tracking-[0.3em] text-[#6B7280] mb-8">Explore Other BIM Services</p>
    <div class="grid sm:grid-cols-3 gap-4">
      @foreach($others as $other)
        <a href="{{ route('bim.service.'.($other['slug'])) }}"
           class="group bg-white border border-[#E5E7EB] p-6 hover:border-[var(--bim-accent)] transition-colors">
          <h3 class="font-bold text-[var(--bim-text)] mb-2 group-hover:text-[var(--bim-accent)] transition-colors text-sm leading-snug">
            {{ $other['title'] }}
          </h3>
          <span class="text-[9px] uppercase tracking-[0.2em] text-[var(--bim-accent)]">Learn More →</span>
        </a>
      @endforeach
      <a href="{{ route('bim.services') }}"
         class="group bg-[var(--bim-accent)] p-6 flex flex-col justify-between hover:opacity-90 transition-opacity">
        <span class="font-bold text-[var(--bim-text)] text-sm leading-snug">View All BIM Services</span>
        <span class="text-[9px] uppercase tracking-[0.2em] text-[var(--bim-text)]/70 group-hover:text-[var(--bim-text)] transition-colors mt-4">→ All Services</span>
      </a>
    </div>
  </div>
</section>
@endif

@endsection
