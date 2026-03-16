document.addEventListener('DOMContentLoaded', async function () {
  try {
    const { default: Collapse } = await import('bootstrap/js/dist/collapse')
    document.querySelectorAll('[data-bs-toggle="collapse"]')
      .forEach(toggle => {
        const options = { toggle: false }
        const target = document.querySelector(toggle.dataset.bsTarget)
        if (typeof target.dataset['bsParent'] !== 'undefined') {
          options.parent = target.dataset.bsParent
        }
        new Collapse(target, options)
      })
  } catch (error) {
    console.error(error)
  }

  try {
    const { default: Dropdown } = await import('bootstrap/js/dist/dropdown')
    document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(dropdown => new Dropdown(dropdown))
  } catch (error) {
    console.error(error)
  }

  try {
    const { default: Offcanvas } = await import('bootstrap/js/dist/offcanvas')
    document.querySelectorAll('.offcanvas').forEach(offcanvas => new Offcanvas(offcanvas))
  } catch (error) {
    console.error(error)
  }

  try {
    const { default: Modal } = await import('bootstrap/js/dist/modal')
    document.querySelectorAll('.modal').forEach(modal => new Modal(modal))
  } catch (error) {
    console.error(error)
  }

  const code = !!document.querySelector('[class^="lang-"], [class^="language-"]')
  if (code) {
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
  }
})