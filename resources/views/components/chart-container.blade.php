@props(['config' => [], 'id' => null])

@php
$uniqueId = uniqid('chart-');
$chartId = $id ? 'chart-' . str_replace(':', '', $id) : $uniqueId;
@endphp

<div
  x-data="chartContainer({
    config: @json($config),
    chartId: '{{ $chartId }}',
  })"
  data-chart="{{ $chartId }}"
  {{ $attributes->class([
      'flex aspect-video justify-center text-xs',
  ]) }}
>
  <style>
    @php
    $themeConfig = [];
    foreach ($config as $key => $item) {
      if (isset($item['color'])) {
        $themeConfig[$key] = $item['color'];
      } elseif (isset($item['theme'])) {
        $themeConfig[$key] = $item['theme']['light'] ?? $item['theme']['dark'] ?? '';
      }
    }
    @endphp
    [data-chart="{{ $chartId }}"] {
      @foreach($themeConfig as $key => $color)
        --color-{{ $key }}: {{ $color }};
      @endforeach
    }
  </style>

  <div class="w-full h-full">
    {{ $slot }}
  </div>
</div>

@once
  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      function chartContainer({ config = {}, chartId = '' }) {
        return {
          config,
          chartId,
          chart: null,
          
          registerChart(canvasElement, chartConfig) {
            if (this.chart) {
              this.chart.destroy();
            }
            this.chart = new Chart(canvasElement, chartConfig);
          },

          updateChart(chartConfig) {
            if (this.chart) {
              Object.assign(this.chart.config, chartConfig);
              this.chart.update();
            }
          },

          destroyChart() {
            if (this.chart) {
              this.chart.destroy();
            }
          },
        };
      }
    </script>
  @endpush
@endonce
