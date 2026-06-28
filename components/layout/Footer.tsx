import Link from 'next/link'

const socials = [
  { name: 'Instagram', href: 'https://www.instagram.com/sunconengineers' },
  { name: 'LinkedIn',  href: 'https://www.linkedin.com/company/sunconengineers' },
  { name: 'Facebook',  href: 'https://www.facebook.com/sunconengineers' },
  { name: 'YouTube',   href: 'https://www.youtube.com/@SunconEngineers' },
]

const footerLinks = {
  Work: [
    { href: '/projects',                         label: 'All Projects' },
    { href: '/projects?discipline=architecture', label: 'Architecture' },
    { href: '/projects?discipline=interior',     label: 'Interior Design' },
    { href: '/projects?discipline=urban',        label: 'Infrastructure' },
  ],
  Practice: [
    { href: '/about',       label: 'About' },
    { href: '/about#team',  label: 'Team' },
    { href: '/services',    label: 'Services' },
    { href: '/blog',        label: 'Journal' },
  ],
  Connect: [
    { href: '/contact',                           label: 'Start a Project' },
    { href: 'mailto:bd@sunconengineers.com',      label: 'bd@sunconengineers.com' },
    { href: 'tel:+919371654387',                  label: '+91 93716 54387' },
  ],
}

export default function Footer() {
  const year = new Date().getFullYear()

  return (
    <footer className="bg-charcoal text-sand-light">

      {/* CTA band */}
      <div className="border-b border-sand-light/10">
        <div className="max-w-screen-xl mx-auto px-6 lg:px-12 py-20 flex flex-col md:flex-row items-start md:items-end justify-between gap-8">
          <div>
            <p className="text-stone text-xs uppercase tracking-[0.2em] mb-4">Ready to build?</p>
            <h2 className="font-display text-display-lg text-sand-light leading-none">
              Let&apos;s make
              <br />
              <em className="font-light text-terracotta">something great.</em>
            </h2>
          </div>
          <Link
            href="/contact"
            className="shrink-0 text-xs uppercase tracking-[0.18em] border border-sand-light/30 text-sand-light px-8 py-4 hover:bg-terracotta hover:border-terracotta transition-all duration-300"
          >
            Start a Project
          </Link>
        </div>
      </div>

      {/* Links grid */}
      <div className="max-w-screen-xl mx-auto px-6 lg:px-12 py-16">
        {/* [Brand wide] [Work] [Practice] [Connect wide] — explicit fr units, no col-start hacks */}
        <div className="grid grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr] gap-x-10 gap-y-12">

          {/* Brand */}
          <div className="col-span-2 lg:col-span-1">
            <Link href="/" className="font-display text-xl tracking-[0.25em] uppercase text-sand-light">
              Suncon
            </Link>
            <p className="mt-4 text-stone text-sm leading-relaxed max-w-xs">
              ISO-certified multidisciplinary consultancy delivering architecture,
              landscape &amp; infrastructure across India since 1999.
            </p>
            <div className="flex flex-wrap gap-x-5 gap-y-2 mt-6">
              {socials.map((s) => (
                <a key={s.name} href={s.href} target="_blank" rel="noopener noreferrer"
                  className="text-stone text-[10px] uppercase tracking-[0.12em] hover:text-sand-light transition-colors duration-200">
                  {s.name}
                </a>
              ))}
            </div>
          </div>

          {/* Work */}
          <div>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-5">Work</p>
            <ul className="flex flex-col gap-3">
              {footerLinks.Work.map((link) => (
                <li key={link.href}>
                  <Link href={link.href} className="text-sand-dark text-sm hover:text-sand-light transition-colors duration-200">
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Practice */}
          <div>
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-5">Practice</p>
            <ul className="flex flex-col gap-3">
              {footerLinks.Practice.map((link) => (
                <li key={link.href}>
                  <Link href={link.href} className="text-sand-dark text-sm hover:text-sand-light transition-colors duration-200">
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Connect */}
          <div className="col-span-2 lg:col-span-1">
            <p className="text-stone text-[10px] uppercase tracking-[0.2em] mb-5">Connect</p>
            <ul className="flex flex-col gap-3">
              {footerLinks.Connect.map((link) => (
                <li key={link.href}>
                  <Link href={link.href} className="text-sand-dark text-sm hover:text-sand-light transition-colors duration-200 break-all">
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

        </div>

        {/* Bottom bar */}
        <div className="mt-16 pt-8 border-t border-sand-light/10 flex flex-col sm:flex-row justify-between gap-4 text-stone text-xs">
          <p>© {year} Suncon Engineers Pvt. Ltd. All rights reserved.</p>
          <div className="flex gap-6">
            <Link href="/privacy" className="hover:text-sand-light transition-colors duration-200">Privacy Policy</Link>
            <Link href="/terms"   className="hover:text-sand-light transition-colors duration-200">Terms</Link>
          </div>
        </div>

      </div>
    </footer>
  )
}
