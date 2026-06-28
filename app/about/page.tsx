import type { Metadata } from 'next'
import Image from 'next/image'
import Link from 'next/link'
import { getPeople, getStatistics, getClients } from '@/lib/api'
import ScrollReveal from '@/components/shared/ScrollReveal'
import ImageReveal from '@/components/shared/ImageReveal'
import ClientsMarquee from '@/components/about/ClientsMarquee'

export const metadata: Metadata = {
  title: 'About',
  description:
    'Established in 1999, Suncon Engineers Pvt. Ltd. is an ISO-certified multidisciplinary consultancy providing architectural design, landscape, interior, BIM, PMC, and infrastructure services across India.',
  openGraph: {
    title: 'About | Suncon Engineers',
    description:
      "A multidisciplinary practice established in 1999, shaping India's built environment across architecture, landscape, interior design, and civil infrastructure.",
  },
  alternates: { canonical: '/about' },
}

export default async function AboutPage() {
  const [people, statistics, clients] = await Promise.all([getPeople(), getStatistics(), getClients()])

  return (
    <>
      {/* Hero */}
      <div className="pt-36 pb-20 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">Our Practice</p>
            <h1 className="font-display font-light text-display-lg text-charcoal max-w-3xl">
              Building a better world,
              <br />
              <em className="text-terracotta">one project at a time.</em>
            </h1>
          </ScrollReveal>
        </div>
      </div>

      {/* Story */}
      <div className="py-20 bg-sand">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <ImageReveal
            src="https://www.sunconengineers.com/wp-content/uploads/2025/05/beautiful-modern-building-modern-architecture.jpg"
            alt="Suncon Engineers architecture project"
            sizes="(max-width: 1024px) 100vw, 50vw"
          />
          <ScrollReveal delay={0.15}>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-6">Our Story</p>
            <h2 className="font-display font-light text-3xl md:text-4xl text-charcoal mb-6 leading-snug">
              An independent consultancy trusted across India since 1999.
            </h2>
            <div className="space-y-4 text-charcoal-muted text-[15px] leading-relaxed">
              <p>
                Suncon Engineers Pvt. Ltd. was established in 1999 with a commitment to delivering
                professional, accountable consultancy services in civil engineering, architecture,
                and project management. ISO certified and headquartered in Pune, we have grown
                into a fast-growing multidisciplinary practice serving clients across India.
              </p>
              <p>
                Our first architecture project — a manufacturing facility for Cadbury India — was
                completed in 2010, followed by our first PMC commission for Castrol India in 2015.
                Today, with 250+ completed projects spanning Maharashtra, Tamil Nadu, Jharkhand,
                Punjab, Kerala, and beyond, we bring the same rigour and accountability to every
                project we take on.
              </p>
              <p>
                We operate from offices in Pune and Coimbatore, with a geotechnical laboratory
                in the MIDC Supa Parmer Industrial Area.
              </p>
            </div>
            <Link
              href="/contact"
              className="mt-8 inline-flex text-[10px] font-body font-light uppercase tracking-[0.22em] border border-charcoal/25 text-charcoal px-8 py-4 hover:bg-terracotta hover:border-terracotta hover:text-white transition-all duration-300"
            >
              Work With Us
            </Link>
          </ScrollReveal>
        </div>
      </div>

      {/* Stats */}
      <div className="py-20 bg-charcoal">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-8">
          {statistics.map(stat => (
            <ScrollReveal key={stat.label}>
              <div className="font-display text-5xl font-light text-sand-light">
                {stat.value}
                {stat.suffix && <span className="text-terracotta">{stat.suffix}</span>}
              </div>
              <p className="mt-2 text-stone text-[10px] uppercase tracking-[0.18em]">{stat.label}</p>
            </ScrollReveal>
          ))}
        </div>
      </div>

      {/* Clients Marquee — noir scrolling strip */}
      <ClientsMarquee clients={clients} />

      {/* Values */}
      <div className="py-24 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">What Guides Us</p>
            <h2 className="font-display font-light text-display-md text-charcoal mb-14">Our Values</h2>
          </ScrollReveal>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-10">
            {[
              { n: '01', title: 'Design with Rigour', body: 'We bring analytical precision and creative ambition to every project, regardless of scale or typology.' },
              { n: '02', title: 'Accountability to Clients', body: 'On-time, within-budget delivery is not an aspiration — it is our professional standard, backed by ISO-certified processes.' },
              { n: '03', title: 'Build for Context', body: 'Every project we undertake responds honestly to its site, its climate, and the community it will serve.' },
            ].map(v => (
              <ScrollReveal key={v.n}>
                <p className="text-terracotta font-display text-4xl font-light mb-5">{v.n}</p>
                <h3 className="font-display text-xl font-medium text-charcoal mb-3">{v.title}</h3>
                <p className="text-charcoal-muted text-sm leading-relaxed">{v.body}</p>
              </ScrollReveal>
            ))}
          </div>
        </div>
      </div>

      {/* Milestones */}
      <div className="py-20 bg-sand">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">Our Journey</p>
            <h2 className="font-display font-light text-display-md text-charcoal mb-14">Milestones</h2>
          </ScrollReveal>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            {[
              { year: '1999', event: 'Suncon Engineers Pvt. Ltd. founded in Pune.' },
              { year: '2004', event: 'Pune office established at Kothrud.' },
              { year: '2007', event: 'Geotech lab opened; Navi Mumbai office established.' },
              { year: '2010', event: 'First architecture project completed — Cadbury India facility.' },
              { year: '2015', event: 'First PMC project for Castrol India.' },
              { year: '2021', event: 'Crossed 220+ completed projects.' },
              { year: '2022', event: 'First drone-assisted LiDAR survey commissioned.' },
              { year: '2025', event: '250+ projects completed across India.' },
            ].map(m => (
              <ScrollReveal key={m.year}>
                <p className="font-display text-3xl font-light text-terracotta mb-3">{m.year}</p>
                <p className="text-charcoal-muted text-sm leading-relaxed">{m.event}</p>
              </ScrollReveal>
            ))}
          </div>
        </div>
      </div>

      {/* Team */}
      <div id="team" className="py-24 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">The People</p>
            <h2 className="font-display font-light text-display-md text-charcoal mb-14">Our Team</h2>
          </ScrollReveal>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {people.map((person, i) => (
              <ScrollReveal key={person.id} delay={i * 0.07}>
                <div className="group">
                  <div className="relative aspect-[3/4] overflow-hidden mb-5">
                    <Image
                      src={person.image}
                      alt={person.name}
                      fill
                      className="object-cover transition-transform duration-700 group-hover:scale-105"
                      sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                    />
                  </div>
                  <h3 className="font-display text-xl font-medium text-charcoal">{person.name}</h3>
                  <p className="text-terracotta text-[10px] uppercase tracking-[0.15em] mt-1">{person.role}</p>
                  <p className="mt-3 text-charcoal-muted text-sm leading-relaxed line-clamp-3">{person.bio}</p>
                </div>
              </ScrollReveal>
            ))}
          </div>
        </div>
      </div>
    </>
  )
}
