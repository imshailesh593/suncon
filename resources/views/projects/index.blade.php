@extends('layouts.app')

@section('title', 'Projects | Suncon Engineers')
@section('description', 'Explore our portfolio of architecture, interior design, landscape and urban projects across India.')

@section('content')

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>Our Work</p>
    <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>Projects</h1>
  </div>
</section>

{{-- Filter Bar --}}
<section class="bg-[#FAF7F3] sticky top-[60px] z-40 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
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
           class="shrink-0 whitespace-nowrap text-[10px] uppercase tracking-[0.18em] px-6 py-4 border-b-2 transition-all duration-200
                  {{ $active === $slug
                      ? 'border-[#B5451B] text-[#B5451B]'
                      : 'border-transparent text-[#8B8275] hover:text-[#1C1C1C]' }}">
          {{ $label }}
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- Projects Grid --}}
<section class="bg-[#FAF7F3] py-16 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    @if($projects->isEmpty())
      <div class="py-32 text-center">
        <p class="font-display font-light text-display-md text-[#E8E0D4]">No projects found.</p>
        <a href="{{ url('/projects') }}" class="mt-8 inline-block text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Clear filter →</a>
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
          <a href="{{ url('/projects/'.$project->slug) }}" class="group block" data-reveal>

            {{-- Image --}}
            <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5 relative">
              @if($project->image)
                <img src="{{ $project->imageUrl }}"
                     alt="{{ $project->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                     loading="lazy">
              @else
                <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#d4c9b8]"></div>
              @endif

                      {{-- Discipline badge --}}
              @if($project->discipline)
                @php static $dlabels = ['architecture'=>'Architecture Design','landscape'=>'Landscape Design','interior'=>'Interior Design','urban'=>'Urban Design','bim'=>'Architectural BIM','pmc'=>'PMC']; @endphp
                <span class="absolute bottom-3 left-3 text-[8px] uppercase tracking-[0.22em] bg-[#FAF7F3]/90 text-[#1C1C1C] px-3 py-1.5">
                  {{ $dlabels[$project->discipline] ?? ucfirst($project->discipline) }}
                </span>
              @endif
            </div>

            {{-- Meta --}}
            <h3 class="font-display font-light text-lg text-[#1C1C1C] mb-1.5 leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
              {{ $project->title }}
            </h3>
            <div class="flex items-center gap-3 text-[#8B8275]">
              @if($project->location)
                <span class="text-[10px] uppercase tracking-[0.15em]">{{ $project->location }}</span>
              @endif
              @if($project->location && $project->year)
                <span class="text-[#E8E0D4]">·</span>
              @endif
              @if($project->year)
                <span class="text-[10px]">{{ $project->year }}</span>
              @endif
            </div>
          </a>
        @endforeach
      </div>

      {{-- Pagination --}}
      @if($projects->hasPages())
        <div class="mt-16 flex justify-center">
          {{ $projects->withQueryString()->links() }}
        </div>
      @endif
    @endif
  </div>
</section>

@endsection
