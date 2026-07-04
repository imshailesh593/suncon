@php $onHome = request()->routeIs('home'); @endphp
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        style="{{ $onHome ? '' : 'background:#FAF7F3;border-bottom:1px solid #E8E0D4;' }}">
  <div class="max-w-screen-xl mx-auto px-6 lg:px-12 flex items-center justify-between h-[60px]">

    {{-- Logo --}}
    <a href="{{ url('/') }}"
       class="nav-logo font-body font-light text-[15px] tracking-[0.5em] uppercase z-10 transition-colors duration-300"
       style="color:{{ $onHome ? 'white' : '#1C1C1C' }}"
       id="nav-logo">
      SUNC<span style="color:#B5451B">O</span>N
    </a>

    {{-- Desktop nav --}}
    <nav class="hidden md:flex items-center gap-8">
      @foreach([['Projects','/projects'],['About','/about'],['Journal','/journal']] as $item)
        @php $active = request()->is(ltrim($item[1],'/')) || request()->is(ltrim($item[1],'/').'/*'); @endphp
        <a href="{{ url($item[1]) }}"
           class="nav-link font-body font-light text-[10px] uppercase tracking-[0.22em] transition-colors duration-200"
           style="color:{{ $active ? '#B5451B' : ($onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C') }}">
          {{ $item[0] }}
        </a>
      @endforeach

      {{-- Services dropdown --}}
      <div class="relative" id="services-dropdown">
        @php $svcActive = request()->is('services') || request()->is('services/*'); @endphp
        <a href="{{ url('/services') }}"
           class="nav-link font-body font-light text-[10px] uppercase tracking-[0.22em] transition-colors duration-200 flex items-center gap-1.5"
           style="color:{{ $svcActive ? '#B5451B' : ($onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C') }}">
          Services
          <svg class="w-2.5 h-2.5 opacity-50" viewBox="0 0 10 6" fill="none">
            <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
          </svg>
        </a>
        <div id="services-menu" class="absolute top-full left-1/2 -translate-x-1/2 pt-3 opacity-0 invisible transition-opacity duration-200 z-50">
          <div class="bg-[#FAF7F3] border border-[#E8E0D4] shadow-lg min-w-[220px] py-2">
            @foreach([
              ['Architecture Design', 'architectural-design'],
              ['Landscape Design',    'landscape-design'],
              ['Interior Design',     'interior-design'],
              ['Urban Design',        'urban-design'],
              ['Architectural BIM',   'architectural-bim'],
              ['PMC',                 'pmc'],
            ] as $svc)
              <a href="{{ route('services.show', $svc[1]) }}"
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
      <span class="menu-bar w-6 h-px block transition-all duration-300" style="background:{{ $onHome ? 'white' : '#1C1C1C' }}"></span>
      <span class="menu-bar w-6 h-px block transition-all duration-300" style="background:{{ $onHome ? 'white' : '#1C1C1C' }}"></span>
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
            ['Architecture Design', 'architectural-design'],
            ['Landscape Design',    'landscape-design'],
            ['Interior Design',     'interior-design'],
            ['Urban Design',        'urban-design'],
            ['Architectural BIM',   'architectural-bim'],
            ['PMC',                 'pmc'],
          ] as $svc)
            <a href="{{ route('services.show', $svc[1]) }}"
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
<script>
(function(){
  // Services dropdown
  var wrap = document.getElementById('services-dropdown');
  var menu = document.getElementById('services-menu');
  if (wrap && menu) {
    var t;
    wrap.addEventListener('mouseenter', function(){ clearTimeout(t); menu.style.opacity='1'; menu.style.visibility='visible'; });
    wrap.addEventListener('mouseleave', function(){ t = setTimeout(function(){ menu.style.opacity='0'; menu.style.visibility='hidden'; }, 100); });
  }

  // Navbar scroll behaviour (home page only)
  var onHome = {{ $onHome ? 'true' : 'false' }};
  if (!onHome) return;

  var navbar  = document.getElementById('navbar');
  var links   = navbar.querySelectorAll('.nav-link, .nav-logo');
  var bars    = navbar.querySelectorAll('.menu-bar');

  function update() {
    var scrolled = window.scrollY > 60;
    navbar.style.background    = scrolled ? '#FAF7F3' : '';
    navbar.style.borderBottom  = scrolled ? '1px solid #E8E0D4' : '';
    links.forEach(function(el) {
      if (el.style.color === 'rgb(181, 69, 27)') return; // keep active link orange
      el.style.color = scrolled ? '#1C1C1C' : 'rgba(255,255,255,0.85)';
    });
    bars.forEach(function(el) { el.style.background = scrolled ? '#1C1C1C' : 'white'; });
  }

  window.addEventListener('scroll', update, { passive: true });
  update();
})();
</script>
