export type Discipline = 'architecture' | 'interior' | 'urban'

export interface Project {
  id: string
  slug: string
  title: string
  discipline: Discipline
  location: string
  year: number
  image: string
  images: string[]
  description: string
  client: string
  area?: string
  tags: string[]
  featured: boolean
}

export interface Person {
  id: string
  name: string
  role: string
  bio: string
  image: string
}

export interface Article {
  id: string
  slug: string
  title: string
  excerpt: string
  image: string
  date: string
  category: string
  author: string
}

export interface Statistic {
  value: string
  label: string
  suffix?: string
  description: string
  icon: string
}

export interface Service {
  id: string
  slug: string
  title: string
  tagline: string
  description: string
  image: string
  features: string[]
}

export interface Client {
  name: string
  category: string
}
