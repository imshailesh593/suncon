import type { MetadataRoute } from 'next'
import { getProjectSlugs, getArticleSlugs } from '@/lib/api'

const SITE = process.env.NEXT_PUBLIC_SITE_URL || 'https://sunconengineers.com'
const now = new Date()

export default async function sitemap(): Promise<MetadataRoute.Sitemap> {
  const [projectSlugs, articleSlugs] = await Promise.all([
    getProjectSlugs(),
    getArticleSlugs(),
  ])

  const staticRoutes: MetadataRoute.Sitemap = [
    { url: SITE,                  lastModified: now, changeFrequency: 'weekly',  priority: 1.0 },
    { url: `${SITE}/projects`,    lastModified: now, changeFrequency: 'weekly',  priority: 0.9 },
    { url: `${SITE}/about`,       lastModified: now, changeFrequency: 'monthly', priority: 0.7 },
    { url: `${SITE}/services`,    lastModified: now, changeFrequency: 'monthly', priority: 0.8 },
    { url: `${SITE}/blog`,        lastModified: now, changeFrequency: 'weekly',  priority: 0.8 },
    { url: `${SITE}/contact`,     lastModified: now, changeFrequency: 'yearly',  priority: 0.6 },
  ]

  const projectRoutes: MetadataRoute.Sitemap = projectSlugs.map(slug => ({
    url: `${SITE}/projects/${slug}`,
    lastModified: now,
    changeFrequency: 'monthly',
    priority: 0.8,
  }))

  const articleRoutes: MetadataRoute.Sitemap = articleSlugs.map(slug => ({
    url: `${SITE}/blog/${slug}`,
    lastModified: now,
    changeFrequency: 'monthly',
    priority: 0.6,
  }))

  return [...staticRoutes, ...projectRoutes, ...articleRoutes]
}
