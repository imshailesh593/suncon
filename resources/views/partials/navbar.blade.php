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
      @foreach([['Projects','/projects'],['About','/about']] as $item)
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

      {{-- Journal (after Services) --}}
      @php $journalActive = request()->is('journal') || request()->is('journal/*'); @endphp
      <a href="{{ url('/journal') }}"
         class="nav-link font-body font-light text-[10px] uppercase tracking-[0.22em] transition-colors duration-200"
         style="color:{{ $journalActive ? '#B5451B' : ($onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C') }}">
        Journal
      </a>

      {{-- Contact --}}
      @php $contactActive = request()->is('contact'); @endphp
      <a href="{{ url('/contact') }}"
         class="nav-link font-body font-light text-[10px] uppercase tracking-[0.22em] transition-colors duration-200"
         style="color:{{ $contactActive ? '#B5451B' : ($onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C') }}">
        Contact
      </a>

      {{-- BIM site link --}}
      <a href="{{ url('/bim') }}"
         class="font-body font-medium text-[9px] uppercase tracking-[0.22em] px-3 py-1 border transition-all duration-200"
         style="background:#B5451B;border-color:#B5451B;color:#fff;"
         onmouseover="this.style.background='#fff';this.style.borderColor='#fff';this.style.color='#B5451B'"
         onmouseout="this.style.background='#B5451B';this.style.borderColor='#B5451B';this.style.color='#fff'">
        BIM ↗
      </a>
    </nav>

    {{-- Search trigger --}}
    <button id="search-trigger" aria-label="Search"
            class="hidden md:flex items-center justify-center w-8 h-8 transition-opacity duration-200 hover:opacity-60 z-10">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" id="search-icon-svg">
        <circle cx="6.5" cy="6.5" r="5" stroke="{{ $onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C' }}" stroke-width="1.2"/>
        <path d="M10.5 10.5L14 14" stroke="{{ $onHome ? 'rgba(255,255,255,0.85)' : '#1C1C1C' }}" stroke-width="1.2" stroke-linecap="round"/>
      </svg>
    </button>

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

  {{-- Search overlay --}}
  <div id="search-overlay" class="fixed inset-0 z-[9990] flex flex-col opacity-0 pointer-events-none transition-opacity duration-300" style="background:rgba(250,247,243,0.97);backdrop-filter:blur(8px);">
    <div class="max-w-screen-xl mx-auto w-full px-6 lg:px-12 pt-20 pb-10 flex-1 flex flex-col">
      <div class="flex items-center gap-4 border-b-2 border-[#1C1C1C] pb-4">
        <svg width="20" height="20" viewBox="0 0 16 16" fill="none" class="shrink-0 opacity-40">
          <circle cx="6.5" cy="6.5" r="5" stroke="#1C1C1C" stroke-width="1.4"/>
          <path d="M10.5 10.5L14 14" stroke="#1C1C1C" stroke-width="1.4" stroke-linecap="round"/>
        </svg>
        <input id="search-input" type="text" placeholder="Search projects, services, journal…"
               class="flex-1 bg-transparent font-display text-[clamp(1.4rem,3vw,2.2rem)] text-[#1C1C1C] placeholder-[#C8C0B8] outline-none"
               autocomplete="off" spellcheck="false"/>
        <button id="search-close" class="text-[#8B8275] hover:text-[#1C1C1C] transition-colors text-xs uppercase tracking-[0.2em]">
          ESC
        </button>
      </div>

      <div id="search-results" class="mt-8 flex-1 overflow-y-auto"></div>

      <p class="text-[10px] uppercase tracking-[0.22em] text-[#C8C0B8] mt-6">
        Type to search across all projects and journal articles
      </p>
    </div>
  </div>

  {{-- Mobile menu --}}
  <div id="mobile-menu" class="fixed inset-0 bg-[#FAF7F3] flex flex-col justify-between px-6 pt-24 pb-12 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden">
    <nav class="flex flex-col gap-6">
      @foreach([['Projects','/projects'],['About','/about'],['Journal','/journal'],['Contact','/contact']] as $item)
        <a href="{{ url($item[1]) }}" class="font-display text-display-md text-[#1C1C1C] leading-none">{{ $item[0] }}</a>
      @endforeach
      <div>
        <a href="{{ url('/services') }}" class="font-display text-display-md text-[#1C1C1C] leading-none block mb-4">Services</a>
        <div class="flex flex-col gap-3 pl-4 border-l border-[#E8E0D4] mb-4">
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
      <a href="{{ url('/bim') }}" class="text-[10px] uppercase tracking-[0.28em] border border-[#B5451B]/50 text-[#B5451B] px-7 py-3.5 hover:bg-[#B5451B] hover:border-[#B5451B] hover:text-white transition-all duration-300 inline-block mb-4">BIM Services ↗</a>
      <br>
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

