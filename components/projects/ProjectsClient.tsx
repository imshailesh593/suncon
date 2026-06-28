'use client'

import { useState, useMemo } from 'react'
import { Project, Discipline } from '@/lib/types'
import ProjectCard from '@/components/projects/ProjectCard'
import ProjectFilter from '@/components/projects/ProjectFilter'
import ScrollReveal from '@/components/shared/ScrollReveal'

type Filter = Discipline | 'all'

export default function ProjectsClient({ projects }: { projects: Project[] }) {
  const [active, setActive] = useState<Filter>('all')

  const filtered = useMemo(
    () => (active === 'all' ? projects : projects.filter(p => p.discipline === active)),
    [active, projects],
  )

  const counts = useMemo(
    () => ({
      all: projects.length,
      architecture: projects.filter(p => p.discipline === 'architecture').length,
      interior: projects.filter(p => p.discipline === 'interior').length,
      urban: projects.filter(p => p.discipline === 'urban').length,
    }),
    [projects],
  )

  return (
    <div className="bg-sand-light pb-32">
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
        <div className="py-8 border-b border-charcoal/10 mb-10">
          <ProjectFilter active={active} onChange={setActive} counts={counts} />
        </div>

        <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-8">
          {filtered.length} project{filtered.length !== 1 ? 's' : ''}
        </p>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
          {filtered.map((project, i) => (
            <ScrollReveal key={project.id} delay={i * 0.05}>
              <ProjectCard project={project} priority={i < 3} />
            </ScrollReveal>
          ))}
        </div>
      </div>
    </div>
  )
}
