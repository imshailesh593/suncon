import Link from 'next/link'
import { clsx } from 'clsx'

type Variant = 'outline' | 'solid' | 'ghost'

interface ButtonProps {
  href?: string
  onClick?: () => void
  children: React.ReactNode
  variant?: Variant
  className?: string
  type?: 'button' | 'submit'
}

const base =
  'inline-flex items-center gap-3 text-xs uppercase tracking-[0.18em] transition-all duration-300'

const variants: Record<Variant, string> = {
  outline: 'border border-charcoal/40 text-charcoal px-7 py-3.5 hover:bg-terracotta hover:border-terracotta hover:text-white',
  solid: 'bg-terracotta text-white px-7 py-3.5 hover:bg-terracotta-dark',
  ghost: 'text-charcoal border-b border-charcoal/40 pb-1 hover:border-terracotta hover:text-terracotta',
}

export default function Button({
  href,
  onClick,
  children,
  variant = 'outline',
  className,
  type = 'button',
}: ButtonProps) {
  const classes = clsx(base, variants[variant], className)

  if (href) {
    return (
      <Link href={href} className={classes}>
        {children}
      </Link>
    )
  }

  return (
    <button type={type} onClick={onClick} className={classes}>
      {children}
    </button>
  )
}
