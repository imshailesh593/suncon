@extends('layouts.app')

@section('title', ($article->title ?? 'Article').' | Suncon Journal')
@section('description', $article->excerpt ? Str::limit($article->excerpt, 155) : 'Read more at the Suncon Engineers journal.')

@section('content')

{{-- Back --}}
<div class="bg-[#FAF7F3] pt-28 pb-0 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <a href="{{ url('/journal') }}"
       class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200 inline-flex items-center gap-2">
      ← Back to Journal
    </a>
  </div>
</div>

{{-- Hero --}}
<section class="bg-[#FAF7F3] py-10 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">

    {{-- Meta --}}
    <div class="flex items-center gap-4 mb-8" data-reveal>
      @if($article->category)
        <span class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B]">{{ $article->category }}</span>
        <span class="text-[#E8E0D4]">·</span>
      @endif
      @if($article->published_at)
        <span class="text-[10px] text-[#8B8275]">{{ $article->published_at->format('d M Y') }}</span>
      @endif
    </div>

    <h1 class="font-display font-light text-display-lg text-[#1C1C1C] leading-tight mb-10 max-w-4xl" data-reveal>
      {{ $article->title }}
    </h1>

    @if($article->image)
      <div class="overflow-hidden aspect-[16/7] bg-[#E8E0D4] mb-16" data-reveal>
        <img src="{{ asset($article->image) }}"
             alt="{{ $article->title }}"
             class="w-full h-full object-cover"
             loading="lazy">
      </div>
    @endif
  </div>
</section>

{{-- Body --}}
<section class="bg-[#FAF7F3] pb-24 px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-[2fr_1fr] gap-16">

    {{-- Article body --}}
    <div data-reveal>
      @if($article->excerpt)
        <p class="text-[#1C1C1C] text-xl font-display font-light leading-relaxed mb-8 italic">
          {{ $article->excerpt }}
        </p>
        <div class="w-12 h-px bg-[#B5451B] mb-8"></div>
      @endif

      @if($article->body)
        <div class="prose prose-stone prose-lg max-w-none font-light leading-relaxed text-[#1C1C1C]
                    prose-headings:font-display prose-headings:font-light
                    prose-a:text-[#B5451B] prose-a:no-underline hover:prose-a:underline">
          {!! $article->body !!}
        </div>
      @else
        <p class="text-[#8B8275] text-base leading-relaxed">Content coming soon.</p>
      @endif
    </div>

    {{-- Sidebar --}}
    <div class="md:pt-2" data-reveal>
      @if($article->author)
        <div class="mb-10 p-6 bg-[#F2EDE4]">
          <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-3">Author</p>
          <p class="font-display font-light text-lg text-[#1C1C1C]">{{ $article->author }}</p>
        </div>
      @endif

      <div class="p-6 bg-[#F2EDE4]">
        <p class="text-[9px] uppercase tracking-[0.25em] text-[#8B8275] mb-5">Start a Project</p>
        <p class="text-sm text-[#8B8275] leading-relaxed mb-5 font-light">Have a project in mind? We'd love to hear about it.</p>
        <a href="{{ url('/contact') }}"
           class="inline-block text-[10px] uppercase tracking-[0.18em] border border-[#1C1C1C]/30 px-6 py-3 hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300">
          Get in Touch →
        </a>
      </div>
    </div>
  </div>
</section>

{{-- Related articles --}}
@if(isset($related) && $related->count())
<section class="py-20 bg-[#F2EDE4] px-6 lg:px-12">
  <div class="max-w-screen-xl mx-auto">
    <h2 class="font-display font-light text-display-md text-[#1C1C1C] mb-12" data-reveal>More from the Journal</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
      @foreach($related as $rel)
        <a href="{{ url('/journal/'.$rel->slug) }}" class="group block" data-reveal>
          <div class="overflow-hidden aspect-[4/3] bg-[#E8E0D4] mb-5">
            @if($rel->image)
              <img src="{{ asset($rel->image) }}"
                   alt="{{ $rel->title }}"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                   loading="lazy">
            @else
              <div class="w-full h-full bg-[#E8E0D4]"></div>
            @endif
          </div>
          @if($rel->category)
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#B5451B] mb-2">{{ $rel->category }}</p>
          @endif
          <h3 class="font-display font-light text-lg text-[#1C1C1C] group-hover:text-[#B5451B] transition-colors duration-300 leading-snug">
            {{ $rel->title }}
          </h3>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
