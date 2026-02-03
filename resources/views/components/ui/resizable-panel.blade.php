@props([
    'defaultSize' => 50,
    'minSize' => 25,
    'maxSize' => 75,
    'class' => '',
])

<div
    data-resizable-panel
    data-default-size="{{ $defaultSize }}"
    data-min-size="{{ $minSize }}"
    data-max-size="{{ $maxSize }}"
    class="flex-1 overflow-hidden {{ $class }}"
    style="flex: {{ $defaultSize }} 1 0%"
    {{ $attributes }}
>
    {{ $slot }}
</div>
