import type { Metadata } from 'next'
import { getProjects } from '@/lib/api'
import ProjectsClient from '@/components/projects/ProjectsClient'
import ScrollReveal from '@/components/shared/ScrollReveal'

export const metadata: Metadata = {
  title: 'Projects',
  description:
    'Explore our portfolio of architecture, interior design, landscape design, and infrastructure projects delivered across India.',
  openGraph: {
    title: 'Projects | Suncon Engineers',
    description:
      'Architecture, interior, landscape, and infrastructure projects by Suncon Engineers Pvt. Ltd. across India.',
  },
  alternates: { canonical: '/projects' },
}

export default async function ProjectsPage() {
  const projects = await getProjects()

  return (
    <>
      <div className="pt-36 pb-16 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">Our Work</p>
            <h1 className="font-display font-light text-display-lg text-charcoal">Projects</h1>
          </ScrollReveal>
        </div>
      </div>
      <ProjectsClient projects={projects} />
    </>
  )
}
