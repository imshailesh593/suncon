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

{{-- Hero --}}
<section class="bg-[#FAF7F3] pt-36 pb-20 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <a href="{{ route('services.index') }}"
       class="inline-flex items-center gap-2 text-[9px] uppercase tracking-[0.25em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200 mb-8">
      ← All Services
    </a>
    <div class="grid md:grid-cols-2 gap-16 items-end">
      <div>
        <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>What We Do</p>
        <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>
          {{ $service->title }}
        </h1>
      </div>
      @if($service->tagline)
        <p class="font-display font-light text-xl text-[#B5451B] leading-snug" data-reveal>
          {{ $service->tagline }}
        </p>
      @endif
    </div>
  </div>
</section>

{{-- Hero Image --}}
@if($service->imageUrl)
<div class="w-full aspect-[21/7] overflow-hidden bg-[#E8E0D4]">
  <img src="{{ $service->imageUrl }}" alt="{{ $service->title }}"
       class="w-full h-full object-cover" loading="eager">
</div>
@endif

{{-- Description + Features --}}
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1.4fr_1fr] gap-20">

    {{-- Left: description --}}
    <div data-reveal>
      <p class="text-[#1C1C1C] text-base leading-relaxed font-light mb-8">
        {{ $service->description }}
      </p>
      @if($service->long_description)
        <p class="text-[#8B8275] text-sm leading-relaxed font-light">
          {{ $service->long_description }}
        </p>
      @endif
    </div>

    {{-- Right: features --}}
    @if($service->features && count($service->features))
      <div data-reveal>
        <p class="text-[9px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">What's Included</p>
        <ul class="flex flex-col gap-4">
          @foreach($service->features as $feat)
            <li class="flex items-start gap-4 text-sm text-[#1C1C1C] font-light">
              <span class="w-5 h-px bg-[#B5451B] shrink-0 mt-2.5"></span>
              {{ $feat }}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
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
