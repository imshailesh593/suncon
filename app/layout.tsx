import type { Metadata } from 'next'
import { Fraunces, Outfit } from 'next/font/google'
import './globals.css'
import Navbar from '@/components/layout/Navbar'
import Footer from '@/components/layout/Footer'
import SmoothScrollProvider from '@/components/providers/SmoothScrollProvider'
import CustomCursor from '@/components/shared/CustomCursor'
import { JsonLdOrganization, JsonLdWebSite } from '@/components/seo/JsonLd'

const fraunces = Fraunces({
  subsets: ['latin'],
  weight: ['200', '300', '400', '500', '700', '900'],
  style: ['normal', 'italic'],
  variable: '--font-display',
  display: 'swap',
})

const outfit = Outfit({
  subsets: ['latin'],
  weight: ['200', '300', '400', '500'],
  variable: '--font-body',
  display: 'swap',
})

const SITE = process.env.NEXT_PUBLIC_SITE_URL || 'https://sunconengineers.com'

export const metadata: Metadata = {
  metadataBase: new URL(SITE),
  title: {
    default: 'Suncon | Architecture & Design',
    template: '%s | Suncon',
  },
  description:
    'Suncon Engineers Pvt. Ltd. — ISO-certified multidisciplinary consultancy delivering architecture, landscape, interior design, BIM, PMC and infrastructure across India since 1999.',
  openGraph: {
    siteName: 'Suncon Engineers Pvt. Ltd.',
    type: 'website',
    locale: 'en_IN',
  },
  twitter: { card: 'summary_large_image', site: '@sunconengineers' },
  robots: { index: true, follow: true, googleBot: { index: true, follow: true } },
}

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en" className={`${fraunces.variable} ${outfit.variable}`}>
      <body className="bg-sand-light font-body text-charcoal antialiased">
        <SmoothScrollProvider>
          <JsonLdOrganization />
          <JsonLdWebSite />
          <CustomCursor />
          <Navbar />
          <main>{children}</main>
          <Footer />
        </SmoothScrollProvider>
      </body>
    </html>
  )
}
