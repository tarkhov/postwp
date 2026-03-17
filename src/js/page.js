import './highlight'

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
})