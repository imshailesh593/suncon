'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Image from 'next/image'
import Link from 'next/link'

gsap.registerPlugin(ScrollTrigger)

/* Splits a string into individually-animatable word spans */
function Words({ text, className }: { text: string; className?: string }) {
  return (
    <span className={className} aria-label={text}>
      {text.split(' ').map((word, i, arr) => (
        <span key={i} className="word-wrapper">
          <span className="word-inner">{word}</span>
          {i < arr.length - 1 && <>&nbsp;</>}
        </span>
      ))}
    </span>
  )
}

export default function Hero() {
  const containerRef = useRef<HTMLDivElement>(null)
  const imageRef     = useRef<HTMLDivElement>(null)
  const headingRef   = useRef<HTMLHeadingElement>(null)
  const metaRef      = useRef<HTMLDivElement>(null)
  const ctaRef       = useRef<HTMLDivElement>(null)
  const lineRef      = useRef<HTMLDivElement>(null)
  const scrollRef    = useRef<HTMLDivElement>(null)

  useEffect(() => {
    const ctx = gsap.context(() => {
      /* ── Word-split entrance ── */
      const words = headingRef.current
        ? Array.from(headingRef.current.querySelectorAll('.word-inner'))
        : []

      const tl = gsap.timeline({ delay: 0.15 })

      // Thin line wipes in first
      tl.fromTo(lineRef.current,
        { scaleX: 0 },
        { scaleX: 1, duration: 1, ease: 'expo.out', transformOrigin: 'left center' },
      )
      // Each word slides up from below its overflow clip
      .fromTo(words,
        { yPercent: 115 },
        { yPercent: 0, duration: 1.15, ease: 'power4.out', stagger: 0.07 },
        '-=0.6',
      )
      // Sub-line + CTA fade up
      .fromTo([metaRef.current, ctaRef.current],
        { y: 28, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, ease: 'power3.out', stagger: 0.12 },
        '-=0.5',
      )
      .fromTo(scrollRef.current,
        { opacity: 0 },
        { opacity: 1, duration: 0.6 },
        '-=0.3',
      )

      /* ── Parallax on scroll ── */
      gsap.to(imageRef.current, {
        yPercent: 22,
        ease: 'none',
        scrollTrigger: {
          trigger: containerRef.current,
          start: 'top top',
          end: 'bottom top',
          scrub: true,
        },
      })
    }, containerRef)

    return () => ctx.revert()
  }, [])

  return (
    <section
      ref={containerRef}
      className="relative h-screen min-h-[680px] max-h-[1060px] overflow-hidden"
    >
      {/* Background with parallax */}
      <div ref={imageRef} className="absolute inset-0 scale-[1.18]">
        <Image
          src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=2400&q=90"
          alt="Suncon Architecture"
          fill
          className="object-cover"
          priority
        />
        {/* Rich layered gradient */}
        <div className="absolute inset-0 bg-gradient-to-b from-charcoal/65 via-charcoal/30 to-charcoal/75" />
        <div className="absolute inset-0 bg-gradient-to-r from-charcoal/30 to-transparent" />
      </div>

      {/* Content — anchored bottom-left */}
      <div className="relative z-10 flex flex-col justify-end h-full max-w-screen-xl mx-auto px-6 lg:px-12 pb-16 md:pb-20">

        {/* Terracotta rule — animates in first */}
        <div
          ref={lineRef}
          className="w-10 h-px bg-terracotta mb-8 origin-left"
          style={{ transform: 'scaleX(0)' }}
        />

        {/* Heading — word split */}
        <h1
          ref={headingRef}
          className="font-display font-light text-white leading-none"
        >
          <span className="block text-display-xl">
            <Words text="Crafting spaces" />
          </span>
          <span className="block text-display-xl italic mt-1">
            <Words text="that endure." />
          </span>
        </h1>

        {/* Sub */}
        <p
          ref={metaRef}
          className="mt-7 text-white/65 text-sm md:text-base font-body font-light max-w-sm leading-relaxed tracking-wide"
        >
          A multidisciplinary consultancy delivering architecture,
          landscape &amp; interior design across India since 1999.
        </p>

        {/* CTA row */}
        <div ref={ctaRef} className="mt-9 flex flex-wrap items-center gap-10">
          <Link
            href="/projects"
            className="text-[10px] font-body font-light uppercase tracking-[0.25em] text-white border-b border-white/40 pb-px hover:border-terracotta hover:text-terracotta transition-all duration-400"
          >
            View Our Work
          </Link>
          <Link
            href="/about"
            className="text-[10px] font-body font-light uppercase tracking-[0.25em] text-white/50 hover:text-white/80 transition-colors duration-300"
          >
            Our Practice
          </Link>
        </div>
      </div>

      {/* Scroll indicator — bottom right */}
      <div
        ref={scrollRef}
        className="absolute bottom-9 right-12 hidden lg:flex items-center gap-4 opacity-0"
      >
        <span className="text-white/35 text-[9px] font-body uppercase tracking-[0.3em]">Scroll</span>
        <div className="relative w-px h-12 bg-white/15 overflow-hidden">
          <div className="absolute inset-x-0 top-0 h-full bg-white/50 animate-scroll-line" />
        </div>
      </div>
    </section>
  )
}
