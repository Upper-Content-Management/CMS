import '../scss/style.scss'

document.addEventListener("DOMContentLoaded", function() {

  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      e.preventDefault()
      const modal = document.querySelector(e.currentTarget.getAttribute('href'))
      // Toggle modal

    })
  })
})