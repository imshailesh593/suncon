import type { Metadata } from 'next'
import Image from 'next/image'
import Link from 'next/link'
import { articles } from '@/lib/data'
import ScrollReveal from '@/components/shared/ScrollReveal'

export const metadata: Metadata = { title: 'Journal' }

function formatDate(dateStr: string) {
  return new Date(dateStr).toLocaleDateString('en-AU', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  })
}

export default function BlogPage() {
  const [hero, ...rest] = articles

  return (
    <>
      {/* Hero */}
      <div className="pt-36 pb-16 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-xs uppercase tracking-[0.2em] mb-4">Ideas & Thinking</p>
            <h1 className="font-display text-display-lg text-charcoal">Journal</h1>
          </ScrollReveal>
        </div>
      </div>

      {/* Featured */}
      <div className="bg-sand pb-20">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <Link href={`/blog/${hero.slug}`} className="group grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
              <div className="relative aspect-video overflow-hidden">
                <Image
                  src={hero.image}
                  alt={hero.title}
                  fill
                  className="object-cover transition-transform duration-700 group-hover:scale-105"
                  sizes="(max-width: 1024px) 100vw, 50vw"
                  priority
                />
              </div>
              <div>
                <div className="flex items-center gap-4 mb-4">
                  <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta">{hero.category}</span>
                  <span className="text-stone text-[10px]">{formatDate(hero.date)}</span>
                </div>
                <h2 className="font-display text-display-md text-charcoal group-hover:text-terracotta transition-colors duration-300 leading-snug">
                  {hero.title}
                </h2>
                <p className="mt-4 text-charcoal-muted text-base leading-relaxed">{hero.excerpt}</p>
                <span className="mt-6 inline-flex text-xs uppercase tracking-[0.18em] text-charcoal border-b border-charcoal/30 pb-px group-hover:text-terracotta group-hover:border-terracotta transition-all duration-300">
                  Read Article
                </span>
              </div>
            </Link>
          </ScrollReveal>
        </div>
      </div>

      {/* All articles */}
      <div className="bg-sand-light pb-32">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <div className="py-10 border-b border-charcoal/10 mb-10">
            <p className="text-stone text-xs uppercase tracking-[0.2em]">All Articles</p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {rest.map((article, i) => (
              <ScrollReveal key={article.id} delay={i * 0.08}>
                <Link href={`/blog/${article.slug}`} className="group block">
                  <div className="relative aspect-video overflow-hidden mb-5">
                    <Image
                      src={article.image}
                      alt={article.title}
                      fill
                      className="object-cover transition-transform duration-700 group-hover:scale-105"
                      sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                    />
                  </div>
                  <div className="flex items-center gap-4 mb-3">
                    <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta">{article.category}</span>
                    <span className="text-stone text-[10px]">{formatDate(article.date)}</span>
                  </div>
                  <h3 className="font-display text-xl font-medium text-charcoal group-hover:text-terracotta transition-colors duration-300 leading-snug">
                    {article.title}
                  </h3>
                  <p className="mt-2 text-charcoal-muted text-sm leading-relaxed line-clamp-2">{article.excerpt}</p>
                </Link>
              </ScrollReveal>
            ))}
          </div>
        </div>
      </div>
    </>
  )
}
