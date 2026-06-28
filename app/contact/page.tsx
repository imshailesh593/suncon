import type { Metadata } from 'next'
import ScrollReveal from '@/components/shared/ScrollReveal'
import ContactForm from '@/components/contact/ContactForm'

export const metadata: Metadata = {
  title: 'Contact',
  description:
    'Get in touch with Suncon Engineers Pvt. Ltd. for architecture, landscape design, interior design, BIM, PMC, and infrastructure consultancy.',
  openGraph: {
    title: 'Contact | Suncon Engineers',
    description: 'Start a conversation about your next project with the Suncon team.',
  },
  alternates: { canonical: '/contact' },
}

const offices = [
  {
    label: 'Pune Office',
    lines: [
      'P1/9, Sai Palace,',
      'Near Lohia-Jain IT Park, Bhusari Colony,',
      'Paud Road, Kothrud,',
      'Pune – 411038, Maharashtra',
    ],
  },
  {
    label: 'Coimbatore Office',
    lines: [
      'D.No.26, 3rd Street, 2nd Cross,',
      'Alamu Nagar, Sathy Road,',
      'Coimbatore, Tamil Nadu – 641012',
    ],
  },
  {
    label: 'Geotechnical Lab',
    lines: [
      'Plot No. D-104, MIDC,',
      'Supa Parmer Industrial Area,',
      'Dist: Ahmednagar, Maharashtra',
    ],
  },
]

const contacts = [
  { label: 'Business Development', value: '+91 93716 54387', href: 'tel:+919371654387' },
  { label: 'HR & Admin',           value: '+91 74200 02915', href: 'tel:+917420002915' },
  { label: 'Director (Rajendra Magar)', value: '+91 95525 46189', href: 'tel:+919552546189' },
  { label: 'Office Landline',      value: '+91 20 2528 5482', href: 'tel:+912025285482' },
]

const emails = [
  { label: 'Business',   value: 'bd@sunconengineers.com',             href: 'mailto:bd@sunconengineers.com' },
  { label: 'Director',   value: 'rajendra.magar@sunconengineers.com', href: 'mailto:rajendra.magar@sunconengineers.com' },
  { label: 'HR',         value: 'hr@sunconengineers.com',             href: 'mailto:hr@sunconengineers.com' },
]

export default function ContactPage() {
  return (
    <>
      <div className="pt-36 pb-16 bg-sand-light">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <ScrollReveal>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">Get in Touch</p>
            <h1 className="font-display font-light text-display-lg text-charcoal max-w-2xl">
              Let&apos;s start
              <br />
              <em className="text-terracotta">a conversation.</em>
            </h1>
          </ScrollReveal>
        </div>
      </div>

      <div className="bg-sand-light pb-32">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12">
          <div className="grid grid-cols-1 lg:grid-cols-5 gap-16">

            {/* Contact info */}
            <ScrollReveal className="lg:col-span-2">
              <div className="space-y-10">

                {/* Offices */}
                {offices.map(office => (
                  <div key={office.label}>
                    <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-3">{office.label}</p>
                    {office.lines.map((line, i) => (
                      <p key={i} className="text-charcoal text-sm leading-relaxed">{line}</p>
                    ))}
                  </div>
                ))}

                {/* Phone */}
                <div>
                  <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-3">Phone</p>
                  {contacts.map(c => (
                    <div key={c.label} className="mb-2">
                      <p className="text-stone/60 text-[10px] uppercase tracking-[0.12em]">{c.label}</p>
                      <a href={c.href} className="text-charcoal text-sm hover:text-terracotta transition-colors duration-200">
                        {c.value}
                      </a>
                    </div>
                  ))}
                </div>

                {/* Email */}
                <div>
                  <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-3">Email</p>
                  {emails.map(e => (
                    <div key={e.label} className="mb-2">
                      <p className="text-stone/60 text-[10px] uppercase tracking-[0.12em]">{e.label}</p>
                      <a href={e.href} className="text-charcoal text-sm hover:text-terracotta transition-colors duration-200 break-all">
                        {e.value}
                      </a>
                    </div>
                  ))}
                </div>

                {/* Social */}
                <div>
                  <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-4">Follow</p>
                  <div className="flex flex-wrap gap-5">
                    {[
                      { name: 'Facebook',  href: 'https://www.facebook.com/sunconengineers' },
                      { name: 'LinkedIn',  href: 'https://www.linkedin.com/company/sunconengineers' },
                      { name: 'Instagram', href: 'https://www.instagram.com/sunconengineers' },
                      { name: 'YouTube',   href: 'https://www.youtube.com/@SunconEngineers' },
                    ].map(s => (
                      <a
                        key={s.name}
                        href={s.href}
                        target="_blank"
                        rel="noopener noreferrer"
                        className="text-[10px] uppercase tracking-widest text-charcoal hover:text-terracotta transition-colors duration-200"
                      >
                        {s.name}
                      </a>
                    ))}
                  </div>
                </div>

                {/* ISO badge */}
                <div className="border border-charcoal/10 p-5">
                  <p className="text-stone text-[9px] uppercase tracking-[0.2em] mb-1">Certified</p>
                  <p className="font-display text-charcoal text-xl font-light">ISO Certified</p>
                  <p className="text-stone/60 text-[10px] mt-1">Quality Management Systems</p>
                </div>
              </div>
            </ScrollReveal>

            {/* Form */}
            <ScrollReveal delay={0.15} className="lg:col-span-3">
              <ContactForm />
            </ScrollReveal>

          </div>
        </div>
      </div>
    </>
  )
}
