import type { Article } from '@/lib/types'

const SITE = process.env.NEXT_PUBLIC_SITE_URL || 'https://sunconengineers.com'

/* ---- Organization ---- */
export function JsonLdOrganization() {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'Organization',
    name: 'Suncon Engineers Pvt. Ltd.',
    url: SITE,
    logo: `${SITE}/logo.png`,
    description: 'ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM, PMC, and infrastructure services across India since 1999.',
    foundingDate: '1999',
    address: {
      '@type': 'PostalAddress',
      streetAddress: 'P1/9, Sai Palace, Near Lohia-Jain IT Park, Bhusari Colony, Paud Road, Kothrud',
      addressLocality: 'Pune',
      addressRegion: 'Maharashtra',
      postalCode: '411038',
      addressCountry: 'IN',
    },
    contactPoint: [
      {
        '@type': 'ContactPoint',
        telephone: '+91-93716-54387',
        email: 'bd@sunconengineers.com',
        contactType: 'sales',
        areaServed: 'IN',
      },
      {
        '@type': 'ContactPoint',
        telephone: '+91-74200-02915',
        email: 'hr@sunconengineers.com',
        contactType: 'human resources',
        areaServed: 'IN',
      },
    ],
    sameAs: [
      'https://www.facebook.com/sunconengineers',
      'https://www.linkedin.com/company/sunconengineers',
      'https://www.instagram.com/sunconengineers',
      'https://www.youtube.com/@SunconEngineers',
    ],
  }

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  )
}

/* ---- WebSite ---- */
export function JsonLdWebSite() {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'WebSite',
    name: 'Suncon Engineers Pvt. Ltd.',
    url: SITE,
    potentialAction: {
      '@type': 'SearchAction',
      target: `${SITE}/projects?q={search_term_string}`,
      'query-input': 'required name=search_term_string',
    },
  }

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  )
}

/* ---- Breadcrumb ---- */
export function JsonLdBreadcrumb({ items }: { items: { name: string; url: string }[] }) {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'BreadcrumbList',
    itemListElement: items.map((item, i) => ({
      '@type': 'ListItem',
      position: i + 1,
      name: item.name,
      item: item.url,
    })),
  }

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  )
}

/* ---- Article ---- */
export function JsonLdArticle({ article }: { article: Article }) {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'Article',
    headline: article.title,
    description: article.excerpt,
    image: article.image,
    datePublished: article.date,
    dateModified: article.date,
    author: {
      '@type': 'Person',
      name: article.author,
    },
    publisher: {
      '@type': 'Organization',
      name: 'Suncon Engineers Pvt. Ltd.',
      logo: { '@type': 'ImageObject', url: `${SITE}/logo.png` },
    },
    mainEntityOfPage: { '@type': 'WebPage', '@id': `${SITE}/blog/${article.slug}` },
  }

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  )
}

/* ---- Local Business ---- */
export function JsonLdLocalBusiness() {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'ProfessionalService',
    name: 'Suncon Engineers Pvt. Ltd.',
    image: `${SITE}/og-image.png`,
    url: SITE,
    telephone: '+91-93716-54387',
    email: 'bd@sunconengineers.com',
    priceRange: '$$',
    address: {
      '@type': 'PostalAddress',
      streetAddress: 'P1/9, Sai Palace, Paud Road, Kothrud',
      addressLocality: 'Pune',
      addressRegion: 'Maharashtra',
      postalCode: '411038',
      addressCountry: 'IN',
    },
    geo: { '@type': 'GeoCoordinates', latitude: 18.5074, longitude: 73.8077 },
    openingHoursSpecification: [{
      '@type': 'OpeningHoursSpecification',
      dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      opens: '09:00',
      closes: '18:00',
    }],
    areaServed: { '@type': 'Country', name: 'India' },
  }

  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(schema) }}
    />
  )
}
