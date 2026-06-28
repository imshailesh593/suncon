import Link from 'next/link'
import { projects } from '@/lib/data'
import ProjectCard from '@/components/projects/ProjectCard'
import ScrollReveal from '@/components/shared/ScrollReveal'

export default function LatestWork() {
  const latestProjects = projects.filter((p) => !p.featured).slice(0, 4)

  return (
    <section className="py-24 md:py-32 bg-sand-light">
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
        {/* Header */}
        <ScrollReveal className="flex items-end justify-between mb-12">
          <div>
            <p className="text-stone text-xs uppercase tracking-[0.2em] mb-3">Portfolio</p>
            <h2 className="font-display text-display-md text-charcoal">
              Latest Work
            </h2>
          </div>
          <Link
            href="/projects"
            className="hidden sm:flex text-xs uppercase tracking-[0.18em] text-charcoal border-b border-charcoal/30 pb-1 hover:border-terracotta hover:text-terracotta transition-all duration-300"
          >
            All Projects
          </Link>
        </ScrollReveal>

        {/* Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
          {latestProjects.map((project, i) => (
            <ScrollReveal key={project.id} delay={i * 0.1}>
              <ProjectCard project={project} />
            </ScrollReveal>
          ))}
        </div>

        {/* Mobile CTA */}
        <div className="mt-10 sm:hidden">
          <Link
            href="/projects"
            className="text-xs uppercase tracking-[0.18em] text-charcoal border-b border-charcoal/30 pb-1"
          >
            View All Projects
          </Link>
        </div>
      </div>
    </section>
  )
}
