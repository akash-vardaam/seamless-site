@props([
    'class' => '',
])

<li
    data-sidebar="menu-item"
    class="group/menu-item relative {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</li>
