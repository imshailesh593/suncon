/**
 * Suncon Engineers — app.js
 * GSAP + Lenis smooth scroll, custom cursor, scroll animations, horizontal
 * projects track, stat counters, clients marquee, mobile menu.
 */

import Lenis from 'lenis';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// ─── 1. LENIS SMOOTH SCROLL ──────────────────────────────────────────────────
const lenis = new Lenis({
  lerp: 0.08,
  smoothWheel: true,
});

// Connect Lenis to GSAP ticker so ScrollTrigger stays in sync
lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

// ─── 2. CUSTOM CURSOR ────────────────────────────────────────────────────────
const cursorDot  = document.getElementById('cursor-dot');
const cursorRing = document.getElementById('cursor-ring');

if (cursorDot && cursorRing) {
  if (!window.matchMedia('(pointer: fine)').matches) {
    cursorDot.style.display  = 'none';
    cursorRing.style.display = 'none';
  } else {
    let ringX = 0, ringY = 0;
    let mouseX = 0, mouseY = 0;
    let onDark = false;

    // Walk up DOM from element under cursor; return true if surface is dark
    function sampleSurface(x, y) {
      const el = document.elementFromPoint(x, y);
      if (!el) return false;
      if (el.closest('[data-dark]')) return true;
      let node = el;
      while (node && node !== document.documentElement) {
        const bg = window.getComputedStyle(node).backgroundColor;
        const m  = bg.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*([\d.]+))?\)/);
        if (m) {
          const a = m[4] !== undefined ? parseFloat(m[4]) : 1;
          if (a > 0.5) {
            const lum = (0.299 * +m[1] + 0.587 * +m[2] + 0.114 * +m[3]) / 255;
            return lum < 0.4;
          }
        }
        node = node.parentElement;
      }
      return false;
    }

    function setCursorColor(dark) {
      if (dark === onDark) return;
      onDark = dark;
      cursorDot.style.background    = dark ? '#ffffff' : '#1C1C1C';
      cursorRing.style.borderColor  = dark ? 'rgba(255,255,255,0.6)' : 'rgba(28,28,28,0.45)';
    }

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      gsap.set(cursorDot, { x: mouseX, y: mouseY });
      setCursorColor(sampleSurface(mouseX, mouseY));
    });

    gsap.ticker.add(() => {
      ringX += (mouseX - ringX) * 0.25;
      ringY += (mouseY - ringY) * 0.25;
      gsap.set(cursorRing, { x: ringX, y: ringY });
    });

    document.querySelectorAll('a, button, [role="button"]').forEach((el) => {
      el.addEventListener('mouseenter', () => {
        gsap.to(cursorRing, { scale: 2, opacity: 0.5, duration: 0.3, ease: 'power2.out' });
      });
      el.addEventListener('mouseleave', () => {
        gsap.to(cursorRing, { scale: 1, opacity: 1, duration: 0.3, ease: 'power2.out' });
      });
    });
  }
}

// ─── 3. HERO PARALLAX ────────────────────────────────────────────────────────
const heroBg = document.getElementById('hero-bg');
if (heroBg) {
  gsap.to(heroBg, {
    yPercent: 20,
    ease: 'none',
    scrollTrigger: {
      trigger: heroBg.closest('section'),
      start: 'top top',
      end: 'bottom top',
      scrub: true,
    },
  });
}

// ─── 4. SCROLL REVEALS ───────────────────────────────────────────────────────
gsap.utils.toArray('[data-reveal]').forEach((el) => {
  gsap.fromTo(
    el,
    { y: 30, opacity: 0 },
    {
      y: 0,
      opacity: 1,
      duration: 0.9,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: el,
        start: 'top 88%',
        once: true,
      },
    }
  );
});

