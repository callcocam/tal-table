<div class="flex w-full space-x-2 items-center">
    <x-tall-input.label label="From">

        <x-tall-input.flatpickr placeholder="{{ __('Choose start date') }}..." type="text"
            wire:model.lazy="filters.start" />
        <x-slot name="icon">
            <x-tall-input.append-icon icon="calendar" />
        </x-slot>

    </x-tall-input.label>
    <x-tall-input.label label="To">

        <x-tall-input.flatpickr placeholder="{{ __('Choose end date') }}..." type="text"
            wire:model.lazy="filters.end" />
        <x-slot name="icon">
            <x-tall-input.append-icon icon="calendar" />
        </x-slot>

    </x-tall-input.label>
</div>
