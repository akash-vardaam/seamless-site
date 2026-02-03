@props(['selected' => null, 'mode' => 'single', 'showOutsideDays' => true])

<div
  x-data="calendar({
    selected: @json($selected),
    mode: '{{ $mode }}',
    showOutsideDays: {{ $showOutsideDays ? 'true' : 'false' }},
  })"
  {{ $attributes->class(['p-3']) }}
>
  <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
    <div class="space-y-4">
      <!-- Caption -->
      <div class="flex justify-center pt-1 relative items-center">
        <button
          type="button"
          x-on:click="previousMonth()"
          class="absolute left-1 h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100 inline-flex items-center justify-center rounded-md border border-input"
        >
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>

        <h2 class="text-sm font-medium" x-text="monthYear"></h2>

        <button
          type="button"
          x-on:click="nextMonth()"
          class="absolute right-1 h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100 inline-flex items-center justify-center rounded-md border border-input"
        >
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>

      <!-- Calendar Grid -->
      <table class="w-full border-collapse space-y-1">
        <thead>
          <tr class="flex">
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Su</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Mo</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Tu</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">We</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Th</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Fr</th>
            <th class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]">Sa</th>
          </tr>
        </thead>
        <tbody>
          <template x-for="week in weeks" :key="week">
            <tr class="flex w-full mt-2">
              <template x-for="day in week" :key="day.date">
                <td
                  class="h-9 w-9 text-center text-sm p-0 relative focus-within:relative focus-within:z-20"
                  :class="getDayClass(day)"
                >
                  <button
                    type="button"
                    x-on:click="selectDate(day.date)"
                    x-text="day.day"
                    :class="getDayButtonClass(day)"
                    class="h-9 w-9 p-0 font-normal inline-flex items-center justify-center rounded-md"
                  ></button>
                </td>
              </template>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </div>
</div>

@once
  @push('scripts')
    <script>
      function calendar({ selected = null, mode = 'single', showOutsideDays = true }) {
        return {
          currentDate: new Date(),
          selected,
          mode,
          showOutsideDays,
          weeks: [],

          init() {
            this.generateCalendar();
          },

          get monthYear() {
            return this.currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
          },

          generateCalendar() {
            const year = this.currentDate.getFullYear();
            const month = this.currentDate.getMonth();

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const prevLastDay = new Date(year, month, 0);

            const startDate = new Date(firstDay);
            startDate.setDate(startDate.getDate() - firstDay.getDay());

            this.weeks = [];
            let week = [];

            for (let d = new Date(startDate); d <= lastDay; d.setDate(d.getDate() + 1)) {
              const isCurrentMonth = d.getMonth() === month;
              const isToday = this.isSameDay(d, new Date());

              week.push({
                date: new Date(d),
                day: d.getDate(),
                isCurrentMonth,
                isToday,
                isSelected: this.selected && this.isSameDay(d, new Date(this.selected)),
              });

              if (week.length === 7) {
                this.weeks.push(week);
                week = [];
              }
            }

            if (week.length > 0) {
              this.weeks.push(week);
            }
          },

          previousMonth() {
            this.currentDate.setMonth(this.currentDate.getMonth() - 1);
            this.generateCalendar();
          },

          nextMonth() {
            this.currentDate.setMonth(this.currentDate.getMonth() + 1);
            this.generateCalendar();
          },

          selectDate(date) {
            this.selected = date.toISOString().split('T')[0];
            this.generateCalendar();
            this.$dispatch('date-selected', { date: this.selected });
          },

          isSameDay(date1, date2) {
            return date1.getFullYear() === date2.getFullYear() &&
              date1.getMonth() === date2.getMonth() &&
              date1.getDate() === date2.getDate();
          },

          getDayClass(day) {
            const classes = [];
            if (day.isSelected) {
              classes.push('bg-accent');
            }
            if (!day.isCurrentMonth && !this.showOutsideDays) {
              classes.push('invisible');
            }
            return classes.join(' ');
          },

          getDayButtonClass(day) {
            const classes = ['transition-colors'];

            if (!day.isCurrentMonth) {
              classes.push('text-muted-foreground opacity-50');
            } else if (day.isToday) {
              classes.push('bg-accent text-accent-foreground');
            } else if (day.isSelected) {
              classes.push('bg-primary text-primary-foreground hover:bg-primary hover:text-primary-foreground');
            } else {
              classes.push('hover:bg-accent hover:text-accent-foreground');
            }

            return classes.join(' ');
          },
        };
      }
    </script>
  @endpush
@endonce
