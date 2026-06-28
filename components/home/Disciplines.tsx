'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Image from 'next/image'
import Link from 'next/link'
import { services } from '@/lib/data'

gsap.registerPlugin(ScrollTrigger)

export default function Disciplines() {
  const sectionRef = useRef<HTMLElement>(null)
  const headingRef = useRef<HTMLDivElement>(null)
  const cardsRef = useRef<(HTMLDivElement | null)[]>([])

  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.fromTo(
        headingRef.current,
        { y: 40, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 1,
          ease: 'power3.out',
          scrollTrigger: { trigger: headingRef.current, start: 'top 85%' },
        },
      )

      gsap.fromTo(
        cardsRef.current,
        { y: 60, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 1,
          ease: 'power3.out',
          stagger: 0.15,
          scrollTrigger: { trigger: sectionRef.current, start: 'top 75%' },
        },
      )
    }, sectionRef)

    return () => { ScrollTrigger.killAll(); ctx.revert() }
  }, [])

  return (
    <section ref={sectionRef} className="py-24 md:py-32 bg-sand-light">
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
        {/* Heading */}
        <div ref={headingRef} className="mb-14 max-w-xl">
          <p className="text-stone text-xs uppercase tracking-[0.2em] mb-4">What We Do</p>
          <h2 className="font-display text-display-md text-charcoal">
            Three disciplines,
            <br />
            <em className="font-light text-terracotta">one practice.</em>
          </h2>
        </div>

        {/* Cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {services.map((service, i) => (
            <div
              key={service.id}
              ref={(el) => { cardsRef.current[i] = el }}
              className="group relative overflow-hidden opacity-0"
            >
              {/* Image */}
              <div className="relative aspect-[3/4] overflow-hidden">
                <Image
                  src={service.image}
                  alt={service.title}
                  fill
                  className="object-cover transition-transform duration-700 ease-out-expo group-hover:scale-105"
                  sizes="(max-width: 768px) 100vw, 33vw"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-charcoal/85 via-charcoal/20 to-transparent" />

                {/* Content overlay */}
                <div className="absolute inset-0 flex flex-col justify-end p-7">
                  <p className="text-stone text-[10px] uppercase tracking-[0.25em] mb-2">
                    0{i + 1}
                  </p>
                  <h3 className="font-display text-2xl md:text-3xl font-medium text-white leading-tight">
                    {service.title}
                  </h3>
                  <p className="mt-2 text-sand-dark/70 text-sm italic font-display">
                    {service.tagline}
                  </p>

                  {/* Hover content */}
                  <div className="overflow-hidden max-h-0 group-hover:max-h-32 transition-all duration-500 ease-out-expo">
                    <p className="mt-4 text-sand-dark/80 text-sm leading-relaxed line-clamp-3">
                      {service.description}
                    </p>
                    <Link
                      href={`/services#${service.slug}`}
                      className="inline-flex mt-4 text-[10px] uppercase tracking-[0.2em] text-terracotta border-b border-terracotta/50 pb-px hover:border-terracotta transition-colors duration-200"
                    >
                      Learn more →
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
