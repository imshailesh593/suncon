@extends('layouts.app')

@section('title', ($project->title ?? 'Project').' | '.($globalSettings['site.name'] ?? 'Suncon Engineers'))
@section('description', $project->description ? Str::limit($project->description, 155) : 'Project by Suncon Engineers.')

@section('content')

{{-- Back link --}}
<div class="bg-[#FAF7F3] pt-28 pb-0 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <a href="{{ url('/projects') }}"
       class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200 inline-flex items-center gap-2">
      ← Back to Projects
    </a>
  </div>
</div>

{{-- Hero Image --}}
<section class="bg-[#FAF7F3] pt-8 pb-0">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
    <div class="overflow-hidden aspect-[16/7] bg-[#E8E0D4]">
      @if($project->image)
        <img src="{{ $project->imageUrl }}"
             alt="{{ $project->title }}"
             class="w-full h-full object-cover"
             loading="lazy">
      @else
        <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
      @endif
    </div>
  </div>
</section>

{{-- Project Info --}}
<section class="bg-[#FAF7F3] py-16 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <div class="grid md:grid-cols-[1fr_2fr] gap-16">

      {{-- Metadata sidebar --}}
      <div data-reveal>
        <h1 class="font-display font-light text-display-md text-[#1C1C1C] leading-tight mb-10">
          {{ $project->title }}
        </h1>

        <dl class="flex flex-col gap-6">
          @if($project->client)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Client</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->client }}</dd>
            </div>
          @endif
          @if($project->location)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Location</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->location }}</dd>
            </div>
          @endif
          @if($project->area)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Area</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->area }}</dd>
            </div>
          @endif
          @if($project->year)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Year</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->year }}</dd>
            </div>
          @endif
          @if($project->discipline)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Discipline</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->discipline }}</dd>
            </div>
          @endif
          @if($project->status)
            <div class="border-t border-[#E8E0D4] pt-5">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1.5">Status</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $project->status }}</dd>
            </div>
          @endif
        </dl>
      </div>

      {{-- Description --}}
      <div data-reveal>
        @if($project->description)
          <div class="prose prose-stone max-w-none font-light text-[#1C1C1C] leading-relaxed text-base">
            {!! nl2br(e($project->description)) !!}
          </div>
        @endif

        {{-- Gallery --}}
        @if($project->gallery && count($project->gallery ?? []) > 0)
          <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 gap-5">
            @foreach($project->gallery as $img)
              <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4]">
                <img src="{{ \App\Models\Project::resolveUrl($img) }}"
                     alt="{{ $project->title }} — gallery"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                     loading="lazy">
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- Related Projects --}}
@if(isset($related) && $related->count())
<section class="py-20 bg-[#F2EDE4] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <h2 class="font-display font-light text-display-md text-[#1C1C1C] leading-none mb-12" data-reveal>
      Related Projects
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($related as $rel)
        <a href="{{ url('/projects/'.$rel->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-4">
            @if($rel->image)
              <img src="{{ $rel->imageUrl }}"
                   alt="{{ $rel->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
          </div>
          <h3 class="font-display font-light text-lg text-[#1C1C1C] group-hover:text-[#B5451B] transition-colors duration-300">
            {{ $rel->title }}
          </h3>
          @if($rel->location)
            <p class="text-[10px] uppercase tracking-[0.15em] text-[#8B8275] mt-1">{{ $rel->location }}</p>
          @endif
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
