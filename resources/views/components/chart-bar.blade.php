@props(['data' => [], 'options' => []])

<canvas
  x-data="barChart({
    data: @json($data),
    options: @json($options),
  })"
  x-init="$nextTick(() => {
    const ctx = $el.getContext('2d');
    $el.parentElement.parentElement.__Alpine_x_data.registerChart(ctx, {
      type: 'bar',
      data: data,
      options: options,
    });
  })"
  {{ $attributes }}
></canvas>

@once
  @push('scripts')
    <script>
      function barChart({ data = {}, options = {} }) {
        return {
          data,
          options,
        };
      }
    </script>
  @endpush
@endonce
