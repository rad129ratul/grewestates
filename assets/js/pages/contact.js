/**
 * File: grewestates/assets/js/pages/contact.js
 * Purpose: Contact Us page interactions.
 *
 * Features:
 *   - Client-side validation for the contact form: checks required fields,
 *     validates email format, and shows inline error messages.
 *   - Submit handler: shows a success message after validation passes.
 *     Actual form submission (AJAX / CF7 / WP mail) is wired server-side.
 */

document.addEventListener('DOMContentLoaded', () => {
    initContactForm();
});

/**
 * Wires up the contact form with field-level validation and submit feedback.
 * Validates on submit; clears individual field errors on input to avoid nagging.
 */
function initContactForm() {
    const submitBtn = document.getElementById('js-contact-submit');
    const feedback = document.getElementById('js-contact-feedback');

    if (!submitBtn) return;

    // Clear error on each field as the user types
    const fields = document.querySelectorAll('.contact-form-card__input, .contact-form-card__textarea');
    fields.forEach(field => {
        field.addEventListener('input', () => clearFieldError(field));
    });

    submitBtn.addEventListener('click', () => {
        if (!validateContactForm()) return;

        // Disable button to prevent double-submit
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split" aria-hidden="true"></i> Sending…';

        // Simulate async submission (replace with fetch() when backend is ready)
        setTimeout(() => {
            showFeedback(
                feedback,
                'Thank you! Your message has been sent. We\'ll be in touch shortly.',
                'success'
            );
            resetForm();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="bi bi-send" aria-hidden="true"></i> Send Message';
        }, 1200);
    });
}

/**
 * Validates all required form fields.
 * Returns true if the form is valid, false otherwise.
 * Marks each invalid field with an error class and message.
 */
function validateContactForm() {
    let isValid = true;

    const firstName = document.getElementById('contact-first-name');
    const lastName = document.getElementById('contact-last-name');
    const email = document.getElementById('contact-email');
    const subject = document.getElementById('contact-subject');
    const message = document.getElementById('contact-message');

    if (!firstName.value.trim()) {
        showFieldError(firstName, 'err-first-name', 'First name is required.');
        isValid = false;
    }

    if (!lastName.value.trim()) {
        showFieldError(lastName, 'err-last-name', 'Last name is required.');
        isValid = false;
    }

    if (!email.value.trim()) {
        showFieldError(email, 'err-email', 'Email address is required.');
        isValid = false;
    } else if (!isValidEmail(email.value.trim())) {
        showFieldError(email, 'err-email', 'Please enter a valid email address.');
        isValid = false;
    }

    if (!subject.value.trim()) {
        showFieldError(subject, 'err-subject', 'Subject is required.');
        isValid = false;
    }

    if (!message.value.trim()) {
        showFieldError(message, 'err-message', 'Please enter your message.');
        isValid = false;
    }

    return isValid;
}

/**
 * Marks a field as invalid and displays an error message below it.
 */
function showFieldError(field, errorId, message) {
    field.classList.add('contact-form-card__input--error');
    const errEl = document.getElementById(errorId);
    if (errEl) errEl.textContent = message;
}

/**
 * Removes the error state from a field when the user begins correcting it.
 */
function clearFieldError(field) {
    field.classList.remove('contact-form-card__input--error');

    // Derive the error element id from the field id
    const errId = 'err-' + field.id.replace('contact-', '').replace(/-/g, '-');
    const errEl = document.getElementById(errId);
    if (errEl) errEl.textContent = '';
}

/**
 * Displays a success or error message below the submit button.
 */
function showFeedback(container, message, type) {
    if (!container) return;
    container.textContent = message;
    container.className = 'contact-form-card__feedback contact-form-card__feedback--' + type;
}

/**
 * Resets all form fields to their default empty state after a successful submit.
 */
function resetForm() {
    const inputs = document.querySelectorAll('.contact-form-card__input');
    const textarea = document.querySelector('.contact-form-card__textarea');
    const radios = document.querySelectorAll('.contact-form-card__radio');

    inputs.forEach(input => { input.value = ''; });
    if (textarea) textarea.value = '';

    // Reset preferred contact method back to email (first radio)
    radios.forEach((radio, index) => {
        radio.checked = index === 0;
    });
}

/**
 * Returns true if the given string is a plausibly valid email address.
 * Intentionally permissive — full RFC validation is handled server-side.
 */
function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}