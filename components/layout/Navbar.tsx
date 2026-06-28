'use client'

import { useState, useEffect, useRef } from 'react'
import Link from 'next/link'
import { usePathname } from 'next/navigation'
import { clsx } from 'clsx'
import { gsap } from 'gsap'

const navLinks = [
  { href: '/projects', label: 'Projects', idx: '01' },
  { href: '/about',    label: 'About',    idx: '02' },
  { href: '/services', label: 'Services', idx: '03' },
  { href: '/blog',     label: 'Journal',  idx: '04' },
]

export default function Navbar() {
  const [scrolled,      setScrolled]      = useState(false)
  const [scrollPct,     setScrollPct]     = useState(0)
  const [menuOpen,      setMenuOpen]      = useState(false)
  const pathname = usePathname()
  const isHome   = pathname === '/'

  const overlayRef   = useRef<HTMLDivElement>(null)
  const linkRefs     = useRef<(HTMLAnchorElement | null)[]>([])
  const menuFootRef  = useRef<HTMLDivElement>(null)

  /* ── Scroll tracking ── */
  useEffect(() => {
    const onScroll = () => {
      setScrolled(window.scrollY > 55)
      const h = document.documentElement.scrollHeight - window.innerHeight
      setScrollPct(h > 0 ? (window.scrollY / h) * 100 : 0)
    }
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  /* ── Close on route change ── */
  useEffect(() => { setMenuOpen(false) }, [pathname])

  /* ── Body lock ── */
  useEffect(() => {
    document.body.style.overflow = menuOpen ? 'hidden' : ''
    return () => { document.body.style.overflow = '' }
  }, [menuOpen])

  /* ── Menu open animation ── */
  useEffect(() => {
    if (!overlayRef.current) return
    if (menuOpen) {
      const tl = gsap.timeline()
      tl.fromTo(overlayRef.current,
        { clipPath: 'inset(0 0 100% 0)' },
        { clipPath: 'inset(0 0 0% 0)', duration: 0.65, ease: 'power4.inOut' },
      )
      .fromTo(linkRefs.current.filter(Boolean),
        { y: 70, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.7, ease: 'power3.out', stagger: 0.09 },
        '-=0.2',
      )
      .fromTo(menuFootRef.current,
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.5, ease: 'power3.out' },
        '-=0.3',
      )
    } else {
      gsap.to(overlayRef.current,
        { clipPath: 'inset(0 0 100% 0)', duration: 0.5, ease: 'power4.inOut' },
      )
    }
  }, [menuOpen])

  const transparent = isHome && !scrolled && !menuOpen

  return (
    <>
      {/* ── Header bar ── */}
      <header
        className={clsx(
          'fixed top-0 inset-x-0 z-50 transition-all duration-500',
          transparent
            ? 'bg-transparent'
            : 'bg-sand-light/[0.88] backdrop-blur-2xl',
        )}
      >
        {/* Progress line */}
        <div
          className="absolute top-0 left-0 h-[2px] bg-terracotta pointer-events-none"
          style={{ width: `${scrollPct}%`, transition: 'width 0.1s linear' }}
        />

        <div className="max-w-screen-xl mx-auto px-6 lg:px-12 flex items-center justify-between h-[68px]">

          {/* Logo */}
          <Link
            href="/"
            className={clsx(
              'relative z-10 font-body font-light text-[15px] tracking-[0.5em] uppercase transition-colors duration-500',
              menuOpen ? 'text-sand-light' : transparent ? 'text-white' : 'text-charcoal',
            )}
          >
            Sunc<span className="text-terracotta">o</span>n
          </Link>

          {/* Desktop nav — centered */}
          <nav className="hidden md:flex items-center gap-11 absolute left-1/2 -translate-x-1/2">
            {navLinks.map(({ href, label }) => (
              <Link
                key={href}
                href={href}
                className={clsx(
                  'text-[10px] font-body font-light uppercase tracking-[0.22em] transition-opacity duration-300 hover:opacity-40',
                  transparent ? 'text-white/80' : 'text-charcoal',
                  pathname === href && 'opacity-35',
                )}
              >
                {label}
              </Link>
            ))}
          </nav>

          {/* Right: CTA + hamburger */}
          <div className="flex items-center gap-8">
            <Link
              href="/contact"
              className={clsx(
                'hidden md:flex items-center gap-2 text-[10px] font-body font-light uppercase tracking-[0.22em] transition-colors duration-300',
                transparent ? 'text-white/80 hover:text-white' : 'text-charcoal hover:text-terracotta',
              )}
            >
              Start a Project
              <span className={clsx('transition-colors duration-300', transparent ? 'text-white/50' : 'text-terracotta')}>
                →
              </span>
            </Link>

            {/* Hamburger — mobile + tablet */}
            <button
              aria-label={menuOpen ? 'Close menu' : 'Open menu'}
              onClick={() => setMenuOpen(v => !v)}
              className="relative z-[60] flex flex-col justify-center gap-[5px] w-8 h-8 -mr-1 md:hidden"
            >
              <span className={clsx(
                'block h-px transition-all duration-500 origin-center',
                menuOpen ? 'w-5 rotate-45 translate-y-[3px] bg-sand-light' : 'w-5',
                !menuOpen && (transparent ? 'bg-white' : 'bg-charcoal'),
              )} />
              <span className={clsx(
                'block h-px transition-all duration-500 w-3',
                menuOpen ? 'opacity-0 bg-sand-light' : transparent ? 'bg-white' : 'bg-charcoal',
              )} />
              <span className={clsx(
                'block h-px transition-all duration-500 origin-center',
                menuOpen ? 'w-5 -rotate-45 -translate-y-[9px] bg-sand-light' : 'w-5',
                !menuOpen && (transparent ? 'bg-white' : 'bg-charcoal'),
              )} />
            </button>
          </div>
        </div>

        {/* Hair-line separator — visible only when scrolled */}
        <div className={clsx(
          'absolute bottom-0 inset-x-0 h-px bg-charcoal/[0.07] transition-opacity duration-500',
          transparent || menuOpen ? 'opacity-0' : 'opacity-100',
        )} />
      </header>

      {/* ── Full-screen mobile overlay ── */}
      <div
        ref={overlayRef}
        className="fixed inset-0 z-40 bg-charcoal flex flex-col justify-between px-8 pt-[90px] pb-12"
        style={{ clipPath: 'inset(0 0 100% 0)' }}
      >
        {/* Nav links */}
        <nav className="flex flex-col">
          {navLinks.map(({ href, label, idx }, i) => (
            <Link
              key={href}
              href={href}
              ref={el => { linkRefs.current[i] = el }}
              onClick={() => setMenuOpen(false)}
              className="group flex items-baseline gap-6 py-5 border-b border-sand-light/[0.08]"
            >
              <span className="text-stone text-[9px] uppercase tracking-[0.25em] w-6 shrink-0">
                {idx}
              </span>
              <span className="font-display text-[clamp(2.6rem,8vw,4rem)] font-light italic leading-none text-sand-light/90 group-hover:text-terracotta transition-colors duration-300">
                {label}
              </span>
            </Link>
          ))}
        </nav>

        {/* Footer row */}
        <div ref={menuFootRef} className="flex flex-col gap-5">
          <Link
            href="/contact"
            onClick={() => setMenuOpen(false)}
            className="self-start flex items-center gap-3 text-[10px] font-body font-light uppercase tracking-[0.28em] border border-sand-light/20 text-sand-light px-7 py-3.5 hover:bg-terracotta hover:border-terracotta transition-all duration-300"
          >
            Start a Project <span>→</span>
          </Link>
          <p className="text-stone text-xs tracking-wide">bd@sunconengineers.com</p>
        </div>
      </div>
    </>
  )
}
