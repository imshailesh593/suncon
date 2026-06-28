import type { Config } from 'tailwindcss'

const config: Config = {
  content: [
    './pages/**/*.{js,ts,jsx,tsx,mdx}',
    './components/**/*.{js,ts,jsx,tsx,mdx}',
    './app/**/*.{js,ts,jsx,tsx,mdx}',
  ],
  theme: {
    extend: {
      colors: {
        sand: {
          DEFAULT: '#F2EDE4',
          light: '#FAF7F3',
          dark: '#E8E0D4',
        },
        terracotta: {
          DEFAULT: '#B5451B',
          light: '#CC5A2A',
          dark: '#8B3414',
        },
        forest: {
          DEFAULT: '#2D5016',
          light: '#3D6B1F',
        },
        charcoal: {
          DEFAULT: '#1C1C1C',
          light: '#2A2A2A',
          muted: '#5C5652',
        },
        stone: '#8B8275',
      },
      fontFamily: {
        display: ['var(--font-display)', 'Georgia', 'serif'],
        body: ['var(--font-body)', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        'display-xl': ['clamp(3.8rem, 10vw, 9rem)', { lineHeight: '0.88', letterSpacing: '-0.03em' }],
        'display-lg': ['clamp(2.8rem, 6.5vw, 6rem)', { lineHeight: '0.92', letterSpacing: '-0.025em' }],
        'display-md': ['clamp(2.2rem, 4.5vw, 4rem)', { lineHeight: '1.0', letterSpacing: '-0.02em' }],
      },
      transitionTimingFunction: {
        'expo-out': 'cubic-bezier(0.16, 1, 0.3, 1)',
      },
    },
  },
  plugins: [],
}

export default config
