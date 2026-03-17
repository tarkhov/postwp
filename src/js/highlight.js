document.addEventListener('DOMContentLoaded', async function () {
  const code = !!document.querySelector('[class^="lang-"], [class^="language-"]')
  if (code === false) return false
  const [
    { default: hljs },
    { default: bash },
    { default: css },
    { default: javascript },
    { default: php },
    { default: scss },
    { default: sql },
    { default: typescript },
    { default: xml }
  ] = await Promise.all([
    import('highlight.js/lib/core'),
    import('highlight.js/lib/languages/bash'),
    import('highlight.js/lib/languages/css'),
    import('highlight.js/lib/languages/javascript'),
    import('highlight.js/lib/languages/php'),
    import('highlight.js/lib/languages/scss'),
    import('highlight.js/lib/languages/sql'),
    import('highlight.js/lib/languages/typescript'),
    import('highlight.js/lib/languages/xml')
  ])
  hljs.registerLanguage('bash', bash)
  hljs.registerLanguage('css', css)
  hljs.registerLanguage('javascript', javascript)
  hljs.registerLanguage('php', php)
  hljs.registerLanguage('scss', scss)
  hljs.registerLanguage('sql', sql)
  hljs.registerLanguage('typescript', typescript)
  hljs.registerLanguage('xml', xml)
  hljs.highlightAll()
})