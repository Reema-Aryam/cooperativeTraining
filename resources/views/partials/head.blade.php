<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? __($title).' - '.__('site.name') : __('site.name') }}
</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<script type="application/json" id="passkey-messages">{!! json_encode([
    'NotSupportedError' => __('Passkeys are not supported in this browser.'),
    'Passkeys are not supported in this browser.' => __('Passkeys are not supported in this browser.'),
    'PasskeyExistsError' => __('This device is already registered as a passkey.'),
    'This device is already registered as a passkey.' => __('This device is already registered as a passkey.'),
    'InvalidDomainError' => __('Unable to use a passkey on this domain.'),
    'Invalid credential format.' => __('Invalid credential format.'),
    'Passkey registration session expired. Please try again.' => __('Passkey registration session expired. Please try again.'),
    'Passkey verification session expired. Please try again.' => __('Passkey verification session expired. Please try again.'),
    'Unable to verify passkey. Please try again.' => __('Unable to verify passkey. Please try again.'),
    'Passkey not recognized. It may have been removed from your account.' => __('Passkey not recognized. It may have been removed from your account.'),
    'Unable to register passkey. Please try again.' => __('Unable to register passkey. Please try again.'),
    'Unable to register this passkey.' => __('Unable to register this passkey.'),
    'fallback' => __('The passkey operation failed. Please try again.'),
], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!}</script>
