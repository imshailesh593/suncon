@extends('bim.layout')

@section('title', $country['title'].' | Suncon BIM')
@section('description', $country['description'])

@push('schema')
@php
$pageUrl    = url()->current();
$services   = config('bim_individual_services');
$svcSlugs   = array_keys($services);

$cntSchema  = [
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => $country['title'],
  'description' => $country['description'],
  'url'      => $pageUrl,
  'provider' => ['@id' => route('bim.home').'#organization'],
  'areaServed' => $country['name'],
  'serviceType' => 'Building Information Modeling',
];
$breadcrumb = [
  '@context' => 'https://schema.org',
  '@type'    => 'BreadcrumbList',
  'itemListElement' => [
    ['@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>route('bim.home')],
    ['@type'=>'ListItem','position'=>2,'name'=>'BIM Services','item'=>route('bim.services')],
    ['@type'=>'ListItem','position'=>3,'name'=>$country['title'],'item'=>$pageUrl],
  ],
];
$cntFaqs = [
  ['What BIM services does Suncon BIM offer in '.$country['name'].'?', 'We offer the full range of BIM services to clients in '.$country['name'].': Architectural BIM Modeling, Structural BIM, MEP Coordination, Scan to BIM, CAD to BIM migration, and Construction Documentation. All services are delivered remotely with secure file transfer and regular coordination calls.'],
  ['Are your BIM deliverables compliant with '.$country['name'].' standards?', 'Yes. We align all deliverables to '.$country['standards'].'. Our BIM Execution Plans are tailored to each project\'s authority requirements. Contact us to discuss your specific compliance needs.'],
  ['How do you communicate with clients in '.$country['name'].'?', 'We use video calls (Google Meet, Teams, Zoom), shared cloud platforms (BIM 360, Autodesk Construction Cloud), and email. We schedule coordination calls within business hours in your time zone and respond to all queries within 24 hours.'],
  ['What are your pricing terms for '.$country['name'].' clients?', 'We offer fixed-fee project pricing based on a clear scope agreed at project start. Pricing is competitive relative to local '.$country['name'].' BIM production costs. We accept payment in '.$country['currency'].' or USD. Contact us for a no-obligation quote.'],
  ['Do you sign NDAs for '.$country['name'].' projects?', 'Yes. We sign mutual NDAs and project confidentiality agreements as standard before any project files are shared. IP remains entirely with the client at all times.'],
];
$faqSchema  = [
  '@context'   => 'https://schema.org',
  '@type'      => 'FAQPage',
  'mainEntity' => collect($cntFaqs)->map(fn($f)=>[
    '@type'         => 'Question',
    'name'          => $f[0],
    'acceptedAnswer'=> ['@type'=>'Answer','text'=>$f[1]],
  ])->values()->all(),
];
@endphp
<script type="application/ld+json">{!! json_encode($cntSchema,  JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumb, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema,  JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- Hero --}}
<section class="bg-[var(--bim-base)] pt-36 pb-0 border-b border-[#D1D5DB]">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <nav class="flex items-center gap-2 text-[9px] uppercase tracking-[0.22em] text-[#6B7280] mb-10">
      <a href="{{ route('bim.home') }}" class="hover:text-[var(--bim-accent)] transition-colors">Home</a>
      <span class="opacity-40">/</span>
      <a href="{{ route('bim.services') }}" class="hover:text-[var(--bim-accent)] transition-colors">BIM Services</a>
      <span class="opacity-40">/</span>
      <span class="text-[var(--bim-text)]">{{ $country['name'] }}</span>
    </nav>
  </div>

  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-0 items-stretch pb-0">
    <div class="py-12 lg:py-20 pr-0 lg:pr-16 flex flex-col justify-center">
      <div class="flex items-center gap-3 mb-4">
        <span class="text-4xl">{{ $country['flag'] }}</span>
        <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)]">BIM Services</p>
      </div>
      <h1 class="text-4xl lg:text-5xl font-bold text-[var(--bim-text)] leading-tight mb-5">
        {{ $country['title'] }}
      </h1>
      <p class="text-lg text-[#4B5563] font-medium mb-6 leading-relaxed">{{ $country['tagline'] }}</p>
      <p class="text-[#6B7280] text-base leading-relaxed mb-10">{{ $country['description'] }}</p>
      <div class="flex flex-wrap gap-4">
        <a href="#enquiry" class="inline-block bg-[var(--bim-accent)] text-[var(--bim-text)] font-semibold text-sm px-8 py-4 hover:opacity-90 transition-opacity">
          Get a Free Quote →
        </a>
        <a href="{{ route('bim.contact') }}" class="inline-block border border-[var(--bim-text)] text-[var(--bim-text)] font-semibold text-sm px-8 py-4 hover:bg-[var(--bim-text)] hover:text-white transition-colors">
          Talk to an Expert
        </a>
      </div>
    </div>

    <div class="relative overflow-hidden bg-[#D1D5DB]" style="min-height:clamp(300px,45vw,520px);">
      <img src="https://images.unsplash.com/{{ $country['hero_image'] }}?auto=format&fit=crop&w=900&q=80"
           alt="{{ $country['title'] }}"
           class="absolute inset-0 w-full h-full object-cover">
      {{-- Country name overlay --}}
      <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-8">
        <p class="text-white font-bold text-2xl">{{ $country['name'] }}</p>
        <p class="text-white/70 text-sm mt-1">{{ implode(' · ', array_slice($country['city_focus'], 0, 3)) }}</p>
      </div>
    </div>
  </div>
