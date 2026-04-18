/**
 * File: grewestates/assets/js/pages/home.js
 * Purpose: Home page interactions.
 *
 * Features:
 *   - Hero search: builds query string from the four search fields
 *     and navigates to /properties/ on form submission.
 *   - Neighborhood and property-type card hover: adds a subtle
 *     parallax lift to the card image for depth without a library.
 */

document.addEventListener('DOMContentLoaded', () => {
    initHeroSearch();
});

/**
 * Wires the hero search bar to the properties listing page.
 * Collects Location, Property Type, Price Range, and Area values,
 * appends them as URL query params, then navigates.
 */
function initHeroSearch() {
    const searchBtn = document.getElementById('js-hero-search');

    if (!searchBtn) return;

    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();

        const location = document.getElementById('hero-location')?.value.trim() ?? '';
        const type = document.getElementById('hero-type')?.value ?? '';
        const price = document.getElementById('hero-price')?.value.trim() ?? '';
        const area = document.getElementById('hero-area')?.value.trim() ?? '';

        const params = new URLSearchParams();
        if (location) params.set('location', location);
        if (type) params.set('type', type);
        if (price) params.set('price', price);
        if (area) params.set('area', area);

        const query = params.toString();
        const base = searchBtn.href;

        // Navigate to properties page — with or without filters
        window.location.href = query ? `${base}?${query}` : base;
    });
}