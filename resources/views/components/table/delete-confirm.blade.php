@props(['submit'])
<x-tall-table.confirm>
    <x-slot name="button">
        <x-tall-dropdown.item type="button" wire:click="$set('showDeleteModal',true)" class="flex items-center space-x-2">
            <x-tall-icon.trash class="text-cool-gray-400" /> <span>{{ __('Delete') }}</span>
        </x-tall-dropdown.item>
    </x-slot>
    <div class="avatar w-full items-center justify-center flex">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-12 h-12">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        </svg>
    </div>
    <div class="mt-0 px-4 sm:px-12">
        <h3 class="text-lg text-slate-800 dark:text-navy-50">
            {{ __('Delete') }}
        </h3>
        <p class="mt-4 text-slate-500 dark:text-navy-200">
            {{ __('Are you sure you? This action is irreversible.') }}
        </p>
    </div>
    <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
    <div class="space-x-3">
        <x-tall-button.secondary-rounded  wire:click="$set('showDeleteModal',false)">
            {{ __('Cancel') }}
        </x-tall-button.secondary-rounded>
        <x-tall-button.primary-rounded type="button" {{ $attributes }}>
            {{ __('Apply')}}
        </x-tall-button.primary-rounded>
    </div>
</x-tall-table.confirm>
