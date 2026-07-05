<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Suncon BIM — Architectural BIM Services India')</title>
  <meta name="description" content="@yield('description', 'Suncon BIM delivers architectural BIM modeling, Revit coordination, clash detection, and LOD 100–500 documentation across India. Part of Suncon Engineers Pvt. Ltd.')">
  <link rel="canonical" href="{{ url()->current() }}" />
  @if(!empty($globalSettings['site.ga_id']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $globalSettings['site.ga_id'] }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $globalSettings['site.ga_id'] }}');</script>
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,200;0,9..144,300;0,9..144,400;1,9..144,200;1,9..144,300&family=Outfit:wght@200;300;400;500&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body antialiased overflow-x-hidden" style="background:#060F1E;color:#EEF3FF;">

  {{-- Custom cursor (works across dark/light surfaces) --}}
  <div id="cursor-dot"  class="fixed top-0 left-0 w-[8px] h-[8px] rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2" style="background:#EEF3FF;"></div>
  <div id="cursor-ring" class="fixed top-0 left-0 w-[36px] h-[36px] rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2" style="border:1.5px solid rgba(238,243,255,0.5);"></div>

  {{-- ── NAVBAR ───────────────────────────────────────────────────────────── --}}
  <header class="fixed top-0 left-0 right-0 z-50" style="background:rgba(6,15,30,0.88);backdrop-filter:blur(12px);border-bottom:1px solid rgba(42,110,212,0.18);">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 h-[60px] flex items-center justify-between">

      {{-- Logo --}}
      <a href="{{ route('bim.home') }}" class="flex items-center gap-3 group">
        <span class="font-display font-light tracking-[0.22em] uppercase text-[#EEF3FF] text-sm group-hover:text-white transition-colors">SUNCON</span>
        <span class="w-px h-4" style="background:rgba(42,110,212,0.5);"></span>
        <span class="font-body font-medium text-[11px] tracking-[0.4em] uppercase" style="color:#2A6ED4;">BIM</span>
      </a>

      {{-- Desktop nav --}}
      <nav class="hidden md:flex items-center gap-8">
        <a href="{{ route('bim.home') }}" class="text-[10px] uppercase tracking-[0.22em] transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">Home</a>
        <a href="{{ route('bim.services') }}" class="text-[10px] uppercase tracking-[0.22em] transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">Services</a>
        <a href="{{ url('/projects?discipline=bim') }}" class="text-[10px] uppercase tracking-[0.22em] transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">Projects</a>
        <a href="{{ route('bim.contact') }}" class="text-[11px] uppercase tracking-[0.2em] px-6 py-2.5 transition-colors duration-300" style="background:#B5451B;color:#fff;" onmouseover="this.style.background='#8B3414'" onmouseout="this.style.background='#B5451B'">
          Get a Quote
        </a>
      </nav>

      {{-- Mobile hamburger --}}
      <button id="bim-menu-toggle" class="md:hidden flex flex-col gap-[5px] p-2" aria-label="Toggle menu">
        <span class="bim-menu-bar block w-5 h-px" style="background:#EEF3FF;"></span>
        <span class="bim-menu-bar block w-5 h-px" style="background:#EEF3FF;"></span>
      </button>
    </div>
  </header>

  {{-- Mobile menu --}}
  <div id="bim-mobile-menu" class="fixed inset-0 z-40 flex flex-col justify-center px-8 opacity-0 pointer-events-none transition-opacity duration-300" style="background:#060F1E;">
    <div class="flex flex-col gap-6 mt-16">
      <a href="{{ route('bim.home') }}" class="font-display font-light text-3xl text-[#EEF3FF]">Home</a>
      <a href="{{ route('bim.services') }}" class="font-display font-light text-3xl text-[#EEF3FF]">Services</a>
      <a href="{{ url('/projects?discipline=bim') }}" class="font-display font-light text-3xl text-[#EEF3FF]">Projects</a>
      <a href="{{ route('bim.contact') }}" class="font-display font-light text-3xl" style="color:#B5451B;">Get a Quote</a>
    </div>
    <div class="mt-12 pt-8" style="border-top:1px solid rgba(42,110,212,0.2);">
      <p class="text-[9px] uppercase tracking-[0.25em]" style="color:#4A6A8A;">Part of Suncon Engineers Pvt. Ltd.</p>
    </div>
  </div>

  <main>@yield('content')</main>

  {{-- ── FOOTER ──────────────────────────────────────────────────────────── --}}
  <footer style="background:#030A14;border-top:1px solid rgba(42,110,212,0.18);">

    {{-- CTA band --}}
    <div style="border-bottom:1px solid rgba(42,110,212,0.14);">
      <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-20 flex flex-col md:flex-row items-start md:items-end justify-between gap-8">
        <div>
          <p class="text-[9px] uppercase tracking-[0.3em] mb-4" style="color:#4A6A8A;">Ready to start your BIM project?</p>
          <h2 class="font-display font-light text-display-lg leading-none" style="color:#EEF3FF;">
            Precision modeling,<br>
            <em class="font-light" style="color:#B5451B;">delivered on time.</em>
          </h2>
        </div>
        <a href="{{ route('bim.contact') }}"
           class="shrink-0 text-[11px] uppercase tracking-[0.2em] px-10 py-4 transition-all duration-300"
           style="border:1px solid rgba(238,243,255,0.25);color:#EEF3FF;"
           onmouseover="this.style.background='#B5451B';this.style.borderColor='#B5451B';"
           onmouseout="this.style.background='transparent';this.style.borderColor='rgba(238,243,255,0.25)';">
          Request a Quote
        </a>
      </div>
    </div>

    {{-- Links --}}
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-14">
      <div class="grid grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr] gap-x-10 gap-y-10">

        {{-- Brand --}}
        <div class="col-span-2 lg:col-span-1">
          <div class="flex items-center gap-3 mb-4">
            <span class="font-display font-light tracking-[0.22em] uppercase text-[#EEF3FF] text-sm">SUNCON</span>
            <span class="w-px h-4" style="background:rgba(42,110,212,0.5);"></span>
            <span class="font-body font-medium text-[11px] tracking-[0.4em] uppercase" style="color:#2A6ED4;">BIM</span>
          </div>
          <p class="text-sm leading-relaxed max-w-xs" style="color:#4A6A8A;">
            Architectural BIM services division of Suncon Engineers Pvt. Ltd. — delivering precision models across India since 1999.
          </p>
          <a href="{{ url('/') }}" class="inline-flex items-center gap-2 mt-5 text-[9px] uppercase tracking-[0.25em] transition-colors" style="color:#4A6A8A;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#4A6A8A'">
            <span>← Back to Suncon Engineers</span>
          </a>
        </div>

        {{-- Services --}}
        <div>
          <p class="text-[9px] uppercase tracking-[0.25em] mb-5" style="color:#4A6A8A;">Services</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              ['Architectural BIM',   route('bim.services').'#arch-bim'],
              ['Structural BIM',      route('bim.services').'#structural'],
              ['MEP Coordination',    route('bim.services').'#mep'],
              ['Scan to BIM',         route('bim.services').'#scan'],
              ['CAD to BIM',          route('bim.services').'#cad'],
              ['Shop Drawings',       route('bim.services').'#docs'],
            ] as $l)
              <li>
                <a href="{{ $l[1] }}" class="text-sm transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">{{ $l[0] }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Company --}}
        <div>
          <p class="text-[9px] uppercase tracking-[0.25em] mb-5" style="color:#4A6A8A;">Company</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              ['About Suncon',      url('/about')],
              ['Main Portfolio',    url('/projects')],
              ['BIM Projects',      url('/projects?discipline=bim')],
              ['Contact',          route('bim.contact')],
            ] as $l)
              <li>
                <a href="{{ $l[1] }}" class="text-sm transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">{{ $l[0] }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Contact --}}
        <div class="col-span-2 lg:col-span-1">
          <p class="text-[9px] uppercase tracking-[0.25em] mb-5" style="color:#4A6A8A;">Contact</p>
          <ul class="flex flex-col gap-3">
            <li>
              <a href="mailto:{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}" class="text-sm transition-colors break-all" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">
                {{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}
              </a>
            </li>
            <li>
              <a href="tel:+919371654387" class="text-sm transition-colors" style="color:#8BA3C4;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#8BA3C4'">
                {{ $globalSettings['site.phone'] ?? '+91 93716 54387' }}
              </a>
            </li>
            <li class="text-sm leading-relaxed" style="color:#4A6A8A;">
              Pune, Maharashtra, India
            </li>
          </ul>
        </div>
      </div>

      {{-- Bottom bar --}}
      <div class="mt-14 pt-8 flex flex-col sm:flex-row justify-between gap-4 text-[11px]" style="border-top:1px solid rgba(42,110,212,0.14);color:#4A6A8A;">
        <p>© {{ date('Y') }} Suncon Engineers Pvt. Ltd. All rights reserved.</p>
        <p>Developed by <a href="https://mavericinfotech.in" target="_blank" rel="noopener" class="transition-colors" style="color:#4A6A8A;" onmouseover="this.style.color='#EEF3FF'" onmouseout="this.style.color='#4A6A8A'">Maveric Infotech</a></p>
      </div>
    </div>
  </footer>

  {{-- Mobile menu JS --}}
  <script>
    (function () {
      const toggle = document.getElementById('bim-menu-toggle');
      const menu   = document.getElementById('bim-mobile-menu');
      const bars   = document.querySelectorAll('.bim-menu-bar');
      let open = false;

      if (!toggle || !menu) return;

      toggle.addEventListener('click', () => {
        open = !open;
        if (open) {
          menu.classList.remove('opacity-0', 'pointer-events-none');
          menu.classList.add('opacity-100');
          document.body.style.overflow = 'hidden';
          bars[0].style.transform = 'translateY(5px) rotate(45deg)';
          bars[1].style.transform = 'translateY(-5px) rotate(-45deg)';
        } else {
          menu.classList.add('opacity-0', 'pointer-events-none');
          menu.classList.remove('opacity-100');
          document.body.style.overflow = '';
          bars[0].style.transform = '';
          bars[1].style.transform = '';
        }
      });

      menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        if (open) toggle.click();
      }));
    })();
  </script>

</body>
</html>
