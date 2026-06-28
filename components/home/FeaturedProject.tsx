'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Link from 'next/link'
import { featuredProjects } from '@/lib/data'
import ImageReveal from '@/components/shared/ImageReveal'

gsap.registerPlugin(ScrollTrigger)

const disciplineLabel: Record<string, string> = {
  architecture: 'Architecture',
  interior: 'Interior Design',
  urban: 'Urban Design',
}

export default function FeaturedProject() {
  const project    = featuredProjects[0]
  const sectionRef = useRef<HTMLElement>(null)
  const contentRef = useRef<HTMLDivElement>(null)

  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.fromTo(
        contentRef.current,
        { x: 40, opacity: 0 },
        {
          x: 0,
          opacity: 1,
          duration: 1.2,
          delay: 0.3,
          ease: 'power3.out',
          scrollTrigger: { trigger: sectionRef.current, start: 'top 70%' },
        },
      )
    }, sectionRef)
    return () => { ScrollTrigger.killAll(); ctx.revert() }
  }, [])

  if (!project) return null

  return (
    <section ref={sectionRef} className="py-24 md:py-32 bg-sand">
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-20 items-stretch">
          <ImageReveal
            src={project.image}
            alt={project.title}
            aspectClassName="min-h-[420px] h-full"
            sizes="(max-width: 1024px) 100vw, 50vw"
          />

          {/* Content — stretches to full image height */}
          <div ref={contentRef} className="flex flex-col opacity-0 lg:pt-2">
            <p className="text-stone text-[10px] uppercase tracking-[0.22em] mb-6">Featured Project</p>

            <span className="self-start text-[10px] uppercase tracking-[0.22em] border border-terracotta/40 text-terracotta px-3 py-1.5 mb-6">
              {disciplineLabel[project.discipline]}
            </span>

            <h2 className="font-display font-light text-display-lg text-charcoal leading-tight">{project.title}</h2>

            <div className="mt-4 flex flex-wrap gap-5 text-stone text-[11px] uppercase tracking-[0.15em]">
              <span>{project.location}</span>
              <span>{project.year}</span>
              {project.area && <span>{project.area}</span>}
            </div>

            <p className="mt-6 text-charcoal-muted text-[15px] leading-relaxed">{project.description}</p>

            <div className="mt-6 flex flex-wrap gap-2">
              {project.tags.map((tag) => (
                <span key={tag} className="text-[9px] uppercase tracking-[0.2em] bg-sand-dark text-charcoal-muted px-3 py-1.5">
                  {tag}
                </span>
              ))}
            </div>

            <Link
              href={`/projects/${project.slug}`}
              className="mt-10 self-start text-[10px] font-body font-light uppercase tracking-[0.22em] border border-charcoal/25 text-charcoal px-8 py-4 hover:bg-terracotta hover:border-terracotta hover:text-white transition-all duration-300"
            >
              View Project →
            </Link>
          </div>
        </div>

      </div>
    </section>
  )
}
