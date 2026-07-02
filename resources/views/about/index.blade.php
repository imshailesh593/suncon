@extends('layouts.app')

@section('title', 'About | '.($settings['site.name'] ?? 'Suncon Engineers'))
@section('description', ($settings['site.seo_description'] ?? 'Suncon Engineers Pvt. Ltd. — 25+ years shaping India\'s built environment through architecture, landscape, interior design and infrastructure.'))

@section('content')

{{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
<section class="bg-[#FAF7F3] pt-36 pb-24 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2 gap-16 items-end">
    <div>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6" data-reveal>About Suncon</p>
      <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>
        {{ $settings['about.hero_line1'] ?? 'Building for' }}<br>
        <em class="italic text-[#B5451B]">{{ $settings['about.hero_line2'] ?? 'People & Place' }}</em>
      </h1>
    </div>
    <div data-reveal>
      <p class="text-[#1C1C1C] text-base leading-relaxed font-light mb-6">
        {{ $settings['about.intro_p1'] ?? 'Founded in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary design consultancy headquartered in Pune, India. Over 25 years we have delivered architecture, landscape, interior and infrastructure projects that thoughtfully respond to context, climate and the people who inhabit them.' }}
      </p>
      <p class="text-[#8B8275] text-sm leading-relaxed font-light">
        {{ $settings['about.intro_p2'] ?? 'Our integrated studio brings together architects, landscape architects, interior designers, BIM specialists and project managers under one roof — enabling seamless collaboration from feasibility through to handover.' }}
      </p>
    </div>
  </div>
</section>

{{-- ─── PHILOSOPHY ─────────────────────────────────────────────────────── --}}
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[1fr_1.2fr] gap-16 items-center">
    <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4]" data-reveal>
      <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
    </div>
    <div data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-6">
        {{ $settings['about.philosophy_eyebrow'] ?? 'Our Philosophy' }}
      </p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-8">
        <em class="italic text-[#B5451B]">{{ $settings['about.philosophy_title'] ?? 'Design with intention.' }}</em>
      </h2>
      <div class="flex flex-col gap-5 text-[#8B8275] text-sm leading-relaxed font-light">
        <p>{{ $settings['about.philosophy_p1'] ?? 'We believe great architecture begins with listening — to the site, the community, and the brief. Every project is an opportunity to contribute positively to its context while exceeding client expectations.' }}</p>
        <p>{{ $settings['about.philosophy_p2'] ?? 'Our practice spans residential towers and campuses, public parks and waterfronts, premium interiors and civic infrastructure. Across all scales, we apply the same rigour: contextual research, sustainable strategies, and meticulous detailing.' }}</p>
        <p>{{ $settings['about.philosophy_p3'] ?? 'Being ISO-certified reflects our commitment to quality management at every stage — from initial concept to project delivery and beyond.' }}</p>
      </div>
      @php
        $valuesList = array_filter(array_map('trim', explode("\n", $settings['about.values'] ?? "Contextual Design\nSustainability\nClient Partnership\nIntegrated Delivery")));
      @endphp
      <div class="mt-10 grid grid-cols-2 gap-6">
        @foreach($valuesList as $v)
          <div class="flex items-start gap-3">
            <span class="w-1 h-1 bg-[#B5451B] rounded-full shrink-0 mt-2"></span>
            <span class="text-[10px] uppercase tracking-[0.18em] text-[#1C1C1C]">{{ $v }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- ─── STATS ───────────────────────────────────────────────────────────── --}}
<section class="bg-[#1C1C1C] py-16 px-6 lg:px-12" data-dark>
  <div class="max-w-screen-xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
    @php
      $aboutStats = !empty($statistics) ? $statistics : [
        ['value'=>'25','suffix'=>'+','label'=>'Years of Practice'],
        ['value'=>'500','suffix'=>'+','label'=>'Projects Delivered'],
        ['value'=>'50','suffix'=>'+','label'=>'Professionals'],
        ['value'=>'100','suffix'=>'+','label'=>'Happy Clients'],
      ];
    @endphp
    @foreach($aboutStats as $stat)
      <div class="text-center" data-reveal>
        <div class="flex items-baseline justify-center gap-0.5 mb-2">
          <span class="font-display font-light text-display-lg text-[#FAF7F3] leading-none" data-counter data-target="{{ $stat['value'] }}">0</span>
          <span class="font-display font-light text-display-md text-[#B5451B] leading-none">{{ $stat['suffix'] }}</span>
        </div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.18em]">{{ $stat['label'] }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- ─── TEAM ───────────────────────────────────────────────────────────── --}}
