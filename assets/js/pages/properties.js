/**
 * File: grewestates/assets/js/pages/properties.js
 * Purpose: Properties listing page interactions.
 *
 * Features:
 *   - Filter sidebar accordion: toggles panel visibility and icon rotation.
 *   - Pill button selection: single-select per group (Rooms / Washrooms).
 *   - Price range slider: formats the live label as a human-readable string.
 *   - View toggle: switches the grid between 3-column and list layouts.
 *   - Clear All: resets every filter control to its default state.
 */

document.addEventListener('DOMContentLoaded', () => {
    initFilterAccordions();
    initPillButtons();
    initPriceSlider();
    initViewToggle();
    initClearAll();
});

/**
 * Toggles sidebar filter groups open/closed.
 * Uses aria-expanded on the trigger button and a CSS class on the panel.
 */
function initFilterAccordions() {
    const toggles = document.querySelectorAll('.props-filter-group__toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            const panelId = toggle.getAttribute('aria-controls');
            const panel = document.getElementById(panelId);
            const icon = toggle.querySelector('i');

            if (!panel) return;

            const willExpand = !isExpanded;
            toggle.setAttribute('aria-expanded', String(willExpand));
            panel.classList.toggle('props-filter-group__body--collapsed', !willExpand);

            // Swap chevron direction to reflect open/closed state
            if (icon) {
                icon.className = willExpand ? 'bi bi-chevron-up' : 'bi bi-chevron-down';
            }
        });
    });
}

/**
 * Single-select pill buttons within each filter group.
 * Toggling a pill that is already active deselects it.
 */
function initPillButtons() {
    const pillGroups = document.querySelectorAll('.props-filter-group__pills');

    pillGroups.forEach(group => {
        const pills = group.querySelectorAll('.props-filter-group__pill');

        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                const isSelected = pill.getAttribute('aria-pressed') === 'true';

                // Deselect all pills in this group first
                pills.forEach(p => p.setAttribute('aria-pressed', 'false'));

                // Toggle the clicked pill
                pill.setAttribute('aria-pressed', String(!isSelected));
            });
        });
    });
}

/**
 * Live-updates the price label next to the range slider as the user drags.
 * Formats numbers as $10K, $1.5M, etc. for readability.
 */
function initPriceSlider() {
    const slider = document.getElementById('filter-price-range');
    const label = document.getElementById('js-price-label');

    if (!slider || !label) return;

    function formatPrice(value) {
        const num = parseInt(value, 10);
        if (num >= 1_000_000) {
            return `$${(num / 1_000_000).toFixed(1)}M`;
        }
        return `$${(num / 1_000).toFixed(0)}K`;
    }

    slider.addEventListener('input', () => {
        label.textContent = formatPrice(slider.value);
    });
}

/**
 * Switches the results grid between grid and list view.
 * Updates aria-pressed state on both toggle buttons.
 */
function initViewToggle() {
    const gridBtn = document.getElementById('js-view-grid');
    const listBtn = document.getElementById('js-view-list');
    const grid = document.getElementById('js-props-grid');

    if (!gridBtn || !listBtn || !grid) return;

    gridBtn.addEventListener('click', () => {
        grid.classList.remove('props-results__grid--list');
        gridBtn.setAttribute('aria-pressed', 'true');
        gridBtn.classList.add('props-results__view-btn--active');
        listBtn.setAttribute('aria-pressed', 'false');
        listBtn.classList.remove('props-results__view-btn--active');
    });

    listBtn.addEventListener('click', () => {
        grid.classList.add('props-results__grid--list');
        listBtn.setAttribute('aria-pressed', 'true');
        listBtn.classList.add('props-results__view-btn--active');
        gridBtn.setAttribute('aria-pressed', 'false');
        gridBtn.classList.remove('props-results__view-btn--active');
    });
}

/**
 * Resets all filter controls to their default empty/unselected state.
 */
function initClearAll() {
    const clearBtn = document.getElementById('js-filter-clear');

    if (!clearBtn) return;

    clearBtn.addEventListener('click', () => {
        // Text inputs
        document.querySelectorAll('.props-filter-group__text-input').forEach(input => {
            input.value = '';
        });

        // Checkboxes
        document.querySelectorAll('.props-filter-group__checkbox').forEach(cb => {
            cb.checked = false;
        });

        // Price range slider
        const slider = document.getElementById('filter-price-range');
        const label = document.getElementById('js-price-label');
        if (slider) slider.value = slider.defaultValue;
        if (label) label.textContent = '$5.0M';

        // Pill buttons
        document.querySelectorAll('.props-filter-group__pill').forEach(pill => {
            pill.setAttribute('aria-pressed', 'false');
        });

        // Quick search bar inputs
        const qsInputs = document.querySelectorAll('.props-search-bar__input');
        qsInputs.forEach(input => { input.value = ''; });

        const qsSelect = document.getElementById('qs-category');
        if (qsSelect) qsSelect.selectedIndex = 0;
    });
}