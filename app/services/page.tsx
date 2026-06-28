import type { Metadata } from 'next'
import Image from 'next/image'
import Link from 'next/link'
import { services } from '@/lib/data'
import ScrollReveal from '@/components/shared/ScrollReveal'

export const metadata: Metadata = { title: 'Services' }

export default function ServicesPage() {
  return (
    <>
      {/* Hero */}
      <div className="pt-36 pb-20 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-xs uppercase tracking-[0.2em] mb-4">What We Offer</p>
            <h1 className="font-display text-display-lg text-charcoal max-w-3xl">
              Expertise across
              <br />
              <em className="font-light text-terracotta">every scale.</em>
            </h1>
          </ScrollReveal>

          <ScrollReveal delay={0.1}>
            <p className="mt-8 text-charcoal-muted text-lg max-w-xl leading-relaxed">
              From a single room to a city precinct, Suncon brings the same rigour, care, and
              commitment to design excellence across all our services.
            </p>
          </ScrollReveal>
        </div>
      </div>

      {/* Services */}
      <div className="bg-sand-light pb-32">
        {services.map((service, i) => (
          <div
            key={service.id}
            id={service.slug}
            className={`py-20 ${i % 2 === 1 ? 'bg-sand' : 'bg-sand-light'}`}
          >
            <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
              <div
                className={`grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center ${
                  i % 2 === 1 ? 'lg:grid-flow-dense' : ''
                }`}
              >
                {/* Image */}
                <ScrollReveal className={i % 2 === 1 ? 'lg:col-start-2' : ''}>
                  <div className="relative aspect-[4/3] overflow-hidden">
                    <Image
                      src={service.image}
                      alt={service.title}
                      fill
                      className="object-cover"
                      sizes="(max-width: 1024px) 100vw, 50vw"
                    />
                  </div>
                </ScrollReveal>

                {/* Content */}
                <ScrollReveal delay={0.15} className={i % 2 === 1 ? 'lg:col-start-1 lg:row-start-1' : ''}>
                  <p className="text-stone text-[10px] uppercase tracking-[0.25em] mb-3">
                    0{i + 1} / 0{services.length}
                  </p>
                  <h2 className="font-display text-display-md text-charcoal">{service.title}</h2>
                  <p className="mt-1 font-display text-xl italic text-terracotta">{service.tagline}</p>
                  <p className="mt-6 text-charcoal-muted text-base leading-relaxed">
                    {service.description}
                  </p>

                  {/* Features */}
                  <ul className="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    {service.features.map((f) => (
                      <li key={f} className="flex items-start gap-3 text-sm text-charcoal-muted">
                        <span className="mt-1.5 w-1 h-1 rounded-full bg-terracotta shrink-0" />
                        {f}
                      </li>
                    ))}
                  </ul>

                  <Link
                    href="/contact"
                    className="mt-10 inline-flex text-xs uppercase tracking-[0.18em] border border-charcoal/30 text-charcoal px-7 py-3.5 hover:bg-terracotta hover:border-terracotta hover:text-white transition-all duration-300"
                  >
                    Enquire About {service.title}
                  </Link>
                </ScrollReveal>
              </div>
            </div>
          </div>
        ))}
      </div>
    </>
  )
}