</section>

{{-- Standards bar --}}
<div class="bg-[var(--bim-text)] py-5 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto flex flex-wrap items-center gap-6">
    <span class="text-white/50 text-[9px] uppercase tracking-[0.3em]">Standards We Follow</span>
    <span class="text-[var(--bim-accent)] text-sm font-medium">{{ $country['standards'] }}</span>
  </div>
</div>

{{-- Why Suncon BIM in [Country] --}}
<section class="bg-[var(--bim-surface)] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
    <div>
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">Why Choose Us</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] mb-6 leading-tight">
        Why {{ $country['name'] }} Firms Choose Suncon BIM
      </h2>
      <p class="text-[#6B7280] text-base leading-relaxed mb-8">{{ $country['services_intro'] }}</p>
      <ul class="flex flex-col gap-4">
        @foreach($country['why_points'] as $point)
          <li class="flex items-start gap-4">
            <span class="w-6 h-6 bg-[var(--bim-accent)] flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-3 h-3 text-[var(--bim-text)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
              </svg>
            </span>
            <span class="text-[#374151] text-sm leading-relaxed">{{ $point }}</span>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div class="bg-white border border-[#E5E7EB] p-8 text-center">
        <p class="text-4xl font-black text-[var(--bim-accent)]">25+</p>
        <p class="text-[#6B7280] text-sm mt-2">BIM Projects Delivered</p>
      </div>
      <div class="bg-white border border-[#E5E7EB] p-8 text-center">
        <p class="text-4xl font-black text-[var(--bim-accent)]">LOD 500</p>
        <p class="text-[#6B7280] text-sm mt-2">Max LOD Capability</p>
      </div>
      <div class="bg-white border border-[#E5E7EB] p-8 text-center">
        <p class="text-4xl font-black text-[var(--bim-accent)]">24 hr</p>
        <p class="text-[#6B7280] text-sm mt-2">Response Guarantee</p>
      </div>
      <div class="bg-white border border-[#E5E7EB] p-8 text-center">
        <p class="text-4xl font-black text-[var(--bim-accent)]">ISO 9001</p>
        <p class="text-[#6B7280] text-sm mt-2">Certified Quality</p>
      </div>
    </div>
  </div>
</section>

