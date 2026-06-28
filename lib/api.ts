/**
 * Data access layer.
 *
 * When NEXT_PUBLIC_API_URL is set (i.e. the Laravel CMS is live) every
 * function fetches from the real API with ISR caching + tag-based
 * revalidation.  Until then it falls back to the static mock data so
 * the site builds and deploys without a backend.
 */
import {
  projects as _projects,
  featuredProjects as _featured,
  articles as _articles,
  people as _people,
  services as _services,
  statistics as _statistics,
  clients as _clients,
} from './data'
import type { Project, Article, Person, Service, Statistic, Client } from './types'

const API = process.env.NEXT_PUBLIC_API_URL

async function apiFetch<T>(path: string, tags: string[], revalidate = 300): Promise<T> {
  const res = await fetch(`${API}${path}`, { next: { revalidate, tags } })
  if (!res.ok) throw new Error(`API error: ${res.status} ${path}`)
  const json = await res.json()
  return json.data as T
}

/* ─── Projects ────────────────────────────────────────── */

export async function getProjects(discipline?: string): Promise<Project[]> {
  if (API) {
    const qs = discipline ? `?discipline=${discipline}` : ''
    return apiFetch<Project[]>(`/projects${qs}`, ['projects'])
  }
  return discipline ? _projects.filter(p => p.discipline === discipline) : _projects
}

export async function getFeaturedProjects(): Promise<Project[]> {
  if (API) return apiFetch<Project[]>('/projects?featured=1', ['projects'])
  return _featured
}

export async function getProject(slug: string): Promise<Project | null> {
  if (API) {
    try { return await apiFetch<Project>(`/projects/${slug}`, [`project-${slug}`]) }
    catch { return null }
  }
  return _projects.find(p => p.slug === slug) ?? null
}

export async function getProjectSlugs(): Promise<string[]> {
  if (API) {
    const data = await apiFetch<{ slug: string }[]>('/projects/slugs', ['projects'])
    return data.map(d => d.slug)
  }
  return _projects.map(p => p.slug)
}

/* ─── Articles ────────────────────────────────────────── */

export async function getArticles(): Promise<Article[]> {
  if (API) return apiFetch<Article[]>('/articles', ['articles'])
  return _articles
}

export async function getArticle(slug: string): Promise<Article | null> {
  if (API) {
    try { return await apiFetch<Article>(`/articles/${slug}`, [`article-${slug}`]) }
    catch { return null }
  }
  return _articles.find(a => a.slug === slug) ?? null
}

export async function getArticleSlugs(): Promise<string[]> {
  if (API) {
    const data = await apiFetch<{ slug: string }[]>('/articles/slugs', ['articles'])
    return data.map(d => d.slug)
  }
  return _articles.map(a => a.slug)
}

/* ─── People ──────────────────────────────────────────── */

export async function getPeople(): Promise<Person[]> {
  if (API) return apiFetch<Person[]>('/people', ['people'], 3600)
  return _people
}

/* ─── Services ────────────────────────────────────────── */

export async function getServices(): Promise<Service[]> {
  if (API) return apiFetch<Service[]>('/services', ['services'], 3600)
  return _services
}

/* ─── Statistics ──────────────────────────────────────── */

export async function getStatistics(): Promise<Statistic[]> {
  if (API) return apiFetch<Statistic[]>('/statistics', ['statistics'], 3600)
  return _statistics
}

/* ─── Clients ─────────────────────────────────────────────── */

export async function getClients(): Promise<Client[]> {
  if (API) return apiFetch<Client[]>('/clients', ['clients'], 3600)
  return _clients
}
