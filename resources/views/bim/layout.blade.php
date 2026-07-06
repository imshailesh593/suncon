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
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- Anti-flash: set theme before paint --}}
  <script>document.documentElement.setAttribute('data-bim-theme',localStorage.getItem('bim-theme')||'light');</script>
  <style>
    /* ── Light mode (default) ─────────────────────────────── */
    :root {
      --bim-base:      #EAECEF;
      --bim-surface:   #F4F5F7;
      --bim-lift:      #FFFFFF;
      --bim-accent:    #7EC8E8;
      --bim-adim:      rgba(126,200,232,0.10);
      --bim-text:      #111827;
      --bim-muted:     #5F6B7A;
      --bim-dim:       #C8CDD6;
      --bim-border:    rgba(0,0,0,0.08);
      --bim-border-sm: rgba(0,0,0,0.06);
      --bim-border-lg: rgba(0,0,0,0.12);
      --bim-ghost:     rgba(0,0,0,0.10);
      --bim-ghost-sm:  rgba(0,0,0,0.07);
      --bim-nav-bg:    rgba(234,236,239,0.96);
      --bim-ring:      rgba(17,24,39,0.20);
      --ff-sg: 'Space Grotesk', system-ui, sans-serif;
      --ff-dm: 'DM Sans', system-ui, sans-serif;
    }
    /* ── Dark mode ────────────────────────────────────────── */
    html[data-bim-theme="dark"] {
      --bim-base:      #0A0A0A;
      --bim-surface:   #111318;
      --bim-lift:      #191D26;
      --bim-text:      #E8EDF2;
      --bim-muted:     #6B7280;
      --bim-dim:       #2C3140;
      --bim-border:    rgba(255,255,255,0.07);
      --bim-border-sm: rgba(255,255,255,0.05);
      --bim-border-lg: rgba(255,255,255,0.14);
      --bim-ghost:     rgba(255,255,255,0.15);
      --bim-ghost-sm:  rgba(255,255,255,0.06);
      --bim-nav-bg:    rgba(10,10,10,0.93);
      --bim-ring:      rgba(232,237,242,0.65);
    }
    .font-display { font-family: var(--ff-sg) !important; }
    .font-body    { font-family: var(--ff-dm) !important; }
    body          { font-family: var(--ff-dm); background: var(--bim-base); color: var(--bim-text); transition: background 0.3s, color 0.3s; }
    .sg { font-family: var(--ff-sg); }
    .dm { font-family: var(--ff-dm); }
    /* Theme pill toggle */
    .bim-theme-pill { display:flex; align-items:center; border-radius:999px; overflow:hidden; border:1px solid var(--bim-border); background:var(--bim-surface); transition:border-color 0.3s, background 0.3s; }
    .bim-theme-btn  { background:transparent; border:0; cursor:pointer; padding:5px 11px; font-family:var(--ff-dm); font-size:9px; letter-spacing:0.2em; text-transform:uppercase; color:var(--bim-muted); transition:background 0.2s, color 0.2s; white-space:nowrap; line-height:1; }
    .bim-theme-btn.active { background:var(--bim-accent); color:#111827; }
  </style>
</head>
<body class="antialiased overflow-x-hidden">

  {{-- Custom cursor --}}
  <div id="cursor-dot"  class="fixed top-0 left-0 w-[8px] h-[8px] rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2" style="background:#7EC8E8;"></div>
  <div id="cursor-ring" class="fixed top-0 left-0 w-[40px] h-[40px] rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2" style="border:1.5px solid var(--bim-ring);"></div>

  {{-- ── NAVBAR ──────────────────────────────────────────────────────────────── --}}
  <header id="bim-nav" class="fixed top-0 left-0 right-0 z-50" style="background:var(--bim-nav-bg);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid var(--bim-border);transition:background 0.3s;">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 h-[62px] flex items-center justify-between">

      {{-- Logo --}}
      <a href="{{ route('bim.home') }}" class="sg flex items-center gap-2.5 shrink-0">
        <span class="text-[12px] font-medium tracking-[0.22em] uppercase" style="color:var(--bim-text);">Suncon</span>
        <span class="text-[18px] font-bold leading-none" style="color:var(--bim-accent);">·</span>
        <span class="text-[12px] font-bold tracking-[0.22em] uppercase" style="color:var(--bim-accent);">BIM</span>
      </a>

      {{-- Desktop nav --}}
      <nav class="hidden md:flex items-center gap-4 lg:gap-6">
        {{-- Back to architecture --}}
        <a href="{{ url('/') }}"
           class="bim-back dm text-[10px] uppercase tracking-[0.22em] transition-colors duration-200 shrink-0"
           style="color:var(--bim-muted);">← Architecture</a>
        <span class="w-px h-3 shrink-0" style="background:var(--bim-dim);"></span>
        {{-- Main links --}}
        @foreach([
          ['Home',     route('bim.home'),    request()->routeIs('bim.home')],
          ['Services', route('bim.services'),request()->routeIs('bim.services')],
          ['Projects', url('/projects?discipline=bim'), false],
        ] as [$label,$href,$active])
          <a href="{{ $href }}"
             class="bim-navlink dm text-[10px] uppercase tracking-[0.22em] transition-colors duration-200 shrink-0"
             style="color:{{ $active ? 'var(--bim-accent)' : 'var(--bim-muted)' }};">{{ $label }}</a>
        @endforeach
        {{-- Theme pill --}}
        <div class="bim-theme-pill shrink-0">
          <button id="swatch-light" class="bim-theme-btn" aria-label="Light mode">Light</button>
          <button id="swatch-dark"  class="bim-theme-btn" aria-label="Dark mode">Dark</button>
        </div>
        {{-- CTA --}}
        <a href="{{ route('bim.contact') }}"
           class="sg text-[10px] font-bold uppercase tracking-[0.2em] px-5 py-2.5 shrink-0 transition-opacity duration-200"
           style="background:var(--bim-accent);color:#111827;"
           onmouseover="this.style.opacity='0.82'" onmouseout="this.style.opacity='1'">
          Get a Quote
        </a>
      </nav>

      {{-- Hamburger --}}
      <button id="bim-menu-toggle" class="md:hidden flex flex-col gap-[5px] p-2" aria-label="Toggle menu">
        <span class="bim-bar block w-5 h-px transition-all duration-300" style="background:var(--bim-text);"></span>
        <span class="bim-bar block w-5 h-px transition-all duration-300" style="background:var(--bim-text);"></span>
      </button>
    </div>
  </header>

  {{-- Mobile menu --}}
  <div id="bim-mobile-menu" class="fixed inset-0 z-40 flex flex-col justify-center px-8 opacity-0 pointer-events-none transition-opacity duration-300" style="background:var(--bim-base);">
    <div class="flex flex-col gap-5 mt-16">
      <a href="{{ route('bim.home') }}"               class="sg text-4xl font-bold" style="color:var(--bim-text);">Home</a>
      <a href="{{ route('bim.services') }}"            class="sg text-4xl font-bold" style="color:var(--bim-text);">Services</a>
      <a href="{{ url('/projects?discipline=bim') }}"  class="sg text-4xl font-bold" style="color:var(--bim-text);">Projects</a>
      <a href="{{ route('bim.contact') }}"             class="sg text-4xl font-bold" style="color:var(--bim-accent);">Get a Quote</a>
    </div>
    <div class="mt-12 pt-8" style="border-top:1px solid var(--bim-border);">
      <div class="flex items-center gap-3 mb-5">
        <span class="dm text-[9px] uppercase tracking-[0.22em]" style="color:var(--bim-muted);">Theme</span>
        <div class="bim-theme-pill">
          <button id="swatch-light-mob" class="bim-theme-btn" aria-label="Light mode">Light</button>
          <button id="swatch-dark-mob"  class="bim-theme-btn" aria-label="Dark mode">Dark</button>
        </div>
      </div>
      <a href="{{ url('/') }}" class="dm text-[9px] uppercase tracking-[0.28em] transition-colors duration-200" style="color:var(--bim-muted);">← Architecture Site</a>
      <p class="dm text-[9px] uppercase tracking-[0.25em] mt-2" style="color:var(--bim-dim);">Part of Suncon Engineers Pvt. Ltd.</p>
    </div>
  </div>

  <main>@yield('content')</main>

  {{-- ── FOOTER ──────────────────────────────────────────────────────────────── --}}
  <footer style="background:var(--bim-surface);border-top:3px solid var(--bim-accent);">

    {{-- CTA band --}}
    <div style="border-bottom:1px solid var(--bim-border);">
      <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-20 flex flex-col md:flex-row items-start md:items-end justify-between gap-10">
        <div>
          <p class="dm text-[9px] uppercase tracking-[0.35em] mb-5" style="color:var(--bim-accent);">Ready to start</p>
          <h2 class="sg font-bold leading-tight" style="font-size:clamp(2rem,5vw,3.5rem);color:var(--bim-text);">
            Precision modeling,<br>on time, every time.
          </h2>
        </div>
        <a href="{{ route('bim.contact') }}"
           class="sg font-bold text-[10px] uppercase tracking-[0.2em] px-10 py-4 shrink-0 transition-opacity duration-200"
           style="background:var(--bim-accent);color:#111827;"
           onmouseover="this.style.opacity='0.82'" onmouseout="this.style.opacity='1'">
          Request a Quote
        </a>
      </div>
    </div>

    {{-- Links grid --}}
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-14">
      <div class="grid grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr] gap-x-10 gap-y-10">

        <div class="col-span-2 lg:col-span-1">
          <div class="sg flex items-center gap-2 mb-5">
            <span class="text-sm font-medium tracking-[0.22em] uppercase" style="color:var(--bim-text);">Suncon</span>
            <span class="font-bold" style="color:var(--bim-accent);">·</span>
            <span class="text-sm font-bold tracking-[0.22em] uppercase" style="color:var(--bim-accent);">BIM</span>
          </div>
          <p class="dm text-sm leading-relaxed max-w-xs" style="color:var(--bim-muted);">
            Architectural BIM services division of Suncon Engineers Pvt. Ltd. Delivering precision models across India since 1999.
          </p>
          <a href="{{ url('/') }}" class="dm inline-block mt-5 text-[9px] uppercase tracking-[0.28em] transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-muted)'">← Architecture Site</a>
        </div>

        <div>
          <p class="dm text-[9px] uppercase tracking-[0.3em] mb-5" style="color:var(--bim-accent);">Services</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              ['Architectural BIM', route('bim.services').'#arch-bim'],
              ['Structural BIM',    route('bim.services').'#structural'],
              ['MEP Coordination',  route('bim.services').'#mep'],
              ['Scan to BIM',       route('bim.services').'#scan'],
              ['CAD to BIM',        route('bim.services').'#cad'],
              ['Shop Drawings',     route('bim.services').'#docs'],
            ] as $l)
              <li><a href="{{ $l[1] }}" class="dm text-sm transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-muted)'">{{ $l[0] }}</a></li>
            @endforeach
          </ul>
        </div>

        <div>
          <p class="dm text-[9px] uppercase tracking-[0.3em] mb-5" style="color:var(--bim-accent);">Company</p>
          <ul class="flex flex-col gap-3">
            @foreach([
              ['About Suncon', url('/about')],
              ['Portfolio',    url('/projects')],
              ['BIM Projects', url('/projects?discipline=bim')],
              ['Contact',      route('bim.contact')],
            ] as $l)
              <li><a href="{{ $l[1] }}" class="dm text-sm transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-muted)'">{{ $l[0] }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-span-2 lg:col-span-1">
          <p class="dm text-[9px] uppercase tracking-[0.3em] mb-5" style="color:var(--bim-accent);">Contact</p>
          <ul class="flex flex-col gap-3.5">
            <li><a href="mailto:{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}" class="dm text-sm transition-colors duration-200 break-all" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-muted)'">{{ $globalSettings['site.email'] ?? 'bd@sunconengineers.com' }}</a></li>
            <li><a href="tel:+919371654387" class="dm text-sm transition-colors duration-200" style="color:var(--bim-muted);" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-muted)'">{{ $globalSettings['site.phone'] ?? '+91 93716 54387' }}</a></li>
            <li class="dm text-sm" style="color:var(--bim-dim);">Pune, Maharashtra, India</li>
          </ul>
        </div>
      </div>

      <div class="mt-14 pt-6 flex flex-col sm:flex-row justify-between gap-3" style="border-top:1px solid var(--bim-border);color:var(--bim-dim);">
        <p class="dm text-[11px]">© {{ date('Y') }} Suncon Engineers Pvt. Ltd.</p>
        <p class="dm text-[11px]">Developed by <a href="https://mavericinfotech.in" target="_blank" rel="noopener" class="transition-colors" onmouseover="this.style.color='var(--bim-text)'" onmouseout="this.style.color='var(--bim-dim)'">Maveric Infotech</a></p>
      </div>
    </div>
  </footer>

  <script>
  (function () {

    // ── Theme toggle ──────────────────────────────────────────────────────────
    function setBimTheme(theme) {
      document.documentElement.setAttribute('data-bim-theme', theme);
      localStorage.setItem('bim-theme', theme);
      ['swatch-dark','swatch-dark-mob'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.toggle('active', theme === 'dark');
      });
      ['swatch-light','swatch-light-mob'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.toggle('active', theme === 'light');
      });
    }

    const currentTheme = localStorage.getItem('bim-theme') || 'light';
    setBimTheme(currentTheme);

    ['swatch-dark','swatch-dark-mob'].forEach(id => {
      const el = document.getElementById(id);
      if (el) el.addEventListener('click', () => setBimTheme('dark'));
    });
    ['swatch-light','swatch-light-mob'].forEach(id => {
      const el = document.getElementById(id);
      if (el) el.addEventListener('click', () => setBimTheme('light'));
    });

    // ── Nav hover ─────────────────────────────────────────────────────────────
    document.querySelectorAll('.bim-navlink').forEach(a => {
      if (a.style.color !== 'var(--bim-accent)') {
        a.addEventListener('mouseenter', () => a.style.color = 'var(--bim-text)');
        a.addEventListener('mouseleave', () => a.style.color = 'var(--bim-muted)');
      }
    });
    const back = document.querySelector('.bim-back');
    if (back) {
      back.addEventListener('mouseenter', () => back.style.color = 'var(--bim-text)');
      back.addEventListener('mouseleave', () => back.style.color = 'var(--bim-muted)');
    }

    // ── Mobile menu ───────────────────────────────────────────────────────────
    const toggle = document.getElementById('bim-menu-toggle');
    const menu   = document.getElementById('bim-mobile-menu');
    const bars   = document.querySelectorAll('.bim-bar');
    let open = false;
    if (toggle && menu) {
      toggle.addEventListener('click', () => {
        open = !open;
        menu.classList.toggle('opacity-0', !open);
        menu.classList.toggle('pointer-events-none', !open);
        menu.classList.toggle('opacity-100', open);
        document.body.style.overflow = open ? 'hidden' : '';
        bars[0].style.transform = open ? 'translateY(5px) rotate(45deg)' : '';
        bars[1].style.transform = open ? 'translateY(-5px) rotate(-45deg)' : '';
      });
      menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => { if (open) toggle.click(); }));
    }

    // ── Custom cursor ─────────────────────────────────────────────────────────
    const dot  = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');
    if (dot && ring) {
      let rx = 0, ry = 0, mx = 0, my = 0;
      document.addEventListener('mousemove', e => {
        mx = e.clientX; my = e.clientY;
        dot.style.left = mx + 'px'; dot.style.top = my + 'px';
      });
      (function animRing() {
        rx += (mx - rx) * 0.12; ry += (my - ry) * 0.12;
        ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
        requestAnimationFrame(animRing);
      })();
    }
  })();
  </script>
</body>
</html>
