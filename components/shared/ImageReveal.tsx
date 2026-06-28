'use client'

import { useRef, useEffect } from 'react'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Image from 'next/image'
import { clsx } from 'clsx'

gsap.registerPlugin(ScrollTrigger)

interface ImageRevealProps {
  src: string
  alt: string
  sizes?: string
  priority?: boolean
  className?: string
  imgClassName?: string
  aspectClassName?: string
  delay?: number
}

export default function ImageReveal({
  src,
  alt,
  sizes,
  priority,
  className,
  imgClassName,
  aspectClassName = 'aspect-[4/3]',
  delay = 0,
}: ImageRevealProps) {
  const wrapRef = useRef<HTMLDivElement>(null)
  const imgRef  = useRef<HTMLDivElement>(null)

  useEffect(() => {
    const ctx = gsap.context(() => {
      /* Clip-path wipe — reveals upward */
      gsap.fromTo(
        wrapRef.current,
        { clipPath: 'inset(100% 0 0 0)' },
        {
          clipPath: 'inset(0% 0 0 0)',
          duration: 1.3,
          delay,
          ease: 'power4.inOut',
          scrollTrigger: {
            trigger: wrapRef.current,
            start: 'top 82%',
            once: true,
          },
        },
      )
      /* Slight counter-scale so image appears to "arrive" not just "uncrop" */
      gsap.fromTo(
        imgRef.current,
        { scale: 1.12 },
        {
          scale: 1,
          duration: 1.6,
          delay,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: wrapRef.current,
            start: 'top 82%',
            once: true,
          },
        },
      )
    })
    return () => ctx.revert()
  }, [delay])

  return (
    <div className={clsx('relative overflow-hidden', aspectClassName, className)}>
      <div ref={wrapRef} className="absolute inset-0" style={{ clipPath: 'inset(100% 0 0 0)' }}>
        <div ref={imgRef} className="absolute inset-0 scale-[1.12]">
          <Image
            src={src}
            alt={alt}
            fill
            className={imgClassName ?? 'object-cover'}
            sizes={sizes ?? '(max-width: 768px) 100vw, 50vw'}
            priority={priority}
          />
        </div>
      </div>
    </div>
  )
}
