@props([
    'sheetId' => null,
    'class' => '',
])

<button
    data-sheet-close
    data-sheet-id="{{ $sheetId }}"
    class="{{ $class }}"
    onclick="window.sheetApi?.[this.dataset.sheetId]?.close?.()"
    {{ $attributes }}
>
    {{ $slot }}
</button>
