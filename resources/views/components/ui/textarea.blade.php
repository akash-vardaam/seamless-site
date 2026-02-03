@php
  $textareaId = $id ?? 'textarea-' . uniqid();
  $name = $name ?? '';
  $placeholder = $placeholder ?? '';
  $disabled = $disabled ?? false;
  $rows = $rows ?? 4;
  $value = $value ?? '';
  
  $baseClasses = 'flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';
  
  $customClass = $class ?? '';
  $textareaClasses = "{$baseClasses} {$customClass}";
@endphp

<textarea
  id="{{ $textareaId }}"
  name="{{ $name }}"
  placeholder="{{ $placeholder }}"
  rows="{{ $rows }}"
  class="{{ $textareaClasses }}"
  {{ $disabled ? 'disabled' : '' }}
  {!! isset($attributes) ? $attributes : '' !!}
>{{ $value ?? $slot }}</textarea>
