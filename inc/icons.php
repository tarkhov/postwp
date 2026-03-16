<?php
define('POSTWP_ICONS', [
    'logo' => <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="{width}" height="{height}" x="0" y="0" viewBox="0 0 60 60" xml:space="preserve">
            <g>
                <circle cx="30" cy="53" r="5" fill="#0D6EFD" class="logo-circle"></circle>
                <path d="M47 13.92v8.28a4.01 4.01 0 0 1-2.934 3.854L33.4 29.023a5.943 5.943 0 0 0-2.678 1.591 1 1 0 0 1-1.44 0 5.952 5.952 0 0 0-2.682-1.592l-10.668-2.968A4.011 4.011 0 0 1 13 22.2v-8.28a6.29 6.29 0 0 1-2 0v8.28a6 6 0 0 0 4.4 5.777l10.673 2.969A4.011 4.011 0 0 1 29 34.8v11.28a6.29 6.29 0 0 1 2 0V34.8a4.01 4.01 0 0 1 2.934-3.854L44.6 27.977A6 6 0 0 0 49 22.2v-8.28a6.29 6.29 0 0 1-2 0z" fill="#000000" class="logo-fork"></path>
                <circle cx="48" cy="7" r="5" fill="#0D6EFD" class="logo-circle"></circle>
                <circle cx="12" cy="7" r="5" fill="#0D6EFD" class="logo-circle"></circle>
                <path d="M24.8 13.4a1 1 0 0 0-1.4-.2l-4 3a1 1 0 0 0 0 1.6l4 3a1 1 0 1 0 1.2-1.6L21.667 17l2.933-2.2a1 1 0 0 0 .2-1.4zM36.6 13.2a1 1 0 0 0-1.2 1.6l2.933 2.2-2.933 2.2a1 1 0 1 0 1.2 1.6l4-3a1 1 0 0 0 0-1.6zM31.242 12.03a1 1 0 0 0-1.212.728l-2 8a1 1 0 0 0 .728 1.212A1.017 1.017 0 0 0 29 22a1 1 0 0 0 .969-.758l2-8a1 1 0 0 0-.727-1.212z" fill="#0D6EFD" class="logo-code"></path>
            </g>
        </svg>
    SVG
]);

function postwp_icon(string $name, array $size = [16, 16]): string {
    return str_replace(['{width}', '{height}'], $size, POSTWP_ICONS[$name]);
}