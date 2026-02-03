@props(['name' => '', 'id' => null])

@php
$fieldId = $id ?: str_replace(['[', ']'], ['-', ''], $name);
@endphp

<div
  x-data="formField({
    name: '{{ $name }}',
    fieldId: '{{ $fieldId }}',
    errors: @json($errors->get($name) ?? []),
  })"
  class="space-y-2"
  data-field-name="{{ $name }}"
>
  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function formField({ name = '', fieldId = '', errors = [] }) {
        return {
          name,
          fieldId,
          errors,
          hasError: errors.length > 0,
          errorMessage: errors[0] || '',
        };
      }
    </script>
  @endpush
@endonce
