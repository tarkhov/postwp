import './page'

document.addEventListener('DOMContentLoaded', function () {
  const navbarTop = document.getElementById('navbar-top')
  if (window.scrollY > 0 && navbarTop.dataset.bsTheme !== 'light') {
    navbarTop.dataset.bsTheme = 'light'
  }

  document.addEventListener('scroll', function () {
    if (window.scrollY > 0) {
      if (navbarTop.dataset.bsTheme !== 'light') {
        requestAnimationFrame(() => {
          navbarTop.dataset.bsTheme = 'light'
        })
      }
    } else {
      requestAnimationFrame(() => {
        navbarTop.dataset.bsTheme = 'dark'
      })
    }
  })
})