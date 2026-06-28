'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import type { Client } from '@/lib/types'

gsap.registerPlugin(ScrollTrigger)

interface Props {
  clients: Client[]
}

const Separator = () => (
  <span className="mx-8 text-terracotta/40 text-xl font-light select-none" aria-hidden>✦</span>
)

export default function ClientsMarquee({ clients }: Props) {
  const sectionRef = useRef<HTMLElement>(null)
  const trackRef   = useRef<HTMLDivElement>(null)
  const headRef    = useRef<HTMLDivElement>(null)
  const tweenRef   = useRef<gsap.core.Tween | null>(null)

  /* Duplicate list 4× for seamless infinite loop */
  const repeated = [...clients, ...clients, ...clients, ...clients]

  useEffect(() => {
    const track = trackRef.current
    if (!track) return

    const ctx = gsap.context(() => {
      /* Reveal heading */
      gsap.fromTo(headRef.current,
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, ease: 'power3.out',
          scrollTrigger: { trigger: sectionRef.current, start: 'top 80%' } },
      )

      /* Marquee: scroll-linked speed boost */
      const totalWidth = track.scrollWidth / 4
      tweenRef.current = gsap.to(track, {
        x: -totalWidth,
        duration: 32,
        ease: 'none',
        repeat: -1,
        modifiers: {
          x: gsap.utils.unitize(x => parseFloat(x) % totalWidth),
        },
      })
    }, sectionRef)

    return () => {
      tweenRef.current?.kill()
      ctx.revert()
    }
  }, [])

  return (
    <section ref={sectionRef} className="py-20 bg-[#0F0E0C] overflow-hidden">
      {/* Heading */}
      <div ref={headRef} className="max-w-screen-xl mx-auto px-6 lg:px-12 mb-14 opacity-0">
        <p className="text-stone/50 text-[10px] uppercase tracking-[0.28em] mb-3">Trusted By</p>
        <h2 className="font-display font-light text-[clamp(1.8rem,3.5vw,3rem)] text-sand-light/90 leading-tight">
          Clients who trust<br />
          <em className="text-terracotta font-light">our work.</em>
        </h2>
      </div>

      {/* Top rule */}
      <div className="border-t border-white/[0.06] mb-10" />

      {/* Scrolling strip */}
      <div className="relative">
        {/* Left fade mask */}
        <div className="pointer-events-none absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-[#0F0E0C] to-transparent z-10" />
        {/* Right fade mask */}
        <div className="pointer-events-none absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-[#0F0E0C] to-transparent z-10" />

        <div ref={trackRef} className="flex items-center whitespace-nowrap will-change-transform">
          {repeated.map((client, i) => (
            <span key={i} className="inline-flex items-center shrink-0">
              <span className="font-display font-light text-[clamp(1.1rem,2.2vw,1.7rem)] text-sand-light/70 uppercase tracking-[0.08em] hover:text-terracotta transition-colors duration-500 cursor-default">
                {client.name}
              </span>
              <Separator />
            </span>
          ))}
        </div>
      </div>

      {/* Bottom rule */}
      <div className="border-t border-white/[0.06] mt-10" />

      {/* Second row — slower, opposite direction */}
      <div className="relative mt-0">
        <div className="pointer-events-none absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-[#0F0E0C] to-transparent z-10" />
        <div className="pointer-events-none absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-[#0F0E0C] to-transparent z-10" />

        <SecondRow clients={clients} />
      </div>

      <div className="border-t border-white/[0.06] mt-10" />

      {/* Bottom stat line */}
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12 mt-14 flex flex-wrap gap-12">
        {[
          { v: '250+', l: 'Projects Completed' },
          { v: '26+',  l: 'Years in Practice' },
          { v: '1999', l: 'Year Established' },
          { v: 'ISO',  l: 'Certified Quality' },
        ].map(s => (
          <div key={s.l}>
            <p className="font-display font-light text-3xl text-sand-light/80">{s.v}</p>
            <p className="text-stone/50 text-[9px] uppercase tracking-[0.22em] mt-1">{s.l}</p>
          </div>
        ))}
      </div>
    </section>
  )
}

/* Second row — reversed categories / different pace */
function SecondRow({ clients }: { clients: Client[] }) {
  const trackRef = useRef<HTMLDivElement>(null)

  const byCategory = clients.filter(c => c.category)
  const repeated   = [...byCategory, ...byCategory, ...byCategory, ...byCategory]

  useEffect(() => {
    const track = trackRef.current
    if (!track) return
    const totalWidth = track.scrollWidth / 4
    const tween = gsap.to(track, {
      x: -(totalWidth),
      duration: 50,
      ease: 'none',
      repeat: -1,
      delay: -25,
      modifiers: {
        x: gsap.utils.unitize(x => {
          const val = parseFloat(x) % totalWidth
          return -totalWidth + Math.abs(val)
        }),
      },
    })
    return () => { tween.kill() }
  }, [])

  return (
    <div ref={trackRef} className="flex items-center whitespace-nowrap will-change-transform mt-10">
      {repeated.map((client, i) => (
        <span key={i} className="inline-flex items-center shrink-0">
          <span className="font-display text-[clamp(0.75rem,1.4vw,1.1rem)] text-sand-light/30 uppercase tracking-[0.15em] italic cursor-default">
            {client.name}
          </span>
          <span className="mx-6 text-white/10 select-none">—</span>
        </span>
      ))}
    </div>
  )
}