<section id="team" class="py-24 bg-[#FAF7F3] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">The People</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Our Team</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">
      @forelse($team as $member)
        <div class="group" data-reveal>
          <div class="overflow-hidden aspect-[3/4] bg-[#E8E0D4] mb-5">
            @if($member->imageUrl)
              <img src="{{ $member->imageUrl }}" alt="{{ $member->name }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
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
          @if($member->linkedin)
            <a href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer"
               class="inline-block mt-3 text-[9px] uppercase tracking-[0.18em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200">
              LinkedIn →
            </a>
          @endif
        </div>
      @empty
        @foreach([['Ar. Sunita Wagh','Principal Architect','With over 20 years of practice, Sunita leads the architectural studio with a focus on contextual design and sustainable building systems.'],['Ar. Rahul Deshpande','Associate Director — Interiors','Rahul brings meticulous attention to materiality and spatial experience across residential and commercial interior projects.'],['Ar. Priya Kulkarni','Landscape Lead','Priya heads the landscape division, crafting outdoor environments that connect communities to nature and place.']] as [$name,$role,$bio])
          <div class="group" data-reveal>
            <div class="overflow-hidden aspect-[3/4] bg-gradient-to-b from-[#E8E0D4] to-[#c8bcad] mb-5"></div>
            <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-1">{{ $name }}</h3>
            <p class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B] mb-3">{{ $role }}</p>
            <p class="text-[#8B8275] text-sm leading-relaxed font-light">{{ $bio }}</p>
          </div>
        @endforeach
      @endforelse
    </div>
  </div>
</section>

{{-- ─── TESTIMONIALS ───────────────────────────────────────────────────── --}}
@if(isset($testimonials) && $testimonials->count())
<section class="bg-[#F2EDE4] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Client Voices</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">What They Say</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($testimonials as $t)
        <div class="bg-white p-8 flex flex-col" data-reveal>
          {{-- Stars --}}
          <div class="flex gap-1 mb-6">
            @for($s = 1; $s <= 5; $s++)
              <span class="{{ $s <= ($t->rating ?? 5) ? 'text-[#B5451B]' : 'text-[#E8E0D4]' }} text-sm">★</span>
            @endfor
          </div>
          <blockquote class="font-display font-light text-[1.05rem] leading-relaxed text-[#1C1C1C] italic mb-8 flex-1">
            "{{ $t->quote }}"
          </blockquote>
          <div class="flex items-center gap-4 border-t border-[#E8E0D4] pt-6">
            @if($t->imageUrl)
              <img src="{{ $t->imageUrl }}" alt="{{ $t->client_name }}"
                   class="w-10 h-10 rounded-full object-cover shrink-0">
            @else
              <div class="w-10 h-10 rounded-full bg-[#E8E0D4] flex items-center justify-center shrink-0">
                <span class="font-display text-sm text-[#8B8275]">{{ substr($t->client_name, 0, 1) }}</span>
              </div>
            @endif
            <div>
              <p class="text-sm font-medium text-[#1C1C1C]">{{ $t->client_name }}</p>
              @if($t->role || $t->company)
                <p class="text-[9px] uppercase tracking-[0.18em] text-[#8B8275]">
                  {{ implode(', ', array_filter([$t->role, $t->company])) }}
                </p>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ─── AWARDS ─────────────────────────────────────────────────────────── --}}
@if(isset($awards) && $awards->count())
<section class="bg-[#FAF7F3] py-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="mb-16" data-reveal>
      <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-4">Recognition</p>
      <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none">Awards & Honours</h2>
    </div>
    <div class="flex flex-col divide-y divide-[#E8E0D4]">
      @foreach($awards as $award)
        <div class="py-7 grid grid-cols-[auto_1fr_auto] gap-8 items-center" data-reveal>
          <span class="font-display font-light text-display-md text-[#E8E0D4] leading-none w-16 shrink-0">{{ $award->year }}</span>
          <div>
            <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-1">{{ $award->title }}</h3>
            <p class="text-[9px] uppercase tracking-[0.2em] text-[#8B8275]">{{ $award->organization }} — {{ $award->category }}</p>
          </div>
          @if($award->imageUrl)
            <img src="{{ $award->imageUrl }}" alt="{{ $award->title }}" class="w-14 h-14 object-contain shrink-0 opacity-60">
          @endif
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
  <div class="overflow-hidden mb-6">
    <div id="marquee-row1" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $c1 = $clients['row1'] ?? ['Tata Group','Godrej Properties','Mahindra Lifespaces','L&T Realty','Prestige Group','Brigade Group','Shapoorji Pallonji','Oberoi Realty'];
        $c1 = array_merge($c1, $c1);
      @endphp
      @foreach($c1 as $client)
        <span class="text-[#FAF7F3] text-3xl lg:text-5xl font-display font-light uppercase tracking-[0.1em] shrink-0">{{ $client }}</span>
        <span class="text-[#B5451B] text-2xl shrink-0">✦</span>
      @endforeach
    </div>
  </div>
  <div class="overflow-hidden">
    <div id="marquee-row2" class="flex items-center gap-10 whitespace-nowrap" style="width: max-content">
      @php
        $c2 = $clients['row2'] ?? ['MHADA','Smart Cities Mission','NHAI','PWD Maharashtra','CPWD','Municipal Corporation','Kirloskar Group','Bajaj Auto'];
        $c2 = array_merge($c2, $c2);
      @endphp
      @foreach($c2 as $client)
        <span class="text-[#8B8275] text-xl lg:text-2xl font-display italic font-light tracking-[0.08em] shrink-0">{{ $client }}</span>
        <span class="text-[#8B8275] text-lg shrink-0">·</span>
      @endforeach
    </div>
  </div>
</section>

@endsection
