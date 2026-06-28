import Image from 'next/image'
import Link from 'next/link'
import { Project } from '@/lib/types'
import { clsx } from 'clsx'

const disciplineLabel: Record<string, string> = {
  architecture: 'Architecture',
  interior: 'Interior Design',
  urban: 'Urban Design',
}

interface ProjectCardProps {
  project: Project
  className?: string
  priority?: boolean
}

export default function ProjectCard({ project, className, priority }: ProjectCardProps) {
  return (
    <Link
      href={`/projects/${project.slug}`}
      className={clsx('project-card group block overflow-hidden', className)}
    >
      {/* Image */}
      <div className="relative overflow-hidden aspect-[4/3]">
        <Image
          src={project.image}
          alt={project.title}
          fill
          className="project-card-img object-cover"
          sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw"
          priority={priority}
        />
        <div className="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/20 transition-all duration-500" />
        {/* Discipline tag */}
        <div className="absolute top-4 left-4">
          <span className="text-[10px] uppercase tracking-[0.2em] bg-sand-light/90 text-charcoal px-3 py-1.5">
            {disciplineLabel[project.discipline]}
          </span>
        </div>
      </div>

      {/* Info */}
      <div className="pt-4 pb-6">
        <div className="flex items-start justify-between gap-4">
          <h3 className="font-display text-xl font-medium text-charcoal leading-snug group-hover:text-terracotta transition-colors duration-300">
            {project.title}
          </h3>
          <span className="text-stone text-xs shrink-0 mt-1">{project.year}</span>
        </div>
        <p className="text-stone text-sm mt-1">{project.location}</p>
      </div>
    </Link>
  )
}