{{-- Cities we serve --}}
<section class="bg-[var(--bim-base)] py-16 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-6">Locations We Serve</p>
    <div class="flex flex-wrap gap-3">
      @foreach($country['city_focus'] as $city)
        <span class="bg-white border border-[#E5E7EB] text-[var(--bim-text)] font-medium text-sm px-5 py-2">
          {{ $city }}
        </span>
      @endforeach
    </div>
  </div>
</section>

{{-- BIM Services for [Country] --}}
@php
  $allServices = config('bim_individual_services');
@endphp
<section class="bg-white py-20 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-12">
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">What We Deliver</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] leading-tight">
        BIM Services for {{ $country['name'] }}
      </h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($allServices as $slug => $svc)
        <a href="{{ route('bim.service.'.$slug) }}"
           class="group bg-[var(--bim-surface)] border border-[#E5E7EB] p-8 hover:border-[var(--bim-accent)] transition-colors">
          <div class="w-8 h-1 bg-[var(--bim-accent)] mb-6 group-hover:w-16 transition-all duration-300"></div>
          <h3 class="font-bold text-[var(--bim-text)] mb-2 group-hover:text-[var(--bim-accent)] transition-colors">{{ $svc['title'] }}</h3>
          <p class="text-[#6B7280] text-sm leading-relaxed mb-4">{{ Str::limit($svc['tagline'], 90) }}</p>
          <span class="text-[9px] uppercase tracking-[0.2em] text-[var(--bim-accent)]">Learn More →</span>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- Process --}}
<section class="bg-[var(--bim-text)] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-12">
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">How It Works</p>
      <h2 class="text-3xl font-bold text-white leading-tight">Getting Started is Simple</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-px bg-white/10">
      @php
        $steps = [
          ['01','Send Your Brief',    'Email us your drawings, point cloud, or project brief. We\'ll review and respond within 24 hours.'],
          ['02','Agree the Scope',    'We provide a fixed-fee quote with a clear scope, LOD milestones, and delivery timeline.'],
          ['03','Secure File Share',  'Files are shared via BIM 360, Dropbox, or your preferred platform. We sign an NDA before work begins.'],
          ['04','Receive & Review',   'Receive coordinated BIM deliverables on schedule. We provide post-delivery support during construction.'],
        ];
      @endphp
      @foreach($steps as $step)
        <div class="bg-white/5 p-8">
          <p class="text-4xl font-black text-[var(--bim-accent)]/30 leading-none mb-4">{{ $step[0] }}</p>
          <h3 class="font-bold text-white mb-3">{{ $step[1] }}</h3>
          <p class="text-white/60 text-sm leading-relaxed">{{ $step[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- FAQ --}}
<section class="bg-[var(--bim-surface)] py-20 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-12 lg:gap-20">
    <div>
      <p class="text-[9px] uppercase tracking-[0.3em] text-[var(--bim-accent)] mb-3">FAQ</p>
      <h2 class="text-3xl font-bold text-[var(--bim-text)] leading-tight">
        BIM Services in {{ $country['name'] }}<br>— Your Questions Answered
      </h2>
    </div>
    <div class="flex flex-col divide-y divide-[#E5E7EB]">
      @foreach($cntFaqs as $faq)
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

{{-- Other Countries --}}
@if($otherCountries->isNotEmpty())
<section class="bg-[var(--bim-base)] py-16 px-6 lg:px-12 border-t border-[#E5E7EB]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[9px] uppercase tracking-[0.3em] text-[#6B7280] mb-8">BIM Services by Country</p>
    <div class="flex flex-wrap gap-3">
      @foreach($otherCountries as $other)
        <a href="{{ route('bim.country.'.$other['slug']) }}"
           class="flex items-center gap-2 bg-white border border-[#E5E7EB] px-5 py-3 text-sm font-medium text-[var(--bim-text)] hover:border-[var(--bim-accent)] hover:text-[var(--bim-accent)] transition-colors">
          {{ config('bim_countries.'.$other['slug'].'.flag') }}
          BIM Services in {{ $other['name'] }}
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
