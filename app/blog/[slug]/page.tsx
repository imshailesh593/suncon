import type { Metadata } from 'next'
import { notFound } from 'next/navigation'
import Image from 'next/image'
import Link from 'next/link'
import { getArticle, getArticles, getArticleSlugs } from '@/lib/api'
import { JsonLdArticle, JsonLdBreadcrumb } from '@/components/seo/JsonLd'

const SITE = process.env.NEXT_PUBLIC_SITE_URL || 'https://sunconengineers.com'

function formatDate(d: string) {
  return new Date(d).toLocaleDateString('en-AU', { year: 'numeric', month: 'long', day: 'numeric' })
}

export async function generateStaticParams() {
  const slugs = await getArticleSlugs()
  return slugs.map(slug => ({ slug }))
}

export async function generateMetadata({ params }: { params: { slug: string } }): Promise<Metadata> {
  const article = await getArticle(params.slug)
  if (!article) return {}

  return {
    title: article.title,
    description: article.excerpt,
    openGraph: {
      title: `${article.title} | Suncon`,
      description: article.excerpt,
      type: 'article',
      publishedTime: article.date,
      authors: [article.author],
      images: [{ url: article.image, width: 1200, height: 628, alt: article.title }],
    },
    twitter: { card: 'summary_large_image', title: article.title, description: article.excerpt, images: [article.image] },
    alternates: { canonical: `/blog/${params.slug}` },
  }
}

export default async function BlogPostPage({ params }: { params: { slug: string } }) {
  const [article, allArticles] = await Promise.all([
    getArticle(params.slug),
    getArticles(),
  ])
  if (!article) notFound()

  const related = allArticles.filter(a => a.id !== article.id).slice(0, 2)

  const breadcrumbs = [
    { name: 'Home', url: SITE },
    { name: 'Journal', url: `${SITE}/blog` },
    { name: article.title, url: `${SITE}/blog/${article.slug}` },
  ]

  return (
    <>
      <JsonLdArticle article={article} />
      <JsonLdBreadcrumb items={breadcrumbs} />

      <div className="pt-36 pb-10 bg-sand-light">
        <div className="max-w-3xl mx-auto px-6 lg:px-12">
          <Link href="/blog" className="text-[10px] uppercase tracking-[0.2em] text-stone hover:text-terracotta transition-colors duration-200">
            ← Journal
          </Link>
          <div className="flex flex-wrap items-center gap-4 mt-8 mb-6">
            <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta">{article.category}</span>
            <span className="text-stone text-[10px]">{formatDate(article.date)}</span>
            <span className="text-stone text-[10px]">By {article.author}</span>
          </div>
          <h1 className="font-display font-light text-display-md text-charcoal leading-snug">{article.title}</h1>
          <p className="mt-5 text-charcoal-muted text-lg leading-relaxed">{article.excerpt}</p>
        </div>
      </div>

      <div className="max-w-screen-xl mx-auto px-6 lg:px-12 pb-10">
        <div className="relative aspect-video overflow-hidden">
          <Image src={article.image} alt={article.title} fill className="object-cover" priority sizes="100vw" />
        </div>
      </div>

      <div className="max-w-3xl mx-auto px-6 lg:px-12 pb-32">
        <div className="text-charcoal-muted text-[15px] leading-relaxed space-y-6">
          <p>{article.excerpt}</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
            elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut
            commodo diam libero vitae erat.
          </p>
          <blockquote className="border-l-2 border-terracotta pl-6 my-8">
            <p className="font-display text-xl font-light italic text-charcoal">
              &ldquo;The best architecture is invisible — it disappears into the background of daily life
              while quietly elevating every moment within it.&rdquo;
            </p>
            <cite className="mt-2 block text-[10px] uppercase tracking-[0.2em] text-stone not-italic">
              — Sunita Rao, Founding Director
            </cite>
          </blockquote>
          <p>
            Cras mattis consectetur purus sit amet fermentum. Vestibulum id ligula porta felis euismod
            semper. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
          </p>
        </div>
      </div>

      {related.length > 0 && (
        <div className="bg-sand py-20">
          <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-10">More from the Journal</p>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-8">
              {related.map(a => (
                <Link key={a.id} href={`/blog/${a.slug}`} className="group block">
                  <div className="relative aspect-video overflow-hidden mb-4">
                    <Image src={a.image} alt={a.title} fill className="object-cover transition-transform duration-700 group-hover:scale-105" sizes="(max-width: 640px) 100vw, 50vw" />
                  </div>
                  <span className="text-[10px] uppercase tracking-[0.2em] text-terracotta">{a.category}</span>
                  <h3 className="font-display text-xl font-medium text-charcoal group-hover:text-terracotta transition-colors duration-300 mt-2 leading-snug">
                    {a.title}
                  </h3>
                </Link>
              ))}
            </div>
          </div>
        </div>
      )}
    </>
  )
}
