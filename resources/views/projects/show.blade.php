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

{{-- 2-Column Layout: Metadata | Auto-scroll Gallery --}}
@php
  $allImages = array_filter([
    $project->image ? $project->imageUrl : null,
    ...array_map(fn($i) => \App\Models\Project::resolveUrl($i), $gallery),
  ]);
  $allImages = array_values(array_unique($allImages));
@endphp
<section class="bg-[#FAF7F3]">
  <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr]">

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

    {{-- Col 2: Auto-scrolling gallery --}}
    <div class="relative overflow-hidden bg-[#E8E0D4]" style="min-height:clamp(340px,55vw,640px);" id="proj-gallery">
      @if(count($allImages))
        <div id="proj-slides" class="flex h-full" style="will-change:transform;">
          @foreach($allImages as $src)
            <div class="shrink-0 w-full h-full" style="min-height:clamp(340px,55vw,640px);">
              <img src="{{ $src }}" alt="{{ $project->title }}"
                   class="w-full h-full object-cover" loading="lazy">
            </div>
          @endforeach
        </div>
        {{-- Dot indicators --}}
        @if(count($allImages) > 1)
          <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="proj-dots">
            @foreach($allImages as $i => $src)
              <button class="w-1.5 h-1.5 rounded-full transition-all duration-300 proj-dot {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/40' }}"
                      data-idx="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
            @endforeach
          </div>
        @endif
      @else
        <div class="w-full h-full bg-gradient-to-br from-[#E8E0D4] to-[#c8bcad]"></div>
      @endif
    </div>

  </div>
</section>

<script>
(function(){
  var slides = document.getElementById('proj-slides');
  if (!slides) return;
  var items = slides.children;
  var total  = items.length;
  if (total < 2) return;
  var dots   = document.querySelectorAll('.proj-dot');
  var current = 0;
  var timer;

  function goTo(n) {
    current = (n + total) % total;
    slides.style.transition = 'transform 0.7s cubic-bezier(0.4,0,0.2,1)';
    slides.style.transform  = 'translateX(-' + (current * 100) + '%)';
    dots.forEach(function(d, i) {
      d.classList.toggle('bg-white', i === current);
      d.classList.toggle('scale-125', i === current);
      d.classList.toggle('bg-white/40', i !== current);
    });
  }

  function next() { goTo(current + 1); }

  function startAuto() { timer = setInterval(next, 3500); }
  function stopAuto()  { clearInterval(timer); }

  dots.forEach(function(d) {
    d.addEventListener('click', function() {
      stopAuto();
      goTo(parseInt(this.dataset.idx));
      startAuto();
    });
  });

  startAuto();
})();
</script>

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
