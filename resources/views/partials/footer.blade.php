@php
  $siteName    = $globalSettings['site.name']          ?? 'Suncon Engineers Pvt. Ltd.';
  $siteTagline = $globalSettings['site.tagline']        ?? 'Architecture, Landscape & Interior Design';
  $siteFounded = $globalSettings['site.founded']        ?? '1999';
  $siteEmail   = $globalSettings['site.email']          ?? 'bd@sunconengineers.com';
  $sitePhone   = $globalSettings['site.phone']          ?? '+91 93716 54387';
  $footerNote  = $globalSettings['site.footer_tagline'] ?? 'ISO-certified multidisciplinary consultancy delivering architecture, landscape & infrastructure across India since '.$siteFounded.'.';

  $socials = array_filter([
    'Instagram' => $globalSettings['site.social_instagram'] ?? 'https://www.instagram.com/sunconengineers',
    'LinkedIn'  => $globalSettings['site.social_linkedin']  ?? 'https://www.linkedin.com/company/sunconengineers',
    'Facebook'  => $globalSettings['site.social_facebook']  ?? 'https://www.facebook.com/sunconengineers',
    'YouTube'   => $globalSettings['site.social_youtube']   ?? 'https://www.youtube.com/@SunconEngineers',
    'Twitter'   => $globalSettings['site.social_twitter']   ?? '',
    'Behance'   => $globalSettings['site.social_behance']   ?? '',
  ]);

  $socialIcons = [
    'Instagram' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.5" fill="currentColor" stroke="none"/></svg>',
    'LinkedIn'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>',
    'Facebook'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>',
    'YouTube'   => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 001.95-1.97A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white"/></svg>',
    'Twitter'   => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
    'Behance'   => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 7h-7V5h7v2zm1.726 10c-.442 1.297-2.029 3-5.101 3-3.074 0-5.564-1.729-5.564-5.675 0-3.91 2.325-5.92 5.466-5.92 3.082 0 4.964 1.782 5.375 4.426.078.506.109 1.188.095 2.14H15.97c.13 3.211 3.483 3.312 4.588 2.029h3.168zm-7.686-4h4.965c-.105-1.547-1.136-2.219-2.477-2.219-1.466 0-2.277.768-2.488 2.219zM7.33 9.565c.668 0 1.079.074 1.356.126C9.5 9.9 10.5 10.5 10.5 12c0 1-.508 1.8-1.393 2.172 1.115.374 1.893 1.172 1.893 2.828 0 2.221-1.775 3-4.007 3H1V6h6.33zm-.629 4.437H3.5v2.563h3.201c.972 0 1.6-.383 1.6-1.283 0-.867-.628-1.28-1.6-1.28zm-.186-3.938H3.5v2.188h3.015c.827 0 1.485-.321 1.485-1.094 0-.773-.658-1.094-1.485-1.094z"/></svg>',
  ];
@endphp

<footer class="bg-[#1C1C1C] text-[#FAF7F3] relative">

  {{-- CTA band --}}
  <div class="border-b border-white/10 relative">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-14 md:py-20 flex flex-col md:flex-row items-start md:items-end justify-between gap-8">
      <div>
        <p class="text-[#8B8275] text-xs uppercase tracking-[0.2em] mb-4">Ready to build?</p>
        <h2 class="font-display text-display-lg text-[#FAF7F3] leading-none">
          Let's make<br>
          <span class="font-bold text-[#B5451B]">something great.</span>
        </h2>
      </div>
      <a href="{{ url('/contact') }}"
         class="shrink-0 text-xs uppercase tracking-[0.18em] border border-white/30 text-[#FAF7F3] px-8 py-4 hover:bg-[#B5451B] hover:border-[#B5451B] transition-all duration-300">
        Start a Project
      </a>
    </div>
  </div>

  {{-- Links --}}
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-12 md:py-16 relative">
    <div class="grid grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr] gap-x-10 gap-y-12">

      {{-- Brand --}}
      <div class="col-span-2 lg:col-span-1">
        <a href="{{ url('/') }}" class="font-display text-xl tracking-[0.25em] uppercase text-[#FAF7F3]">
          {{ Str::upper(Str::before($siteName, ' ') ?: 'Suncon') }}
        </a>
        <p class="mt-4 text-[#8B8275] text-sm leading-relaxed max-w-xs">{{ $footerNote }}</p>
        @if(count($socials))
          <div class="flex items-center gap-4 mt-7">
            @foreach($socials as $label => $url)
              <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                 aria-label="{{ $label }}"
                 class="w-9 h-9 flex items-center justify-center rounded-full border border-white/10 text-[#8B8275] hover:text-[#FAF7F3] hover:border-white/30 transition-all duration-200">
                <span class="w-4 h-4 block">{!! $socialIcons[$label] ?? '' !!}</span>
              </a>
            @endforeach
          </div>
        @endif
      </div>

      {{-- Work --}}
      <div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Work</p>
        <ul class="flex flex-col gap-3">
          @foreach([['All Projects','/projects'],['Architecture Design','/projects?discipline=architecture'],['Landscape Design','/projects?discipline=landscape'],['Interior Design','/projects?discipline=interior'],['Urban','/projects?discipline=urban'],['Architectural BIM','/projects?discipline=bim'],['PMC','/projects?discipline=pmc']] as $l)
            <li><a href="{{ url($l[1]) }}" class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">{{ $l[0] }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Practice --}}
      <div>
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Practice</p>
        <ul class="flex flex-col gap-3">
          @foreach([['About','/about'],['Team','/about#team'],['Services','/services'],['Journal','/journal']] as $l)
            <li><a href="{{ url($l[1]) }}" class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">{{ $l[0] }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Connect --}}
      <div class="col-span-2 lg:col-span-1">
        <p class="text-[#8B8275] text-[10px] uppercase tracking-[0.2em] mb-5">Connect</p>
        <ul class="flex flex-col gap-3">
          <li>
            <a href="{{ url('/contact') }}"
               class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">Start a Project</a>
          </li>
          @if($siteEmail)
          <li>
            <a href="mailto:{{ $siteEmail }}"
               class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200 break-all">{{ $siteEmail }}</a>
          </li>
          @endif
          @if($sitePhone)
          <li>
            <a href="tel:{{ preg_replace('/\s+/', '', $sitePhone) }}"
               class="text-[#E8E0D4] text-sm hover:text-[#FAF7F3] transition-colors duration-200">{{ $sitePhone }}</a>
          </li>
          @endif
        </ul>
      </div>
    </div>

    {{-- Bottom bar --}}
    <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-[#8B8275] text-xs">
      <p>© {{ date('Y') }} {{ $siteName }}. All rights reserved.</p>
        <p>Developed by <a href="https://mavericinfotech.in" target="_blank" rel="noopener" class="hover:text-[#FAF7F3] transition-colors duration-200">Maveric Infotech</a></p>
      <div class="flex gap-6">
        <a href="{{ url('/privacy') }}" class="hover:text-[#FAF7F3] transition-colors duration-200">Privacy Policy</a>
        <a href="{{ url('/terms') }}"   class="hover:text-[#FAF7F3] transition-colors duration-200">Terms</a>
      </div>
    </div>
  </div>

</footer>
