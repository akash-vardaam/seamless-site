@props(['index' => 0])

<input
  type="text"
  inputmode="numeric"
  maxlength="1"
  data-otp-index="{{ $index }}"
  x-model="values[{{ $index }}]"
  @input="setSlotValue({{ $index }}, $el.value)"
  @keydown="handleKeyDown({{ $index }}, $event)"
  @paste="handlePaste($event)"
  {{ $attributes->class([
      'relative flex h-10 w-10 items-center justify-center border-y border-r border-input text-sm font-semibold transition-all first:rounded-l-md first:border-l last:rounded-r-md',
      'text-center',
      'focus:z-10 focus:ring-2 focus:ring-ring focus:ring-offset-2 focus:outline-none',
      'disabled:cursor-not-allowed disabled:opacity-50',
  ]) }}
/>
