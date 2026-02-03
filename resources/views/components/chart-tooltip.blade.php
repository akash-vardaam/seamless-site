@props(['hideLabel' => false, 'hideIndicator' => false, 'indicator' => 'dot'])

<div
  x-show="false"
  role="tooltip"
  {{ $attributes->class([
      'grid min-w-[8rem] items-start gap-1.5 rounded-lg border border-border/50 bg-background px-2.5 py-1.5 text-xs shadow-xl',
  ]) }}
>
  {{ $slot }}
</div>
