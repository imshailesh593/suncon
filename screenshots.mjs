import { chromium } from 'playwright'
import { mkdirSync } from 'fs'

const OUT = '/tmp/suncon-shots2'
mkdirSync(OUT, { recursive: true })

const browser = await chromium.launch({ args: ['--no-sandbox'] })
const ctx = await browser.newContext({ viewport: { width: 1440, height: 860 } })
const page = await ctx.newPage()

async function shot(name, url, scrollY = 0) {
  await page.goto(url, { waitUntil: 'networkidle', timeout: 25000 })
  await page.waitForTimeout(1800)
  if (scrollY) { await page.evaluate(y => window.scrollTo(0, y), scrollY); await page.waitForTimeout(1000) }
  await page.screenshot({ path: `${OUT}/${name}.png` })
  console.log('✓', name)
}

await shot('01-home-hero',      'http://localhost:3000')
await shot('02-home-projects',  'http://localhost:3000', 1000)
await shot('03-home-stats',     'http://localhost:3000', 2600)
await shot('04-home-work',      'http://localhost:3000', 5500)
await shot('05-projects',       'http://localhost:3000/projects')
await shot('06-project-detail', 'http://localhost:3000/projects/the-meridian-tower')
await shot('07-about',          'http://localhost:3000/about')
await shot('08-services',       'http://localhost:3000/services')
await shot('09-blog',           'http://localhost:3000/blog')
await shot('10-contact',        'http://localhost:3000/contact')

await browser.close()
console.log('Done ->', OUT)
