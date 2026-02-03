@props([
    'name' => '',
    'value' => '',
    'class' => '',
])

<fieldset
    data-radio-group
    data-group-name="{{ $name }}"
    class="grid gap-2 {{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}
</fieldset>

<script>
    (function() {
        const groups = document.querySelectorAll('[data-radio-group]');
        
        groups.forEach(group => {
            const name = group.dataset.groupName;
            const radios = group.querySelectorAll('[data-radio-item][data-group-name="{{ $name }}"]');
            
            // Initialize radio group API
            window.radioGroupApi = window.radioGroupApi || {};
            window.radioGroupApi[name] = {
                getValue: () => {
                    const checked = group.querySelector('[data-radio-item][data-checked="true"]');
                    return checked ? checked.dataset.value : null;
                },
                setValue: (val) => {
                    radios.forEach(radio => {
                        const input = radio.querySelector('input[type="radio"]');
                        const isChecked = radio.dataset.value === val;
                        input.checked = isChecked;
                        radio.dataset.checked = isChecked ? 'true' : 'false';
                    });
                },
            };
        });
    })();
</script>
