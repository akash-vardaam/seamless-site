@props([
    'value' => '',
    'groupName' => '',
    'checked' => false,
    'disabled' => false,
    'id' => null,
    'class' => '',
])

@php
    $id = $id ?: 'radio-' . uniqid();
@endphp

<div
    data-radio-item
    data-value="{{ $value }}"
    data-group-name="{{ $groupName }}"
    data-checked="{{ $checked ? 'true' : 'false' }}"
    class="flex items-center space-x-2"
    {{ $attributes }}
>
    <!-- Hidden native radio input -->
    <input
        type="radio"
        id="{{ $id }}"
        name="{{ $groupName }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="sr-only peer"
        data-radio-input
        onchange="
            const item = this.closest('[data-radio-item]');
            const group = item.closest('[data-radio-group]');
            const groupName = group.dataset.groupName;
            
            // Uncheck all items in group
            group.querySelectorAll('[data-radio-item]').forEach(r => {
                r.dataset.checked = 'false';
            });
            
            // Check this item
            item.dataset.checked = 'true';
            
            // Dispatch custom event
            group.dispatchEvent(new CustomEvent('radio-change', {
                detail: { value: this.value, groupName: groupName }
            }));
        "
    />
    
    <!-- Visual radio button -->
    <label
        for="{{ $id }}"
        class="aspect-square h-4 w-4 rounded-full border-2 border-primary bg-background
            transition-all duration-200 cursor-pointer
            peer-focus-visible:ring-2 peer-focus-visible:ring-ring peer-focus-visible:ring-offset-2 peer-focus-visible:ring-offset-background
            peer-disabled:cursor-not-allowed peer-disabled:opacity-50
            peer-checked:bg-primary
            flex items-center justify-center"
    >
        <!-- Inner dot indicator -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-2.5 w-2.5 text-background opacity-0 transition-opacity duration-200
                peer-checked:opacity-100"
            data-radio-indicator
        >
            <circle cx="12" cy="12" r="12" />
        </svg>
    </label>
    
    <!-- Label text (optional slot) -->
    <label for="{{ $id }}" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 cursor-pointer">
        {{ $slot }}
    </label>
</div>
