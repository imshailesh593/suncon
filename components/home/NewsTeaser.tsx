import Image from 'next/image'
import Link from 'next/link'
import { articles } from '@/lib/data'
import ScrollReveal from '@/components/shared/ScrollReveal'

function formatDate(dateStr: string) {
  return new Date(dateStr).toLocaleDateString('en-AU', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  })
}

export default function NewsTeaser() {
  const featured = articles[0]
  const rest = articles.slice(1, 4)

  return (
    <section className="py-24 md:py-32 bg-sand">
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
        {/* Header */}
        <ScrollReveal className="flex items-end justify-between mb-14">
          <div>
            <p className="text-stone text-xs uppercase tracking-[0.2em] mb-3">Thinking</p>
            <h2 className="font-display text-display-md text-charcoal">
              Journal
            </h2>
          </div>
          <Link
            href="/blog"
            className="hidden sm:flex text-xs uppercase tracking-[0.18em] text-charcoal border-b border-charcoal/30 pb-1 hover:border-terracotta hover:text-terracotta transition-all duration-300"
          >
            All Articles
          </Link>
        </ScrollReveal>

        <div className="grid grid-cols-1 lg:grid-cols-5 gap-8">
          {/* Featured article */}
          <ScrollReveal className="lg:col-span-3">
            <Link href={`/blog/${featured.slug}`} className="group block">
              <div className="relative aspect-video overflow-hidden">
                <Image
                  src={featured.image}
                  alt={featured.title}
                  fill
                  className="object-cover transition-transform duration-700 ease-out-expo group-hover:scale-105"
                  sizes="(max-width: 1024px) 100vw, 60vw"
                />
              </div>
              <div className="pt-6">
                <div className="flex items-center gap-4 mb-3">
                  <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta">
                    {featured.category}
                  </span>
                  <span className="text-stone text-[10px]">{formatDate(featured.date)}</span>
                </div>
                <h3 className="font-display text-2xl md:text-3xl font-medium text-charcoal group-hover:text-terracotta transition-colors duration-300 leading-snug">
                  {featured.title}
                </h3>
                <p className="mt-3 text-charcoal-muted text-sm leading-relaxed line-clamp-2">
                  {featured.excerpt}
                </p>
                <span className="mt-5 inline-flex text-xs uppercase tracking-[0.18em] text-charcoal border-b border-charcoal/30 pb-px group-hover:border-terracotta group-hover:text-terracotta transition-all duration-300">
                  Read Article
                </span>
              </div>
            </Link>
          </ScrollReveal>

          {/* Article list */}
          <div className="lg:col-span-2 flex flex-col divide-y divide-charcoal/10">
            {rest.map((article, i) => (
              <ScrollReveal key={article.id} delay={i * 0.08}>
                <Link
                  href={`/blog/${article.slug}`}
                  className="group flex gap-5 py-6 first:pt-0"
                >
                  <div className="relative w-20 h-20 shrink-0 overflow-hidden">
                    <Image
                      src={article.image}
                      alt={article.title}
                      fill
                      className="object-cover transition-transform duration-500 group-hover:scale-105"
                      sizes="80px"
                    />
                  </div>
                  <div className="flex flex-col justify-center">
                    <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta mb-1">
                      {article.category}
                    </span>
                    <h4 className="font-display text-base font-medium text-charcoal group-hover:text-terracotta transition-colors duration-300 leading-snug line-clamp-2">
                      {article.title}
                    </h4>
                    <span className="mt-1 text-stone text-[10px]">{formatDate(article.date)}</span>
                  </div>
                </Link>
              </ScrollReveal>
            ))}
          </div>
        </div>
      </div>
    </section>
  )
}
