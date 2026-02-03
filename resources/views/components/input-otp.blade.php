@props(['maxLength' => 6, 'name' => 'otp'])

<div
  x-data="inputOTP({
    maxLength: {{ $maxLength }},
    values: new Array({{ $maxLength }}).fill(''),
    name: '{{ $name }}',
  })"
  {{ $attributes->class([
      'flex items-center gap-2',
  ]) }}
>
  <!-- Hidden input to store the complete OTP value -->
  <input type="hidden" :name="name" :value="values.join('')" />

  {{ $slot }}
</div>

@once
  @push('scripts')
    <script>
      function inputOTP({ maxLength = 6, values = [], name = 'otp' }) {
        return {
          maxLength,
          values,
          name,

          getSlotValue(index) {
            return this.values[index] || '';
          },

          setSlotValue(index, value) {
            if (value.length > 1) {
              value = value.slice(-1);
            }
            if (!/^\d*$/.test(value)) {
              return;
            }
            this.values[index] = value;
            this.$dispatch('otp-change', { value: this.values.join(''), index });

            // Auto-focus next slot if value is entered
            if (value && index < this.maxLength - 1) {
              const nextInput = this.$el.querySelector(`input[data-otp-index="${index + 1}"]`);
              if (nextInput) {
                nextInput.focus();
              }
            }
          },

          handleKeyDown(index, event) {
            if (event.key === 'Backspace') {
              if (this.values[index]) {
                this.setSlotValue(index, '');
              } else if (index > 0) {
                const prevInput = this.$el.querySelector(`input[data-otp-index="${index - 1}"]`);
                if (prevInput) {
                  prevInput.focus();
                  this.setSlotValue(index - 1, '');
                }
              }
            } else if (event.key === 'ArrowLeft' && index > 0) {
              event.preventDefault();
              const prevInput = this.$el.querySelector(`input[data-otp-index="${index - 1}"]`);
              if (prevInput) {
                prevInput.focus();
              }
            } else if (event.key === 'ArrowRight' && index < this.maxLength - 1) {
              event.preventDefault();
              const nextInput = this.$el.querySelector(`input[data-otp-index="${index + 1}"]`);
              if (nextInput) {
                nextInput.focus();
              }
            }
          },

          handlePaste(event) {
            event.preventDefault();
            const pastedData = event.clipboardData.getData('text');
            if (/^\d+$/.test(pastedData)) {
              const digits = pastedData.slice(0, this.maxLength).split('');
              digits.forEach((digit, index) => {
                if (index < this.maxLength) {
                  this.setSlotValue(index, digit);
                }
              });
              const lastInput = this.$el.querySelector(`input[data-otp-index="${Math.min(digits.length - 1, this.maxLength - 1)}"]`);
              if (lastInput) {
                lastInput.focus();
              }
            }
          },

          getOTP() {
            return this.values.join('');
          },

          isComplete() {
            return this.values.every(v => v !== '');
          },
        };
      }
    </script>
  @endpush
@endonce
