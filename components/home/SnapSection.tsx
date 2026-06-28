'use client'

import { useEffect } from 'react'

export function SnapContainer({ children }: { children: React.ReactNode }) {
  useEffect(() => {
    const html = document.documentElement
    html.style.scrollSnapType = 'y mandatory'
    return () => { html.style.scrollSnapType = '' }
  }, [])

  return <>{children}</>
}

export function SnapSection({
  children,
  className = '',
  align = 'start',
}: {
  children: React.ReactNode
  className?: string
  align?: 'start' | 'center' | 'end'
}) {
  return (
    <div
      style={{ scrollSnapAlign: align, scrollSnapStop: 'always' }}
      className={`min-h-screen flex flex-col justify-center ${className}`}
    >
      {children}
    </div>
  )
}
