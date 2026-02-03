@props([
    'sheetId' => null,
    'class' => '',
])

<button
    data-sheet-trigger
    data-sheet-id="{{ $sheetId }}"
    class="{{ $class }}"
    onclick="window.sheetApi?.[this.dataset.sheetId]?.open?.()"
    {{ $attributes }}
>
    {{ $slot }}
</button>
