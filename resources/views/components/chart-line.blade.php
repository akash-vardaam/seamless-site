@props(['data' => [], 'options' => []])

<canvas
  x-data="lineChart({
    data: @json($data),
    options: @json($options),
  })"
  x-init="$nextTick(() => {
    const ctx = $el.getContext('2d');
    $el.parentElement.parentElement.__Alpine_x_data.registerChart(ctx, {
      type: 'line',
      data: data,
      options: options,
    });
  })"
  {{ $attributes }}
></canvas>

@once
  @push('scripts')
    <script>
      function lineChart({ data = {}, options = {} }) {
        return {
          data,
          options,
        };
      }
    </script>
  @endpush
@endonce