// ─── 5 & 6. BUTTON CAROUSELS (projects + services) ───────────────────────────
function initCarousel(trackId, prevId, nextId) {
  const track = document.getElementById(trackId);
  const prev  = document.getElementById(prevId);
  const next  = document.getElementById(nextId);
  if (!track || !prev || !next) return;

  // Hide native scrollbar
  track.style.scrollbarWidth   = 'none';
  track.style.msOverflowStyle  = 'none';
  track.style.overflowX        = 'auto';

  const amount = () => Math.max(track.clientWidth * 0.72, 300);

  prev.addEventListener('click', () => track.scrollBy({ left: -amount(), behavior: 'smooth' }));
  next.addEventListener('click', () => track.scrollBy({ left:  amount(), behavior: 'smooth' }));

  function sync() {
    const atStart = track.scrollLeft <= 8;
    const atEnd   = track.scrollLeft >= track.scrollWidth - track.clientWidth - 8;
    prev.style.opacity        = atStart ? '0.3' : '1';
    prev.style.pointerEvents  = atStart ? 'none' : 'auto';
    next.style.opacity        = atEnd   ? '0.3' : '1';
    next.style.pointerEvents  = atEnd   ? 'none' : 'auto';
  }

  track.addEventListener('scroll', sync, { passive: true });
  sync();
}

initCarousel('projects-track', 'projects-prev', 'projects-next');

// ─── 7. STAT COUNTERS ────────────────────────────────────────────────────────
document.querySelectorAll('[data-counter]').forEach((el) => {
  const target = parseFloat(el.dataset.target) || 0;
  const obj    = { value: 0 };

  ScrollTrigger.create({
    trigger: el,
    start: 'top 85%',
    once: true,
    onEnter: () => {
      gsap.to(obj, {
        value: target,
        duration: 2,
        ease: 'power2.out',
        onUpdate: () => {
          el.textContent = Math.round(obj.value);
        },
      });
    },
  });
});

// ─── 7. MOBILE MENU ──────────────────────────────────────────────────────────
const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const menuBars   = document.querySelectorAll('.menu-bar');

let menuOpen = false;

if (menuToggle && mobileMenu) {
  menuToggle.addEventListener('click', () => {
    menuOpen = !menuOpen;

    if (menuOpen) {
      mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
      mobileMenu.classList.add('opacity-100');
      document.body.style.overflow = 'hidden';
      lenis.stop();

      // Animate bars into ×
      gsap.to(menuBars[0], { y: 5, rotate: 45, duration: 0.3, ease: 'power2.inOut' });
      gsap.to(menuBars[1], { y: -5, rotate: -45, duration: 0.3, ease: 'power2.inOut' });
    } else {
      mobileMenu.classList.add('opacity-0', 'pointer-events-none');
      mobileMenu.classList.remove('opacity-100');
      document.body.style.overflow = '';
      lenis.start();

      gsap.to(menuBars[0], { y: 0, rotate: 0, duration: 0.3, ease: 'power2.inOut' });
      gsap.to(menuBars[1], { y: 0, rotate: 0, duration: 0.3, ease: 'power2.inOut' });
    }
  });

  // Close menu on nav link click
  mobileMenu.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      if (menuOpen) menuToggle.click();
    });
  });
}

// ─── 8. CLIENTS MARQUEE ──────────────────────────────────────────────────────
function initMarquee(rowEl, direction = -1) {
  if (!rowEl) return;

  const totalWidth = rowEl.scrollWidth / 2; // doubled content → half is one set

  gsap.to(rowEl, {
    x: direction * totalWidth,
    ease: 'none',
    duration: 30,
    repeat: -1,
    modifiers: {
      x: gsap.utils.unitize((x) => parseFloat(x) % totalWidth),
    },
  });
}

initMarquee(document.getElementById('marquee-row1'), -1);
initMarquee(document.getElementById('marquee-row2'),  1);

// ─── 9. WORD-SPLIT HERO ANIMATION ────────────────────────────────────────────
// Simple word reveal on page load for .word-split elements
const wordSplitEls = document.querySelectorAll('.word-split');

if (wordSplitEls.length) {
  gsap.from(wordSplitEls, {
    y: 80,
    opacity: 0,
    duration: 1.1,
    ease: 'power4.out',
    stagger: 0.12,
    delay: 0.15,
  });
}

// ─── 10. PAGE LOAD — fade in body ────────────────────────────────────────────
gsap.from('body', { opacity: 0, duration: 0.4, ease: 'power1.out' });

