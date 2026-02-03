@props(['name' => '', 'type' => 'text', 'value' => null, 'placeholder' => '', 'disabled' => false])

<input
  type="{{ $type }}"
  name="{{ $name }}"
  @if($value !== null)
    value="{{ old($name, $value) }}"
  @else
    value="{{ old($name) }}"
  @endif
  @if($placeholder)
    placeholder="{{ $placeholder }}"
  @endif
  @disabled($disabled)
  {{ $attributes->class([
      'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
      'border-destructive focus-visible:ring-destructive' => $errors->has($name),
  ]) }}
/>

@error($name)
  <p class="text-sm font-medium text-destructive">{{ $message }}</p>
@enderror
