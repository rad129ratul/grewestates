/**
 * File: grewestates/assets/js/main.js
 * Purpose: Global theme interactions shared across all pages.
 *
 * Features:
 *   - Adds `.site-navbar--scrolled` class when user scrolls past 60px.
 *     This triggers the dark nav background defined in header.css.
 *   - Marks the current page nav link as `.active` based on URL match.
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbarScrollState();
    initActiveNavLink();
});

/**
 * Toggles `.site-navbar--scrolled` on the navbar when the page is
 * scrolled past the threshold. Avoids layout thrash by using
 * requestAnimationFrame-gated scroll handler.
 */
function initNavbarScrollState() {
    const navbar = document.querySelector('.site-navbar');
    const threshold = 60;

    if (!navbar) return;

    let ticking = false;

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(() => {
                navbar.classList.toggle('site-navbar--scrolled', window.scrollY > threshold);
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });
}

/**
 * Marks the nav link whose href matches the current page URL as active.
 * Supports both exact matches and pathname prefix matches for section pages.
 */
function initActiveNavLink() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.site-navbar .nav-link');

    navLinks.forEach(link => {
        const linkPath = new URL(link.href, window.location.origin).pathname;

        if (linkPath === currentPath) {
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        }
    });
}