@props([
    'class' => '',
])

<li
    data-sidebar="menu-sub-item"
    class="{{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</li>
