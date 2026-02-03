@props(['asChild' => false])

@if($asChild)
  {{ $slot }}
@else
  <button
    type="button"
    x-on:click="$parent.openDialog()"
    {{ $attributes }}
  >
    {{ $slot }}
  </button>
@endif
