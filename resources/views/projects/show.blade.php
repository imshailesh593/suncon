@extends('layouts.app')

@section('title', ($project->title ?? 'Project').' | '.($globalSettings['site.name'] ?? 'Suncon Engineers'))
@section('description', $project->description ? Str::limit($project->description, 155) : 'Project by Suncon Engineers.')

@push('schema')
@php
$projSchema = ['@context'=>'https://schema.org','@type'=>'CreativeWork','name'=>$project->title,'description'=>$project->description??'','url'=>url()->current(),'image'=>$project->image?$project->imageUrl:null,'creator'=>['@id'=>url('/').'/#organization'],'locationCreated'=>$project->location??'India','dateCreated'=>$project->year??null];
$projBreadcrumb = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>url('/')],['@type'=>'ListItem','position'=>2,'name'=>'Projects','item'=>url('/projects')],['@type'=>'ListItem','position'=>3,'name'=>$project->title,'item'=>url()->current()]]];
@endphp
<script type="application/ld+json">{!! json_encode($projSchema,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($projBreadcrumb,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

@php
  $disciplineLabels = ['architecture'=>'Architecture Design','landscape'=>'Landscape Design','interior'=>'Interior Design','urban'=>'Urban Design','bim'=>'Architectural BIM','pmc'=>'PMC'];
  $gallery = $project->gallery ?? [];
  $img1 = $gallery[0] ?? null;
  $img2 = $gallery[1] ?? null;
  $extraGallery = array_slice($gallery, 2);
@endphp

{{-- Hero Image — full bleed, below navbar --}}
<section class="bg-[#1C1C1C] pt-[60px]">
  <div class="overflow-hidden aspect-[16/7] bg-[#E8E0D4]">
    @if($project->image)
      <img src="{{ $project->imageUrl }}" alt="{{ $project->title }}"
           class="w-full h-full object-cover" loading="lazy">
    @else
      <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
    @endif
  </div>
</section>

{{-- 3-Column Layout: Metadata | Image1 | Image2 --}}
<section class="bg-[#FAF7F3]">
  <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-[#E8E0D4]">

    {{-- Col 1: Metadata --}}
    <div class="px-8 lg:px-12 py-14" data-reveal>
      @if($project->discipline)
        <p class="text-[9px] uppercase tracking-[0.3em] text-[#B5451B] mb-4">
          {{ $disciplineLabels[$project->discipline] ?? ucfirst($project->discipline) }}
        </p>
      @endif
      <h1 class="font-display font-light text-[clamp(1.6rem,3vw,2.4rem)] text-[#1C1C1C] leading-tight mb-10">
        {{ $project->title }}
      </h1>

      <dl class="flex flex-col gap-0">
        @foreach([
          ['Client',     $project->client    ?? null],
          ['Location',   $project->location  ?? null],
          ['Area',       $project->area      ?? null],
          ['Year',       $project->year      ?? null],
        ] as [$label, $value])
          @if($value)
            <div class="border-t border-[#E8E0D4] py-4">
              <dt class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-1">{{ $label }}</dt>
              <dd class="text-sm text-[#1C1C1C]">{{ $value }}</dd>
            </div>
          @endif
        @endforeach
      </dl>

      @if($project->description)
        <div class="mt-8 border-t border-[#E8E0D4] pt-6 text-[#8B8275] text-sm leading-relaxed">
          {!! nl2br(e($project->description)) !!}
        </div>
      @endif

      <div class="mt-10">
        <a href="{{ url('/projects') }}"
           class="text-[9px] uppercase tracking-[0.22em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200 inline-flex items-center gap-2">
          ← All Projects
        </a>
      </div>
    </div>

    {{-- Col 2: First gallery image --}}
    <div class="overflow-hidden bg-[#E8E0D4] aspect-[3/4] md:aspect-auto">
      @if($img1)
        <img src="{{ \App\Models\Project::resolveUrl($img1) }}" alt="{{ $project->title }}"
             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" loading="lazy">
      @elseif($project->image)
        <img src="{{ $project->imageUrl }}" alt="{{ $project->title }}"
             class="w-full h-full object-cover" loading="lazy">
      @else
        <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
      @endif
    </div>

    {{-- Col 3: Second gallery image --}}
    <div class="overflow-hidden bg-[#E8E0D4] aspect-[3/4] md:aspect-auto">
      @if($img2)
        <img src="{{ \App\Models\Project::resolveUrl($img2) }}" alt="{{ $project->title }}"
             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" loading="lazy">
      @else
        <div class="w-full h-full bg-[#EDE6DC] flex items-center justify-center">
          <span class="text-[9px] uppercase tracking-[0.25em] text-[#C8C0B8]">More images soon</span>
        </div>
      @endif
    </div>

  </div>
</section>

{{-- Extra gallery images (3rd onwards) --}}
@if(count($extraGallery))
<section class="bg-[#FAF7F3] px-6 lg:px-12 pb-16">
  <div class="max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-[#E8E0D4]">
    @foreach($extraGallery as $img)
      <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4]">
        <img src="{{ \App\Models\Project::resolveUrl($img) }}" alt="{{ $project->title }}"
             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" loading="lazy">
      </div>
    @endforeach
  </div>
</section>
@endif

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
