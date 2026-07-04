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
  // Hide on touch devices
  if (!window.matchMedia('(pointer: fine)').matches) {
    cursorDot.style.display  = 'none';
    cursorRing.style.display = 'none';
  } else {
    let ringX = 0, ringY = 0;
    let mouseX = 0, mouseY = 0;

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      // Dot follows instantly
      gsap.set(cursorDot, { x: mouseX, y: mouseY });
    });

    // Ring lerps toward mouse on every frame
    gsap.ticker.add(() => {
      ringX += (mouseX - ringX) * 0.25;
      ringY += (mouseY - ringY) * 0.25;
      gsap.set(cursorRing, { x: ringX, y: ringY });
    });

    // Grow ring on hoverable elements
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

// ─── 4. NAVBAR ───────────────────────────────────────────────────────────────
const navbar = document.getElementById('navbar');

if (navbar) {
  const navCta = document.getElementById('nav-cta');

  ScrollTrigger.create({
    start: 'top -50',
    onEnter: () => {
      navbar.classList.add('bg-[#B5451B]', 'shadow-sm');
      navbar.classList.remove('bg-[#FAF7F3]/95', 'backdrop-blur-sm');
      navbar.querySelectorAll('a:not(#nav-cta), button').forEach(el => el.classList.add('!text-white'));
      // CTA flips: white bg, orange text
      if (navCta) {
        navCta.classList.remove('bg-[#B5451B]', 'text-white');
        navCta.classList.add('bg-white', '!text-[#B5451B]');
      }
      // O accent on dark bg
      const accent = navbar.querySelector('#nav-logo span');
      if (accent) { accent.classList.add('!text-white/60'); accent.classList.remove('text-[#B5451B]'); }
    },
    onLeaveBack: () => {
      navbar.classList.remove('bg-[#B5451B]', 'shadow-sm');
      navbar.querySelectorAll('a:not(#nav-cta), button').forEach(el => el.classList.remove('!text-white'));
      // CTA flips back: orange bg, white text
      if (navCta) {
        navCta.classList.add('bg-[#B5451B]', 'text-white');
        navCta.classList.remove('bg-white', '!text-[#B5451B]');
      }
      const accent = navbar.querySelector('#nav-logo span');
      if (accent) { accent.classList.remove('!text-white/60'); accent.classList.add('text-[#B5451B]'); }
    },
  });

  // Switch nav text to white when scrolled into a [data-dark] section
  document.querySelectorAll('[data-dark]').forEach((section) => {
    ScrollTrigger.create({
      trigger: section,
      start: 'top 60px',
      end: 'bottom 60px',
      onEnter: ()      => navbar.classList.add('invert-nav'),
      onLeave: ()      => navbar.classList.remove('invert-nav'),
      onEnterBack: ()  => navbar.classList.add('invert-nav'),
      onLeaveBack: ()  => navbar.classList.remove('invert-nav'),
    });
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

// ─── 5. HORIZONTAL PROJECTS SCROLL (desktop) ─────────────────────────────────
const projectsSection = document.getElementById('projects-section');
const projectsTrack   = document.getElementById('projects-track');

if (projectsSection && projectsTrack && window.innerWidth >= 768) {
  projectsTrack.style.overflow = 'visible';
  projectsTrack.style.width    = 'max-content';

  // Distance to scroll = track full width minus one viewport width
  const getTotal = () => projectsTrack.scrollWidth - window.innerWidth;

  gsap.to(projectsTrack, {
    x: () => -getTotal(),
    ease: 'none',
    scrollTrigger: {
      trigger: projectsSection,
      start: 'top top',
      end: () => `+=${getTotal()}`,
      pin: true,
      scrub: 1.2,
      anticipatePin: 1,
      invalidateOnRefresh: true,
    },
  });
}

// ─── 6. STAT COUNTERS ────────────────────────────────────────────────────────
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

