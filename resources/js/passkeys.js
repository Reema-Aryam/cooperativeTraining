import { Passkeys } from '@laravel/passkeys';

window.Passkeys = Passkeys;
window.localizedPasskeyError = (error) => {
    const messages = JSON.parse(document.getElementById('passkey-messages')?.textContent || '{}');
    const message = messages[error.message] || messages[error.name];

    // Unknown browser messages also receive a readable localized fallback.
    return message || messages.fallback;
};
window.dispatchEvent(new CustomEvent('passkeys:ready'));
