<button
  type="button"
  x-on:click="$parent.closeDialog()"
  {{ $attributes }}
>
  {{ $slot }}
</button>
