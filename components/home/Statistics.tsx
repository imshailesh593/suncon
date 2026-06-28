'use client'

import { useRef, useEffect } from 'react'
import Link from 'next/link'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { statistics } from '@/lib/data'

gsap.registerPlugin(ScrollTrigger)

/* ── Illustrated SVG icons — terracotta line art ── */
const icons: Record<string, React.ReactNode> = {
  building: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <rect x="30" y="20" width="60" height="60" />
      <rect x="45" y="45" width="14" height="20" />
      <rect x="65" y="45" width="14" height="20" />
      <rect x="45" y="25" width="10" height="10" />
      <rect x="65" y="25" width="10" height="10" />
      <line x1="30" y1="20" x2="60" y2="5" /><line x1="90" y1="20" x2="60" y2="5" />
      <line x1="10" y1="80" x2="110" y2="80" />
      <line x1="15" y1="80" x2="15" y2="70" /><line x1="105" y1="80" x2="105" y2="70" />
      <path d="M5 75 Q10 65 15 70" /><path d="M105 70 Q110 65 115 75" />
    </svg>
  ),
  clock: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <circle cx="60" cy="45" r="32" />
      <circle cx="60" cy="45" r="2" fill="currentColor" />
      <path d="M60 20v25l16 10" />
      <path d="M38 10 Q60 3 82 10" />
      <line x1="28" y1="80" x2="92" y2="80" />
      <line x1="40" y1="80" x2="35" y2="88" /><line x1="80" y1="80" x2="85" y2="88" />
    </svg>
  ),
  award: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <circle cx="60" cy="35" r="22" />
      <path d="M45 53l-8 30 23-10 23 10-8-30" />
      <path d="M50 35l5 8 12-18" />
      <line x1="30" y1="83" x2="90" y2="83" />
      <path d="M25 60 Q28 55 33 58" /><path d="M87 58 Q92 55 95 60" />
    </svg>
  ),
  map: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <ellipse cx="60" cy="55" rx="45" ry="22" />
      <path d="M15 55 Q30 20 60 15 Q90 20 105 55" />
      <path d="M30 25 Q45 45 60 15 Q75 45 90 25" />
      <line x1="60" y1="15" x2="60" y2="77" />
      <line x1="15" y1="55" x2="105" y2="55" />
      <circle cx="60" cy="38" r="3" fill="currentColor" />
    </svg>
  ),
  people: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <circle cx="40" cy="22" r="9" />
      <path d="M22 60c0-10 8-18 18-18h0c10 0 18 8 18 18" />
      <circle cx="80" cy="22" r="9" />
      <path d="M62 60c0-10 8-18 18-18h0c10 0 18 8 18 18" />
      <circle cx="60" cy="30" r="8" />
      <path d="M44 72c0-9 7-16 16-16h0c9 0 16 7 16 16" />
      <line x1="15" y1="78" x2="105" y2="78" />
    </svg>
  ),
  area: (
    <svg viewBox="0 0 120 90" fill="none" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round" className="w-20 h-14 sm:w-28 sm:h-20">
      <rect x="15" y="15" width="90" height="60" />
      <line x1="15" y1="35" x2="105" y2="35" />
      <line x1="15" y1="55" x2="105" y2="55" />
      <line x1="45" y1="15" x2="45" y2="75" />
      <line x1="75" y1="15" x2="75" y2="75" />
      <rect x="45" y="35" width="30" height="20" strokeWidth="1.8" />
      <path d="M8 15 L15 15 L15 8" /><path d="M112 15 L105 15 L105 8" />
      <path d="M8 75 L15 75 L15 82" /><path d="M112 75 L105 75 L105 82" />
    </svg>
  ),
}

export default function Statistics() {
  const sectionRef = useRef<HTMLElement>(null)
  const headRef    = useRef<HTMLDivElement>(null)
  const statsRef   = useRef<(HTMLDivElement | null)[]>([])

  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.fromTo(headRef.current,
        { opacity: 0, y: 40 },
        { opacity: 1, y: 0, duration: 1, ease: 'power3.out',
          scrollTrigger: { trigger: sectionRef.current, start: 'top 75%' } },
      )
      statsRef.current.filter(Boolean).forEach((el, i) => {
        gsap.fromTo(el,
          { opacity: 0, y: 30 },
          { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out',
            scrollTrigger: { trigger: el, start: 'top 88%', once: true },
            delay: (i % 2) * 0.15,
          },
        )
      })
    }, sectionRef)
    return () => { ScrollTrigger.killAll(); ctx.revert() }
  }, [])

  return (
    <section ref={sectionRef} className="py-24 md:py-32" style={{ backgroundColor: '#B5451B' }}>
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">

        {/* ── Headline ── */}
        <div ref={headRef} className="max-w-2xl mb-20 opacity-0">
          <h2 className="font-display font-light text-[clamp(2.6rem,5.5vw,5.5rem)] text-sand-light leading-[0.92] tracking-tight">
            Shaping India&apos;s<br />
            Built Environment
          </h2>
          <p className="mt-6 text-sand-light/50 text-sm leading-relaxed max-w-sm">
            ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior, BIM &amp; infrastructure projects across India since 1999.
          </p>
          <Link
            href="/about"
            className="mt-6 inline-flex items-center gap-2 text-sand-light/70 hover:text-sand-light text-[11px] uppercase tracking-[0.2em] border-b border-sand-light/30 hover:border-sand-light pb-px transition-all duration-300"
          >
            Discover Our Practice <span>→</span>
          </Link>
        </div>

        {/* ── 2-col stats grid ── */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-12 md:gap-y-14">
          {statistics.map((stat, i) => (
            <div
              key={stat.label}
              ref={el => { statsRef.current[i] = el }}
              className="flex items-end justify-between border-t border-sand-light/15 pt-8 opacity-0"
            >
              {/* Left: number + label */}
              <div>
                <div className="font-display font-light text-[clamp(3.5rem,6vw,7rem)] text-sand-light leading-none tracking-tight whitespace-nowrap">
                  {stat.value}
                  {stat.suffix && (
                    <span className="text-[0.45em] text-sand-light/55 ml-0.5">{stat.suffix}</span>
                  )}
                </div>
                <p className="mt-3 text-sand-light/60 text-sm leading-snug max-w-[200px]">{stat.label}</p>
              </div>

              {/* Right: illustrated icon */}
              <div className="text-sand-light opacity-60 shrink-0 ml-4">
                {icons[stat.icon]}
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  )
}
