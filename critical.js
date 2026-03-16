const http = require('node:http')
const https = require('node:https')
const { readFileSync } = require('node:fs')
// Load the base .env file first, then load the .env.dev or .env.local file. 
require('dotenv').config()
// The second file loaded will overwrite any duplicate keys from the first.
const env = process.env.NODE_ENV || 'development'
require('dotenv').config({ path: `.env.${env}`, override: true })

const data = readFileSync('pages.json', 'utf8')
const pages = (data) ? JSON.parse(data) : null

function parseUrl(url, page) {
  let html = ''
  url.on('data', chunk => {
    html += chunk.toString().trim()
  }).on('end', async () => {
    const target = { css: `critical/${page.name}.css` }
    let css = page.css
    const { generate } = await import('critical')
    await generate({
      base: process.env.CSS_BASE,
      html,
      target,
      width: process.env.SCREEN_MAX_WIDTH,
      height: process.env.SCREEN_MAX_HEIGHT,
      rebase: (asset) => `${process.env.THEME_URL}${asset.absolutePath}`,
      css
    })
    console.log(`Done - ${page.name}.`)
  })
}

pages.forEach(page => {
  try {
    const url = new URL(`${process.env.SITE_URL}${page.url}`)
    if (url.protocol === 'https:') {
      https.get(url, url => {
        parseUrl(url, page)
      }).on('error', console.error)
    } else if (url.protocol === 'http:') {
      http.get(url, url => {
        parseUrl(url, page)
      }).on('error', console.error)
    } else {
      console.error('Url protocol not supported.')
    }
  } catch (e) {
    console.error('Failed to parse url.', e.message)
  }
})