// ── Search overlay ──────────────────────────────────────────────────────────
(function(){
  var trigger  = document.getElementById('search-trigger');
  var overlay  = document.getElementById('search-overlay');
  var input    = document.getElementById('search-input');
  var results  = document.getElementById('search-results');
  var closeBtn = document.getElementById('search-close');
  var iconSvg  = document.getElementById('search-icon-svg');
  if (!trigger || !overlay) return;

  // Keep icon color in sync with navbar scroll state
  var navbar  = document.getElementById('navbar');
  var iconStrokes = iconSvg ? iconSvg.querySelectorAll('[stroke]') : [];
  function syncIconColor() {
    var dark = navbar && (navbar.style.background === '' && document.body.classList.contains('hide-cursor'));
    // simpler: derive from first nav-link color
    var firstLink = navbar ? navbar.querySelector('.nav-link') : null;
    var col = firstLink ? firstLink.style.color : '#1C1C1C';
    iconStrokes.forEach(function(el){ el.setAttribute('stroke', col); });
  }
  window.addEventListener('scroll', syncIconColor, { passive: true });

  function open() {
    overlay.style.opacity = '1';
    overlay.style.pointerEvents = 'auto';
    document.body.style.overflow = 'hidden';
    setTimeout(function(){ input.focus(); }, 50);
  }
  function close() {
    overlay.style.opacity = '0';
    overlay.style.pointerEvents = 'none';
    document.body.style.overflow = '';
    input.value = '';
    results.innerHTML = '';
  }

  trigger.addEventListener('click', open);
  closeBtn.addEventListener('click', close);
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') close();
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') { e.preventDefault(); open(); }
  });

  var debounce;
  input.addEventListener('input', function(){
    clearTimeout(debounce);
    var q = input.value.trim();
    if (q.length < 2) { results.innerHTML = ''; return; }
    debounce = setTimeout(function(){
      fetch('/search?q=' + encodeURIComponent(q))
        .then(function(r){ return r.json(); })
        .then(function(data){ renderResults(data.results, q); });
    }, 220);
  });

  function renderResults(items, q) {
    if (!items.length) {
      results.innerHTML = '<p class="text-[#8B8275] text-sm tracking-wide">No results for "' + q + '"</p>';
      return;
    }
    var html = '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">';
    items.forEach(function(item){
      html += '<a href="' + item.url + '" class="group flex gap-4 items-start p-4 hover:bg-[#F2EDE4] transition-colors duration-150 rounded">';
      if (item.image) {
        html += '<div class="w-14 h-14 shrink-0 bg-[#E8E0D4] overflow-hidden rounded"><img src="' + item.image + '" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>';
      } else {
        html += '<div class="w-14 h-14 shrink-0 bg-[#E8E0D4] rounded flex items-center justify-center"><span class="text-[#8B8275] text-[9px] uppercase tracking-widest">' + item.type + '</span></div>';
      }
      html += '<div><p class="text-[9px] uppercase tracking-[0.2em] text-[#B5451B] mb-1">' + item.type + '</p>';
      html += '<p class="font-display text-[15px] text-[#1C1C1C] leading-tight group-hover:text-[#B5451B] transition-colors">' + item.title + '</p>';
      if (item.subtitle) html += '<p class="text-[11px] text-[#8B8275] mt-0.5">' + item.subtitle + '</p>';
      html += '</div></a>';
    });
    html += '</div>';
    results.innerHTML = html;
  }
})();
</script>
