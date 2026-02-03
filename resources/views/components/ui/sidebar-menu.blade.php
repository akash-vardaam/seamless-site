@props([
    'class' => '',
])

<ul
    data-sidebar="menu"
    class="flex w-full min-w-0 flex-col gap-1 {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</ul>
