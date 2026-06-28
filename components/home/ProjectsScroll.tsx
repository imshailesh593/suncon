'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Image from 'next/image'
import Link from 'next/link'
import { projects } from '@/lib/data'

gsap.registerPlugin(ScrollTrigger)

const scrollProjects = projects.slice(0, 5)

const disciplineLabel: Record<string, string> = {
  architecture: 'Architecture',
  interior: 'Interior Design',
  urban: 'Urban Design',
}

export default function ProjectsScroll() {
  const sectionRef  = useRef<HTMLDivElement>(null)
  const trackRef    = useRef<HTMLDivElement>(null)
  const headingRef  = useRef<HTMLDivElement>(null)
  const triggersRef = useRef<ScrollTrigger[]>([])

  useEffect(() => {
    const section = sectionRef.current
    const track   = trackRef.current
    if (!section || !track) return

    const ctx = gsap.context(() => {
      gsap.fromTo(headingRef.current,
        { y: 30, opacity: 0 },
        { y: 0, opacity: 1, duration: 1, ease: 'power3.out',
          scrollTrigger: { trigger: headingRef.current, start: 'top 85%' } },
      )

      // track is max-content wide; totalScroll = how far it needs to travel
      const totalScroll = track.offsetWidth - section.offsetWidth
      const hScrollST = ScrollTrigger.create({
        trigger: section,
        start: 'top top',
        end: () => `+=${track.offsetWidth - section.offsetWidth}`,
        pin: true,
        scrub: 1.2,
        anticipatePin: 1,
        animation: gsap.to(track, { x: () => -(track.offsetWidth - section.offsetWidth), ease: 'none' }),
        invalidateOnRefresh: true,
      })

      ScrollTrigger.refresh()

      triggersRef.current = [hScrollST]
    }, sectionRef)

    return () => {
      triggersRef.current.forEach(st => st.kill())
      triggersRef.current = []
      ctx.revert()
    }
  }, [])

  return (
    <section ref={sectionRef} className="overflow-hidden bg-sand-light">
      {/* Fixed-height container — fills exactly one viewport */}
      <div className="h-screen flex flex-col pt-20 md:pt-24">

        {/* Header */}
        <div
          ref={headingRef}
          className="flex items-end justify-between px-6 lg:px-12 mb-8 max-w-screen-xl mx-auto w-full opacity-0"
        >
          <div>
            <p className="text-stone text-[10px] uppercase tracking-[0.22em] mb-2">Selected Work</p>
            <h2 className="font-display text-display-md text-charcoal leading-none">Recent Projects</h2>
          </div>
          <Link
            href="/projects"
            className="hidden md:flex text-[10px] uppercase tracking-[0.2em] text-charcoal border-b border-charcoal/30 pb-0.5 hover:border-terracotta hover:text-terracotta transition-all duration-300"
          >
            View All Projects
          </Link>
        </div>

        {/* Horizontal track — fills remaining height */}
        <div
          ref={trackRef}
          className="flex gap-4 lg:gap-6 px-6 lg:px-12 will-change-transform flex-1 min-h-0"
          style={{ width: 'max-content' }}
        >
          {scrollProjects.map((project, i) => (
            <Link
              key={project.id}
              href={`/projects/${project.slug}`}
              className="group flex flex-col shrink-0 w-[72vw] sm:w-[52vw] md:w-[38vw] lg:w-[28vw]"
            >
              {/* Image */}
              <div className="relative overflow-hidden flex-1 min-h-0">
                <Image
                  src={project.image}
                  alt={project.title}
                  fill
                  className="object-cover transition-transform duration-700 ease-out-expo group-hover:scale-105"
                  sizes="(max-width: 768px) 72vw, (max-width: 1024px) 52vw, 28vw"
                  priority={i < 2}
                />
                <div className="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/20 transition-colors duration-700" />
              </div>

              {/* Meta — premium minimal */}
              <div className="shrink-0 pt-4 pb-2">
                {/* Rule */}
                <div className="w-full h-px bg-charcoal/12 mb-4 origin-left scale-x-100 group-hover:bg-terracotta/40 transition-colors duration-500" />
                {/* Index + category row */}
                <div className="flex items-center justify-between mb-2">
                  <span className="text-[9px] uppercase tracking-[0.28em] text-stone/60">
                    {String(i + 1).padStart(2, '0')} — {disciplineLabel[project.discipline]}
                  </span>
                  <span className="text-[9px] uppercase tracking-[0.18em] text-stone/50 italic font-display">
                    {project.year}
                  </span>
                </div>
                {/* Title */}
                <h3 className="font-display font-light text-[1.05rem] leading-snug text-charcoal group-hover:text-terracotta transition-colors duration-300">
                  {project.title}
                </h3>
              </div>
            </Link>
          ))}

          {/* End card */}
          <div className="shrink-0 w-[36vw] md:w-[22vw] flex items-center pb-8">
            <Link
              href="/projects"
              className="text-charcoal font-display text-2xl font-light italic hover:text-terracotta transition-colors duration-300 leading-tight"
            >
              See all<br />projects →
            </Link>
          </div>
        </div>

      </div>
    </section>
  )
}
