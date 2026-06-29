@extends('layouts.app')

@section('title', 'Journal | Suncon Engineers')
@section('description', 'Insights on architecture, design, landscape and the built environment from the Suncon Engineers studio.')

@section('content')

{{-- Page Header --}}
<section class="bg-[#FAF7F3] pt-36 pb-16 px-6 lg:px-12 border-b border-[#E8E0D4]">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-[10px] uppercase tracking-[0.3em] text-[#8B8275] mb-5" data-reveal>From the Studio</p>
    <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-none" data-reveal>Journal</h1>
  </div>
</section>

{{-- Articles Grid --}}
<section class="bg-[#FAF7F3] py-16 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    @if(isset($articles) && $articles->count())
      {{-- Featured first article --}}
      @php $first = $articles->first(); $rest = $articles->skip(1); @endphp

      <a href="{{ url('/journal/'.$first->slug) }}" class="group grid md:grid-cols-2 gap-10 mb-16 pb-16 border-b border-[#E8E0D4]" data-reveal>
        <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4]">
          @if($first->image)
            <img src="{{ asset($first->image) }}"
                 alt="{{ $first->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                 loading="lazy">
          @else
            <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
          @endif
        </div>
        <div class="flex flex-col justify-center">
          @if($first->category)
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B] mb-4">{{ $first->category }}</p>
          @endif
          <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-5 group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $first->title }}
          </h2>
          @if($first->excerpt)
            <p class="text-[#8B8275] text-sm leading-relaxed font-light mb-6">{{ Str::limit($first->excerpt, 200) }}</p>
          @endif
          <div class="flex items-center gap-6">
            <p class="text-[10px] text-[#8B8275]">{{ $first->published_at ? $first->published_at->format('d M Y') : '' }}</p>
            <span class="text-[10px] uppercase tracking-[0.2em] text-[#B5451B]">Read More →</span>
          </div>
        </div>
      </a>

      {{-- Remaining articles in grid --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($rest as $article)
          <a href="{{ url('/journal/'.$article->slug) }}" class="group block" data-reveal>
            <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5">
              @if($article->image)
                <img src="{{ asset($article->image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                     loading="lazy">
              @else
                <div class="w-full h-full bg-[#E8E0D4]"></div>
              @endif
            </div>
            @if($article->category)
              <p class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B] mb-2">{{ $article->category }}</p>
            @endif
            <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-2 leading-snug group-hover:text-[#B5451B] transition-colors duration-300">
              {{ $article->title }}
            </h3>
            <p class="text-[#8B8275] text-xs mb-4">{{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</p>
            <span class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B]">Read More →</span>
          </a>
        @endforeach
      </div>

      {{-- Pagination --}}
      @if($articles->hasPages())
        <div class="mt-16 flex justify-center">
          {{ $articles->withQueryString()->links() }}
        </div>
      @endif

    @else
      {{-- Empty state placeholder cards --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @php
          $placeholders = [
            ['cat'=>'Architecture','title'=>'The Role of Biophilic Design in Modern Workplaces'],
            ['cat'=>'Landscape','title'=>'Designing Urban Green Corridors in Indian Cities'],
            ['cat'=>'Interior Design','title'=>'Material Honesty — Why We Let Structure Show'],
            ['cat'=>'Sustainability','title'=>'Net-Zero Buildings: A Practical Framework for India'],
          ];
        @endphp
        @foreach($placeholders as $ph)
          <div class="block" data-reveal>
            <div class="aspect-[4/3] bg-[#E8E0D4] mb-5 animate-pulse"></div>
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B] mb-2">{{ $ph['cat'] }}</p>
            <h3 class="font-display font-light text-xl text-[#1C1C1C] mb-2 leading-snug">{{ $ph['title'] }}</h3>
            <p class="text-[#8B8275] text-xs mb-4">Coming soon</p>
            <span class="text-[10px] uppercase tracking-[0.18em] text-[#B5451B]">Read More →</span>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

@endsection
