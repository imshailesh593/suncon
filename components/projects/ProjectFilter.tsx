'use client'

import { clsx } from 'clsx'
import { Discipline } from '@/lib/types'

type Filter = Discipline | 'all'

const filters: { value: Filter; label: string }[] = [
  { value: 'all', label: 'All' },
  { value: 'architecture', label: 'Architecture' },
  { value: 'interior', label: 'Interior Design' },
  { value: 'urban', label: 'Urban Design' },
]

interface ProjectFilterProps {
  active: Filter
  onChange: (f: Filter) => void
  counts: Record<Filter, number>
}

export default function ProjectFilter({ active, onChange, counts }: ProjectFilterProps) {
  return (
    <div className="flex flex-wrap gap-3">
      {filters.map(({ value, label }) => (
        <button
          key={value}
          onClick={() => onChange(value)}
          className={clsx(
            'text-xs uppercase tracking-[0.18em] px-5 py-2.5 border transition-all duration-300',
            active === value
              ? 'bg-charcoal border-charcoal text-sand-light'
              : 'border-charcoal/25 text-charcoal hover:border-charcoal/60',
          )}
        >
          {label}
          <span className={clsx('ml-2', active === value ? 'text-sand-dark/60' : 'text-stone')}>
            {counts[value]}
          </span>
        </button>
      ))}
    </div>
  )
}
