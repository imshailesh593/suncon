@extends('layouts.app')

@section('title', 'About | Suncon Engineers')
@section('description', 'Suncon Engineers Pvt. Ltd. — 25+ years shaping India built environment through architecture, landscape, interior design and infrastructure.')

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pt-36 pb-24 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2 gap-16 items-end">

    <div>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6" data-reveal>About Suncon</p>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>
        Building for<br><em class="italic text-[#B5451B]">People &amp; Place</em>
      </h1>
    </div>

    <div data-reveal>
      <p class="text-[#1C1C1C] text-base leading-relaxed font-light mb-6">
        Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India. Over 25 years we have delivered architecture, landscape, interior and infrastructure projects that thoughtfully respond to context, climate and the people who inhabit them.
      </p>
      <p class="text-[#8B8275] text-sm leading-relaxed font-light">
        Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.
      </p>
    </div>
  </div>
</section>

{{-- ─── STORY / PHILOSOPHY ─────────────────────────────────────────────── --}}
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1fr_1.2fr] gap-16 items-center">

    <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4]" data-reveal>
      <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
    </div>

    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">Our Philosophy</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-8">
        Design with<br><em class="italic text-[#B5451B]">intention.</em>
      </h2>
      <div class="flex flex-col gap-5 text-[#8B8275] text-sm leading-relaxed font-light">
        <p>We believe great architecture begins with listening — to the site, the community, and the brief. Every project is an opportunity to contribute positively to its context while exceeding client expectations.</p>
        <p>Our practice spans residential towers and campuses, public parks and waterfronts, premium interiors and civic infrastructure. Across all scales, we apply the same rigour: contextual research, sustainable strategies, and meticulous detailing.</p>
        <p>Being ISO-certified reflects our commitment to quality management at every stage — from initial concept to project delivery and beyond.</p>
      </div>

      <div class="mt-10 grid grid-cols-2 gap-6">
        @php
          $values = ['Contextual Design','Sustainability','Client Partnership','Integrated Delivery'];
        @endphp
        @foreach($values as $v)
          <div class="flex items-start gap-3">
            <span class="w-1 h-1 bg-[#B5451B] rounded-full shrink-0 mt-2"></span>
            <span class="text-[10px] uppercase tracking-[0.18em] text-[#1C1C1C]">{{ $v }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ─── STATS BAR ──────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-16 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
    @php
      $aboutStats = [
        ['value'=>'25','suffix'=>'+','label'=>'Years of Practice'],
        ['value'=>'500','suffix'=>'+','label'=>'Projects Delivered'],
        ['value'=>'50','suffix'=>'+','label'=>'Professionals'],
        ['value'=>'100','suffix'=>'+','label'=>'Happy Clients'],
      ];
    @endphp
    @foreach($aboutStats as $stat)
      <div class="text-center" data-reveal>
        <div class="flex items-baseline justify-center gap-0.5 mb-2">
          <span class="font-display font-light text-display-lg text-[#FAF7F3] leading-none"
                data-counter data-target="{{ $stat['value'] }}">0</span>
          <span class="font-display font-light text-display-md text-[#B5451B] leading-none">{{ $stat['suffix'] }}</span>
        </div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.18em]">{{ $stat['label'] }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- ─── TEAM ───────────────────────────────────────────────────────────── --}}
@if(isset($team) && count($team))
<section id="team" class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">The People</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Team</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">
      @foreach($team as $member)
        <div class="group" data-reveal>
          <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4] mb-5">
            @if($member->image)
              <img src="{{ asset($member->image) }}"
                   alt="{{ $member->name }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-gradient-to-b from-[#E8E0D4] to-[#c8bcad] flex items-end p-6">
                <span class="font-display font-light text-3xl text-[#8B8275] opacity-30">{{ substr($member->name, 0, 1) }}</span>
              </div>
            @endif
          </div>
          <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-1">{{ $member->name }}</h3>
          <p class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B] mb-3">{{ $member->role }}</p>
          @if($member->bio)
            <p class="text-[#8B8275] text-sm leading-relaxed font-light">{{ Str::limit($member->bio, 120) }}</p>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@else
{{-- Team placeholder --}}
<section id="team" class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">The People</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Team</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">
      @php
        $placeholderTeam = [
          ['name'=>'Ar. Sunita Wagh','role'=>'Principal Architect','bio'=>'With over 20 years of practice, Sunita leads the architectural studio with a focus on contextual design and sustainable building systems.'],
          ['name'=>'Ar. Rahul Deshpande','role'=>'Associate Director — Interiors','bio'=>'Rahul brings meticulous attention to materiality and spatial experience across residential and commercial interior projects.'],
          ['name'=>'Ar. Priya Kulkarni','role'=>'Landscape Lead','bio'=>'Priya heads the landscape division, crafting outdoor environments that connect communities to nature and place.'],
        ];
      @endphp
      @foreach($placeholderTeam as $member)
        <div class="group" data-reveal>
          <div class="overflow-hidden aspect-[3/4] bg-gradient-to-b from-[#E8E0D4] to-[#c8bcad] mb-5"></div>
          <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-1">{{ $member['name'] }}</h3>
          <p class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B] mb-3">{{ $member['role'] }}</p>
          <p class="text-[#8B8275] text-sm leading-relaxed font-light">{{ $member['bio'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ─── CLIENTS MARQUEE ─────────────────────────────────────────────────── --}}
<section class="bg-[#0F0E0C] py-24 overflow-hidden" data-dark>
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 mb-12" data-reveal>
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Trusted By</p>
    <h2 class="font-display font-light text-display-md text-[#FAF7F3] leading-none">Our Clients</h2>
  </div>

  {{-- Row 1 — scrolls left --}}
  <div class="overflow-hidden mb-6">
    <div id="marquee-row1" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $clients1 = $clients['row1'] ?? ['Tata Group','Godrej Properties','Mahindra Lifespaces','L&T Realty','Prestige Group','Brigade Group','Shapoorji Pallonji','Oberoi Realty'];
        $clients1doubled = array_merge($clients1, $clients1);
      @endphp
      @foreach($clients1doubled as $client)
        <span class="text-[#FAF7F3] text-3xl lg:text-5xl font-display font-light uppercase tracking-[0.1em] shrink-0">
          {{ $client }}
        </span>
        <span class="text-[#B5451B] text-2xl shrink-0">✦</span>
      @endforeach
    </div>
  </div>

  {{-- Row 2 — scrolls right, italic --}}
  <div class="overflow-hidden">
    <div id="marquee-row2" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $clients2 = $clients['row2'] ?? ['MHADA','Smart Cities Mission','NHAI','PWD Maharashtra','CPWD','Municipal Corporation','Kirloskar Group','Bajaj Auto'];
        $clients2doubled = array_merge($clients2, $clients2);
      @endphp
      @foreach($clients2doubled as $client)
        <span class="text-[#8B8275] text-xl lg:text-2xl font-display italic font-light tracking-[0.08em] shrink-0">
          {{ $client }}
        </span>
        <span class="text-[#8B8275] text-lg shrink-0">·</span>
      @endforeach
    </div>
  </div>
</section>

@endsection
