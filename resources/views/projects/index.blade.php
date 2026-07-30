@extends('layouts.app')

@section('title', 'Projects | Suncon Engineers')
@section('description', 'Explore our portfolio of architecture, interior design, landscape and urban projects across India.')

@section('content')

<style>
.proj-pad { padding-left: 5.5rem; padding-right: 5.5rem; }
@media (max-width: 991px) { .proj-pad { padding-left: 2rem; padding-right: 2rem; } }
@media (max-width: 767px) { .proj-pad { padding-left: 1rem; padding-right: 1rem; } }
</style>

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-12 proj-pad">
  <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>Our Work</p>
  <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>Projects</h1>
</section>

{{-- Filter Bar --}}
<section class="bg-[#FAF7F3] sticky top-[60px] z-40 border-b border-[#E8E0D4] proj-pad">
  <div class="flex items-center gap-0 overflow-x-auto">
    @php
      $disciplines = [
        ''             => 'All',
        'architecture' => 'Architecture Design',
        'landscape'    => 'Landscape Design',
        'interior'     => 'Interior Design',
        'urban'        => 'Urban Design',
        'bim'          => 'Architectural BIM',
        'pmc'          => 'PMC',
      ];
      $active = request('discipline', '');
    @endphp
    @foreach($disciplines as $slug => $label)
      <a href="{{ url('/projects') }}{{ $slug ? '?discipline='.$slug : '' }}"
         class="shrink-0 whitespace-nowrap text-[10px] uppercase tracking-[0.18em] px-5 py-4 border-b-2 transition-all duration-200
                {{ $active === $slug
                    ? 'border-[#B5451B] text-[#1C1C1C]'
                    : 'border-transparent text-[#8B8275] hover:text-[#1C1C1C]' }}">
        {{ $label }}
      </a>
    @endforeach
  </div>
</section>

{{-- Projects Grid --}}
<section class="bg-[#FAF7F3] pt-16 pb-28 proj-pad">

  @if($projects->isEmpty())
    <div class="py-32 text-center">
      <p class="font-display font-light text-display-md text-[#E8E0D4]">No projects found.</p>
      <a href="{{ url('/projects') }}" class="mt-8 inline-block text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Clear filter →</a>
    </div>
  @else
    @php
      $dlabels = ['architecture'=>'Architecture Design','landscape'=>'Landscape Design','interior'=>'Interior Design','urban'=>'Urban Design','bim'=>'Architectural BIM','pmc'=>'PMC'];
    @endphp

    {{-- 2-column grid — Archipelago reference: 1.5em col gap, 5em row gap --}}
    <div class="grid grid-cols-1 md:grid-cols-2" style="column-gap:1.5em;row-gap:5em">
      @foreach($projects as $p)
      <a href="{{ url('/projects/'.$p->slug) }}" class="group flex flex-col" style="gap:0.5em" data-reveal>

        {{-- Image --}}
        <div class="overflow-hidden bg-[#E8E0D4] w-full" style="aspect-ratio:3/2">
          @if($p->image)
            <img src="{{ $p->imageUrl }}" alt="{{ $p->title }}"
                 class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-700 ease-out"
                 loading="lazy">
          @else
            <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
          @endif
        </div>

        {{-- Title + subtitle — always two lines for uniformity --}}
        <div class="flex flex-col" style="gap:0.25em">
          <h3 class="font-display font-light text-[1.35rem] text-[#1C1C1C] leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $p->title }}
          </h3>
          <p class="text-[#8B8275] text-[0.7rem] uppercase tracking-[0.18em]">
            {{ $dlabels[$p->discipline] ?? '' }}@if(($dlabels[$p->discipline] ?? '') && $p->location) &nbsp;&middot;&nbsp; @endif{{ $p->location ?? '' }}
          </p>
        </div>

      </a>
      @endforeach
    </div>

    {{-- Pagination --}}
    @if($projects->hasPages())
      <div class="mt-20 flex justify-center">
        {{ $projects->withQueryString()->links() }}
      </div>
    @endif
  @endif

</section>

@endsection
