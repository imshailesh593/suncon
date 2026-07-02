<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 flex items-center justify-between h-[60px]">

    {{-- Logo --}}
    <a href="{{ url('/') }}" class="font-body font-light text-[15px] tracking-[0.5em] uppercase text-[#1C1C1C] z-10" id="nav-logo">
      SUNC<span class="text-[#B5451B]">O</span>N
    </a>

    {{-- Desktop nav --}}
    <nav class="hidden md:flex items-center gap-8">
      @foreach([['Projects','/projects'],['About','/about'],['Journal','/journal']] as $item)
        <a href="{{ url($item[1]) }}"
           class="font-body font-light text-[10px] uppercase tracking-[0.22em] text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 {{ request()->is(ltrim($item[1],'/')) || request()->is(ltrim($item[1],'/').'/*') ? 'text-[#B5451B]' : '' }}">
          {{ $item[0] }}
        </a>
      @endforeach

      {{-- Services dropdown --}}
      <div class="relative group">
        <a href="{{ url('/services') }}"
           class="font-body font-light text-[10px] uppercase tracking-[0.22em] text-[#1C1C1C] hover:text-[#B5451B] transition-colors duration-200 flex items-center gap-1.5 {{ request()->is('services') || request()->is('services/*') ? 'text-[#B5451B]' : '' }}">
          Services
          <svg class="w-2.5 h-2.5 opacity-50 group-hover:opacity-100 transition-opacity" viewBox="0 0 10 6" fill="none">
            <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
          </svg>
        </a>
        <div class="absolute top-full left-1/2 -translate-x-1/2 pt-4 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-200 z-50">
          <div class="bg-[#FAF7F3] border border-[#E8E0D4] shadow-lg min-w-[220px] py-2">
            @foreach([
              ['Architecture Design',  '/services#architectural-design'],
              ['Landscape Design',     '/services#landscape-design'],
              ['Interior Design',      '/services#interior-design'],
              ['Urban Design',         '/services#urban-design'],
              ['Architectural BIM',    '/services#architectural-bim'],
              ['PMC',                  '/services#pmc'],
            ] as $svc)
              <a href="{{ url($svc[1]) }}"
                 class="block px-5 py-2.5 text-[9px] uppercase tracking-[0.2em] text-[#1C1C1C] hover:text-[#B5451B] hover:bg-[#F2EDE4] transition-colors duration-150">
                {{ $svc[0] }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </nav>

    {{-- CTA --}}
    <a href="{{ url('/contact') }}" id="nav-cta"
       class="hidden md:flex font-body font-light text-[10px] uppercase tracking-[0.22em] items-center gap-2 px-5 py-2.5 bg-[#B5451B] text-white hover:opacity-90 transition-all duration-300">
      Start a Project <span>→</span>
    </a>

    {{-- Hamburger --}}
    <button id="menu-toggle" class="md:hidden flex flex-col gap-1.5 z-10" aria-label="Toggle menu">
      <span class="menu-bar w-6 h-px bg-[#1C1C1C] block transition-all duration-300"></span>
      <span class="menu-bar w-6 h-px bg-[#1C1C1C] block transition-all duration-300"></span>
    </button>
  </div>

  {{-- Mobile menu --}}
  <div id="mobile-menu" class="fixed inset-0 bg-[#FAF7F3] flex flex-col justify-between px-6 pt-24 pb-12 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden">
    <nav class="flex flex-col gap-6">
      @foreach([['Projects','/projects'],['About','/about'],['Journal','/journal'],['Contact','/contact']] as $item)
        <a href="{{ url($item[1]) }}" class="font-display text-display-md text-[#1C1C1C] leading-none">{{ $item[0] }}</a>
      @endforeach
      <div>
        <a href="{{ url('/services') }}" class="font-display text-display-md text-[#1C1C1C] leading-none block mb-4">Services</a>
        <div class="flex flex-col gap-3 pl-4 border-l border-[#E8E0D4]">
          @foreach([
            ['Architecture Design', '/services#architectural-design'],
            ['Landscape Design',    '/services#landscape-design'],
            ['Interior Design',     '/services#interior-design'],
            ['Urban Design',        '/services#urban-design'],
            ['Architectural BIM',   '/services#architectural-bim'],
            ['PMC',                 '/services#pmc'],
          ] as $svc)
            <a href="{{ url($svc[1]) }}"
               class="text-[10px] uppercase tracking-[0.2em] text-[#8B8275] hover:text-[#B5451B] transition-colors duration-200">
              {{ $svc[0] }}
            </a>
          @endforeach
        </div>
      </div>
    </nav>
    <div>
      <a href="{{ url('/contact') }}" class="text-[10px] uppercase tracking-[0.28em] border border-[#1C1C1C]/20 px-7 py-3.5 hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300 inline-block">Start a Project →</a>
      <p class="text-[#8B8275] text-xs tracking-wide mt-5">{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}</p>
    </div>
  </div>
</header>
