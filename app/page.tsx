import type { Metadata } from 'next'
import Hero from '@/components/home/Hero'
import ProjectsScroll from '@/components/home/ProjectsScroll'
import Statistics from '@/components/home/Statistics'
import Disciplines from '@/components/home/Disciplines'
import FeaturedProject from '@/components/home/FeaturedProject'
import LatestWork from '@/components/home/LatestWork'
import NewsTeaser from '@/components/home/NewsTeaser'
export const metadata: Metadata = {
  title: 'Suncon Engineers | Architecture, Landscape & Interior Design',
  description:
    'Suncon Engineers Pvt. Ltd. — ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM and infrastructure across India since 1999.',
  openGraph: {
    title: 'Suncon Engineers | Architecture & Design',
    description:
      'ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM and infrastructure across India since 1999.',
    type: 'website',
  },
  alternates: { canonical: '/' },
}

export default function HomePage() {
  return (
    <>
      <Hero />
      <ProjectsScroll />
      <Statistics />
      <Disciplines />
      <FeaturedProject />
      <LatestWork />
      <NewsTeaser />
    </>
  )
}
