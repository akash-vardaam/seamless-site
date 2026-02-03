@props(['id' => '', 'checked' => false, 'disabled' => false])

<input
  type="checkbox"
  x-data="checkbox({
    checked: {{ $checked ? 'true' : 'false' }},
  })"
  x-model="checked"
  @change="$dispatch('checkbox-change', { checked: checked })"
  id="{{ $id ?: uniqid('checkbox-') }}"
  @disabled($disabled)
  {{ $attributes->class([
      'peer h-4 w-4 shrink-0 rounded-sm border border-primary ring-offset-background data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
      'cursor-pointer' => !$disabled,
  ]) }}
/>

@once
  @push('scripts')
    <script>
      function checkbox({ checked = false }) {
        return {
          checked,
        };
      }
    </script>
  @endpush
@endonce
