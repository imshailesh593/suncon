'use client'

import { useEffect, useRef } from 'react'
import { gsap } from 'gsap'

export default function CustomCursor() {
  const dotRef    = useRef<HTMLDivElement>(null)
  const circleRef = useRef<HTMLDivElement>(null)
  const isActive  = useRef(false)

  useEffect(() => {
    /* Only on pointer-precise (non-touch) devices */
    if (!window.matchMedia('(pointer: fine)').matches) return

    document.documentElement.classList.add('has-custom-cursor')
    isActive.current = true

    const dot    = dotRef.current!
    const circle = circleRef.current!

    let mx = -100, my = -100

    const onMove = (e: MouseEvent) => {
      mx = e.clientX
      my = e.clientY
      gsap.to(dot, { x: mx, y: my, duration: 0.08, ease: 'none' })
      gsap.to(circle, { x: mx, y: my, duration: 0.55, ease: 'power2.out' })
    }

    const isInteractive = (el: Element | null): boolean => {
      if (!el) return false
      return !!el.closest('a, button, [data-cursor]')
    }

    const onEnter = (e: MouseEvent) => {
      if (!isInteractive(e.target as Element)) return
      gsap.to(circle, { scale: 2.2, opacity: 0.35, duration: 0.35, ease: 'power2.out' })
      gsap.to(dot,    { scale: 0.3, opacity: 0.4,  duration: 0.25 })
    }
    const onLeave = (e: MouseEvent) => {
      if (!isInteractive(e.target as Element)) return
      gsap.to(circle, { scale: 1, opacity: 1, duration: 0.4, ease: 'power2.out' })
      gsap.to(dot,    { scale: 1, opacity: 1, duration: 0.25 })
    }
    const onDown = () => gsap.to(circle, { scale: 0.8, duration: 0.15 })
    const onUp   = () => gsap.to(circle, { scale: 1,   duration: 0.25 })

    window.addEventListener('mousemove', onMove)
    window.addEventListener('mousedown', onDown)
    window.addEventListener('mouseup',   onUp)
    document.addEventListener('mouseover',  onEnter)
    document.addEventListener('mouseout',   onLeave)

    return () => {
      document.documentElement.classList.remove('has-custom-cursor')
      window.removeEventListener('mousemove', onMove)
      window.removeEventListener('mousedown', onDown)
      window.removeEventListener('mouseup',   onUp)
      document.removeEventListener('mouseover',  onEnter)
      document.removeEventListener('mouseout',   onLeave)
    }
  }, [])

  return (
    <>
      {/* Dot — snaps instantly */}
      <div
        ref={dotRef}
        className="fixed top-0 left-0 pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2"
        style={{ willChange: 'transform' }}
      >
        <div
          className="w-[7px] h-[7px] rounded-full bg-terracotta"
          style={{ boxShadow: '0 0 0 1.5px rgba(0,0,0,0.3)' }}
        />
      </div>

      {/* Lagging circle */}
      <div
        ref={circleRef}
        className="fixed top-0 left-0 pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2"
        style={{ willChange: 'transform' }}
      >
        <div
          className="w-9 h-9 rounded-full border border-white"
          style={{ boxShadow: '0 0 0 1px rgba(0,0,0,0.4)' }}
        />
      </div>
    </>
  )
}
