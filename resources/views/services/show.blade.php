@extends('layouts.app')

@section('title', $service->title.' | Suncon Engineers')
@section('description', $service->tagline ?? $service->description)

@push('schema')
@php
$svcSchema = ['@context'=>'https://schema.org','@type'=>'Service','name'=>$service->title,'description'=>$service->description,'url'=>url()->current(),'provider'=>['@id'=>url('/').'/#organization'],'areaServed'=>'India','serviceType'=>$service->title];
$svcBreadcrumb = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>url('/')],['@type'=>'ListItem','position'=>2,'name'=>'Services','item'=>url('/services')],['@type'=>'ListItem','position'=>3,'name'=>$service->title,'item'=>url()->current()]]];
@endphp
<script type="application/ld+json">{!! json_encode($svcSchema,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($svcBreadcrumb,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- Hero: two-column, image right --}}
<section class="bg-[#FAF7F3] pt-36 pb-0 border-b border-[#E8E0D4] overflow-hidden">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-[9px] uppercase tracking-[0.22em] text-[#8B8275] mb-10">
      <a href="{{ url('/') }}" class="hover:text-[#B5451B] transition-colors duration-200">Home</a>
      <span class="opacity-40">/</span>
      <a href="{{ route('services.index') }}" class="hover:text-[#B5451B] transition-colors duration-200">Services</a>
      <span class="opacity-40">/</span>
      <span class="text-[#1C1C1C]">{{ $service->title }}</span>
    </nav>
  </div>

  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 grid md:grid-cols-2 gap-0 items-stretch">

    {{-- Left: title + description + features --}}
    <div class="py-10 lg:py-16 pr-0 lg:pr-16 flex flex-col justify-center" data-reveal>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none mb-10">
        {{ $service->title }}
      </h1>

      <p class="text-[#1C1C1C] text-base leading-relaxed font-light mb-8">
        {{ $service->description }}
      </p>

      @if($service->long_description)
        <p class="text-[#8B8275] text-sm leading-relaxed font-light mb-8">
          {{ $service->long_description }}
        </p>
      @endif

      @if($service->features && count($service->features))
        <p class="text-[9px] uppercase tracking-[0.3em] text-[#8B8275] mb-5">What's Included</p>
        <ul class="flex flex-col gap-3">
          @foreach($service->features as $feat)
            <li class="flex items-start gap-4 text-sm text-[#1C1C1C] font-light">
              <span class="w-5 h-px bg-[#B5451B] shrink-0 mt-2.5"></span>
              {{ $feat }}
            </li>
          @endforeach
        </ul>
      @endif
    </div>

    {{-- Right: image --}}
    <div class="relative overflow-hidden bg-[#E8E0D4]" style="min-height:clamp(280px,50vw,560px);" data-reveal>
      @if($service->imageUrl)
        <img src="{{ $service->imageUrl }}" alt="{{ $service->title }}"
             class="absolute inset-0 w-full h-full object-cover" loading="eager">
      @else
        <div class="absolute inset-0 bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad] flex items-center justify-center">
          <span class="font-display font-light text-8xl text-[#8B8275] opacity-15">{{ substr($service->title, 0, 1) }}</span>
        </div>
      @endif
    </div>

  </div>
</section>

{{-- Process Steps --}}
@if($service->process_steps && count($service->process_steps))
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">How We Work</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Process</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($service->process_steps as $i => $step)
        <div class="bg-[#FAF7F3] p-8" data-reveal>
          <p class="font-display font-light text-display-md text-[#E8E0D4] leading-none mb-4">
            0{{ $i + 1 }}
          </p>
          <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-3">{{ $step['title'] }}</h3>
          @if(!empty($step['description']))
            <p class="text-[#8B8275] text-sm leading-relaxed font-light">{{ $step['description'] }}</p>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- Other Services --}}
@if($others->isNotEmpty())
<section class="bg-[#1C1C1C] py-20 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-10" data-reveal>Other Services</p>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-px bg-white/10">
      @foreach($others as $other)
        <a href="{{ route('services.show', $other->slug) }}"
           class="group bg-[#1C1C1C] p-8 hover:bg-[#242424] transition-colors duration-300" data-reveal>
          <h3 class="font-display font-light text-lg text-[#FAF7F3] mb-2 group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $other->title }}
          </h3>
          @if($other->tagline)
            <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.15em]">{{ $other->tagline }}</p>
          @endif
          <span class="inline-block mt-4 text-[9px] uppercase tracking-[0.2em] text-[#B5451B]">Learn More →</span>
        </a>
      @endforeach

      {{-- Last cell: View all services CTA --}}
      <a href="{{ route('services.index') }}"
         class="group bg-[#B5451B] p-8 flex flex-col justify-between hover:bg-[#9a3a17] transition-colors duration-300" data-reveal>
        <span class="font-display font-light text-lg text-white leading-snug">View all<br>services</span>
        <span class="text-[9px] uppercase tracking-[0.22em] text-white/70 group-hover:text-white transition-colors duration-200 mt-6">→ All Services</span>
      </a>

    </div>
  </div>
</section>
@endif

{{-- FAQ --}}
@php
  $svcFaqs = [
    ['What does '.$service->title.' involve?', $service->description],
    ['Which project types do you handle for '.$service->title.'?', 'We work across residential, commercial, hospitality, healthcare, industrial, institutional, and civic project types. Our multidisciplinary team adapts methodology and detailing to the specific demands of each typology.'],
    ['How do I start a '.$service->title.' project with Suncon?', 'Get in touch via our contact page with a brief project description — location, scale, and timeline. We will respond within 24 hours to arrange an initial consultation.'],
    ['Are you ISO certified?', 'Yes. Suncon Engineers is ISO 9001 certified, meaning our processes for design, documentation, and project delivery meet internationally recognised quality management standards.'],
    ['Do you work across India?', 'Yes. Our head office is in Pune with a branch in Coimbatore. We have delivered projects in 15+ states including Maharashtra, Tamil Nadu, Karnataka, Gujarat, Delhi, and Rajasthan.'],
  ];
@endphp
<section class="bg-[#F2EDE4] py-20 px-6 lg:px-12 border-t border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-12 lg:gap-20">
    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#B5451B] mb-4">FAQ</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Questions about<br>this service</h2>
    </div>
    <div class="flex flex-col divide-y divide-[#E8E0D4]">
      @foreach($svcFaqs as $faq)
        <details class="group py-6" data-reveal>
          <summary class="flex items-start justify-between gap-6 cursor-pointer list-none">
            <h3 class="font-display font-light text-lg text-[#1C1C1C] group-open:text-[#B5451B] transition-colors duration-200 pr-4">{{ $faq[0] }}</h3>
            <span class="shrink-0 w-6 h-6 border border-[#1C1C1C]/20 flex items-center justify-center text-[#8B8275] group-open:border-[#B5451B] group-open:text-[#B5451B] transition-all duration-200 mt-0.5">
              <span class="group-open:hidden">+</span><span class="hidden group-open:block">−</span>
            </span>
          </summary>
          <p class="mt-4 text-[#8B8275] text-sm leading-relaxed font-light">{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>
@push('schema')
@php
  $svcFaqSchema = ['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>collect($svcFaqs)->map(fn($f)=>['@type'=>'Question','name'=>$f[0],'acceptedAnswer'=>['@type'=>'Answer','text'=>$f[1]]])->values()->all()];
@endphp
<script type="application/ld+json">{!! json_encode($svcFaqSchema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

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
