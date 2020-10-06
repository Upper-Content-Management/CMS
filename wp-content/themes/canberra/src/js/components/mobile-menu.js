import transitionElementVisibility from '../helpers/transition-element-visibility'
 
export default () => {

  const hamburgerButton = document.getElementById('toggle-nav-mobile-offcanvas')
  const mobileMenu = document.getElementById('nav-mobile-offcanvas')
  const mobileMenuBgOverlay = document.getElementById('nav-mobile-bg-overlay')
  
  const toggleRevealMobileMenu = e => {
    e.preventDefault()
    hamburgerButton.classList.toggle('is-active')
    mobileMenu.classList.toggle('open')
    document.body.classList.toggle('disable-scrolling')
    transitionElementVisibility(mobileMenuBgOverlay)
  }
  
  hamburgerButton.addEventListener('click', toggleRevealMobileMenu)
  mobileMenuBgOverlay.addEventListener('click', toggleRevealMobileMenu)
}