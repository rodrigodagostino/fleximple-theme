/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

;(function () {
  const header = document.querySelector('#header')
  const mainNav = document.querySelector('#main-nav')
  const collapsibleNav = document.querySelector('#collapsible-nav')

  if (!mainNav) {
    console.warn('There is no navigation container')
  }

  const menuToggle = mainNav.querySelector('.menu-toggle')

  // Hide menu toggle button if menu is empty and return early.
  if (!collapsibleNav && menuToggle) {
    menuToggle.style.display = 'none'
  }

  const search = mainNav.querySelector('.search-container')
  const searchToggle = mainNav.querySelector('.search-toggle')

  // Hide menu toggle button if search is empty and return early.
  if (!search && searchToggle) {
    searchToggle.style.display = 'none'
  }

  if (search) {
    search.setAttribute('aria-hidden', 'true')
  }

  const mainNavLinks = mainNav.querySelectorAll('.main-menu a')

  const openCollapsibleNav = () => {
    menuToggle.classList.add('is-active')
    menuToggle.setAttribute('aria-pressed', 'true')
    menuToggle.setAttribute('aria-expanded', 'true')
    collapsibleNav.classList.remove('is-hidden')
    setTimeout(() => collapsibleNav.classList.add('is-expanded'), 10)
    collapsibleNav.setAttribute('aria-hidden', 'false')
    collapsibleNav.setAttribute('aria-expanded', 'true')
  }

  const closeCollapsibleNav = () => {
    menuToggle.classList.remove('is-active')
    menuToggle.setAttribute('aria-pressed', 'false')
    menuToggle.setAttribute('aria-expanded', 'false')
    collapsibleNav.classList.remove('is-expanded')
    setTimeout(() => collapsibleNav.classList.add('is-hidden'), 400)
    collapsibleNav.setAttribute('aria-hidden', 'true')
    collapsibleNav.setAttribute('aria-expanded', 'false')
  }

  const createBackdrop = (callback) => {
    document.body.classList.add('is-scroll-locked')
    const backdrop = document.createElement('div')
    backdrop.classList.add('backdrop', 'animate-fade-in')
    document.body.appendChild(backdrop)
    setTimeout(() => backdrop.classList.add('is-faded-in'), 10) // Allows for the fading-in animation to run properly.
    backdrop.addEventListener('click', () => {
      removeBackdrop()
      callback()
    })
  }

  const removeBackdrop = () => {
    document.body.classList.remove('is-scroll-locked')
    const backdrop = document.body.querySelector('.backdrop')
    backdrop.classList.remove('is-faded-in')
    setTimeout(() => backdrop.remove(), 240)
  }

  if (menuToggle) {
    menuToggle.onclick = function () {
      if (!collapsibleNav.classList.contains('is-expanded')) {
        createBackdrop(closeCollapsibleNav)
        openCollapsibleNav()
      } else {
        removeBackdrop()
        closeCollapsibleNav()
      }
    }
  }

  const openSearch = () => {
    searchToggle.classList.add('is-active')
    searchToggle.setAttribute('aria-pressed', 'true')
    searchToggle.setAttribute('aria-expanded', 'true')
    search.classList.add('is-expanded')
    search.setAttribute('aria-hidden', 'false')
  }

  const closeSearch = () => {
    searchToggle.classList.remove('is-active')
    searchToggle.setAttribute('aria-pressed', 'false')
    searchToggle.setAttribute('aria-expanded', 'false')
    search.classList.remove('is-expanded')
    search.setAttribute('aria-hidden', 'true')
  }

  if (search) {
    searchToggle.onclick = function () {
      if (!search.classList.contains('is-expanded')) {
        openSearch()
        createBackdrop(closeSearch)
      } else {
        closeSearch()
        removeBackdrop()
      }
    }
  }

  const itemsWithChildren = mainNav.querySelectorAll('.menu-item-has-children')

  for (let i = 0; i < itemsWithChildren.length; i++) {
    const submenuToggle = itemsWithChildren[i].querySelector('.submenu-toggle')
    submenuToggle.addEventListener('click', function () {
      if (!itemsWithChildren[i].classList.contains('is-expanded')) {
        itemsWithChildren[i].classList.add('is-expanded')
        submenuToggle.setAttribute('aria-pressed', 'true')
        submenuToggle.setAttribute('aria-expanded', 'true')
      } else {
        itemsWithChildren[i].classList.remove('is-expanded')
        submenuToggle.setAttribute('aria-pressed', 'false')
        submenuToggle.setAttribute('aria-expanded', 'false')
      }
    })
  }

  /**
   * Add and remove a class to the header on scroll and
   * assign an “active” class to nav links while scolling.
   */

  // Calculate header’s position
  let bodyRect = document.body.getBoundingClientRect()
  let headerRect = header.getBoundingClientRect()
  let headerPos = headerRect.top - bodyRect.top

  // If window is resized, recalculate header’s position
  window.addEventListener('resize', function () {
    // Remove the “is-scrolled” class to avoid interference
    header.classList.remove('is-scrolled')

    const currentPos = window.scrollY
    bodyRect = document.body.getBoundingClientRect()
    headerRect = header.getBoundingClientRect()
    headerPos = headerRect.top - bodyRect.top

    if (currentPos > headerPos + 1) {
      header.classList.add('is-scrolled')
    }
  })

  const sections = document.querySelectorAll('.site-main section')

  window.addEventListener('scroll', function () {
    // Add and remove header class
    const currentPos = window.scrollY

    if (currentPos > headerPos + 1) {
      header.classList.add('is-scrolled')
    } else {
      header.classList.remove('is-scrolled')
    }

    // Add and remove nav links class
    for (let i = 0; i < mainNavLinks.length; i++) {
      mainNavLinks[i].parentElement.classList.remove('current-menu-item')
    }

    for (let i = 0; i < sections.length; i++) {
      const sectionTop = sections[i].offsetTop
      const sectionBottom = sections[i].offsetTop + sections[i].offsetHeight

      if (currentPos >= sectionTop - 10 && currentPos <= sectionBottom - 10) {
        const sectionID = sections[i].id
        const currentMenuItem = document.querySelector(
          `a[href="#${sectionID}"]`
        )

        if (currentMenuItem) {
          currentMenuItem.parentElement.classList.add('current-menu-item')
        }
      }
    }
  })

  /**
   * Smooth scrolling when clicking on any anchor tag present in the document.
   */
  function smoothScrollFromAnchor() {
    // eslint-disable-next-line consistent-return
    const anchors = document.querySelectorAll('a[href*="#"]:not([href="#"])')
    anchors.forEach((anchor) => {
      anchor.addEventListener('click', function (event) {
        event.preventDefault()
        const targetId = anchor.getAttribute('href').slice(1)
        const targetElement = document.getElementById(targetId)
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
          })
          // Update the URL without refreshing the browser.
          history.pushState(
            { additionalInformation: 'Updated the URL with JS' },
            document.title,
            `${location.origin}/#${targetId}`
          )
        }
      })
    })
  }
  smoothScrollFromAnchor()

  /**
   * Prevent search from executing if the input field is empty.
   */
  const searchForms = document.querySelectorAll('.search-form')
  for (const searchForm of searchForms) {
    const searchField = searchForm.querySelector('.search-field')
    const tooltip = searchForm.querySelector('.tooltip')
    // Prevent form execution if the search input field is empty and display a tooltip warning the user.
    searchForm.addEventListener('submit', (e) => {
      if (searchField.value.trim() === '') {
        e.preventDefault()
        // Display error message.
        tooltip.classList.add('is-faded-in')
      }
    })
    // Hide tooltip after entering text in the search input field.
    searchField.addEventListener('keydown', () => {
      tooltip.classList.remove('is-faded-in')
    })
  }
})()
