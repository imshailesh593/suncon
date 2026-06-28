import type { Metadata } from 'next'
import { notFound } from 'next/navigation'
import Image from 'next/image'
import Link from 'next/link'
import { getProject, getProjects, getProjectSlugs } from '@/lib/api'
import ScrollReveal from '@/components/shared/ScrollReveal'
import ProjectCard from '@/components/projects/ProjectCard'
import { JsonLdBreadcrumb } from '@/components/seo/JsonLd'

const SITE = process.env.NEXT_PUBLIC_SITE_URL || 'https://sunconengineers.com'

const disciplineLabel: Record<string, string> = {
  architecture: 'Architecture',
  interior: 'Interior Design',
  urban: 'Urban Design',
}

export async function generateStaticParams() {
  const slugs = await getProjectSlugs()
  return slugs.map(slug => ({ slug }))
}

export async function generateMetadata(
  { params }: { params: { slug: string } },
): Promise<Metadata> {
  const project = await getProject(params.slug)
  if (!project) return {}
  const title = project.title
  const description = project.description.slice(0, 160)
  const image = project.image

  return {
    title,
    description,
    openGraph: {
      title: `${title} | Suncon`,
      description,
      images: [{ url: image, width: 1200, height: 800, alt: title }],
      type: 'article',
    },
    twitter: { card: 'summary_large_image', title, description, images: [image] },
    alternates: { canonical: `/projects/${params.slug}` },
  }
}

export default async function ProjectDetailPage({ params }: { params: { slug: string } }) {
  const [project, allProjects] = await Promise.all([
    getProject(params.slug),
    getProjects(),
  ])
  if (!project) notFound()

  const related = allProjects
    .filter(p => p.id !== project.id && p.discipline === project.discipline)
    .slice(0, 2)

  const breadcrumbs = [
    { name: 'Home', url: SITE },
    { name: 'Projects', url: `${SITE}/projects` },
    { name: project.title, url: `${SITE}/projects/${project.slug}` },
  ]

  return (
    <>
      <JsonLdBreadcrumb items={breadcrumbs} />

      {/* Hero */}
      <div className="relative h-[65vh] min-h-[480px] overflow-hidden">
        <Image src={project.image} alt={project.title} fill className="object-cover" priority sizes="100vw" />
        <div className="absolute inset-0 bg-gradient-to-b from-charcoal/60 via-charcoal/30 to-charcoal/70" />
        <div className="absolute inset-0 flex items-end max-w-screen-xl mx-auto px-6 lg:px-12 pb-16 pt-36">
          <div>
            <span className="text-[10px] uppercase tracking-[0.2em] bg-terracotta text-white px-3 py-1.5">
              {disciplineLabel[project.discipline]}
            </span>
            <h1 className="font-display font-light text-display-lg text-white mt-4 leading-none">
              {project.title}
            </h1>
            <p className="text-white/60 mt-3 text-sm tracking-wide">
              {project.location} · {project.year}
            </p>
          </div>
        </div>
      </div>

      {/* Content */}
      <div className="bg-sand-light py-20">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <ScrollReveal className="lg:col-span-2">
              <h2 className="font-display text-2xl text-charcoal mb-6 leading-snug">About the Project</h2>
              <p className="text-charcoal-muted text-[15px] leading-relaxed">{project.description}</p>
              {project.images.length > 1 && (
                <div className="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-4">
                  {project.images.slice(1).map((img, i) => (
                    <div key={i} className="relative aspect-[4/3] overflow-hidden">
                      <Image src={img} alt={`${project.title} — view ${i + 2}`} fill className="object-cover" sizes="(max-width: 640px) 100vw, 50vw" />
                    </div>
                  ))}
                </div>
              )}
            </ScrollReveal>

            <ScrollReveal delay={0.15}>
              <div className="bg-sand p-8 flex flex-col gap-6">
                {[
                  { label: 'Client', value: project.client },
                  { label: 'Location', value: project.location },
                  { label: 'Year', value: String(project.year) },
                  project.area ? { label: 'Area', value: project.area } : null,
                  { label: 'Discipline', value: disciplineLabel[project.discipline] },
                ]
                  .filter(Boolean)
                  .map(item => (
                    <div key={item!.label} className="border-b border-charcoal/10 pb-6 last:border-0 last:pb-0">
                      <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-1">{item!.label}</p>
                      <p className="text-charcoal text-sm font-medium">{item!.value}</p>
                    </div>
                  ))}
                <div>
                  <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-3">Tags</p>
                  <div className="flex flex-wrap gap-2">
                    {project.tags.map(tag => (
                      <span key={tag} className="text-[9px] uppercase tracking-[0.15em] bg-sand-dark text-charcoal-muted px-3 py-1.5">
                        {tag}
                      </span>
                    ))}
                  </div>
                </div>
              </div>
              <Link
                href="/contact"
                className="mt-6 flex items-center justify-center text-[10px] font-body font-light uppercase tracking-[0.22em] bg-terracotta text-white px-6 py-4 hover:bg-terracotta-dark transition-colors duration-300"
              >
                Start a Similar Project →
              </Link>
            </ScrollReveal>
          </div>
        </div>
      </div>

      {/* Related */}
      {related.length > 0 && (
        <div className="bg-sand py-20">
          <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
            <ScrollReveal>
              <h2 className="font-display text-2xl font-light text-charcoal mb-10">Related Projects</h2>
            </ScrollReveal>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
              {related.map(p => (
                <ScrollReveal key={p.id}>
                  <ProjectCard project={p} />
                </ScrollReveal>
              ))}
            </div>
          </div>
        </div>
      )}

      <div className="bg-sand-light py-10">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <Link href="/projects" className="text-[10px] font-body font-light uppercase tracking-[0.22em] text-charcoal border-b border-charcoal/30 pb-px hover:border-terracotta hover:text-terracotta transition-all duration-300">
            ← All Projects
          </Link>
        </div>
      </div>
    </>
  )
}
