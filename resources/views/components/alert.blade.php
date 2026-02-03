@props(['variant' => 'default'])

<div
  role="alert"
  {{ $attributes->class([
      'relative w-full rounded-lg border p-4 [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground',
      'bg-background text-foreground' => $variant === 'default',
      'border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive' => $variant === 'destructive',
  ]) }}
>
  {{ $slot }}
</div>
